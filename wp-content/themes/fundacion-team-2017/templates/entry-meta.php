<?php use Roots\Sage\Extras; ?>

<p class="news__item__meta">
  <span class="news__item__post-type"><?php Extras\ungrynerd_post_type(get_post_type(), get_post_format()) ?></span> ·
  <span class="news__item__date"><?php the_time(get_option('date_format')); ?></span>
</p>