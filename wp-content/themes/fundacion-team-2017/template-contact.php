<?php

/**
 * Template Name: Contacto
 */
?>
<?php

use Roots\Sage\Extras; ?>
<?php while (have_posts()) : the_post(); ?>
  <section class="page-section page-section--contact">
    <h1 class="section-title"><?php the_title(); ?></h1>

    <div class="contact-wrap">
      <div class="container">
        <div class="block block--email">
          <h2 class="block__title"><?php the_field('email_title'); ?></h2>
          <?php the_field('email_text'); ?>
          <a href="mailto:<?php the_field('email') ?>" class="block__email"><?php the_field('email') ?></a>
        </div>
        <div class="block block--social">
          <h2 class="block__title"><?php the_field('social_title'); ?></h2>
          <?php the_field('social_text'); ?>
          <?php if (get_field('social_facebook')) : ?>
            <a target="_blank" href="<?php the_field('social_facebook'); ?>" class="block__link block__link--facebook">
              <?php echo Extras\ungrynerd_svg('icon-facebook'); ?>
            </a>
          <?php endif ?>
          <?php if (get_field('social_twitter')) : ?>
            <a target="_blank" href="<?php the_field('social_twitter'); ?>" class="block__link block__link--twitter">
              <?php echo Extras\ungrynerd_svg('icon-twitter'); ?>
            </a>
          <?php endif ?>
          <?php if (get_field('social_youtube')) : ?>
            <a target="_blank" href="<?php the_field('social_youtube'); ?>" class="block__link block__link--youtube">
              <?php echo Extras\ungrynerd_svg('icon-youtube'); ?>
            </a>
          <?php endif ?>
          <?php if (get_field('social_instagram')) : ?>
            <a target="_blank" href="<?php the_field('social_instagram'); ?>" class="block__link block__link--instagram">
              <?php echo Extras\ungrynerd_svg('icon-instagram'); ?>
            </a>
          <?php endif ?>
        </div>
        <?php the_post_thumbnail('full', array('class' => 'block block--image')); ?>
      </div>
    </div>
    <div class="contact-form">
      <div class="container">
        <div class="block block--form-text">
          <h2 class="block__title"><?php the_field('contact_title'); ?></h2>
          <?php the_field('contact_text'); ?>
        </div>
        <div class="block block--form">
          <form action="<?php the_field('contact_form'); ?>" method="post" target="_blank">
            <p>
              <label for="nombre"><?php esc_html_e('Nombre', 'ungrynerd'); ?></label>
              <input id="nombre" type="text" name="FNAME" placeholder="<?php esc_html_e('Nombre', 'ungrynerd'); ?>">
            </p>
            <p>
              <label for="email"><?php esc_html_e('e-mail', 'ungrynerd'); ?></label>
              <input id="email" type="email" name="EMAIL" placeholder="<?php esc_html_e('e-mail', 'ungrynerd'); ?>">
            </p>
            <p>
              <input type="submit" value="<?php esc_html_e('Suscribirse', 'ungrynerd'); ?>">
            </p>
            <p><input type="checkbox" id="accept" required> <?php esc_html_e('He leído y acepto la Política de Privacidad.', 'ungrynerd'); ?></p>
          </form>
        </div>
      </div>
    </div>
  </section>

<?php endwhile; ?>
