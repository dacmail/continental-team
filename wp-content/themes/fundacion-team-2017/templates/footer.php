<section class="sponsors-prefooter">
  <?php $sponsors = new WP_Query(array('post_type'=> array('sponsor'), 'meta_key' => 'sponsor_type', 'meta_value' => 0, 'posts_per_page' => -1, 'order' => 'ASC')); ?>
  <?php if ($sponsors->have_posts()) : ?>
    <div class="container sponsors sponsors--level1">
      <?php while ($sponsors->have_posts()) : $sponsors->the_post(); ?>
        <a href="<?php the_field('sponsor_link'); ?>"><?php the_post_thumbnail(); ?></a>
      <?php endwhile; ?>
    </div>
  <?php endif; ?>

  <?php $sponsors = new WP_Query(array('post_type'=> array('sponsor'), 'meta_key' => 'sponsor_type', 'meta_value' => 1, 'posts_per_page' => -1, 'order' => 'ASC')); ?>
  <?php if ($sponsors->have_posts()) : ?>
    <div class="container sponsors sponsors--level2">
      <?php while ($sponsors->have_posts()) : $sponsors->the_post(); ?>
        <a href="<?php the_field('sponsor_link'); ?>"><?php the_post_thumbnail(); ?></a>
      <?php endwhile; ?>
    </div>
  <?php endif; ?>

  <?php $sponsors = new WP_Query(array('post_type'=> array('sponsor'), 'meta_key' => 'sponsor_type', 'meta_value' => 2, 'posts_per_page' => -1, 'order' => 'ASC')); ?>
  <?php if ($sponsors->have_posts()) : ?>
    <div class="container sponsors sponsors--level3">
      <?php while ($sponsors->have_posts()) : $sponsors->the_post(); ?>
        <a href="<?php the_field('sponsor_link'); ?>"><?php the_post_thumbnail(); ?></a>
      <?php endwhile; ?>
    </div>
  <?php endif; ?>
</section>
<footer class="footer">
  <div class="container">
    <p>© <?php echo date('Y') ?> - <?php esc_html_e('CLUB DEPORTIVO CICLISTA ALBERTO CONTADOR. Todos los derechos reservados. Prohibida su copia o reproducción sin autorización expresa.', 'ungrynerd'); ?></p>
    <p><a target="_blank" href="http://ungrynerd.com">by <strong>UNGRYNERD</strong></a></p>
  </div>
</footer>
