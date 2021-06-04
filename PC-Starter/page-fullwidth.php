<?php 
/*
Template Name: Full-Width
*/
?>

<?php get_header(); ?>

<section class="content">

	<article class="container narrow">

		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			
			<h1><?php the_title(); ?></h1>
			
			<div class="post-copy">

				<?php the_content('Read more...')?>
					
			</div>

		<?php endwhile; endif; ?>

	</article>

</section>

<?php get_footer(); ?>