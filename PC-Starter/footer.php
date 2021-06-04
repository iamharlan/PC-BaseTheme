	<footer>

		<div class="footer-top">

			<div class="container">

				<div class="grid-gutters">

					<div class="col-1-2 main">

						<div class="social-icons">
							<?php if( !get_theme_mod( 'pc_facebookprofile_setting') == '' ) : ?>
								<a class="social-icon" target="_blank" href="<?php echo get_theme_mod( 'pc_facebookprofile_setting', '#null' ); ?>"><i class="fab fa-facebook-f fa-lg"></i></a>
							<?php endif; ?>
							<?php if( !get_theme_mod( 'pc_twitterprofile_setting') == '' ) : ?>
								<a class="social-icon" target="_blank" href="<?php echo get_theme_mod( 'pc_twitterprofile_setting', '#null' ); ?>"><i class="fab fa-twitter fa-lg"></i></a>
							<?php endif; ?>
							<?php if( !get_theme_mod( 'pc_instagramprofile_setting') == '' ) : ?>
								<a class="social-icon" target="_blank" href="<?php echo get_theme_mod( 'pc_instagramprofile_setting', '#null' ); ?>"><i class="fab fa-instagram fa-lg"></i></a>
							<?php endif; ?>
							<?php if( !get_theme_mod( 'pc_youtubeprofile_setting') == '' ) : ?>
								<a class="social-icon" target="_blank" href="<?php echo get_theme_mod( 'pc_youtubeprofile_setting', '#null' ); ?>"><i class="fab fa-youtube fa-lg"></i></a>
							<?php endif; ?>
						</div>

						<?php if ( !function_exists('dynamic_sidebar')
						        || !dynamic_sidebar('footer-left') ) : ?>
						<?php endif; ?>
		
					</div>
					<div class="col-1-4">

						<?php if ( !function_exists('dynamic_sidebar')
						        || !dynamic_sidebar('footer-center') ) : ?>
						<?php endif; ?>

					</div>					
					<div class="col-1-4">

						<?php if ( !function_exists('dynamic_sidebar')
						        || !dynamic_sidebar('footer-right') ) : ?>
						<?php endif; ?>

					</div>					

				</div>

			</div>

		</div>

		<div class="footer-bottom">
			
			<div class="container">

				<p class="copyright">&copy; <?php echo date('Y') ?> <?php bloginfo('name')?></p>

			</div>


		</div>

	</footer>

	<?php wp_footer(); ?>

</body>
</html>