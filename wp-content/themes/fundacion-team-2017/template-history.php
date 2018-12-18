<?php
/**
 * Template Name: Historia
 */
?>
<?php use Roots\Sage\Extras; ?>
<?php while (have_posts()) : the_post(); ?>
  <section class="page-section page-section--history">
    <h1 class="section-title"><?php the_title(); ?></h1>

    <?php if (have_rows('years')) : ?>
      <ul class="history__yearlist">
        <?php while (have_rows('years')) : the_row(); ?>
          <li class="history__yearlist-item"><?php the_sub_field('year'); ?></li>
        <?php endwhile; ?>
      </ul>


      <div class="history__years">
        <?php while (have_rows('years')) : the_row(); ?>
          <div class="history__year">
            <div class="history__year-intro">
              <h2 class="history__year-title">
                <?php esc_html_e('Temporada', 'ungrynerd'); ?> <?php the_sub_field('year'); ?>
              </h2>
              <div class="history__year-content">
                <?php the_sub_field('content'); ?>
              </div>
              <?php $team_photo = get_sub_field('team_photo'); ?>
              <?= wp_get_attachment_image($team_photo, 'featured', false, array('class' => 'history__year-photo')) ?>
            </div>

          </div>

          <div class="history__info">
            <?php if (have_rows('riders')) : ?>
              <div class="history__info-block">
                <h3 class="history__info-title"><?php esc_html_e('Corredores', 'ungrynerd'); ?></h3>
                <ul class="history_riders">
                <?php while (have_rows('riders')) : the_row(); ?>
                  <li class="history__rider">
                    <?= Extras\ungrynerd_svg('flag-' . get_sub_field('bandera')) ?> <?php the_sub_field('name'); ?>
                  </li>
                <?php endwhile; ?>
                </ul>
              </div>
            <?php endif ?>
            <?php if (have_rows('results')) : ?>
              <div class="history__info-block">
                <h3 class="history__info-title"><?php esc_html_e('Palmarés', 'ungrynerd'); ?></h3>
                <ul class="history_results">
                <?php while (have_rows('results')) : the_row(); ?>
                  <li class="history__result">
                    <strong><?php the_sub_field('posicion'); ?></strong>
                    <?php the_sub_field('carrera'); ?>
                  </li>
                <?php endwhile; ?>
                </ul>
              </div>
            <?php endif ?>
            <div class="history__info-block">
              <h3 class="history__info-title"><?php esc_html_e('Maillot', 'ungrynerd'); ?></h3>
              <?php $maillot = get_sub_field('maillot'); ?>
              <?= wp_get_attachment_image($maillot, 'masonry', false, array('class' => 'history__maillot')) ?>
            </div>
          </div>
        <?php endwhile; ?>

      </div>


    <?php endif ?>



  </section>

<?php endwhile; ?>
