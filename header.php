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

			// check wp user level
			get_currentuserinfo(); 
			// store to use later
			global $user_level; 

			// get list of post names to use in 'typeahead' plugin for search bar
			if(of_get_option('search_bar', '1')) { // only do this if we're showing the search bar in the nav

				global $post;
				$tmp_post = $post;
				$get_num_posts = 40; // go back and get this many post titles
				$args = array( 'numberposts' => $get_num_posts );
				$myposts = get_posts( $args );
				$post_num = 0;

				global $typeahead_data;
				$typeahead_data = "[";

				foreach( $myposts as $post ) :	setup_postdata($post);
					$typeahead_data .= '"' . get_the_title() . '",';
				endforeach;

				$typeahead_data = substr($typeahead_data, 0, strlen($typeahead_data) - 1);

				$typeahead_data .= "]";

				$post = $tmp_post;

			} // end if search bar is used

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
    <!-- Facebook Like Widget -->
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
    fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
				
		<div class="container-fluid">
      <header role="banner" class="row-fluid">
        <div class="inner-header span8">
          <h1 class="page-title">
            <?php if (is_home()) : wp_title('');
                  else : the_title();
                  endif; ?>
          </h1>
          </h1>
          <h2 class="custom-tagline">
            <?php echo get_post_meta($post->ID, 'custom_tagline' , true);?>
          </h2>

          <h1 class="site-title">
            <a class="brand" id="logo" title="<?php echo get_bloginfo('description'); ?>" href="<?php echo home_url(); ?>">
              <span class="pink">Math </span>
              <span>Orientation</span>
            </a>
          </h1>

          <div class="nav-collapse">
            <?php bones_main_nav(); // Adjust using Menus in Wordpress Admin ?>
          </div>
          
          <?php if(of_get_option('search_bar', '1')) {?>
        </div> <!-- end #inner-header -->
        <form class="navbar-search pull-right span3" role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
          <input name="s" id="s" type="text" class="search-query" autocomplete="off" placeholder="<?php _e('Search','bonestheme'); ?>" data-provide="typeahead" data-items="4" data-source='<?php echo $typeahead_data; ?>'>
        </form>
        <?php } ?>
      </header> <!-- end header -->
    </div>
		
		<div class="container-fluid">
