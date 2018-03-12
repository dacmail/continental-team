<?php use Roots\Sage\Extras; ?>

<?php get_template_part('templates/carousel') ?>
<?php get_template_part('templates/news-home') ?>

<?php if (is_active_sidebar('banner-home')): ?>
  <section class="banner">
    <?php dynamic_sidebar('banner-home') ?>
  </section>
<?php endif ?>

<section class="social">
  <header class="social__header">
    <h2 class="social__header__title"><?php esc_html_e('En la red', 'ungrynerd'); ?></h2>
  </header>
  <?php echo do_shortcode('[ff id="1"]') ?>
</section>
