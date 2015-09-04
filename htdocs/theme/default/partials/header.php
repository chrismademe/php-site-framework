<!doctype html>
<html>
<head>

    <meta charset="utf-8">
    <title><?php echo $this->page['title']; ?></title>
    <meta name="description" content="<?php echo $this->page['description']; ?>">
    <meta name="keywords" content="<?php echo $this->page['keywords']; ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="canonical" href="<?php echo $this->domain .'/'. $this->page['canonical']; ?>">

    <link rel="stylesheet" type="text/css" href="<?php assets_dir() ?>/css/style.css">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,600,700">
    <link rel="apple-touch-icon" sizes="57x57" href="<?php assets_dir() ?>/images/icons/apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?php assets_dir() ?>/images/icons/apple-touch-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php assets_dir() ?>/images/icons/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php assets_dir() ?>/images/icons/apple-touch-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php assets_dir() ?>/images/icons/apple-touch-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php assets_dir() ?>/images/icons/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php assets_dir() ?>/images/icons/apple-touch-icon-152x152.png">
    <link rel="icon" type="" href="/favicon.ico">

    <?php if ( part_exists('analytics') ): $this->get_partial('analytics'); endif; ?>

    <!--[if lt IE 9]>
    <script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php assets_dir() ?>/css/ie.css">
    <![endif]-->

    <?php if (isset($this->page['facebook'])): ?>
    <meta property="og:site_name" content="<?php echo $this->page['facebook']['site_name'] ?>">
    <meta property="og:type" content="<?php echo $this->page['facebook']['type'] ?>">
    <meta property="og:title" content="<?php echo $this->page['facebook']['title'] ?>">
    <meta property="og:url" content="<?php echo $this->page['facebook']['url'] ?>">
    <meta property="og:image" content="<?php echo $this->page['facebook']['image'] ?>">
    <meta property="og:description" content="<?php echo $this->page['facebook']['description'] ?>">
    <?php endif; ?>

    <?php if (isset($this->page['twitter'])): ?>
    <meta name="twitter:card" content="<?php echo $this->page['twitter']['card'] ?>">
    <meta name="twitter:url" content="<?php echo $this->page['twitter']['url'] ?>">
    <meta name="twitter:title" content="<?php echo $this->page['twitter']['title'] ?>">
    <meta name="twitter:description" content="<?php echo $this->page['twitter']['description'] ?>">
    <meta name="twitter:image" content="<?php echo $this->page['twitter']['image'] ?>">
    <?php endif; ?>

</head>
<body class="page-<?php echo $this->slug; ?>">
