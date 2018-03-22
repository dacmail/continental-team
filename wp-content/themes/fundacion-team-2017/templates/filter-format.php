<?php use Roots\Sage\Extras; ?>

<nav class="news__filter">
  <?= Extras\ungrynerd_svg('icon-filter'); ?>
  <ul>
    <li><a class="active" href="#" data-filter="*"><?php esc_html_e('Todo', 'ungrynerd'); ?></a></li>
    <li><a href="#" data-filter=".format-standard"><?php esc_html_e('Noticias', 'ungrynerd'); ?></a></li>
    <li><a href="#" data-filter=".format-gallery"><?php esc_html_e('Galerías', 'ungrynerd'); ?></a></li>
    <li><a href="#" data-filter=".format-video"><?php esc_html_e('Videos', 'ungrynerd'); ?></a></li>
  </ul>
</nav>