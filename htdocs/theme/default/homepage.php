<?php

// Meta data example
$this->page = array(

    // Page title
    'title' => 'Homepage '. SITE_NAME,

    // Page description
    'description' => 'This is just an example description.',

    // Page keywords
    'keywords' => 'page, keywords, go, here',

    // Canonical URL, this can be a string or just leave as is for current url.
    'canonical' => $this->path
    
);

// Get header
$this->get_header();

?>

<?php /* Get footer */ $this->get_footer(); ?>
