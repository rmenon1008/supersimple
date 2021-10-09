<?php

/**
 *
 * @package Rohan_Menon
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<link rel="preload" href="<?php echo get_theme_file_uri('fonts/WhyteInktrap-Light.woff2'); ?>" as="font" type="font/woff2" crossorigin>
	<link rel="preload" href="<?php echo get_theme_file_uri('fonts/WhyteInktrap-Medium.woff2'); ?>" as="font" type="font/woff2" crossorigin>
	<link rel="preload" href="<?php echo get_theme_file_uri('fonts/WhyteInktrap-Bold.woff2'); ?>" as="font" type="font/woff2" crossorigin>

	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">

	<?php wp_head(); ?>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body <?php body_class(); ?>>
	<script>
		// var d = new Date()
		// console.log(d.getHours())
		// if (d.getHours() >= 19 || d.getHours() < 7) {
		// 	document.body.classList.add('dark')
		// }

		var colorModeState = 'unset';

		if (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches) {
			document.body.classList.add('dark')
			colorModeState = 'dark';
		}
		else {
			colorModeState = 'light';
		}

		window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', e => {
			if (e.matches) {
				document.body.classList.add('dark')
			}
			else {
				document.body.classList.remove('dark')
			}
		});
	</script>
	<?php wp_body_open(); ?>
	<div class="content">
		<?php
		get_template_part('template-parts/header/site-header');
		?>
		<main id="main" class="site-main" role="main">