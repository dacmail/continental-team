<?php use Roots\Sage\Extras; ?>

<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class('article'); ?>>
    <?php if (get_post_format()=='video') : ?>
      <header class="article__video">
        <?php the_field('video'); ?>
      </header>
    <?php elseif (get_post_format()=='gallery') : ?>
      <?php $photos = get_field('gallery'); ?>
      <header class="article__gallery owl-carousel">
      <?php foreach ($photos as $photo): ?>
        <div class="article__gallery__item" style="background-image: url(<?= esc_url($photo['sizes']['featured']); ?>)">
          <?php if (!empty($photo['caption'])): ?>
            <h2 class="article__gallery__title"><?= $photo['caption']; ?></h2>
          <?php endif; ?>  
        </div>
      <?php endforeach; ?>
      </header>
    <?php else : ?>
      <header class="article__header">
        <?php the_post_thumbnail('featured') ?>
      </header>
    <?php endif; ?>
  
    
    <div class="article__body">
      <h1 class="article__title"><?php the_title(); ?></h1>
      <?php get_template_part('templates/entry-meta'); ?>
      <?php if (!get_post_format()) : ?>
        <?php get_template_part('templates/entry-share'); ?>
      <?php endif; ?>
      <div class="article__content">
        <div class="article__text">
          <?php the_content(); ?>
        </div>
        <?php $riders = get_field('riders'); ?>
        <?php if ($riders) : ?>
          <div class="article__riders">
            <h2 class="article__riders__title"><?php esc_html_e('Corredores relacionados', 'ungrynerd'); ?></h2>
            <?php foreach ($riders as $rider) : ?>
              <a class="article__riders__rider" href="<?= get_permalink($rider); ?>">
                <?= get_the_post_thumbnail( $rider, 'thumbnail'); ?>
                <?= get_the_title($rider); ?>
              </a>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>
      </div>
      
      <?php the_tags('<div class="article__tags"> ' . esc_html__('Etiquetas', 'ungrynerd'), ' ', '</div>'); ?>
      <?php get_template_part('templates/entry-share'); ?>
    </div>
  </article>
<?php endwhile; ?>

<?php $more = new WP_Query(array('post__not_in' => array(get_the_ID()), 'posts_per_page' => 4)); ?>
<?php if ($more->have_posts()) : ?>
  <section class="news news--single">
    <div class="container">
      <header class="news__header">
        <h2 class="news__header__title"><?php esc_html_e('Más noticias', 'ungrynerd'); ?></h2>
      </header>
      <div class="news__wrapper news__wrapper--single">
        <?php while ($more->have_posts()) : $more->the_post(); ?>
          <?php get_template_part('templates/listing', get_post_type() != 'post' ? get_post_type() : get_post_format()); ?>
        <?php endwhile; ?>
      </div>
    </div>
  </section>
<?php endif; ?>

