<section class="intro contact-intro">
  <div class="intro-container">
    <div class="intro-title" data-aos="fade-left" data-aos-duration="1000">
      <h1><?php echo get_field('intro-title'); ?></h1>
    </div>
    <div class="intro-img">
      <?php $img = get_field('intro-img'); ?>
      <img src="<?php echo $img['url']; ?>" alt="Photo d'introduction de la page <?php echo get_field('intro-title'); ?>">
    </div>
  </div>
</section>

<section class="contact">
  <div class="contact-container">
    <div class="contact-info">
      <div class="contact-info-item" data-aos="fade-left" data-aos-duration="1000">
        <p><?php echo get_field('contact_name','options'); ?></p>
        <p><?php echo get_field('contact_address','options'); ?></p>
      </div>
      <div class="contact-info-item links" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="300">
        <a href="tel:<?php echo get_field('contact_phone','options'); ?>">T <?php echo get_field('contact_phone','options'); ?></a>
        <a href="mailto:<?php echo get_field('contact_email','options'); ?>">M <?php echo get_field('contact_email','options'); ?></a>
      </div>
    </div>
    <div class="contact-form" data-aos="fade-right" data-aos-duration="1000" data-aos-delay="500">
      <?php echo do_shortcode('[contact-form-7 id="4f0a09d" title="Contact form 1"]'); ?>
    </div>
  </div>
</section>