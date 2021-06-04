<?php get_header(); ?>

<section class="content">

	<article class="container narrow grid-gutters">

		<?php if ( is_active_sidebar( 'sidebar' ) ) { ?>
			<div class="col-3-4">
		<?php } else { ?>
			<div class="col">
		<?php } ?>

			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				
				<h1><?php the_title(); ?></h1>
				
				<div class="post-copy">

					<?php the_content('Read more...')?>
						
				</div>

				<label class="meta"><span class="author">Written by <?php the_author(); ?></span></label>

			<?php endwhile; endif; ?>

		</div>

		<?php if ( is_active_sidebar( 'sidebar' ) ) { ?>

			<div class="col-1-4">

				<?php get_sidebar(); ?>

			</div>

		<?php }; ?>

	</article>

</section>

<?php get_footer(); ?>