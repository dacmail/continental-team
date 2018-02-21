<?php use Roots\Sage\Extras; ?>

<article <?php post_class('news__item'); ?>>  
  <?php if (has_post_thumbnail()) : ?>
    <a href="<?php the_permalink(); ?>" class="news__item__img">
      <?php the_post_thumbnail(is_home() ? 'masonry' :  'featured_medium'); ?>
    </a>
  <?php endif; ?>
  <?php get_template_part('templates/entry-meta'); ?>
  <h2 class="news__item__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
  <?php if (is_home()) : ?>
    <?php the_excerpt(); ?>
  <?php endif; ?>
</article>