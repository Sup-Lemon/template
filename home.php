<?php
/**
 * Template Name: Publications
 */

  get_header();

?>

<main id="content" class="site-content wrapper" tabindex="-1">

  <section class="wrapper publications articles">
    <?php $key = 0; ?>
    <?php while (have_posts()) : the_post(); ?>
      <?php $key++ ?>
      
      <article id="post-<?php the_ID(); ?>" <?php post_class("post"); ?> data-sr="enter left, move 30px, wait <?php echo $key * 0.1 + 0.1 ?>s" data-srt="enter left, move 30px, wait <?php echo $key + 0.2 ?>s">

        <a href="<?php echo esc_url( get_permalink() );?>" rel="bookmark" class="post-link">
          <div class="entry-content col col-m-6">
            <h4 class="entry-title">
              <?php the_title(); ?>
            </h4>
            <div class="teaser">
              <p>
                <?php custom_excerpt(30, '…') ?>
                <time class="entry-date" datetime="<?php the_time('c') ?>">
                  <?php echo get_the_date('j.m.Y'); ?>
                </time>
              </p>
            </div>
            <span class="more">Lire la suite</span>
          </div>
          <div class="col col-m-6">
            <figure class="img"><?php the_post_thumbnail('full'); ?></figure>
          </div>
        </a>

      </article>

    <?php endwhile; ?>

    <div class="pager">
      <?php echo paginate_links( array(
//            'type' => 'list'
      )); ?>
</div>

  </section>
</main>
    
<?php
get_footer();
