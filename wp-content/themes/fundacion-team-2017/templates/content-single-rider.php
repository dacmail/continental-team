<?php use Roots\Sage\Extras; ?>
<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>
    <header class="rider__header">
      <div class="rider__wrapper">
        <div class="rider__photo">
          <?php the_post_thumbnail('rider-big'); ?>
        </div>
        <div class="rider__data">
          <div class="rider__social">
            <a target="_blank" href="<?php the_field('twitter') ?>"><?= Extras\ungrynerd_svg('icon-twitter-rider') ?></a>
            <a target="_blank" href="<?php the_field('instagram') ?>"><?= Extras\ungrynerd_svg('icon-instagram-rider') ?></a>
            <a target="_blank" href="<?php the_field('facebook') ?>"><?= Extras\ungrynerd_svg('icon-facebook-rider') ?></a>
          </div>
          <h1 class="rider__name"><?= Extras\ungrynerd_svg('flag-' . get_field('bandera')) ?><?php the_title(); ?></h1>
          <div class="rider__info">
            <div class="rider__info__box" data-birth="<?php the_field('fecha-nacimiento') ?>">
              <span><?php esc_html_e('Edad', 'ungrynerd'); ?></span>
              <?= floor((time() - strtotime(str_replace('/', '-', get_field('fecha-nacimiento')))) / (60*60*24*365)) ?>
            </div>
            <div class="rider__info__box">
              <span><?php esc_html_e('Altura (cm)', 'ungrynerd'); ?></span>
              <?php the_field('altura') ?>
            </div>
            <div class="rider__info__box">
              <span><?php esc_html_e('Peso (kg)', 'ungrynerd'); ?></span>
              <?php the_field('peso') ?>
            </div>
          </div>
        </div>
      </div>
    </header>
    <div class="rider__bio-and-results">
      <div class="rider__bio">
        <h2 class="rider__title"><?php esc_html_e('Biografía', 'ungrynerd'); ?></h2>
        <?php the_content(); ?>
      </div>
      <div class="rider__results">
      <h2 class="rider__title"><?php esc_html_e('Palmarés', 'ungrynerd'); ?></h2>
        <?php if (have_rows('palmares')): ?>
          <ul class="rider__results__list">
          <?php while (have_rows('palmares')) : the_row(); ?>
            <li class="rider__results__year"><?php the_sub_field('year'); ?>
            <?php if (have_rows('rows')): ?>
              <ul>
              <?php while (have_rows('rows')) : the_row(); ?>
                <li class="rider__results__result">
                  <strong><?php the_sub_field('posicion'); ?></strong>
                  <?php the_sub_field('carrera'); ?>
                </li>
              <?php endwhile; ?>
              </ul>
            <?php endif ?>
            </li>
          <?php endwhile; ?>
          </ul>
        <?php endif ?>
      </div>
    </div>
    <?php $images = get_field('galeria'); ?>
    <?php if ( $images ): ?>
      <ul class="rider__gallery" >
        <?php foreach( $images as $image ): ?>
          <li class="rider__gallery__item">
            <?= wp_get_attachment_image($image['ID'], 'rider-gallery' ); ?>
          </li>
        <?php endforeach; ?>
      </ul>
    <?php endif; ?>
    <?php $news = new WP_Query(array(
      'post_type' => array('post'), 
      'meta_query'		=> array(
                          array(
                            'key' => 'riders',
                            'value' => '"' . get_the_ID() . '"',
                            'compare' => 'LIKE'
                            )
                          ), 
      'posts_per_page' => 3)) ?>
    <?php if ($news->have_posts()): ?>
      <div class="rider__news">
        <h2 class="rider__title"><?php esc_html_e('Noticias relacionadas', 'ungrynerd'); ?></h2>
        <div class="rider__news__wrapper">
        <?php while ($news->have_posts()) : $news->the_post(); ?>
          <article class="news-item">
            <div class="news-item__image"><?php the_post_thumbnail('featured_medium') ?></div>
            <p class="news-item__meta"><strong><?php esc_html_e('Noticia', 'ungrynerd'); ?></strong> · <?php the_time(get_option('date_format')); ?></p>
            <h3 class="news-item__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
          </article>
        <?php endwhile; ?>
        </div>
      </div>
    <?php endif ?>
  </article>
<?php endwhile; ?>
