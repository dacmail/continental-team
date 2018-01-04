<header class="header">
  <div class="container">
    <a href="#menu" class="menu-toggle"><?php esc_html_e('Menu', 'ungrynerd'); ?></a>
    <?php if (has_custom_logo()): ?>
      <?php the_custom_logo(); ?>
    <?php else: ?>
      <a class="header__site-name" href="<?= esc_url(home_url('/')); ?>">
        <?php bloginfo('name'); ?>
      </a>
    <?php endif ?>
    <?php
    if (has_nav_menu('language_nav')) :
      wp_nav_menu(array(
        'theme_location' => 'language_nav',
        'menu_class' => 'nav',
        'container_class' => 'header__language'));
    endif;
    ?>
  </div>
</header>
