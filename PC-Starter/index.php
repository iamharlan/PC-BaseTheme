<?php get_header(); ?>

<section class="pagehero">

	<div class="container">
		
		<?php if(is_category()) { ?>	
			<h1 class="archivetitle"><?php single_cat_title(); ?></h1>
			<p><?php echo category_description( $category_id ); ?></p>
		<?php } elseif(is_tag()) { ?>	
			<h1 class="archivetitle"><?php single_tag_title(); ?></h1>
			<p><?php echo tag_description( $tag_id ); ?></p>
		<?php } else { ?>
			<h1>Articles</h1>
		<?php } ?>

	</div>

</section>

<section class="content">

	<div class="container grid-gutters">

		<?php if (have_posts()): $i = 0; while (have_posts()): the_post(); if ( $i == 0 ) : ?>

				<?php if ( has_post_thumbnail() ) { ?>
					<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
					<article class="col-full first-post" style="background-image:url('<?php echo $url; ?>');">

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

		<?php the_posts_pagination( array(
		    'mid_size'  => 2,
		    'prev_text' => __( '&lt;', 'textdomain' ),
		    'next_text' => __( '&gt;', 'textdomain' ),
		) ); ?>

	</div>

</section><!--content-->

<?php get_footer(); ?>