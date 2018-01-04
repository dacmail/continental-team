<header class="header">
  <div class="container">
    <a href="#menu" class="header__menu-toggle"><?php esc_html_e('Menu', 'ungrynerd'); ?></a>
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
        'container' => 'nav',
        'container_class' => 'header__language'));
    endif;
    ?>
  </div>
</header>
<nav class="super-menu" id="menu">
  <a class="super-menu__close"><?php esc_html_e('Cerrar', 'ungrynerd'); ?></a>
  <?php dynamic_sidebar('super-menu'); ?>
</nav>
