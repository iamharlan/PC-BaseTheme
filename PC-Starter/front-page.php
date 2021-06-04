<?php 
/*
Template Name: Front Page
*/
?>

<?php get_header(); ?>

<section class="content">

	<article class="container narrow">

		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			
			<div class="post-copy grid-gutters">

				<?php the_content('Read more...')?>

			</div>

				<?php if( have_rows('silo') ): ?>
	
					<div class="grid-gutters">

					    <?php while( have_rows('silo') ): the_row(); 
					        $siloimage = get_sub_field('siloimage');
					        $silotitle = get_sub_field('silotitle');
					        $silolink = get_sub_field('silolink');
					    	?>
					    	<div class="col-1-2 silo" style="background: url(<?php echo $siloimage['url']; ?>); background-size:cover;">
				    			<div class="mask"></div>
					    		<div class="container">
						    		<h2><?php echo $silotitle; ?></h2>
						    		<a class="button cta-link" href="<?php echo $silolink['url']; ?>" target="<?php echo $silolink['target'];?>"><?php echo $silolink['title']; ?></a>
						    	</div>
					    	</div>
					    <?php endwhile; ?>
	
					</div>
	
				<?php endif; ?>
	
			</div>

		<?php endwhile; endif; ?>

	</article>

</section>

<?php get_footer(); ?>