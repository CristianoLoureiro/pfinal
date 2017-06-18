<?php
/**
 *
 * @package cristiano
 * @since 1.0
 * @version 1.0
 */


?><!DOCTYPE html>
<html>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
	<?php wp_head(); ?>
</head>
<body class="<?=(is_home()||is_front_page())?"landing":""?>">

	<header id="header" class="<?=(is_home()||is_front_page())?"alt":""?>">
		<h1><strong><a href="<?= home_url() ?>">Cristiano</strong>Loureiro</a></h1>
		<nav id="nav">
			<?php wp_nav_menu( array( 'theme_location' => 'top','depth' => 0 ) ); ?>
		</nav>
	</header>


	<a href="#menu" class="navPanelToggle"><span class="fa fa-bars"></span></a>
