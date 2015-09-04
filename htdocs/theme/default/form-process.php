<?php

if ( $_POST ) {

    $contact = new \ContactForm\ContactForm();

    if (!empty($_POST['subject'])) {
        $contact->set_response('error', 'Sorry, looks like something went wrong');
    } else {

        /**
         * Input data
         */
        $data['name'] = array(
            'id' => 'name',
            'label' => 'Name',
            'type' => 'text',
            'content' => $_POST['name'],
        );
        $data['email'] = array(
            'id' => 'email',
            'label' => 'E-mail Address',
            'type' => 'email',
            'content' => $_POST['email'],
        );
        $data['phone'] = array(
            'id' => 'phone',
            'label' => 'Phone Number',
            'type' => 'phone',
            'content' => $_POST['phone'],
        );
        $data['message'] = array(
            'id' => 'message',
            'label' => 'Message',
            'type' => 'message',
            'content' => $_POST['message'],
        );
        /*
        $data['validate'] = array(
            'id' => 'validate',
            'label' => 'Validation',
            'type' => 'validate',
            'content' => $_POST['validate']
        );*/

        /**
         * Submit form
         */
        $contact->submit($data);

    }

    /**
     * Return response
     */
    $contact->get_response();

} else {

    $this->get_header();

?>
<div class="alert error">Only form data can be submitted here.</div>
<?php $this->get_footer(); } ?>
