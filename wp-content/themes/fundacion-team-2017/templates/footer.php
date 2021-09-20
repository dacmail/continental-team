<?php if (is_active_sidebar('banner-global') && !wp_is_mobile()) : ?>
  <section class="banner banner--global">
    <?php dynamic_sidebar('banner-global') ?>
  </section>
<?php endif ?>
<?php if (is_active_sidebar('banner-global-mobile') && wp_is_mobile()) : ?>
  <section class="banner banner--global">
    <?php dynamic_sidebar('banner-global-mobile') ?>
  </section>
<?php endif ?>

<section class="sponsors-prefooter">
  <?php $sponsors = new WP_Query(array('post_type' => array('sponsor'), 'meta_key' => 'sponsor_type', 'meta_value' => 0, 'posts_per_page' => -1, 'order' => 'ASC')); ?>
  <?php if ($sponsors->have_posts()) : ?>
    <div class="container sponsors-block sponsors-block--level1">
      <?php while ($sponsors->have_posts()) : $sponsors->the_post(); ?>
        <?php $logo = wp_get_attachment_image_src(get_field('sponsor_alt_logo'), 'full');  ?>
        <a target="_blank" class="sponsors-block__item" href="<?php the_field('sponsor_link'); ?>"><img src="<?= $logo[0]; ?>" width="<?= $logo[1] / 2; ?>" alt="<?php the_title_attribute(); ?>"></a>
      <?php endwhile; ?>
    </div>
  <?php endif; ?>

  <?php $sponsors = new WP_Query(array('post_type' => array('sponsor'), 'meta_key' => 'sponsor_type', 'meta_value' => 'gold', 'posts_per_page' => -1, 'order' => 'ASC')); ?>
  <?php if ($sponsors->have_posts()) : ?>
    <div class="container sponsors-block sponsors-block--level2">
      <?php while ($sponsors->have_posts()) : $sponsors->the_post(); ?>
        <?php $logo = wp_get_attachment_image_src(get_field('sponsor_alt_logo'), 'full');  ?>
        <a target="_blank" class="sponsors-block__item" href="<?php the_field('sponsor_link'); ?>"><img src="<?= $logo[0]; ?>" width="<?= $logo[1] / 2; ?>" alt="<?php the_title_attribute(); ?>"></a>
      <?php endwhile; ?>
    </div>
  <?php endif; ?>

  <?php $sponsors = new WP_Query(array('post_type' => array('sponsor'), 'meta_key' => 'sponsor_type', 'meta_value' => 'silver', 'posts_per_page' => -1, 'order' => 'ASC')); ?>
  <?php if ($sponsors->have_posts()) : ?>
    <div class="container sponsors-block sponsors-block--level2">
      <?php while ($sponsors->have_posts()) : $sponsors->the_post(); ?>
        <?php $logo = wp_get_attachment_image_src(get_field('sponsor_alt_logo'), 'full');  ?>
        <a target="_blank" class="sponsors-block__item" href="<?php the_field('sponsor_link'); ?>"><img src="<?= $logo[0]; ?>" width="<?= $logo[1] / 2; ?>" alt="<?php the_title_attribute(); ?>"></a>
      <?php endwhile; ?>
    </div>
  <?php endif; ?>

  <?php $sponsors = new WP_Query(array('post_type' => array('sponsor'), 'meta_key' => 'sponsor_type', 'meta_value' => 'bronze', 'posts_per_page' => -1, 'order' => 'ASC')); ?>
  <?php if ($sponsors->have_posts()) : ?>
    <div class="container sponsors-block sponsors-block--level2">
      <?php while ($sponsors->have_posts()) : $sponsors->the_post(); ?>
        <?php $logo = wp_get_attachment_image_src(get_field('sponsor_alt_logo'), 'full');  ?>
        <a target="_blank" class="sponsors-block__item" href="<?php the_field('sponsor_link'); ?>"><img src="<?= $logo[0]; ?>" width="<?= $logo[1] / 2; ?>" alt="<?php the_title_attribute(); ?>"></a>
      <?php endwhile; ?>
    </div>
  <?php endif; ?>

  <?php $sponsors = new WP_Query(array('post_type' => array('sponsor'), 'meta_key' => 'sponsor_type', 'meta_value' => 2, 'posts_per_page' => -1, 'order' => 'ASC')); ?>
  <?php if ($sponsors->have_posts()) : ?>
    <div class="container sponsors-block sponsors-block--level3">
      <?php while ($sponsors->have_posts()) : $sponsors->the_post(); ?>
        <?php $logo = wp_get_attachment_image_src(get_field('sponsor_alt_logo'), 'full');  ?>
        <a target="_blank" class="sponsors-block__item" href="<?php the_field('sponsor_link'); ?>"><img src="<?= $logo[0]; ?>" width="<?= $logo[1] / 2; ?>" alt="<?php the_title_attribute(); ?>"></a>
      <?php endwhile; ?>
    </div>
  <?php endif; ?>
</section>
<footer class="footer">
  <div class="container">
    <p>
      © <?php echo date('Y') ?> -
      <?php esc_html_e('HAYF SPORTS SL. Todos los derechos reservados.', 'ungrynerd'); ?>
      - <a href="<?= pll__(get_theme_mod('ungrynerd_legal')); ?>"><?php esc_html_e('Aviso legal', 'ungrynerd'); ?></a>
      - <a href="<?= pll__(get_theme_mod('ungrynerd_cookies')); ?>"><?php esc_html_e('Política de cookies', 'ungrynerd'); ?></a>
      - <a href="<?= pll__(get_theme_mod('ungrynerd_policy')); ?>"><?php esc_html_e('Política de privacidad', 'ungrynerd'); ?></a>
    </p>
    <p><a target="_blank" href="http://ungrynerd.com">by <strong>UNGRYNERD</strong></a></p>
  </div>
</footer>
