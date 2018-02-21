<?php
/**
 * Template Name: Equipo
 */
?>
<?php use Roots\Sage\Extras; ?>
<?php while (have_posts()) : the_post(); ?>
  <section class="team">
    <h1 class="team__title"><?php the_title(); ?></h1>
    <?php $riders = new WP_Query(array(
      'post_type' => array('rider'),
      'posts_per_page' => -1
    )); ?>
    <div class="riders">
      <?php while ($riders->have_posts()) : $riders->the_post(); ?>
        <article class="riders__rider">
          <a href="<?php the_permalink() ?>"><?php the_post_thumbnail('rider', array('class' => 'riders__rider__image')) ?></a>
          <h2 class="riders__rider__name"><a href="<?php the_permalink() ?>"><?= Extras\ungrynerd_svg('flag-' . get_field('bandera')) ?><?php the_title(); ?></a></h2>
        </article>
      <?php endwhile; ?>
      <?php while ($riders->have_posts()) : $riders->the_post(); ?>
        <article class="riders__rider">
          <a href="<?php the_permalink() ?>"><?php the_post_thumbnail('rider', array('class' => 'riders__rider__image')) ?></a>
          <h2 class="riders__rider__name"><a href="<?php the_permalink() ?>"><?= Extras\ungrynerd_svg('flag-' . get_field('bandera')) ?><?php the_title(); ?></a></h2>
        </article>
      <?php endwhile; ?>
      <?php while ($riders->have_posts()) : $riders->the_post(); ?>
        <article class="riders__rider">
          <a href="<?php the_permalink() ?>"><?php the_post_thumbnail('rider', array('class' => 'riders__rider__image')) ?></a>
          <h2 class="riders__rider__name"><a href="<?php the_permalink() ?>"><?= Extras\ungrynerd_svg('flag-' . get_field('bandera')) ?><?php the_title(); ?></a></h2>
        </article>
      <?php endwhile; ?>
      <?php while ($riders->have_posts()) : $riders->the_post(); ?>
        <article class="riders__rider">
          <a href="<?php the_permalink() ?>"><?php the_post_thumbnail('rider', array('class' => 'riders__rider__image')) ?></a>
          <h2 class="riders__rider__name"><a href="<?php the_permalink() ?>"><?= Extras\ungrynerd_svg('flag-' . get_field('bandera')) ?><?php the_title(); ?></a></h2>
        </article>
      <?php endwhile; ?>
      <?php while ($riders->have_posts()) : $riders->the_post(); ?>
        <article class="riders__rider">
          <a href="<?php the_permalink() ?>"><?php the_post_thumbnail('rider', array('class' => 'riders__rider__image')) ?></a>
          <h2 class="riders__rider__name"><a href="<?php the_permalink() ?>"><?= Extras\ungrynerd_svg('flag-' . get_field('bandera')) ?><?php the_title(); ?></a></h2>
        </article>
      <?php endwhile; ?>
      <?php while ($riders->have_posts()) : $riders->the_post(); ?>
        <article class="riders__rider">
          <a href="<?php the_permalink() ?>"><?php the_post_thumbnail('rider', array('class' => 'riders__rider__image')) ?></a>
          <h2 class="riders__rider__name"><a href="<?php the_permalink() ?>"><?= Extras\ungrynerd_svg('flag-' . get_field('bandera')) ?><?php the_title(); ?></a></h2>
        </article>
      <?php endwhile; ?>
      <?php wp_reset_postdata(); ?>
    </div>
  </section>
  <section class="staff">
    <h2 class="staff__title"><?php esc_html_e('Staff', 'ungrynerd'); ?></h2>
    <div class="staff__wrapper">
    <?php while (have_rows('staff')) : the_row(); ?>
      <article class="member">
        <?= wp_get_attachment_image(get_sub_field('staff_photo'), 'staff') ?>
        <h3 class="member__name"><?php the_sub_field('staff_name') ?></h3>
        <h4 class="member__position"><?php the_sub_field('staff_position') ?></h4>
      </article>
    <?php endwhile; ?>
    </div>
  </section>
<?php endwhile; ?>
