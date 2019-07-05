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
          <li class="history__yearlist-item"><a href="#year-<?php the_sub_field('year'); ?>"><?php the_sub_field('year'); ?></a></li>
        <?php endwhile; ?>
      </ul>


      <div class="history__years">
        <?php while (have_rows('years')) : the_row(); ?>
          <div class="history__year" id="year-<?php the_sub_field('year'); ?>">

            <div class="history__year-intro">
              <div class="container">
                <h2 class="history__year-title">
                  <?php esc_html_e('Temporada', 'ungrynerd'); ?> <strong><?php the_sub_field('year'); ?></strong>
                </h2>
                <div class="history__year-content">
                  <?php the_sub_field('content'); ?>
                </div>
              </div>
            </div>

            <?php $team_photo = get_sub_field('team_photo'); ?>
            <?php $riders = get_sub_field('riders'); ?>
            <?php if ($team_photo) : ?>
              <div class="container">
                <ul class="history__team" >
                  <?php $i = 0; ?>
                  <?php foreach ($team_photo as $photo) : ?>
                  <li class="history__team-photo">
                    <?= wp_get_attachment_image($photo['ID'], 'rider-gallery'); ?>
                    <?php if (isset($riders[$i])) : ?>
                      <span class="history__team-name"><?= $riders[$i]['name'] ?></span>
                    <?php endif; ?>
                  </li>
                  <?php $i++; endforeach; ?>
                </ul>
              </div>
            <?php endif; ?>
            <div class="history__info">
              <?php if (have_rows('riders')) : ?>
                <div class="history__info-block">
                  <h3 class="history__info-title"><?php esc_html_e('Corredores', 'ungrynerd'); ?></h3>
                  <ul class="history__riders">
                  <?php while (have_rows('riders')) : the_row(); ?>
                    <li class="history__rider">
                      <?php the_sub_field('name'); ?>
                    </li>
                  <?php endwhile; ?>
                  </ul>
                </div>
              <?php endif ?>
              <?php if (have_rows('results')) : ?>
                <div class="history__info-block">
                  <h3 class="history__info-title"><?php esc_html_e('Palmarés', 'ungrynerd'); ?></h3>
                  <ul class="history__results">
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
          </div>


        <?php endwhile; ?>

      </div>


    <?php endif ?>



  </section>

<?php endwhile; ?>
