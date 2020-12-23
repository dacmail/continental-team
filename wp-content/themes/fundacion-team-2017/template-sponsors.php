<?php

/**
 * Template Name: Sponsors
 */
?>
<?php

use Roots\Sage\Extras; ?>
<?php while (have_posts()) : the_post(); ?>
  <section class="sponsors-section">
    <h1 class="section-title"><?php the_title(); ?></h1>
    <?php $sponsors = new WP_Query(array('post_type' => array('sponsor'), 'meta_key' => 'sponsor_type', 'meta_value' => 0, 'posts_per_page' => -1, 'order' => 'ASC')); ?>
    <?php if ($sponsors->have_posts()) : ?>
      <?php while ($sponsors->have_posts()) : $sponsors->the_post(); ?>
        <div class="sponsors-block sponsors-block--level1 type-<?= $sponsors->current_post; ?>">
          <div class="container">
            <?php if ($sponsors->current_post == 0) : ?>
              <h2 class="sponsors-block__title"><?php esc_html_e('Title Sponsors', 'ungrynerd'); ?></h2>
            <?php endif; ?>

            <div class="sponsors-block__wrapper">
              <?php $logo = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full');  ?>
              <a target="_blank" class="sponsors-block__item" href="<?php the_field('sponsor_link'); ?>"><img src="<?= $logo[0]; ?>" width="<?= $logo[1] / 2; ?>" alt="<?php the_title_attribute(); ?>"></a>
              <div class="sponsors-block__text">
                <?php the_field('text') ?>
              </div>
              <div class="sponsors-block__social">
                <?php $link = get_field('sponsor_link'); ?>
                <?php if ($link) : ?>
                  <a target="_blank" href="<?php the_field('sponsor_link'); ?>"><?= Extras\ungrynerd_svg('icon-sp-home'); ?> <?php the_title(); ?></a>
                <?php endif; ?>
                <?php $twitter = get_field('sponsor_twitter'); ?>
                <?php if ($twitter) : ?>
                  <a target="<?= $twitter['target'] ?>" href="<?= $twitter['url'] ?>"><?= Extras\ungrynerd_svg('icon-sp-twitter'); ?> <?= $twitter['title'] ?></a>
                <?php endif; ?>
                <?php $instagram = get_field('sponsor_instagram'); ?>
                <?php if ($instagram) : ?>
                  <a target="<?= $instagram['target'] ?>" href="<?= $instagram['url'] ?>"><?= Extras\ungrynerd_svg('icon-sp-instagram'); ?> <?= $instagram['title'] ?></a>
                <?php endif; ?>
                <?php $facebook = get_field('sponsor_facebook'); ?>
                <?php if ($facebook) : ?>
                  <a target="<?= $facebook['target'] ?>" href="<?= $facebook['url'] ?>"><?= Extras\ungrynerd_svg('icon-sp-facebook'); ?> <?= $facebook['title'] ?></a>
                <?php endif; ?>
                <?php $youtube = get_field('sponsor_youtube'); ?>
                <?php if ($youtube) : ?>
                  <a target="<?= $youtube['target'] ?>" href="<?= $youtube['url'] ?>"><?= Extras\ungrynerd_svg('icon-sp-youtube'); ?> <?= $youtube['title'] ?></a>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>
      <?php endwhile; ?>
    <?php endif; ?>

    <?php $sponsors = new WP_Query(array('post_type' => array('sponsor'), 'meta_key' => 'sponsor_type', 'meta_value' => 'gold', 'posts_per_page' => -1, 'order' => 'ASC')); ?>
    <?php if ($sponsors->have_posts()) : ?>
      <?php while ($sponsors->have_posts()) : $sponsors->the_post(); ?>
        <div class="sponsors-block sponsors-block--level1 sponsors-block--gold">
          <?php if ($sponsors->current_post == 0) : ?>
            <h2 class="sponsors-block__title"><?php esc_html_e('Gold', 'ungrynerd'); ?></h2>
          <?php endif; ?>
          <div class="container">
            <div class="sponsors-block__wrapper">
              <?php $logo = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full');  ?>
              <a target="_blank" class="sponsors-block__item" href="<?php the_field('sponsor_link'); ?>"><img src="<?= $logo[0]; ?>" width="<?= $logo[1] / 2; ?>" alt="<?php the_title_attribute(); ?>"></a>
              <div class="sponsors-block__text">
                <?php the_field('text') ?>
              </div>
              <div class="sponsors-block__social">
                <?php $link = get_field('sponsor_link'); ?>
                <?php if ($link) : ?>
                  <a target="_blank" href="<?php the_field('sponsor_link'); ?>"><?= Extras\ungrynerd_svg('icon-sp-home'); ?> <?php the_title(); ?></a>
                <?php endif; ?>
                <?php $twitter = get_field('sponsor_twitter'); ?>
                <?php if ($twitter) : ?>
                  <a target="<?= $twitter['target'] ?>" href="<?= $twitter['url'] ?>"><?= Extras\ungrynerd_svg('icon-sp-twitter'); ?> <?= $twitter['title'] ?></a>
                <?php endif; ?>
                <?php $instagram = get_field('sponsor_instagram'); ?>
                <?php if ($instagram) : ?>
                  <a target="<?= $instagram['target'] ?>" href="<?= $instagram['url'] ?>"><?= Extras\ungrynerd_svg('icon-sp-instagram'); ?> <?= $instagram['title'] ?></a>
                <?php endif; ?>
                <?php $facebook = get_field('sponsor_facebook'); ?>
                <?php if ($facebook) : ?>
                  <a target="<?= $facebook['target'] ?>" href="<?= $facebook['url'] ?>"><?= Extras\ungrynerd_svg('icon-sp-facebook'); ?> <?= $facebook['title'] ?></a>
                <?php endif; ?>
                <?php $youtube = get_field('sponsor_youtube'); ?>
                <?php if ($youtube) : ?>
                  <a target="<?= $youtube['target'] ?>" href="<?= $youtube['url'] ?>"><?= Extras\ungrynerd_svg('icon-sp-youtube'); ?> <?= $youtube['title'] ?></a>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>
      <?php endwhile; ?>
    <?php endif; ?>

    <?php $sponsors = new WP_Query(array('post_type' => array('sponsor'), 'meta_key' => 'sponsor_type', 'meta_value' => 'silver', 'posts_per_page' => -1, 'order' => 'ASC')); ?>
    <?php if ($sponsors->have_posts()) : ?>
      <div class="sponsors-block sponsors-block--level2">
        <h2 class="sponsors-block__title"><?php esc_html_e('Silver', 'ungrynerd'); ?></h2>
      </div>
      <div class="sponsors-block sponsors-block--level2">
        <div class="container">
          <?php while ($sponsors->have_posts()) : $sponsors->the_post(); ?>
            <?php $logo = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full');  ?>
            <a target="_blank" class="sponsors-block__item" href="<?php the_field('sponsor_link'); ?>"><img src="<?= $logo[0]; ?>" width="<?= $logo[1] / 2; ?>" alt="<?php the_title_attribute(); ?>"></a>
          <?php endwhile; ?>
        </div>
      </div>
    <?php endif; ?>

    <?php $sponsors = new WP_Query(array('post_type' => array('sponsor'), 'meta_key' => 'sponsor_type', 'meta_value' => 'bronze', 'posts_per_page' => -1, 'order' => 'ASC')); ?>
    <?php if ($sponsors->have_posts()) : ?>
      <div class="sponsors-block sponsors-block--level2">
        <h2 class="sponsors-block__title"><?php esc_html_e('Bronze', 'ungrynerd'); ?></h2>
      </div>
      <div class="sponsors-block sponsors-block--level2">
        <div class="container">
          <?php while ($sponsors->have_posts()) : $sponsors->the_post(); ?>
            <?php $logo = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full');  ?>
            <a target="_blank" class="sponsors-block__item" href="<?php the_field('sponsor_link'); ?>"><img src="<?= $logo[0]; ?>" width="<?= $logo[1] / 2; ?>" alt="<?php the_title_attribute(); ?>"></a>
          <?php endwhile; ?>
        </div>
      </div>
    <?php endif; ?>

    <?php $sponsors = new WP_Query(array('post_type' => array('sponsor'), 'meta_key' => 'sponsor_type', 'meta_value' => 2, 'posts_per_page' => -1, 'order' => 'ASC')); ?>
    <?php if ($sponsors->have_posts()) : ?>
      <h2 class="sponsors-block__title"><?php esc_html_e('Contributors', 'ungrynerd'); ?></h2>
      <div class="container sponsors-block sponsors-block--level3">
        <?php while ($sponsors->have_posts()) : $sponsors->the_post(); ?>
          <?php $logo = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full');  ?>
          <a target="_blank" class="sponsors-block__item" href="<?php the_field('sponsor_link'); ?>"><img src="<?= $logo[0]; ?>" width="<?= $logo[1] / 2; ?>" alt="<?php the_title_attribute(); ?>"></a>
        <?php endwhile; ?>
      </div>
    <?php endif; ?>
    <?php wp_reset_postdata(); ?>
  </section>
<?php endwhile; ?>
