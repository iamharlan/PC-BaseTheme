<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>

	<meta charset="<?php bloginfo('charset'); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

	<title><?php wp_title(); ?></title>

	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

	<?php wp_head(); ?>

	<link rel="preconnect" href="https://fonts.gstatic.com"> 
	<link href="https://fonts.googleapis.com/css2?family=Karla:wght@200..800&display=swap" rel="stylesheet">

</head>

<body <?php body_class(); ?>>

	<header>
		<div class="container">

			<div class="grid grid-centervert">	

				<div class="col-1-3 textleft">
					<a href="#null" id="menutoggle" class="menutoggle hidden-desktop"><i class="fas fa-bars"></i></a>
				</div>

				<div class="col-1-3">			
					<a href="<?php bloginfo('url')?>">
						<?php 
							$custom_logo_id = get_theme_mod( 'custom_logo' );
							$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
							if ( has_custom_logo() ) { ?>

						    	<img class="logo" src="<?php echo esc_url( $logo[0] ) ?>" alt="<?php bloginfo('name')?>">

							<?php } else { ?>

								<img class="logo" src="<?php bloginfo('template_directory')?>/images/logo-temp.svg" alt="<?php bloginfo('name')?>" />

						<?php } ?>
					</a>
				</div>

				<div class="col-1-3 textright">
				</div>

			</div>

		</div>

		<nav id="mainnav" class="mainnav">
			<div class="container">
				<?php wp_nav_menu( array('theme_location' => 'menu' )); ?>
			</div>
		</nav>

	</header>
 