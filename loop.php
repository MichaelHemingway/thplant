<section class="recent stories">

	<div class="flex-container">

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<article id="post-<?php the_ID(); ?>" <?php post_class( 'story flex-item ' . get_post_meta( $post->ID, 'post_size', true)); ?>>
		<?php if ( has_post_thumbnail()) : // Check if thumbnail exists ?>
		<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="item-image">
				<?php the_post_thumbnail('large'); ?>
		</a>
		<?php else: ?>
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="item-image">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/img/social/soc-profile.jpg" alt="">
			</a>
		<?php endif; ?>

		<div class="card-wrapper">

			<p class="item-category uppercase">
				<?php foreach((get_the_category()) as $category) { echo $category->cat_name . ' ';} ?>
			</p>

			<h2>
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="item-title" itemprop="headline">
					<?php the_title(); ?>
				</a>
			</h2>

			<span rel="author" class="author">by <?php the_author_posts_link(); ?></span>
			<?php if (has_tag()) :?> <span class="tagged"><?php the_tags(''); ?></span> <?php endif; ?>
		</div>
	</article>

<?php endwhile; ?>

<?php  else: ?>
	<article>
		<h2><?php _e( 'There ain\'t nothing here, son.', 'html5blank' ); ?></h2>
	</article>
<?php endif; ?>

</div>
</section>