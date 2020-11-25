<?php

use Roots\Sage\Extras; ?>
<div class="share">
  <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?= urlencode(get_permalink()); ?>" class="share__button share__button--facebook">
    <?php echo Extras\ungrynerd_svg('icon-facebook'); ?>
  </a>
  <a target="_blank" href="https://twitter.com/intent/tweet?url=<?php echo esc_url(get_permalink()) ?>&text=<?php echo get_the_title() ?>" class="share__button share__button--twitter">
    <?php echo Extras\ungrynerd_svg('icon-twitter'); ?>
  </a>
</div>
