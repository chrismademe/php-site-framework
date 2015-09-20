<!doctype html>
<html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo $this->page['title']; ?></title>
    <meta name="description" content="<?php echo $this->page['description']; ?>">
    <meta name="keywords" content="<?php echo $this->page['keywords']; ?>">
    <link rel="canonical" href="<?php echo $this->domain .'/'. $this->page['canonical']; ?>">

    <link rel="stylesheet" type="text/css" href="<?php assets_dir() ?>/css/style.css">
    <link rel="apple-touch-icon" sizes="57x57" href="<?php assets_dir() ?>/images/icons/apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php assets_dir() ?>/images/icons/apple-touch-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php assets_dir() ?>/images/icons/apple-touch-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php assets_dir() ?>/images/icons/apple-touch-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php assets_dir() ?>/images/icons/apple-touch-icon-180x180.png">
    <link rel="icon" type="image/x-icon" href="/favicon.ico">

    <?php if ( part_exists('analytics') ): $this->get_partial('analytics'); endif; ?>

    <!--[if lt IE 9]>
    <script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php assets_dir() ?>/css/ie.css">
    <![endif]-->

</head>
<body class="page-<?php echo $this->slug; ?>">

    <?php /* Browser Update Message */ if ( part_exists('analytics') ): $this->get_partial('browser-update'); endif; ?>
