<?php use Roots\Sage\Extras; ?>
<?php $home_featured = new WP_Query(array('meta_key' => 'home_featured', 'meta_value' => 1, 'posts_per_page' => 5)); ?>
<?php if ($home_featured->have_posts()) : ?>
  <section class="news container">
    <header class="news__header">
      <h2 class="news__header__title"><?php esc_html_e('Actualidad', 'ungrynerd'); ?></h2>
      <a href="<?php echo get_post_type_archive_link('post'); ?>" class="news__more"><?php esc_html_e('Ir a noticias', 'ungrynerd'); ?> <?php echo Extras\ungrynerd_svg('icon-more') ?></a>
    </header>
    <div class="news__wrapper">
      <?php while ($home_featured->have_posts()) : $home_featured->the_post(); ?>
        <article class="news__item">
          <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('featured_medium', array('class' => 'news__item__img')); ?></a>
          <p class="news__item__meta">
            <span class="news__item__post-type"><?php Extras\ungrynerd_post_type(get_post_type()); ?></span> ·
            <span class="news__item__date"><?php the_time(get_option('date_format')); ?></span>
          </p>
          <h1 class="news__item__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
        </article>
      <?php endwhile; ?>
    </div>
  </section>
<?php endif; ?>
