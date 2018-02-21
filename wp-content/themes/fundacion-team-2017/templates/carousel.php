<?php use Roots\Sage\Extras; ?>
<?php $slide_featured = new WP_Query(array('post_type'=> array('album', 'post', 'corredor'), 'meta_key' => 'slide_featured', 'meta_value' => 1, 'posts_per_page' => 5)); ?>
<?php if ($slide_featured->have_posts()) : ?>
  <section class="carousel owl-carousel">
    <?php while ($slide_featured->have_posts()) : $slide_featured->the_post(); ?>
      <article class="carousel__slide">
        <?php the_post_thumbnail('slide', array('class' => 'carousel__slide__img')); ?>
        <div class="carousel__slide__wrap">
          <span class="carousel__slide__post-type"><?php Extras\ungrynerd_post_type(get_post_type(), get_post_format( )); ?></span> ·
           <span class="carousel__slide__date"><?php the_time(get_option('date_format')); ?></span>
          <h1 class="carousel__slide__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
        </div>
      </article>
    <?php endwhile; ?>
  </section>
<?php endif; ?>
