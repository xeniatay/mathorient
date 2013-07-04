<!doctype html>

<!--[if IEMobile 7 ]> <html <?php language_attributes(); ?>class="no-js iem7"> <![endif]-->
<!--[if lt IE 7 ]> <html <?php language_attributes(); ?> class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html <?php language_attributes(); ?> class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html <?php language_attributes(); ?> class="no-js ie8"> <![endif]-->
<!--[if (gte IE 9)|(gt IEMobile 7)|!(IEMobile)|!(IE)]><!--><html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <title>
        <?php if ( !is_front_page() ) { echo wp_title( ' ', true, 'left' ); echo ' | '; }
        echo bloginfo( 'name' ); echo ' - '; bloginfo( 'description', 'display' );  ?>
    </title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- icons & favicons -->
    <!-- For iPhone 4 -->
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/library/images/icons/h/apple-touch-icon.png">
    <!-- For iPad 1-->
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/library/images/icons/m/apple-touch-icon.png">
    <!-- For iPhone 3G, iPod Touch and Android -->
    <link rel="apple-touch-icon-precomposed" href="<?php echo get_template_directory_uri(); ?>/library/images/icons/l/apple-touch-icon-precomposed.png">
    <!-- For Nokia -->
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/library/images/icons/l/apple-touch-icon.png">
    <!-- For everything else -->
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">

    <!-- media-queries.js (fallback) -->
    <!--[if lt IE 9]>
        <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <![endif]-->

    <!-- html5.js -->
    <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

    <!-- Fonts -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Droid+Sans">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Droid+Sans+Mono">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Droid+Serif">

    <link rel="stylesheet/less" type="text/css" href="<?php echo get_template_directory_uri(); ?>/less/bootstrap.less">
    <link rel="stylesheet/less" type="text/css" href="<?php echo get_template_directory_uri(); ?>/less/responsive.less">

    <!-- wordpress head functions -->
    <?php wp_head(); ?>
    <!-- end of wordpress head -->

    <!-- theme options from options panel -->
    <?php //get_wpbs_theme_options(); ?>

    <?php
        // WAT IS THIS
        // check wp user level
        get_currentuserinfo();
        // store to use later
        global $user_level;
    ?>

    <!-- Google Analytics Script -->
    <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-40782149-1', 'uwaterloo.ca');
    ga('send', 'pageview');

    </script>

</head>

<body <?php body_class(); ?>>
    <div class="container-fluid">
        <div class="row-fluid">
            <sidebar class="site-sidebar span3 pull-left">
                <?php get_sidebar('main'); ?>
            </sidebar>
            <div class="page-container span9 pull-left">
                <header class="page-header">
                    <h2 class="page-title">
                        <?php
                        if (is_home()) {
                            wp_title('');
                        } else if (is_single()) {
                            echo 'Leaders';
                        } else {
                            the_title();
                        }
                        ?>
                    </h2>
                    <h1 class="site-title">
                        <a title="<?php echo get_bloginfo('description'); ?>" href="<?php echo home_url(); ?>">
                            <span class="pink">Math</span> Orientation
                        </a>
                    </h1>

                </header> <!-- end header -->

                <section class="body-content">
