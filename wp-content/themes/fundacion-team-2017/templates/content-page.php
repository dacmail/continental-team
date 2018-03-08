<section class="page-section">
    <h1 class="section-title"><?php the_title(); ?></h1>
    <?php the_post_thumbnail('big', array('class' => 'page-section__thumb')); ?>
    <div class="page-section__content">
      <?php the_content(); ?>
      <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
    </div>
</section>
