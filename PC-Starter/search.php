<?php get_header(); ?>

<section class="pagehero">

	<div class="container">
		
			<h1>Search Results</h1>
			<label>Results for: "<?php echo get_search_query(); ?>"</label>

	</div>

</section>

<section class="content">

	<div class="container grid-gutters">

		<?php if (have_posts()): $i = 0; while (have_posts()): the_post(); if ( $i == 0 ) : ?>

				<?php if ( has_post_thumbnail() ) { ?>

					<article class="col-full first-post" style="background-image:url('<?php echo get_the_post_thumbnail($page->ID, 'medium'); ?>');">

				<?php } else { ?>

					<article class="col-full first-post" style="background-image:url('<?php bloginfo('template_directory')?>/images/temp.jpg');">

				<?php } ?>

						<div class="grid grid-bottom">

							<div class="col-full">

								<div class="container">
									<h2 class="blogtitle"><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h2>
									<a class="button alt" href="<?php the_permalink();?>">Read More</a>
								</div>

							</div>

						</div>

					</article><!--post-->

			<?php else: ?>

				<article class="col-1-3">

					<?php if ( has_post_thumbnail() ) { ?>

						<div class="blogthumb"><a href="<?php the_permalink();?>"><?php echo get_the_post_thumbnail($page->ID, 'medium'); ?></a></div>

					<?php } else { ?>

						<div class="blogthumb"><a href="<?php the_permalink();?>"><img src="<?php bloginfo('template_directory')?>/images/temp.jpg" alt="<?php the_title(); ?>" /></a></div>

					<?php } ?>

						<div class="container">

							<h2 class="blogtitle"><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h2>
							<div class="post-excerpt">
								<?php the_excerpt(); ?>
								<a class="more-link" href="<?php the_permalink();?>">Read More</a>
							</div>

						</div>

				</article><!--post-->

			<?php endif; ?>

		<?php $i++; endwhile; endif; ?>

		<?php the_posts_pagination(); ?>

	</div>

</section><!--content-->

<?php get_footer(); ?>