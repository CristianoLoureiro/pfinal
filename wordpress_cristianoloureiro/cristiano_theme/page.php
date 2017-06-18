<?php get_header(); ?>
	<?php while ( have_posts() ) : the_post(); ?>
		<section id="main" class="wrapper">
			<div class="container">

				<header class="major special">
					<h2>
						<?php the_title(); ?>
						<?php if(function_exists('the_secondary_title')):?>
							<?php the_secondary_title(get_the_ID(),' - '); ?>
						<?php endif; ?>
					</h2>
				</header>
				<?php if ( has_post_thumbnail() ) : ?>
					<a href="<?php the_permalink(); ?>" class="image fit" title="<?php the_title_attribute(); ?>">
						<?php the_post_thumbnail(); ?>
					</a>
				<?php endif; ?>
				<?php
					the_content();
				?>
			</div>
		</section>
	<?php
		endwhile; // End of the loop.
	?>
<?php get_footer(); ?>

