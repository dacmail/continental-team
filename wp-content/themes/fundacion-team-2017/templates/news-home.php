<?php use Roots\Sage\Extras; ?>
<?php $home_featured = new WP_Query(array('meta_key' => 'home_featured', 'meta_value' => 1, 'posts_per_page' => 6)); ?>
<?php if ($home_featured->have_posts()) : ?>
  <section class="news container">
    <header class="news__header">
      <h2 class="news__header__title"><?php esc_html_e('Actualidad', 'ungrynerd'); ?></h2>
      <a href="<?php echo get_post_type_archive_link('post'); ?>" class="news__more"><?php esc_html_e('Ir a noticias', 'ungrynerd'); ?> <?php echo Extras\ungrynerd_svg('icon-more') ?></a>
    </header>
    <div class="news__wrapper">
      <?php while ($home_featured->have_posts()) : $home_featured->the_post(); ?>
        <?php get_template_part('templates/listing', get_post_type() != 'post' ? get_post_type() : get_post_format()); ?>
      <?php endwhile; ?>
    </div>
  </section>
<?php endif; ?>
