<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php echo bloginfo('charset') ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="<?php echo MBN_ASSETS_URI ?>/img/favicon.png">
    
    <!-- <title><?php bloginfo('title') ?></title> -->

    <link rel="stylesheet" href="https://use.typekit.net/het5epm.css">

    <?php wp_head() ?>

</head>
<body <?php body_class() ?>>

<div id="wrapper"> 
<header id="header" data-sticky-container data-toggler=".show-menu">
    <div class="hsnav sticky" data-sticky data-options="marginTop:0">
        <div class="navbar">
            <a class="navlogo" href="<?= home_url(); ?>">
                <img src="<?php echo MBN_ASSETS_URI; ?>/img/logo.png" alt="">
            </a>
            <span class="navicon hide-for-large" data-toggle="header">mobile menu</span>

            <div class="navutil show-for-large">
                <a class="button hollow popup_btn" href="#send-me-updates"><i class="icon icn_bell"></i> Send Me updates</a>
                <span id="search" class="search" data-toggler=".active">
                    <span class="btn"  data-toggle="search">search icon</span>    
                    <form action="/" method="get">
                        <input type="text" name="s" id="search" value="<?php the_search_query(); ?>" />
                        <input type="image" src="<?php echo MBN_ASSETS_URI; ?>/img/icon/search.svg">
                    </form>
                </span>
            </div>

            <nav class="navmenu show-for-large">
                <?php
                    wp_nav_menu( array( 
                        'theme_location' => 'main-menu',
                        'menu'       => '',
                        'container'  => '',
                        'items_wrap' => '<ul class="menu dropdown" data-dropdown-menu>%3$s</ul>' 
                    ));
                ?>
            </nav>

            <nav class="mobmenu hide-for-large">
                <?php
                    wp_nav_menu( array( 
                        'theme_location' => 'main-menu',
                        'menu'       => '',
                        'container'  => '',
                        'items_wrap' => '<ul class="menu accordion-menu" data-multi-open="false" data-accordion-menu data-submenu-toggle="true">%3$s</ul>' 
                    ));
                ?>

                <div class="mobfoot">
                    <a href="#send-me-updates" class="button hollow expanded large popup_btn"><i class="icon icn_bell"></i> Send Me updates</a> 
                    <p>&copy;  <?php echo date('Y'); ?> Elio Motors Inc. All rights reserved. No portion of this site may be reproduced or duplicated without the express permission of Elio Motors Inc.</p>
                </div>
            </nav>
        </div>
    </div>       
</header>
    
<main id="content">