


<?php if( have_rows('sections_flexibles') ): ?>
  <?php while( have_rows('sections_flexibles') ): the_row(); ?>
    <?php if( get_row_layout() == 'cards' ): ?>
      <section class="cards">
        <div class="cards-container">
          <div class="cards-title">
            <h2><?php echo get_sub_field('cards-title'); ?></h2>
            <div class="text">
              <?php echo get_sub_field('cards-texte'); ?>
            </div>
          </div>
          <div class="cards-grid">
            <?php if( have_rows('cards-list') ): ?>
              <?php while( have_rows('cards-list') ): the_row(); ?>
                <?php
                $field = get_sub_field_object( 'media' );
                $value = $field['value'];
                ?>
                <div class="cards-item">
                  <div class="cards-media">
                    <?php if($value == "aucun"): ?>

                    <?php elseif($value == "video"): ?>
                      <?php if(get_sub_field('video_file')): ?>
                        <?php $video = get_sub_field('video-file'); ?>
                        <video controls>
                          <source src="<?php echo $video['url']; ?>" type="video/mp4">
                        </video>
                      <?php elseif(get_sub_field('video_embed')): ?>
                        <?php echo get_sub_field('video_embed'); ?>
                      <?php endif; ?>
                    <?php elseif($value == "galerie"): ?>
                      <?php $img = get_sub_field('image'); ?>
                      <img src="<?php echo $img['url'] ?>" alt="<?php echo get_sub_field('titre'); ?>">
                    <?php elseif($value == "image"): ?>
                      <?php $img = get_sub_field('image'); ?>
                      <img class="image" src="<?php echo $img['url'] ?>" alt="<?php echo get_sub_field('titre'); ?>">
                    <?php elseif($value == "logo"): ?>
                      <?php $logo = get_sub_field('logo'); ?>
                      <img class="logo" src="<?php echo $logo['url'] ?>" alt="<?php echo get_sub_field('titre'); ?>">
                    <?php endif; ?>
                  </div>
                  <div class="cards-content">
                    <h3><?php echo get_sub_field('titre'); ?></h3>
                    <div class="text">
                      <?php echo get_sub_field('texte'); ?>
                    </div>
                    <?php $link = get_sub_field('lien'); ?>
                    <?php if($link): ?>
                      <a href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>"><?php echo $link['title']; ?></a>
                    <?php endif; ?>
                  </div>
                </div>
              <?php endwhile; ?>
            <?php endif; ?>

          </div>
        </div>
      </section>
    <?php elseif( get_row_layout() == 'newsletter' ): ?>
      <section class="newsletter">
        <div class="newsletter-container">
          <div class="newsletter-title">
            <h2 data-aos="fade-down" data-aos-duration="1000"><?php echo get_sub_field('newsletter-title'); ?></h2>
          </div>
          <div class="newsletter-marquee">
            <div class="newsletter-marquee-item">
              <div class="newsletter-marquee-line">
                <div class="marquee-content">
                  <p><?php echo get_sub_field('newsletter-text'); ?></p><p><?php echo get_sub_field('newsletter-text'); ?></p>
                </div>
              </div>
              <div class="newsletter-marquee-line">
                <div class="marquee-content">
                  <p><?php echo get_sub_field('newsletter-text'); ?></p><p><?php echo get_sub_field('newsletter-text'); ?></p>
                </div>              
              </div>
            </div>
          </div>
          <div class="newsletter-form">

          </div>
        </div>
      </section>
    <?php elseif( get_row_layout() == 'content' ): ?>
      <section class="left-right">
        <div class="left-right-container">
          <div class="left-right-title">
            <h2 data-aos="fade-down" data-aos-duration="1000"><?php echo get_sub_field('content-title'); ?></h2>
            <div class="big-text animated-text">
              <?php echo get_sub_field('content-subtitle'); ?>
            </div>
            <div class="text" data-aos="fade-up" data-aos-duration="1000">
              <?php echo get_sub_field('content-text'); ?>
            </div>
          </div>
          <?php if( have_rows('content-blocs') ): ?>
            <?php 
              $index = 0; // initialisation compteur
              while( have_rows('content-blocs') ): the_row(); 
                $index++;
            ?>
              <div class="left-right-grid <?php if ($index % 2 === 1): echo "reversed"; endif; ?>" data-aos="fade-up" data-aos-duration="1000">
                <?php if ($index % 2 === 1): // ordre normal pour index impair ?>
                  <?php
                  $field = get_sub_field_object( 'media' );
                  $value = $field['value'];
                  ?>
                  <div class="left-right-media">
                    <?php if($value == "video"): ?>
                      <?php if(get_sub_field('video_file')): ?>
                        <?php $video = get_sub_field('video-file'); ?>
                        <video controls>
                          <source src="<?php echo $video['url']; ?>" type="video/mp4">
                        </video>
                      <?php elseif(get_sub_field('video_embed')): ?>
                        <?php echo get_sub_field('video_embed'); ?>
                      <?php endif; ?>
                    <?php elseif($value == "galerie"): ?>
                      <?php $img = get_sub_field('image'); ?>
                      <img src="<?php echo $img['url'] ?>" alt="<?php echo get_sub_field('titre'); ?>">
                    <?php elseif($value == "image"): ?>
                      <?php $img = get_sub_field('image'); ?>
                      <img class="image" src="<?php echo $img['url'] ?>" alt="<?php echo get_sub_field('titre'); ?>">
                    <?php elseif($value == "logo"): ?>
                      <?php $logo = get_sub_field('logo'); ?>
                      <img class="logo" src="<?php echo $logo['url'] ?>" alt="<?php echo get_sub_field('titre'); ?>">
                    <?php endif; ?>
                  </div>
                  <div class="left-right-content">
                    <h3><?php echo get_sub_field('title'); ?></h3>
                    <div class="text">
                      <?php echo get_sub_field('text'); ?>
                    </div>
                    <?php $link = get_sub_field('link'); ?>
                    <?php if($link): ?>
                      <div class="cbn-link">
                        <a target="<?php echo esc_attr($link['target']); ?>" href="<?php echo esc_url($link['url']); ?>">
                          <div class="svg">
                              <svg width="47" height="13" viewBox="0 0 47 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect y="4.70001" width="45" height="2.6"/>
                                <path d="M39 0L45 6L39 12" stroke-width="2.6"/>
                              </svg>
                          </div>
                          <p><?php echo esc_html($link['title']); ?></p>
                        </a>
                      </div>
                    <?php endif; ?>
                  </div>
                <?php else: // ordre inversé pour index pair ?>
                  <div class="left-right-content">
                    <h3><?php echo get_sub_field('title'); ?></h3>
                    <div class="text">
                      <?php echo get_sub_field('text'); ?>
                    </div>
                    <?php $link = get_sub_field('link'); ?>
                    <?php if($link): ?>
                      <div class="cbn-link">
                        <a target="<?php echo esc_attr($link['target']); ?>" href="<?php echo esc_url($link['url']); ?>">
                          <div class="svg">
                              <svg width="47" height="13" viewBox="0 0 47 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect y="4.70001" width="45" height="2.6"/>
                                <path d="M39 0L45 6L39 12" stroke-width="2.6"/>
                              </svg>
                          </div>
                          <p><?php echo esc_html($link['title']); ?></p>
                        </a>
                      </div>
                    <?php endif; ?>
                  </div>
                  <div class="left-right-media">
                    <?php if($value == "video"): ?>
                      <?php if(get_sub_field('video_file')): ?>
                        <?php $video = get_sub_field('video-file'); ?>
                        <video controls>
                          <source src="<?php echo $video['url']; ?>" type="video/mp4">
                        </video>
                      <?php elseif(get_sub_field('video_embed')): ?>
                        <?php echo get_sub_field('video_embed'); ?>
                      <?php endif; ?>
                    <?php elseif($value == "galerie"): ?>
                      <?php $img = get_sub_field('image'); ?>
                      <img src="<?php echo $img['url'] ?>" alt="<?php echo get_sub_field('titre'); ?>">
                    <?php elseif($value == "image"): ?>
                      <?php $img = get_sub_field('image'); ?>
                      <img class="image" src="<?php echo $img['url'] ?>" alt="<?php echo get_sub_field('titre'); ?>">
                    <?php elseif($value == "logo"): ?>
                      <?php $logo = get_sub_field('logo'); ?>
                      <img class="logo" src="<?php echo $logo['url'] ?>" alt="<?php echo get_sub_field('titre'); ?>">
                    <?php endif; ?>
                  </div>
                <?php endif; ?>
              </div>
            <?php endwhile; ?>
          <?php endif; ?>
        </div>
      </section>
    <?php endif; ?>
  <?php endwhile; ?>
<?php endif; ?>