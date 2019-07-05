<?php
/**
 * Template Name: Campus
 */
?>
<?php use Roots\Sage\Extras; ?>
<?php while (have_posts()) : the_post(); ?>
  <div class="container center">
    <?php the_post_thumbnail('large') ?>
  </div>
  <section class="page-section page-section--contact">
    <div class="contact-form">
      <div class="container">
        <div class="block block--form-text">
          <h1 class="block__title"><?php the_title(); ?></h1>
          <?php the_content(); ?>
        </div>
        <div class="block block--form">
          <?= do_shortcode(get_field('form')) ?>
        </div>
      </div>
    </div>
  </section>

<?php endwhile; ?>
