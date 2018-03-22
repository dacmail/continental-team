<?php use Roots\Sage\Extras; ?>
<div class="container">
  <h1 class="section-title"><?php esc_html_e('Actualidad', 'ungrynerd'); ?></h1>
</div>
<?php if (is_home()) : ?>
  <?php // get_template_part('templates/filter-format'); ?>
<?php endif; ?>
<section class="news news--listing">
  <?php while (have_posts()) : the_post(); ?>
    <?php get_template_part('templates/listing', get_post_type() != 'post' ? get_post_type() : get_post_format()); ?>
  <?php endwhile; ?>
</section>
<?php Extras\ungrynerd_pagination(); ?>