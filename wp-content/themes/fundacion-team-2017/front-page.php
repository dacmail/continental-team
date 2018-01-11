<?php use Roots\Sage\Extras; ?>

<?php get_template_part('templates/carousel') ?>
<?php get_template_part('templates/news-home') ?>

<?php if (is_active_sidebar('banner-home')): ?>
  <section class="banner">
    <?php dynamic_sidebar('banner-home') ?>
  </section>
<?php endif ?>
