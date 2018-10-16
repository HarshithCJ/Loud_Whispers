<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url')?>">
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Raleway" rel="stylesheet">
    <title><?php bloginfo('title') ?></title>
    <?php wp_head() ?>
</head>
<body>
<div class="container">

    <?php
    if ( is_active_sidebar( 'header_contact' ) ) : ?>
    <div id="header-widget-area" class="chw-widget-area widget-area" role="complementary">
    <?php dynamic_sidebar( 'header_contact' ); ?>
    </div>
    <?php endif; ?>

</div>
<div class="container-fluid">

    <?php
    if ( is_active_sidebar( 'header_menu' ) ) : ?>
    <div id="header-widget-area" class="chw-widget-area widget-area" role="complementary">
    <?php dynamic_sidebar( 'header_menu' ); ?>
    </div>
    <?php endif; ?>

</div>

<div class="container">

