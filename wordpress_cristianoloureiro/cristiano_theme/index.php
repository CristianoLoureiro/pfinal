<?php get_header(); ?>

	<section id="banner" style="background-image:url('<?=get_template_directory_uri() ?>/assets/css/images/overlay.png'), url('<?php header_image(); ?>');">
		<h2><?php echo get_option('cr_theme_banner_title') ?></h2>
		<p><?php echo get_option('cr_theme_banner_text') ?></p>
	</section>

	<?php
		$homeId = get_option('cr_theme_index_cat');
		$articleCount = (int)get_option('cr_theme_index_cat');
		if($articleCount == 0) $articleCount = 4;
		if((int)$homeId != 0):?>
			<?php $pages = get_posts(array('category' => $homeId, 'number' => $articleCount ) ); ?>

			<section id="two" class="wrapper style2 special">
				<div class="container">
					<header class="major">
						<h2><?php echo get_cat_name($homeId) ?></h2>

					</header>
					<div class="row 150%">
						<?php $x = 0; ?>
						<?php foreach($pages as $page): ?>
							<div class="6u 12u$(xsmall)">
								<div class="image fit captioned">
									<?php if ( has_post_thumbnail($page->ID) ) : ?>
											<a href="<?php echo get_the_permalink($page->ID)?>"><?php echo get_the_post_thumbnail($page->ID,'', array('height' => '')); ?></a>
									<?php endif; ?>
									<h3><?php echo get_the_title($page->ID) ?></h3>
								</div>
							</div>

							<?php if($x == 1): ?>
									</div>
								</div>
							</section>
							<section id="two" class="wrapper style2 special">
								<div class="container">
									<div class="row 150%">
							<?php endif; ?>
							<?php $x++; ?>
						<?php endforeach; ?>

					</div>
				</div>
			</section>
		<?php endif; ?>

	<?php get_footer(); ?>
