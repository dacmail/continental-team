<?php use Roots\Sage\Extras; ?>
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
  <a href="#" class="super-menu__close"><?php echo Extras\ungrynerd_svg('icon-close'); ?></a>
  <?php dynamic_sidebar('super-menu'); ?>
  <?php if (get_theme_mod('ungrynerd_social_facebook') ||
            get_theme_mod('ungrynerd_social_twitter') ||
            get_theme_mod('ungrynerd_social_instagram') ||
            get_theme_mod('ungrynerd_social_youtube')) : ?>
    <h3 class="super-menu__title"><?php esc_html_e('Síguenos', 'ungrynerd'); ?></h3>
    <div class="super-menu__social">
      <?php if (get_theme_mod('ungrynerd_social_facebook')) : ?>
        <a target="_blank" href="<?php echo esc_url(get_theme_mod('ungrynerd_social_facebook')) ?>" class="super-menu__social__link super-menu__social__link--facebook">
          <?php echo Extras\ungrynerd_svg('icon-facebook'); ?>
        </a>
      <?php endif ?>
      <?php if (get_theme_mod('ungrynerd_social_twitter')) : ?>
        <a target="_blank" href="<?php echo esc_url(get_theme_mod('ungrynerd_social_twitter')) ?>" class="super-menu__social__link super-menu__social__link--twitter">
          <?php echo Extras\ungrynerd_svg('icon-twitter'); ?>
        </a>
      <?php endif ?>
      <?php if (get_theme_mod('ungrynerd_social_youtube')) : ?>
        <a target="_blank" href="<?php echo esc_url(get_theme_mod('ungrynerd_social_youtube')) ?>" class="super-menu__social__link super-menu__social__link--youtube">
          <?php echo Extras\ungrynerd_svg('icon-youtube'); ?>
        </a>
      <?php endif ?>
      <?php if (get_theme_mod('ungrynerd_social_instagram')) : ?>
        <a target="_blank" href="<?php echo esc_url(get_theme_mod('ungrynerd_social_instagram')) ?>" class="super-menu__social__link super-menu__social__link--instagram">
          <?php echo Extras\ungrynerd_svg('icon-instagram'); ?>
        </a>
      <?php endif ?>
    </div>
  <?php endif; ?>
</nav>
