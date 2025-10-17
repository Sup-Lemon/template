<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package website
 */

get_header();
?>

<?php
$post_thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
?>

<section class="article-intro">
	<div class="article-intro-title">
		<h1><?php echo get_the_title(); ?></h1>
	</div>
	<div class="article-intro-bg">
		<img src="<?php echo $post_thumbnail_url; ?>" alt="Image - <?php echo get_the_title(); ?>">
		<?php if(get_field('blog-legend')): ?>
		<div class="legend">
			<p><?php echo get_field('blog-legend'); ?></p>
		</div>
		<?php endif; ?>
	</div>
	
</section>

<section class="article-content">
	<div class="article-content-container">
		<?php the_content(); ?>
		<div class="article-back">
			<div class="p-btn">
				<a href="/blog">
					<span><?php echo __('Retour aux articles', 'website'); ?></span>
				</a>
			</div>
		</div>
	</div>
	
</section>

<?php
get_footer();
