<?php

class ContactForm
{
    
    /**
     * PROPERTIES
     */
    public          $response = array();
    private         $config = array();
    
    /**
     * CONSTRUCTOR
     */
    public function __construct($config) {
        $this->config = $config;
    }

    public function submit($data) {
        
        // Check site token
        if (!$this->valid_token($this->config['site_token'])) {
            
            $this->set_response('error', 'Invalid site token, your message was not sent. Please contact the website administrator.');
         
        // If valid, carry on...
        } else {
            
            // Validate user input
            foreach ($data as $input) {
                
                if(!$this->valid_input($input['type'], $input['content'])) {
                    
                    $this->set_response('error', ''. $input['label'] . ' input is invalid. If you believe this is a mistake, please check your message for words that could be mistaken for spam.');
                    $invalid_input[$input['id']] = $input['label'];
                    
                } else {
                
                    $valid_input[$input['id']] = $input['content'];
                    
                }
                
            }
            
            // Send message
            if (!empty($valid_input) && empty($invalid_input)) {
                
                /**
                 * Get each key and
                 * value and place into
                 * array for template
                 */
                $template_vars = array_merge($this->config, $valid_input);
                
                /**
                 * Utility variables
                 */
                $template_vars['date'] = date("l, F j, Y");
                $template_vars['time'] = date("g:i a");
            
                /**
                 * Include templates
                 * Generates $message
                 */
                $message = file_get_contents('message.template.php');
                
                /**
                 * Replace token values
                 * from template with
                 * variable values
                 */
                foreach ($template_vars as $key => $var) {
                    $message = str_replace('{'. $key .'}', $var, $message);
                }
                
                /**
                 * Write and send email
                 */
                $headers = 'MIME-Version: 1.0' . "\r\n";
                $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                $headers .= 'From:' . $template_vars['email'] . "\r\n";
                
                if ($this->send_mail($this->config['email_address'], $this->config['email_subject'], $message, $headers)) {
                    $this->set_response('success', $this->config['alert_success']);
                } else {
                    $this->set_response('error', $this->config['alert_error']);
                }
                
                /**
                 * If $config['email_responder']
                 * is set to true, send the user
                 * an autoresponse.
                 */
                if ($this->config['email_responder']) {
                    
                    /**
                     * Include templates
                     * Generates $message
                     */
                    $responder = file_get_contents('responder.template.php');

                    /**
                     * Replace token values
                     * from template with
                     * variable values
                     */
                    foreach ($template_vars as $key => $var) {
                        $responder = str_replace('{'. $key .'}', $var, $responder);
                    }
                    
                    $headers = 'MIME-Version: 1.0' . "\r\n";
                    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                    $headers .= 'From:' . $this->config['email_address'] . "\r\n";
                
                    $this->send_mail($template_vars['email'], $this->config['email_responder_subject'], $responder, $headers);
                    
                }
                
            }
                
        }
        
    }
    
    
    
    /**
     * Validate Site Token
     */
    private function valid_token($site_token) {
    
        $connect = curl_init();
        curl_setopt($connect, CURLOPT_URL, $this->config['site_verification_server'] .'/verify_token.php');
        curl_setopt($connect, CURLOPT_POST, 1);
        curl_setopt($connect, CURLOPT_POSTFIELDS, 'site_token='. $site_token .'');
        curl_setopt($connect, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($connect);
        
        if ($response == 1) {
            return true;
        } else {
            return false;
        }
        
    }
    
    /**
     * Validate User Input
     */
    private function valid_input($type, $content) {
    
        switch ($type) {
        
            case 'text':
            
                if (filter_var($content, FILTER_SANITIZE_STRING)) {
                    return true;
                } else {
                    return false;
                }
            
            break;
            
            case 'email':
            
                if (filter_var($content, FILTER_VALIDATE_EMAIL)) {
                    return true;
                } else {
                    return false;
                }
            
            break;
            
            case 'phone':
            
                if (preg_match("/^[0-9]{11}$/", $content)) {
                    return true;
                } else {
                    return false;
                }
            
            break;
            
            case 'message':
            
                /**
                 * List of words considered
                 * to be spammy.
                 *
                 * If the message contains 
                 * a spam word, reject it.
                 *
                 * Spam list is hosted on
                 * searchitlocal.co.uk domain.
                 */
                $spam_words = file_get_contents('http://www.searchitlocal.co.uk/spam.txt');
                $spam_words = str_replace("\n", '|', $spam_words);

                $words = explode('|', $spam_words);
            
                /*
                 * Loop through each word
                 * and check to see if it
                 * appears in the message.
                 */
                $i = 0;
                while ($i < count($words)) {
                
                    if (strpos(strtolower(' ' . $content), $words[$i])) {
                        $spam = 1;
                    }
    
                    $i++;
                    
                }
            
                /**
                 * If $spam is set to 1 by
                 * the loop, return false so
                 * the input becomes invalid
                 * and will the script will
                 * not continue.
                 */
                if (!empty($spam) && $spam == 1) {
                    return false;
                } else {
                    return true;
                }
            
            break;
            
            case 'validate':
            
                if ($content == 1) {
                    return true;
                } else {
                    return false;
                }
            
            break;
            
        }
        
    }
    
    /**
     * Send Mail
     */
    private function send_mail($recipient, $subject, $message, $headers) {
    
        /**
         * Wordwrap message otherwise
         * it won't display properly
         */
        $message = wordwrap($message, 70);
        
        /**
         * Attempt to send email
         */
        if (mail($recipient, $subject, $message, $headers)) {
            return true;
        } else {
            return false;
        }
        
    }
    
    /**
     * Set Response
     */
    public function set_response($type, $message) {

        $this->response['type'] = $type;
        $this->response['message'] = $message;
        
    }
    
    /**
     * Get Response
     */
    public function get_response() {
        echo '<div class="alert alert-'. $this->response['type'] .'">'. $this->response['message'] .'</div>';
    }
    
}

?>