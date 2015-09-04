<?php

namespace Theme;

class Theme
{

    private $directory = THEME_DIR;
    private $content = SITE_CONTENT;
    private $theme = SITE_THEME;
    private $extension = THEME_TPL_EXT;
    private $partial = THEME_INC;
    private $variables;
    private $output;

    /**
     * Setup
     */
    public function __construct($params = null) {

        if (isset($params['variables'])) {

            $variables = $params['variables'];
            if ($variables) {
                $this->variables = $variables;
            }

            if (!empty($variables)) {
                foreach ($variables as $key => $value) {
                    $this->$key = $value;
                }
            }

        }

    }

    /**
     * Set Vars
     */
    public function __set($key, $value) {
        $this->variables[$key] = $value;
        return $this;
    }

    public function __get($key) {

        if (!isset($this->variables[$key])) {
            throw new \InvalidArgumentException('Unable to get '. $key .'');
        }

        $var = $this->variables[$key];
        return $var instanceof Closure ? $var($this) : $var;

    }

    /**
     * Get Template
     */
    public function get_template($part, $file = null) {

        global $meta;
        global $index;

        /**
         * Load requested template
         * file
         */
        if ($file && file_exists($file)) {
            $tpl = $this->directory .'/'. $this->theme .'/'. $file . $this->extension;
        } else {

            $file = $this->directory .'/'. $this->theme .'/'. $part . $this->extension;

            if (file_exists($file)) {
                $tpl = $file;
            } else {

                $indexCount = count($index) - 1;
                $pathArray = $index;

                while ($pathArray) {
                    unset($pathArray[$indexCount]);
                    $file = implode('-', $pathArray);
                    $file = $this->directory .'/'. $this->theme .'/'. $file . $this->extension;
                    if (file_exists($file)) {
                        $tpl = $file;
                        break;
                    }
                    $indexCount--;
                }

                if (!isset($tpl)) {

                    if (file_exists($this->directory .'/'. $this->theme .'/'. $this->partial .'/'. $part . $this->extension)) {
                        $tpl = $this->directory .'/'. $this->theme .'/page'. $this->extension;
                    } else {
                        $tpl = $this->directory .'/'. $this->theme .'/404'. $this->extension;
                    }

                }

            }
        }

        /**
         * Print output to screen
         */
        extract($this->variables);
        ob_start();
        include $tpl;
        print ob_get_clean();

    }

    /**
     * Helper functions
     */

    // Get partial
    public function get_partial($part = null) {

        // Default to current page
        if ( is_null($part) )
            $part = $this->slug;

        return $this->get_template($this->partial .'/'. $part);

    }

    // Get Header partial
    public function get_header() {
        return $this->get_partial('header');
    }

    // Get Footer partial
    public function get_footer() {
        return $this->get_partial('footer');
    }

    // Get Sidebar partial
    public function get_sidebar() {
        return $this->get_partial('sidebar');
    }

    // Get Analytics partial
    public function get_analytics() {
        return $this->get_partial('analytics');
    }

}

?>
