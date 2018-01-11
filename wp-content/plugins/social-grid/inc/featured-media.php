<?php
function ssocial_twitter_feed_data($skin,$lauyout_array){
	ob_start();
	extract($lauyout_array);
	$svc_social_text = get_post_meta(get_the_ID(), '_svc_social_text', true);
	$svc_social_link = get_post_meta(get_the_ID(), '_svc_social_link', true);
	$svc_social_img =  get_post_meta(get_the_ID() , '_svc_social_img', true);
	
	$svc_social_author_name = get_post_meta(get_the_ID() , '_svc_social_author_name', true);
	$svc_social_author_img = get_post_meta(get_the_ID() , '_svc_social_author_img', true);
	$svc_social_author_link = get_post_meta(get_the_ID() , '_svc_social_author_link', true);
	$svc_social_date = get_post_meta(get_the_ID() , '_svc_social_date', true);
	
	if($skin == 's1'){?>
		<div class="ssocial-instagram-wrapper ssocial-twitter-skin-<?php echo $skin;?>">			
			<div class="ssocial-instagram-title">
				<span> 
					<?php echo social_convertHashtags($svc_social_text,'twitter'); ?>
                    <a href="<?php echo $svc_social_link;?>" target="_blank" class="twitter-read-button"><i class="fa fa-external-link"></i></a>
				</span>
                <?php if($duser != 'yes'){?>
                <a href="https://twitter.com/<?php echo str_replace(' ','',$svc_social_author_link);?>" target="_blank"><img class="social_author_media" src="<?php echo $svc_social_author_img;?>"> @<?php echo str_replace(' ','',$svc_social_author_link);?></a>
                <?php }
				if($ddate != 'yes'){?>
				<div class="social_insta_date"><?php echo ssocial_time_elapsed_string(strtotime($svc_social_date));?></div>
                <?php }?>
			</div>
		</div>
	<?php }
	
	if($skin == 's2'){?>
		<div class="ssocial-instagram-wrapper ssocial-twitter-skin-<?php echo $skin;?>">		
			<div class="ssocial-instagram-title">
				<span> 
					<?php echo social_convertHashtags($svc_social_text,'twitter'); ?>
                    <a href="<?php echo $svc_social_link;?>" target="_blank" class="twitter-read-button"><i class="fa fa-external-link"></i></a>
				</span>
                <?php if($duser != 'yes'){?>
                <a href="https://twitter.com/<?php echo str_replace(' ','',$svc_social_author_link);?>" target="_blank"><img class="social_author_media" src="<?php echo $svc_social_author_img;?>"> @<?php echo str_replace(' ','',$svc_social_author_link);?></a>
                <?php }
				if($ddate != 'yes'){?>
				<div class="social_insta_date"><?php echo ssocial_time_elapsed_string(strtotime($svc_social_date));?></div>
                <?php }?>
			</div>
		</div>
	<?php }
	
	if($skin == 's3'){?>
		<div class="ssocial-instagram-wrapper ssocial-twitter-skin-<?php echo $skin;?>">			
			<div class="ssocial-instagram-title">
				<span> 
					<?php echo social_convertHashtags($svc_social_text,'twitter'); ?>
                    <a href="<?php echo $svc_social_link;?>" target="_blank" class="twitter-read-button"><i class="fa fa-external-link"></i></a>
				</span>
			</div>
            <div class="svc_top_author">
                <a class="svc-pull-left" href="https://twitter.com/<?php echo str_replace(' ','',$svc_social_author_link);?>" target="_blank"><img class="media-object" src="<?php echo $svc_social_author_img;?>"></a>
                <div class="media-body"><p><span class="svc-author-title"><a class="svc-pull-left" href="<?php echo str_replace(' ','',$svc_social_author_link);?>" target="_blank">@<?php echo str_replace(' ','',$svc_social_author_link);?></a></span> </p></div>
            </div>
            <div class="svc_bottom_info svc_twitter"><span class="svc-date"> <?php echo ssocial_time_elapsed_string(strtotime($svc_social_date));?></span><i class="fa fa-twitter"></i></div>
		</div>
	<?php }
	
	if($skin == 's4'){?>
		<div class="ssocial-instagram-wrapper ssocial-twitter-skin-<?php echo $skin;?>">
        	<div class="ssocial_icon_container"><div class="ssocial_formate_icon"><i class="fa fa-twitter"></i></div></div>		
			<div class="ssocial-instagram-title">
            	<?php if($duser != 'yes'){?>
                <a href="https://twitter.com/<?php echo str_replace(' ','',$svc_social_author_link);?>" target="_blank"><img class="social_author_media" src="<?php echo $svc_social_author_img;?>"> @<?php echo str_replace(' ','',$svc_social_author_link);?></a>
                <?php }
				if($ddate != 'yes'){?>
				<div class="social_insta_date"><?php echo ssocial_time_elapsed_string(strtotime($svc_social_date));?></div>
                <?php }?>
				<span> 
					<?php echo social_convertHashtags($svc_social_text,'twitter'); ?>
                    <a href="<?php echo $svc_social_link;?>" target="_blank" class="twitter-read-button"><i class="fa fa-external-link"></i></a>
				</span>
                
			</div>
		</div>
	<?php }
	
		$m = ob_get_clean();
		echo $m; 
}
function ssocial_facebook_feed_data($skin,$lauyout_array){
	ob_start();
	extract($lauyout_array);
	$svc_social_text = get_post_meta(get_the_ID(), '_svc_social_text', true);
	$svc_social_link = get_post_meta(get_the_ID(), '_svc_social_link', true);
	$svc_social_img =  get_post_meta(get_the_ID() , '_svc_social_img', true);
	
	$svc_social_author_name = get_post_meta(get_the_ID() , '_svc_social_author_name', true);
	$svc_social_author_img = get_post_meta(get_the_ID() , '_svc_social_author_img', true);
	$svc_social_author_link = get_post_meta(get_the_ID() , '_svc_social_author_link', true);
	$svc_social_date = get_post_meta(get_the_ID() , '_svc_social_date', true);
	$svc_facebook_id = get_post_meta(get_the_ID() , '_facebook_id', true);
	$svc_social_media_type = get_post_meta(get_the_ID() , '_svc_social_media_type', true);
	$svc_fb_story_id = get_post_meta(get_the_ID() , '_svc_fb_story_id', true);
	
	if($svc_social_media_type == 'video'){
		$svc_facebook_id = get_post_meta(get_the_ID() , '_facebook_video_id', true);
		$svc_social_link = 'https://www.facebook.com'.$svc_social_link;
	}
	
	if($skin == 's1'){?>
		<div class="ssocial-instagram-wrapper ssocial-facebook-skin-<?php echo $skin;?>">
        <?php if($svc_social_img && $svc_social_img != NULL && $svc_social_img != ''){?>
			<div class="featured-image">
				<a class="full-cover-link" href="<?php echo $svc_social_link; ?>" target="_blank"></a>
				<img src="<?php echo $svc_social_img; ?>">
				<div class="image-hover-overlay"></div>
				<div class="post-type-badge">
				<?php if($popup_type == 'image_popup'){
					ssocial_image_popup($svc_social_link,$svc_social_img,'facebook');
				}elseif($popup_type == 'goto'){
					ssocial_goto_link($svc_social_link);	
				}else{
					ssocial_facebook_inline_popup_link($svc_social_link,$svc_facebook_id,$svc_social_media_type,$svc_social_text,$svc_fb_story_id);
				}?>
				</div>
			</div>
         <?php }
		 if($dexcerpt != 'yes' || $duser != 'yes' || $ddate != 'yes'){?>
			<div class="ssocial-instagram-title">
            	<?php if($dexcerpt != 'yes'){?>
				<span> 
					<?php echo social_convertHashtags(ssocial_get_words($svc_social_text,$svc_excerpt_length),'facebook');?>					
				</span>
                <?php }
				if($duser != 'yes'){?>
                <a href="<?php echo $svc_social_author_link;?>" target="_blank"><img class="social_author_media" src="<?php echo $svc_social_author_img;?>"> <?php echo $svc_social_author_name;?></a>
                <?php }
				if($ddate != 'yes'){?>
				<div class="social_insta_date"><?php echo ssocial_time_elapsed_string(strtotime($svc_social_date));?></div>
                <?php }?>
			</div>
        <?php }?>
		</div>
	<?php if($svc_social_img == ''){
			echo '<div class="ssocial_formate_icon"><i class="fa fa-facebook"></i></div>';
		}
	}
	
	if($skin == 's2'){?>
		<div class="ssocial-instagram-wrapper ssocial-facebook-skin-<?php echo $skin;?>">
        <?php if($svc_social_img && $svc_social_img != NULL && $svc_social_img != ''){?>
			<div class="featured-image">
				<a class="full-cover-link" href="<?php echo $svc_social_link; ?>" target="_blank"></a>
				<img src="<?php echo $svc_social_img; ?>">
				<div class="image-hover-overlay"></div>
				<div class="post-type-badge">
				<?php if($popup_type == 'image_popup'){
					ssocial_image_popup($svc_social_link,$svc_social_img,'facebook');
				}elseif($popup_type == 'goto'){
					ssocial_goto_link($svc_social_link);	
				}else{
					ssocial_facebook_inline_popup_link($svc_social_link,$svc_facebook_id,$svc_social_media_type,$svc_social_text,$svc_fb_story_id);
				}?>
				</div>
                <div class="ssocial_formate_icon"><i class="fa fa-facebook"></i></div>
			</div>
         <?php }
		 if($dexcerpt != 'yes' || $duser != 'yes' || $ddate != 'yes'){?>
			<div class="ssocial-instagram-title">
            	<?php if($dexcerpt != 'yes'){?>
				<span> 
					<?php echo social_convertHashtags(ssocial_get_words($svc_social_text,$svc_excerpt_length),'facebook');?>					
				</span>
                <?php }
				if($duser != 'yes'){?>
                <a href="<?php echo $svc_social_author_link;?>" target="_blank"><img class="social_author_media" src="<?php echo $svc_social_author_img;?>"> <?php echo $svc_social_author_name;?></a>
                <?php }
				if($ddate != 'yes'){?>
				<div class="social_insta_date"><?php echo ssocial_time_elapsed_string(strtotime($svc_social_date));?></div>
                <?php }?>
			</div>
        <?php }?>
		</div>
	<?php }
	
	if($skin == 's3'){?>
		<div class="ssocial-instagram-wrapper ssocial-instagram-skin-<?php echo $skin;?>">
        	<?php if($svc_social_img && $svc_social_img != NULL && $svc_social_img != ''){?>
			<div class="featured-image">
				<a class="full-cover-link" href="<?php echo $svc_social_link; ?>" target="_blank"></a>
				<img src="<?php echo $svc_social_img; ?>">
				<div class="image-hover-overlay"></div>
				<div class="post-type-badge">
				<?php if($popup_type == 'image_popup'){
					ssocial_image_popup($svc_social_link,$svc_social_img,'facebook');
				}elseif($popup_type == 'goto'){
					ssocial_goto_link($svc_social_link);	
				}else{
					ssocial_facebook_inline_popup_link($svc_social_link,$svc_facebook_id,$svc_social_media_type,$svc_social_text,$svc_fb_story_id);
				}?>
				</div>
			</div>
            <?php }?>
			<div class="svc_content">
            	<?php if($dexcerpt != 'yes'){?>
				<div class="svc-text-wrapper">
					<div class="social-feed-text"><?php echo social_convertHashtags(ssocial_get_words($svc_social_text,$svc_excerpt_length),'facebook'); ?></div>
				</div>
                <?php }?>
				<div class="svc_top_author">
					<a class="svc-pull-left" href="<?php echo $svc_social_author_link;?>" target="_blank"><img class="media-object" src="<?php echo $svc_social_author_img;?>"></a>
					<div class="media-body"><p><span class="svc-author-title"><a class="svc-pull-left" href="<?php echo $svc_social_author_link;?>" target="_blank"><?php echo $svc_social_author_name;?></a></span> </p></div>
				</div>
			</div>
			<div class="svc_bottom_info svc_facebook"><span class="svc-date"> <?php echo ssocial_time_elapsed_string(strtotime($svc_social_date));?></span><i class="fa fa-facebook"></i></div>
		</div>
	<?php }
	
	if($skin == 's4'){?>
		<div class="ssocial-instagram-wrapper ssocial-facebook-skin-<?php echo $skin;?>">
        <?php if($svc_social_img && $svc_social_img != NULL && $svc_social_img != ''){?>
			<div class="featured-image">
				<a class="full-cover-link" href="<?php echo $svc_social_link; ?>" target="_blank"></a>
				<img src="<?php echo $svc_social_img; ?>">
				<div class="image-hover-overlay"></div>
				<div class="post-type-badge">
				<?php if($popup_type == 'image_popup'){
					ssocial_image_popup($svc_social_link,$svc_social_img,'facebook');
				}elseif($popup_type == 'goto'){
					ssocial_goto_link($svc_social_link);	
				}else{
					ssocial_facebook_inline_popup_link($svc_social_link,$svc_facebook_id,$svc_social_media_type,$svc_social_text,$svc_fb_story_id);
				}?>
				</div>
			</div>
         <?php }?>
         	<div class="ssocial_icon_container"><div class="ssocial_formate_icon"><i class="fa fa-facebook"></i></div></div>
         <?php if($dexcerpt != 'yes' || $duser != 'yes' || $ddate != 'yes'){?>
			<div class="ssocial-instagram-title">
            	<?php if($duser != 'yes'){?>
                <a href="<?php echo $svc_social_author_link;?>" target="_blank"><img class="social_author_media" src="<?php echo $svc_social_author_img;?>"> <?php echo $svc_social_author_name;?></a>
                <?php }
				if($ddate != 'yes'){?>
				<div class="social_insta_date"><?php echo ssocial_time_elapsed_string(strtotime($svc_social_date));?></div>
                <?php }
				if($dexcerpt != 'yes'){?>
				<span> 
					<?php echo social_convertHashtags(ssocial_get_words($svc_social_text,$svc_excerpt_length),'facebook');?>					
				</span>
                <?php }?>
			</div>
        <?php }?>
		</div>
	<?php }
	
		$m = ob_get_clean();
		echo $m; 
}
function ssocial_youtube_feed_data($skin,$lauyout_array){
	ob_start();
	extract($lauyout_array);
	$svc_social_text = get_post_meta(get_the_ID(), '_svc_social_text', true);
	$svc_social_title = get_post_meta(get_the_ID(), '_svc_social_title', true);
	$svc_social_link = get_post_meta(get_the_ID(), '_svc_social_link', true);
	$svc_social_img =  get_post_meta(get_the_ID() , '_svc_social_img', true);
	
	$svc_social_author_name = get_post_meta(get_the_ID() , '_svc_social_author_name', true);
	$svc_social_author_img = get_post_meta(get_the_ID() , '_svc_social_author_img', true);
	$svc_social_author_link = get_post_meta(get_the_ID() , '_svc_social_author_link', true);
	$svc_social_date = get_post_meta(get_the_ID() , '_svc_social_date', true);
	$single_youtube_id =  get_post_meta(get_the_ID() , '_svc_social_youtube_id', true);
	if($skin == 's1'){?>
		<div class="ssocial-instagram-wrapper ssocial-youtube-skin-<?php echo $skin;?>">
        <?php if($svc_social_img && $svc_social_img != NULL){?>
			<div class="featured-image">
            	<?php if($popup_type == 'image_popup'){?>
                <a href="http://www.youtube.com/watch?v=<?php echo $single_youtube_id;?>" class="full-cover-link svc_video_play ajax-insta-popup-video"></a>
				<?php }elseif($popup_type == 'goto'){?>
                <a href="http://www.youtube.com/watch?v=<?php echo $single_youtube_id;?>" class="full-cover-link svc_video_play" target="_blank"></a>
				<?php }else{?>
				<a class="full-cover-link svc_video_play ajax-insta-popup-link" href="<?php echo $svc_social_link; ?>" target="_blank" data-mfp-src="<?php echo admin_url( 'admin-ajax.php' ).'?action=ssocial_inline_social_popup&network=youtube&videoId='.$single_youtube_id;?>"></a>
                <?php }?>
				<img src="<?php echo $svc_social_img; ?>">
				<div class="image-hover-overlay"></div>
				<div class="post-type-badge"></div>
			</div>
         <?php }
		 if($dexcerpt != 'yes' || $duser != 'yes' || $ddate != 'yes' || $dvideo_title != 'yes'){?>
			<div class="ssocial-instagram-title">
            	<?php if($dvideo_title != 'yes'){?>
            	<div class="ssocil_video_title"><?php echo $svc_social_title;?></div>
            	<?php }
				if($dexcerpt != 'yes'){?>
				<span><?php echo social_convertHashtags(ssocial_get_words($svc_social_text,$svc_excerpt_length),'youtube');?></span>
                <?php }
				if($duser != 'yes'){?>
                <a href="<?php echo $svc_social_author_link;?>" target="_blank"><img class="social_author_media" src="<?php echo $svc_social_author_img;?>"> <?php echo $svc_social_author_name;?></a>
                <?php }
				if($ddate != 'yes'){?>
				<div class="social_insta_date"><?php echo ssocial_time_elapsed_string(strtotime($svc_social_date));?></div>
                <?php }?>
			</div>
        <?php }?>
		</div>
	<?php }
	
	if($skin == 's2'){?>
		<div class="ssocial-instagram-wrapper ssocial-youtube-skin-<?php echo $skin;?>">
        <?php if($svc_social_img && $svc_social_img != NULL){?>
			<div class="featured-image">
            	<?php if($popup_type == 'image_popup'){?>
                <a href="http://www.youtube.com/watch?v=<?php echo $single_youtube_id;?>" class="full-cover-link svc_video_play ajax-insta-popup-video"></a>
				<?php }elseif($popup_type == 'goto'){?>
                <a href="http://www.youtube.com/watch?v=<?php echo $single_youtube_id;?>" class="full-cover-link svc_video_play" target="_blank"></a>
				<?php }else{?>
				<a class="full-cover-link svc_video_play ajax-insta-popup-link" href="<?php echo $svc_social_link; ?>" target="_blank" data-mfp-src="<?php echo admin_url( 'admin-ajax.php' ).'?action=ssocial_inline_social_popup&network=youtube&videoId='.$single_youtube_id;?>"></a>
                <?php }?>
				<img src="<?php echo $svc_social_img; ?>">
				<div class="image-hover-overlay"></div>
				<div class="post-type-badge"></div>
                <div class="ssocial_formate_icon"><i class="fa fa-youtube-play"></i></div>
			</div>
         <?php }
		 if($dexcerpt != 'yes' || $duser != 'yes' || $ddate != 'yes' || $dvideo_title != 'yes'){?>
			<div class="ssocial-instagram-title">
            	<?php if($dvideo_title != 'yes'){?>
            	<div class="ssocil_video_title"><?php echo $svc_social_title;?></div>
            	<?php }
				if($dexcerpt != 'yes'){?>
				<span><?php echo social_convertHashtags(ssocial_get_words($svc_social_text,$svc_excerpt_length),'youtube');?></span>
                <?php }
				if($duser != 'yes'){?>
                <a href="<?php echo $svc_social_author_link;?>" target="_blank"><img class="social_author_media" src="<?php echo $svc_social_author_img;?>"> <?php echo $svc_social_author_name;?></a>
                <?php }
				if($ddate != 'yes'){?>
				<div class="social_insta_date"><?php echo ssocial_time_elapsed_string(strtotime($svc_social_date));?></div>
                <?php }?>
			</div>
        <?php }?>
		</div>
	<?php }
	
	if($skin == 's3'){?>
		<div class="ssocial-instagram-wrapper ssocial-instagram-skin-<?php echo $skin;?>">
			<div class="featured-image">
				<a class="full-cover-link" href="<?php echo $svc_social_link; ?>" target="_blank"></a>
                <?php if($popup_type == 'image_popup'){?>
                <a href="http://www.youtube.com/watch?v=<?php echo $single_youtube_id;?>" class="full-cover-link svc_video_play ajax-insta-popup-video"></a>
				<?php }elseif($popup_type == 'goto'){?>
                <a href="http://www.youtube.com/watch?v=<?php echo $single_youtube_id;?>" class="full-cover-link svc_video_play" target="_blank"></a>
				<?php }else{?>
				<a class="full-cover-link svc_video_play ajax-insta-popup-link" href="<?php echo $svc_social_link; ?>" target="_blank" data-mfp-src="<?php echo admin_url( 'admin-ajax.php' ).'?action=ssocial_inline_social_popup&network=youtube&videoId='.$single_youtube_id;?>"></a>
                <?php }?>
				<img src="<?php echo $svc_social_img; ?>">
				<div class="image-hover-overlay"></div>
				<div class="post-type-badge"></div>
			</div>			
			<div class="svc_content">
            	<?php if($dvideo_title != 'yes'){?>
            	<div class="ssocil_video_title"><?php echo $svc_social_title;?></div>
            	<?php }
				if($dexcerpt != 'yes'){?>
				<div class="svc-text-wrapper">
					<div class="social-feed-text"><?php echo social_convertHashtags(ssocial_get_words($svc_social_text,$svc_excerpt_length),'youtube'); ?></div>
				</div>
                <?php }?>
				<div class="svc_top_author">
					<a class="svc-pull-left" href="<?php echo $svc_social_author_link;?>" target="_blank"><img class="media-object" src="<?php echo $svc_social_author_img;?>"></a>
					<div class="media-body"><p><span class="svc-author-title"><a class="svc-pull-left" href="<?php echo $svc_social_author_link;?>" target="_blank"><?php echo $svc_social_author_name;?></a></span> </p></div>
				</div>
			</div>
			<div class="svc_bottom_info svc_youtube"><span class="svc-date"> <?php echo ssocial_time_elapsed_string(strtotime($svc_social_date));?></span><i class="fa fa-youtube-play"></i></div>
		</div>
	<?php }
	
	if($skin == 's4'){?>
		<div class="ssocial-instagram-wrapper ssocial-youtube-skin-<?php echo $skin;?>">
        <?php if($svc_social_img && $svc_social_img != NULL){?>
			<div class="featured-image">
            	<?php if($popup_type == 'image_popup'){?>
                <a href="http://www.youtube.com/watch?v=<?php echo $single_youtube_id;?>" class="full-cover-link svc_video_play ajax-insta-popup-video"></a>
				<?php }elseif($popup_type == 'goto'){?>
                <a href="http://www.youtube.com/watch?v=<?php echo $single_youtube_id;?>" class="full-cover-link svc_video_play" target="_blank"></a>
				<?php }else{?>
				<a class="full-cover-link svc_video_play ajax-insta-popup-link" href="<?php echo $svc_social_link; ?>" target="_blank" data-mfp-src="<?php echo admin_url( 'admin-ajax.php' ).'?action=ssocial_inline_social_popup&network=youtube&videoId='.$single_youtube_id;?>"></a>
                <?php }?>
				<img src="<?php echo $svc_social_img; ?>">
				<div class="image-hover-overlay"></div>
				<div class="post-type-badge"></div>
			</div>
         <?php }?>
            <div class="ssocial_icon_container"><div class="ssocial_formate_icon"><i class="fa fa-youtube-play"></i></div></div>
         <?php if($dexcerpt != 'yes' || $duser != 'yes' || $ddate != 'yes' || $dvideo_title != 'yes'){?>
			<div class="ssocial-instagram-title">
            	<?php if($duser != 'yes'){?>
                <a href="<?php echo $svc_social_author_link;?>" target="_blank"><img class="social_author_media" src="<?php echo $svc_social_author_img;?>"> <?php echo $svc_social_author_name;?></a>
                <?php }
				if($ddate != 'yes'){?>
				<div class="social_insta_date"><?php echo ssocial_time_elapsed_string(strtotime($svc_social_date));?></div>
                <?php }
				if($dvideo_title != 'yes'){?>
            	<div class="ssocil_video_title"><?php echo $svc_social_title;?></div>
            	<?php }
				if($dexcerpt != 'yes'){?>
				<span><?php echo social_convertHashtags(ssocial_get_words($svc_social_text,$svc_excerpt_length),'youtube');?></span>
                <?php }?>
			</div>
        <?php }?>
		</div>
	<?php }

		$m = ob_get_clean();
		echo $m; 
}
function ssocial_vimeo_feed_data($skin,$lauyout_array){
	ob_start();
	extract($lauyout_array);
	$svc_social_text = get_post_meta(get_the_ID(), '_svc_social_text', true);
	$svc_social_title = get_post_meta(get_the_ID(), '_svc_social_title', true);
	$svc_social_link = get_post_meta(get_the_ID(), '_svc_social_link', true);
	$svc_social_img =  get_post_meta(get_the_ID() , '_svc_social_img', true);
	
	$svc_social_author_name = get_post_meta(get_the_ID() , '_svc_social_author_name', true);
	$svc_social_author_img = get_post_meta(get_the_ID() , '_svc_social_author_img', true);
	$svc_social_author_link = get_post_meta(get_the_ID() , '_svc_social_author_link', true);
	$svc_social_date = get_post_meta(get_the_ID() , '_svc_social_date', true);
	$single_vimeo_id =  get_post_meta(get_the_ID() , '_svc_social_vimeo_id', true);
	$svc_user_array = explode('/',$svc_social_author_link);
	//echo "<pre>";print_r($svc_user_array);echo "</pre>";die;
	$user_id_count = count($svc_user_array);
	$user_id = $svc_user_array[$user_id_count-1];
	if($skin == 's1'){?>
		<div class="ssocial-instagram-wrapper ssocial-vimeo-skin-<?php echo $skin;?>">
        <?php if($svc_social_img && $svc_social_img != NULL){?>
			<div class="featured-image">
            	<?php if($popup_type == 'image_popup'){?>
                <a href="<?php echo $svc_social_link;?>" class="full-cover-link svc_video_play ajax-insta-popup-video"></a>
				<?php }elseif($popup_type == 'goto'){?>
                <a href="<?php echo $svc_social_link;?>" class="full-cover-link svc_video_play" target="_blank"></a>
				<?php }else{?>
				<a class="full-cover-link svc_video_play ajax-insta-popup-link" href="<?php echo $svc_social_link; ?>" target="_blank" data-mfp-src="<?php echo admin_url( 'admin-ajax.php' ).'?action=ssocial_inline_social_popup&network=vimeo&videoId='.$single_vimeo_id.'&userid='.$user_id.'&from='.$svc_social_author_name.'&profileImg='.$svc_social_author_img;?>"></a>
                <?php }?>
				<img src="<?php echo $svc_social_img; ?>">
				<div class="image-hover-overlay"></div>
				<div class="post-type-badge"></div>
			</div>
         <?php }
		 if($dexcerpt != 'yes' || $duser != 'yes' || $ddate != 'yes' || $dvideo_title != 'yes'){?>
			<div class="ssocial-instagram-title">
            	<?php if($dvideo_title != 'yes'){?>
            	<div class="ssocil_video_title"><?php echo $svc_social_title;?></div>
            	<?php }
				if($dexcerpt != 'yes'){?>
				<span><?php echo social_convertHashtags(ssocial_get_words($svc_social_text,$svc_excerpt_length),'vimeo');?></span>
                <?php }
				if($duser != 'yes'){?>
                <a href="<?php echo $svc_social_author_link;?>" target="_blank"><img class="social_author_media" src="<?php echo $svc_social_author_img;?>"> <?php echo $svc_social_author_name;?></a>
                <?php }
				if($ddate != 'yes'){?>
				<div class="social_insta_date"><?php echo ssocial_time_elapsed_string(strtotime($svc_social_date));?></div>
                <?php }?>
			</div>
        <?php }?>
		</div>
	<?php }
	
	if($skin == 's2'){?>
		<div class="ssocial-instagram-wrapper ssocial-vimeo-skin-<?php echo $skin;?>">
        <?php if($svc_social_img && $svc_social_img != NULL){?>
			<div class="featured-image">
            	<?php if($popup_type == 'image_popup'){?>
                <a href="<?php echo $svc_social_link;?>" class="full-cover-link svc_video_play ajax-insta-popup-video"></a>
				<?php }elseif($popup_type == 'goto'){?>
                <a href="<?php echo $svc_social_link;?>" class="full-cover-link svc_video_play" target="_blank"></a>
				<?php }else{?>
				<a class="full-cover-link svc_video_play ajax-insta-popup-link" href="<?php echo $svc_social_link; ?>" target="_blank" data-mfp-src="<?php echo admin_url( 'admin-ajax.php' ).'?action=ssocial_inline_social_popup&network=vimeo&videoId='.$single_vimeo_id.'&userid='.$user_id.'&from='.$svc_social_author_name.'&profileImg='.$svc_social_author_img;?>"></a>
                <?php }?>
				<img src="<?php echo $svc_social_img; ?>">
				<div class="image-hover-overlay"></div>
				<div class="post-type-badge"></div>
                <div class="ssocial_formate_icon"><i class="fa fa-vimeo-square"></i></div>
			</div>
         <?php }
		 if($dexcerpt != 'yes' || $duser != 'yes' || $ddate != 'yes' || $dvideo_title != 'yes'){?>
			<div class="ssocial-instagram-title">
            	<?php if($dvideo_title != 'yes'){?>
            	<div class="ssocil_video_title"><?php echo $svc_social_title;?></div>
            	<?php }
				if($dexcerpt != 'yes'){?>
				<span><?php echo social_convertHashtags(ssocial_get_words($svc_social_text,$svc_excerpt_length),'vimeo');?></span>
                <?php }
				if($duser != 'yes'){?>
                <a href="<?php echo $svc_social_author_link;?>" target="_blank"><img class="social_author_media" src="<?php echo $svc_social_author_img;?>"> <?php echo $svc_social_author_name;?></a>
                <?php }
				if($ddate != 'yes'){?>
				<div class="social_insta_date"><?php echo ssocial_time_elapsed_string(strtotime($svc_social_date));?></div>
                <?php }?>
			</div>
        <?php }?>
		</div>
	<?php }
	
	if($skin == 's3'){?>
		<div class="ssocial-instagram-wrapper ssocial-instagram-skin-<?php echo $skin;?>">
			<div class="featured-image">
				<a class="full-cover-link" href="<?php echo $svc_social_link; ?>" target="_blank"></a>
                <?php if($popup_type == 'image_popup'){?>
                <a href="<?php echo $svc_social_link;?>" class="full-cover-link svc_video_play ajax-insta-popup-video"></a>
				<?php }elseif($popup_type == 'goto'){?>
                <a href="<?php echo $svc_social_link;?>" class="full-cover-link svc_video_play" target="_blank"></a>
				<?php }else{?>
				<a class="full-cover-link svc_video_play ajax-insta-popup-link" href="<?php echo $svc_social_link; ?>" target="_blank" data-mfp-src="<?php echo admin_url( 'admin-ajax.php' ).'?action=ssocial_inline_social_popup&network=vimeo&videoId='.$single_vimeo_id.'&userid='.$user_id.'&from='.$svc_social_author_name.'&profileImg='.$svc_social_author_img;?>"></a>
                <?php }?>
				<img src="<?php echo $svc_social_img; ?>">
				<div class="image-hover-overlay"></div>
				<div class="post-type-badge"></div>
			</div>			
			<div class="svc_content">
            	<?php if($dvideo_title != 'yes'){?>
            	<div class="ssocil_video_title"><?php echo $svc_social_title;?></div>
            	<?php }
				if($dexcerpt != 'yes'){?>
				<div class="svc-text-wrapper">
					<div class="social-feed-text"><?php echo social_convertHashtags(ssocial_get_words($svc_social_text,$svc_excerpt_length),'vimeo'); ?></div>
				</div>
                <?php }?>
				<div class="svc_top_author">
					<a class="svc-pull-left" href="<?php echo $svc_social_author_link;?>" target="_blank"><img class="media-object" src="<?php echo $svc_social_author_img;?>"></a>
					<div class="media-body"><p><span class="svc-author-title"><a class="svc-pull-left" href="<?php echo $svc_social_author_link;?>" target="_blank"><?php echo $svc_social_author_name;?></a></span> </p></div>
				</div>
			</div>
			<div class="svc_bottom_info svc_vimeo"><span class="svc-date"> <?php echo ssocial_time_elapsed_string(strtotime($svc_social_date));?></span><i class="fa fa-vimeo-square"></i></div>
		</div>
	<?php }
	
	if($skin == 's4'){?>
		<div class="ssocial-instagram-wrapper ssocial-vimeo-skin-<?php echo $skin;?>">
        <?php if($svc_social_img && $svc_social_img != NULL){?>
			<div class="featured-image">
            	<?php if($popup_type == 'image_popup'){?>
                <a href="<?php echo $svc_social_link;?>" class="full-cover-link svc_video_play ajax-insta-popup-video"></a>
				<?php }elseif($popup_type == 'goto'){?>
                <a href="<?php echo $svc_social_link;?>" class="full-cover-link svc_video_play" target="_blank"></a>
				<?php }else{?>
				<a class="full-cover-link svc_video_play ajax-insta-popup-link" href="<?php echo $svc_social_link; ?>" target="_blank" data-mfp-src="<?php echo admin_url( 'admin-ajax.php' ).'?action=ssocial_inline_social_popup&network=vimeo&videoId='.$single_vimeo_id.'&userid='.$user_id.'&from='.$svc_social_author_name.'&profileImg='.$svc_social_author_img;?>"></a>
                <?php }?>
				<img src="<?php echo $svc_social_img; ?>">
				<div class="image-hover-overlay"></div>
				<div class="post-type-badge"></div>
			</div>
         <?php }?>
         	<div class="ssocial_icon_container"><div class="ssocial_formate_icon"><i class="fa fa-vimeo-square"></i></div></div>
         <?php if($dexcerpt != 'yes' || $duser != 'yes' || $ddate != 'yes' || $dvideo_title != 'yes'){?>
			<div class="ssocial-instagram-title">
            	<?php if($duser != 'yes'){?>
                <a href="<?php echo $svc_social_author_link;?>" target="_blank"><img class="social_author_media" src="<?php echo $svc_social_author_img;?>"> <?php echo $svc_social_author_name;?></a>
                <?php }
				if($ddate != 'yes'){?>
				<div class="social_insta_date"><?php echo ssocial_time_elapsed_string(strtotime($svc_social_date));?></div>
                <?php }
				if($dvideo_title != 'yes'){?>
            	<div class="ssocil_video_title"><?php echo $svc_social_title;?></div>
            	<?php }
				if($dexcerpt != 'yes'){?>
				<span><?php echo social_convertHashtags(ssocial_get_words($svc_social_text,$svc_excerpt_length),'vimeo');?></span>
                <?php }?>
			</div>
        <?php }?>
		</div>
	<?php }         
	
		$m = ob_get_clean();
		echo $m; 
}
function ssocial_dribbble_feed_data($skin,$lauyout_array){
	ob_start();
	extract($lauyout_array);
	$svc_social_text = get_post_meta(get_the_ID(), '_svc_social_text', true);
	$svc_social_link = get_post_meta(get_the_ID(), '_svc_social_link', true);
	$svc_social_img =  get_post_meta(get_the_ID() , '_svc_social_img', true);
	
	$svc_social_author_name = get_post_meta(get_the_ID() , '_svc_social_author_name', true);
	$svc_social_author_img = get_post_meta(get_the_ID() , '_svc_social_author_img', true);
	$svc_social_author_link = get_post_meta(get_the_ID() , '_svc_social_author_link', true);
	$svc_social_date = get_post_meta(get_the_ID() , '_svc_social_date', true);
	if($skin == 's1'){?>
		<div class="ssocial-instagram-wrapper ssocial-dribbble-skin-<?php echo $skin;?>">
        <?php if($svc_social_img && $svc_social_img != NULL){?>
			<div class="featured-image">
				<a class="full-cover-link" href="<?php echo $svc_social_link; ?>" target="_blank"></a>
				<img src="<?php echo $svc_social_img; ?>">
				<div class="image-hover-overlay"></div>
				<div class="post-type-badge">
				<?php if($popup_type == 'image_popup'){
					ssocial_image_popup($svc_social_link,$svc_social_img,'dribbble');
				}elseif($popup_type == 'goto'){
					ssocial_goto_link($svc_social_link);	
				}else{
					ssocial_dribbble_inline_popup_link($svc_social_link,get_the_ID());
				}?>
				</div>
			</div>
         <?php }
		 if($dexcerpt != 'yes' || $duser != 'yes' || $ddate != 'yes'){?>
			<div class="ssocial-instagram-title">
            	<?php if($dexcerpt != 'yes'){?>
				<span> 
					<?php $svc_social_text = strip_tags($svc_social_text);
					echo social_convertHashtags(ssocial_get_words($svc_social_text,$svc_excerpt_length),'dribbble');?>
				</span>
                <?php }
				if($duser != 'yes'){?>
                <a href="<?php echo $svc_social_author_link;?>" target="_blank"><img class="social_author_media" src="<?php echo $svc_social_author_img;?>"> <?php echo $svc_social_author_name;?></a>
                <?php }
				if($ddate != 'yes'){?>
				<div class="social_insta_date"><?php echo ssocial_time_elapsed_string(strtotime($svc_social_date));?></div>
                <?php }?>
			</div>
        <?php }?>
		</div>
	<?php }
	
		if($skin == 's2'){?>
		<div class="ssocial-instagram-wrapper ssocial-dribbble-skin-<?php echo $skin;?>">
        <?php if($svc_social_img && $svc_social_img != NULL){?>
			<div class="featured-image">
				<a class="full-cover-link" href="<?php echo $svc_social_link; ?>" target="_blank"></a>
				<img src="<?php echo $svc_social_img; ?>">
				<div class="image-hover-overlay"></div>
				<div class="post-type-badge">
				<?php if($popup_type == 'image_popup'){
					ssocial_image_popup($svc_social_link,$svc_social_img,'dribbble');
				}elseif($popup_type == 'goto'){
					ssocial_goto_link($svc_social_link);	
				}else{
					ssocial_dribbble_inline_popup_link($svc_social_link,get_the_ID());
				}?>
				</div>
                <div class="ssocial_formate_icon"><i class="fa fa-dribbble"></i></div>
			</div>
         <?php }
		 if($dexcerpt != 'yes' || $duser != 'yes' || $ddate != 'yes'){?>
			<div class="ssocial-instagram-title">
            	<?php if($dexcerpt != 'yes'){?>
				<span> 
					<?php $svc_social_text = strip_tags($svc_social_text);
					echo social_convertHashtags(ssocial_get_words($svc_social_text,$svc_excerpt_length),'dribbble');?>
				</span>
                <?php }
				if($duser != 'yes'){?>
                <a href="<?php echo $svc_social_author_link;?>" target="_blank"><img class="social_author_media" src="<?php echo $svc_social_author_img;?>"> <?php echo $svc_social_author_name;?></a>
                <?php }
				if($ddate != 'yes'){?>
				<div class="social_insta_date"><?php echo ssocial_time_elapsed_string(strtotime($svc_social_date));?></div>
                <?php }?>
			</div>
        <?php }?>
		</div>
	<?php }
	
	if($skin == 's3'){?>
		<div class="ssocial-instagram-wrapper ssocial-instagram-skin-<?php echo $skin;?>">
			<div class="featured-image">
				<a class="full-cover-link" href="<?php echo $svc_social_link; ?>" target="_blank"></a>
				<img src="<?php echo $svc_social_img; ?>">
				<div class="image-hover-overlay"></div>
				<div class="post-type-badge">
				<?php if($popup_type == 'image_popup'){
					ssocial_image_popup($svc_social_link,$svc_social_img,'dribbble');
				}elseif($popup_type == 'goto'){
					ssocial_goto_link($svc_social_link);	
				}else{
					ssocial_instgarm_inline_popup_link($svc_social_link);
				}?>
				</div>
			</div>
			<div class="svc_content">
            	<?php if($dexcerpt != 'yes'){?>
				<div class="svc-text-wrapper">
					<div class="social-feed-text"><?php $svc_social_text = strip_tags($svc_social_text); echo social_convertHashtags(ssocial_get_words($svc_social_text,$svc_excerpt_length),'dribbble'); ?></div>
				</div>
                <?php }?>
				<div class="svc_top_author">
					<a class="svc-pull-left" href="<?php echo $svc_social_author_link;?>" target="_blank"><img class="media-object" src="<?php echo $svc_social_author_img;?>"></a>
					<div class="media-body"><p><span class="svc-author-title"><a class="svc-pull-left" href="<?php echo $svc_social_author_link;?>" target="_blank"><?php echo $svc_social_author_name;?></a></span> </p></div>
				</div>
			</div>
			<div class="svc_bottom_info svc_dribbble"><span class="svc-date"> <?php echo ssocial_time_elapsed_string(strtotime($svc_social_date));?></span><i class="fa fa-dribbble"></i></div>
		</div>
	<?php }
	
	if($skin == 's4'){?>
		<div class="ssocial-instagram-wrapper ssocial-dribbble-skin-<?php echo $skin;?>">
        <?php if($svc_social_img && $svc_social_img != NULL){?>
			<div class="featured-image">
				<a class="full-cover-link" href="<?php echo $svc_social_link; ?>" target="_blank"></a>
				<img src="<?php echo $svc_social_img; ?>">
				<div class="image-hover-overlay"></div>
				<div class="post-type-badge">
				<?php if($popup_type == 'image_popup'){
					ssocial_image_popup($svc_social_link,$svc_social_img,'dribbble');
				}elseif($popup_type == 'goto'){
					ssocial_goto_link($svc_social_link);	
				}else{
					ssocial_dribbble_inline_popup_link($svc_social_link,get_the_ID());
				}?>
				</div>
			</div>
         <?php }?>
         	<div class="ssocial_icon_container"><div class="ssocial_formate_icon"><i class="fa fa-dribbble"></i></div></div>
         <?php if($dexcerpt != 'yes' || $duser != 'yes' || $ddate != 'yes'){?>
			<div class="ssocial-instagram-title">
            	<?php if($duser != 'yes'){?>
                <a href="<?php echo $svc_social_author_link;?>" target="_blank"><img class="social_author_media" src="<?php echo $svc_social_author_img;?>"> <?php echo $svc_social_author_name;?></a>
                <?php }
				if($ddate != 'yes'){?>
				<div class="social_insta_date"><?php echo ssocial_time_elapsed_string(strtotime($svc_social_date));?></div>
                <?php }
				if($dexcerpt != 'yes'){?>
				<span> 
					<?php $svc_social_text = strip_tags($svc_social_text);
					echo social_convertHashtags(ssocial_get_words($svc_social_text,$svc_excerpt_length),'dribbble');?>
				</span>
                <?php }?>
			</div>
        <?php }?>
		</div>
	<?php }
		$m = ob_get_clean();
		echo $m; 
}
function ssocial_pinterest_feed_data($skin,$lauyout_array){
	ob_start();
	extract($lauyout_array);
	$svc_social_text = get_post_meta(get_the_ID(), '_svc_social_text', true);
	$svc_social_link = get_post_meta(get_the_ID(), '_svc_social_link', true);
	$svc_social_img =  get_post_meta(get_the_ID() , '_svc_social_img', true);
	
	$svc_social_author_name = get_post_meta(get_the_ID() , '_svc_social_author_name', true);
	$svc_social_author_img = get_post_meta(get_the_ID() , '_svc_social_author_img', true);
	$svc_social_author_link = get_post_meta(get_the_ID() , '_svc_social_author_link', true);
	$svc_social_date = get_post_meta(get_the_ID() , '_svc_social_date', true);
	if($skin == 's1'){?>
		<div class="ssocial-instagram-wrapper ssocial-pinterest-skin-<?php echo $skin;?>">
        <?php if($svc_social_img && $svc_social_img != NULL){?>
			<div class="featured-image">
				<a class="full-cover-link" href="<?php echo $svc_social_link; ?>" target="_blank"></a>
				<img src="<?php echo $svc_social_img; ?>">
				<div class="image-hover-overlay"></div>
				<div class="post-type-badge">
				<?php //ssocial_format_type($svc_social_link,'facebook');
				if($popup_type == 'image_popup'){
					ssocial_image_popup($svc_social_link,$svc_social_img,'pinterest');
				}elseif($popup_type == 'goto'){
					ssocial_goto_link($svc_social_link);	
				}else{
					ssocial_pinterest_inline_popup_link($svc_social_link,get_the_ID());
				}?>
				</div>
			</div>
         <?php }
		 if($dexcerpt != 'yes' || $duser != 'yes' || $ddate != 'yes'){?>
			<div class="ssocial-instagram-title">
            	<?php if($dexcerpt != 'yes'){?>
				<span> 
					<?php $svc_social_text = strip_tags($svc_social_text);
					echo social_convertHashtags(ssocial_get_words($svc_social_text,$svc_excerpt_length),'pinterest');?>
				</span>
                <?php }
				if($duser != 'yes'){?>
                <a href="<?php echo $svc_social_author_link;?>" target="_blank"><img class="social_author_media" src="<?php echo $svc_social_author_img;?>"> <?php echo $svc_social_author_name;?></a>
                <?php }
				if($ddate != 'yes' && $svc_social_date && $svc_social_date != NULL){?>
				<div class="social_insta_date"><?php echo ssocial_time_elapsed_string(strtotime($svc_social_date));?></div>
                <?php }?>
			</div>
        <?php }?>
		</div>
	<?php }
	
	if($skin == 's2'){?>
		<div class="ssocial-instagram-wrapper ssocial-pinterest-skin-<?php echo $skin;?>">
        <?php if($svc_social_img && $svc_social_img != NULL){?>
			<div class="featured-image">
				<a class="full-cover-link" href="<?php echo $svc_social_link; ?>" target="_blank"></a>
				<img src="<?php echo $svc_social_img; ?>">
				<div class="image-hover-overlay"></div>
				<div class="post-type-badge">
				<?php //ssocial_format_type($svc_social_link,'facebook');
				if($popup_type == 'image_popup'){
					ssocial_image_popup($svc_social_link,$svc_social_img,'pinterest');
				}elseif($popup_type == 'goto'){
					ssocial_goto_link($svc_social_link);	
				}else{
					ssocial_pinterest_inline_popup_link($svc_social_link,get_the_ID());
				}?>
				</div>
                <div class="ssocial_formate_icon"><i class="fa fa-pinterest-p"></i></div>
			</div>
         <?php }
		 if($dexcerpt != 'yes' || $duser != 'yes' || $ddate != 'yes'){?>
			<div class="ssocial-instagram-title">
            	<?php if($dexcerpt != 'yes'){?>
				<span> 
					<?php $svc_social_text = strip_tags($svc_social_text);
					echo social_convertHashtags(ssocial_get_words($svc_social_text,$svc_excerpt_length),'pinterest');?>
				</span>
                <?php }
				if($duser != 'yes'){?>
                <a href="<?php echo $svc_social_author_link;?>" target="_blank"><img class="social_author_media" src="<?php echo $svc_social_author_img;?>"> <?php echo $svc_social_author_name;?></a>
                <?php }
				if($ddate != 'yes' && $svc_social_date && $svc_social_date != NULL){?>
				<div class="social_insta_date"><?php echo ssocial_time_elapsed_string(strtotime($svc_social_date));?></div>
                <?php }?>
			</div>
        <?php }?>
		</div>
	<?php }
	
	if($skin == 's3'){?>
		<div class="ssocial-instagram-wrapper ssocial-instagram-skin-<?php echo $skin;?>">
			<div class="featured-image">
				<a class="full-cover-link" href="<?php echo $svc_social_link; ?>" target="_blank"></a>
				<img src="<?php echo $svc_social_img; ?>">
				<div class="image-hover-overlay"></div>
				<div class="post-type-badge">
				<?php if($popup_type == 'image_popup'){
					ssocial_image_popup($svc_social_link,$svc_social_img,'pinterest');
				}elseif($popup_type == 'goto'){
					ssocial_goto_link($svc_social_link);	
				}else{
					ssocial_pinterest_inline_popup_link($svc_social_link);
				}?>
				</div>
			</div>
			<div class="svc_content">
            	<?php if($dexcerpt != 'yes'){?>
				<div class="svc-text-wrapper">
					<div class="social-feed-text"><?php $svc_social_text = strip_tags($svc_social_text); echo social_convertHashtags(ssocial_get_words($svc_social_text,$svc_excerpt_length),'pinterest'); ?></div>
				</div>
                <?php }?>
				<div class="svc_top_author">
					<a class="svc-pull-left" href="<?php echo $svc_social_author_link;?>" target="_blank"><img class="media-object" src="<?php echo $svc_social_author_img;?>"></a>
					<div class="media-body"><p><span class="svc-author-title"><a class="svc-pull-left" href="<?php echo $svc_social_author_link;?>" target="_blank"><?php echo $svc_social_author_name;?></a></span> </p></div>
				</div>
			</div>
			<div class="svc_bottom_info svc_pinterest"><span class="svc-date"> <?php echo ssocial_time_elapsed_string(strtotime($svc_social_date));?></span><i class="fa fa-pinterest-p"></i></div>
		</div>
	<?php }
	
	if($skin == 's4'){?>
		<div class="ssocial-instagram-wrapper ssocial-pinterest-skin-<?php echo $skin;?>">
        <?php if($svc_social_img && $svc_social_img != NULL){?>
			<div class="featured-image">
				<a class="full-cover-link" href="<?php echo $svc_social_link; ?>" target="_blank"></a>
				<img src="<?php echo $svc_social_img; ?>">
				<div class="image-hover-overlay"></div>
				<div class="post-type-badge">
				<?php if($popup_type == 'image_popup'){
					ssocial_image_popup($svc_social_link,$svc_social_img,'pinterest');
				}elseif($popup_type == 'goto'){
					ssocial_goto_link($svc_social_link);	
				}else{
					ssocial_pinterest_inline_popup_link($svc_social_link,get_the_ID());
				}?>
				</div>
			</div>
         <?php }?>
         	<div class="ssocial_icon_container"><div class="ssocial_formate_icon"><i class="fa fa-pinterest-p"></i></div></div>
         <?php if($dexcerpt != 'yes' || $duser != 'yes' || $ddate != 'yes'){?>
			<div class="ssocial-instagram-title">
            	<?php if($duser != 'yes'){?>
                <a href="<?php echo $svc_social_author_link;?>" target="_blank"><img class="social_author_media" src="<?php echo $svc_social_author_img;?>"> <?php echo $svc_social_author_name;?></a>
                <?php }
				if($ddate != 'yes' && $svc_social_date && $svc_social_date != NULL){?>
				<div class="social_insta_date"><?php echo ssocial_time_elapsed_string(strtotime($svc_social_date));?></div>
                <?php }
				if($dexcerpt != 'yes'){?>
				<span> 
					<?php $svc_social_text = strip_tags($svc_social_text);
					echo social_convertHashtags(ssocial_get_words($svc_social_text,$svc_excerpt_length),'pinterest');?>
				</span>
                <?php }?>
			</div>
        <?php }?>
		</div>
	<?php }
		$m = ob_get_clean();
		echo $m; 
}
function ssocial_vk_feed_data($skin,$lauyout_array){
	ob_start();
	extract($lauyout_array);
	$svc_social_text = get_post_meta(get_the_ID(), '_svc_social_text', true);
	$svc_social_link = get_post_meta(get_the_ID(), '_svc_social_link', true);
	$svc_social_img =  get_post_meta(get_the_ID() , '_svc_social_img', true);
	
	$svc_social_author_name = get_post_meta(get_the_ID() , '_svc_social_author_name', true);
	$svc_social_author_img = get_post_meta(get_the_ID() , '_svc_social_author_img', true);
	$svc_social_author_link = get_post_meta(get_the_ID() , '_svc_social_author_link', true);
	$svc_social_date = get_post_meta(get_the_ID() , '_svc_social_date', true);
	if($skin == 's1'){?>
		<div class="ssocial-instagram-wrapper ssocial-vk-skin-<?php echo $skin;?>">
        <?php if($svc_social_img && $svc_social_img != NULL){?>
			<div class="featured-image">
            	<?php if($svc_social_img && $svc_social_img != NULL){?>
				<a class="full-cover-link" href="<?php echo $svc_social_link; ?>" target="_blank"></a>
				<img src="<?php echo $svc_social_img; ?>">
                <?php }?>
				<div class="image-hover-overlay"></div>
				<div class="post-type-badge">
				<?php //ssocial_format_type($svc_social_link,'facebook');
				if($popup_type == 'image_popup'){
					ssocial_image_popup($svc_social_link,$svc_social_img,'vk');
				}elseif($popup_type == 'goto'){
					ssocial_goto_link($svc_social_link);	
				}else{
					ssocial_vk_inline_popup_link($svc_social_link,get_the_ID());
				}?>
				</div>
			</div>
         <?php }
		 if($dexcerpt != 'yes' || $duser != 'yes' || $ddate != 'yes'){?>
			<div class="ssocial-instagram-title">
            	<?php if($dexcerpt != 'yes'){?>
				<span> 
					<?php $svc_social_text = strip_tags($svc_social_text);
					echo social_convertHashtags(ssocial_get_words($svc_social_text,$svc_excerpt_length),'vk');?>
				</span>
                <?php }
				if($duser != 'yes'){?>
                <a href="<?php echo $svc_social_author_link;?>" target="_blank"><img class="social_author_media" src="<?php echo $svc_social_author_img;?>"> <?php echo $svc_social_author_name;?></a>
                <?php }
				if($ddate != 'yes' && $svc_social_date && $svc_social_date != NULL){?>
				<div class="social_insta_date"><?php echo ssocial_time_elapsed_string($svc_social_date);?></div>
                <?php }?>
			</div>
        <?php }?>
		</div>
	<?php }
	
	if($skin == 's2'){?>
		<div class="ssocial-instagram-wrapper ssocial-vk-skin-<?php echo $skin;?>">
        <?php if($svc_social_img && $svc_social_img != NULL){?>
			<div class="featured-image">
            	<?php if($svc_social_img && $svc_social_img != NULL){?>
				<a class="full-cover-link" href="<?php echo $svc_social_link; ?>" target="_blank"></a>
				<img src="<?php echo $svc_social_img; ?>">
                <?php }?>
				<div class="image-hover-overlay"></div>
				<div class="post-type-badge">
				<?php //ssocial_format_type($svc_social_link,'facebook');
				if($popup_type == 'image_popup'){
					ssocial_image_popup($svc_social_link,$svc_social_img,'vk');
				}elseif($popup_type == 'goto'){
					ssocial_goto_link($svc_social_link);	
				}else{
					ssocial_vk_inline_popup_link($svc_social_link,get_the_ID());
				}?>
				</div>
                <div class="ssocial_formate_icon"><i class="fa fa-vk"></i></div>
			</div>
         <?php }
		 if($dexcerpt != 'yes' || $duser != 'yes' || $ddate != 'yes'){?>
			<div class="ssocial-instagram-title">
            	<?php if($dexcerpt != 'yes'){?>
				<span> 
					<?php $svc_social_text = strip_tags($svc_social_text);
					echo social_convertHashtags(ssocial_get_words($svc_social_text,$svc_excerpt_length),'vk');?>
				</span>
                <?php }
				if($duser != 'yes'){?>
                <a href="<?php echo $svc_social_author_link;?>" target="_blank"><img class="social_author_media" src="<?php echo $svc_social_author_img;?>"> <?php echo $svc_social_author_name;?></a>
                <?php }
				if($ddate != 'yes' && $svc_social_date && $svc_social_date != NULL){?>
				<div class="social_insta_date"><?php echo ssocial_time_elapsed_string($svc_social_date);?></div>
                <?php }?>
			</div>
        <?php }?>
		</div>
	<?php }
	
	if($skin == 's3'){?>
		<div class="ssocial-instagram-wrapper ssocial-vk-skin-<?php echo $skin;?>">
			<div class="featured-image">
            	<?php if($svc_social_img && $svc_social_img != NULL){?>
				<a class="full-cover-link" href="<?php echo $svc_social_link; ?>" target="_blank"></a>
				<img src="<?php echo $svc_social_img; ?>">
                <?php }?>
				<div class="image-hover-overlay"></div>
				<div class="post-type-badge">
				<?php if($popup_type == 'image_popup'){
					ssocial_image_popup($svc_social_link,$svc_social_img,'vk');
				}elseif($popup_type == 'goto'){
					ssocial_goto_link($svc_social_link);	
				}else{
					ssocial_vk_inline_popup_link($svc_social_link);
				}?>
				</div>
			</div>
			<div class="svc_content">
            	<?php if($dexcerpt != 'yes'){?>
				<div class="svc-text-wrapper">
					<div class="social-feed-text"><?php $svc_social_text = strip_tags($svc_social_text); echo social_convertHashtags(ssocial_get_words($svc_social_text,$svc_excerpt_length),'vk'); ?></div>
				</div>
                <?php }?>
				<div class="svc_top_author">
					<a class="svc-pull-left" href="<?php echo $svc_social_author_link;?>" target="_blank"><img class="media-object" src="<?php echo $svc_social_author_img;?>"></a>
					<div class="media-body"><p><span class="svc-author-title"><a class="svc-pull-left" href="<?php echo $svc_social_author_link;?>" target="_blank"><?php echo $svc_social_author_name;?></a></span> </p></div>
				</div>
			</div>
			<div class="svc_bottom_info svc_vk"><span class="svc-date"> <?php echo ssocial_time_elapsed_string($svc_social_date);?></span><i class="fa fa-vk"></i></div>
		</div>
	<?php }
	
	if($skin == 's4'){?>
		<div class="ssocial-instagram-wrapper ssocial-vk-skin-<?php echo $skin;?>">
        <?php if($svc_social_img && $svc_social_img != NULL){?>
			<div class="featured-image">
            	<?php if($svc_social_img && $svc_social_img != NULL){?>
				<a class="full-cover-link" href="<?php echo $svc_social_link; ?>" target="_blank"></a>
				<img src="<?php echo $svc_social_img; ?>">
                <?php }?>
				<div class="image-hover-overlay"></div>
				<div class="post-type-badge">
				<?php if($popup_type == 'image_popup'){
					ssocial_image_popup($svc_social_link,$svc_social_img,'vk');
				}elseif($popup_type == 'goto'){
					ssocial_goto_link($svc_social_link);	
				}else{
					ssocial_vk_inline_popup_link($svc_social_link,get_the_ID());
				}?>
				</div>
			</div>
         <?php }?>
         	<div class="ssocial_icon_container"><div class="ssocial_formate_icon"><i class="fa fa-vk"></i></div></div>
         <?php if($dexcerpt != 'yes' || $duser != 'yes' || $ddate != 'yes'){?>
			<div class="ssocial-instagram-title">
            	<?php if($duser != 'yes'){?>
                <a href="<?php echo $svc_social_author_link;?>" target="_blank"><img class="social_author_media" src="<?php echo $svc_social_author_img;?>"> <?php echo $svc_social_author_name;?></a>
                <?php }
				if($ddate != 'yes' && $svc_social_date && $svc_social_date != NULL){?>
				<div class="social_insta_date"><?php echo ssocial_time_elapsed_string($svc_social_date);?></div>
                <?php }
				if($dexcerpt != 'yes'){?>
				<span> 
					<?php $svc_social_text = strip_tags($svc_social_text);
					echo social_convertHashtags(ssocial_get_words($svc_social_text,$svc_excerpt_length),'vk');?>
				</span>
                <?php }?>
			</div>
        <?php }?>
		</div>
	<?php }
		$m = ob_get_clean();
		echo $m; 
}
function ssocial_blockquote_data($skin,$lauyout_array){
	extract($lauyout_array);
	//$ssocial_layout = new ssocial_layout();
	//$options = $ssocial_layout->ssocial_get_options();
	$svc_social_author_name = get_post_meta(get_the_ID() , '_svc_social_author_name', true);
	$quote = get_post_meta(get_the_ID(), '_blockquote_content', true);
        $quote_author = get_post_meta(get_the_ID(), '_blockquote_author', true);
		ob_start();
        if (!empty($quote)){
		if($skin == 's1'){?>
        <div class="ssocial-instagram-wrapper ssocial-blockquote-skin-<?php echo $skin;?>">			
			<div class="ssocial-instagram-title">
				<span> 
					<?php echo $quote; ?>
					<span class="sscoial_author_name">- <?php echo $svc_social_author_name;?></span>
				</span>
			</div>
		</div>		
        <?php }
		
		if($skin == 's2'){?>
        <div class="ssocial-instagram-wrapper ssocial-blockquote-skin-<?php echo $skin;?>">
			
			<div class="ssocial-instagram-title">
				<span> 
					<?php echo $quote; ?>
					<span class="sscoial_author_name">- <?php echo $svc_social_author_name;?></span>
				</span>
			</div>
		</div>		
        <?php }
		
		if($skin == 's3'){?>
        <div class="ssocial-instagram-wrapper ssocial-blockquote-skin-<?php echo $skin;?>">
			<div class="ssocial-instagram-title">
				<span> 
					<?php echo $quote; ?>
					<span class="sscoial_author_name">- <?php echo $svc_social_author_name;?></span>
				</span>
			</div>
            <div class="svc_bottom_info svc_blockquote"><i class="fa fa-quote-left"></i></div>
		</div>
	<?php }
	
		if($skin == 's4'){?>
        <div class="ssocial-instagram-wrapper ssocial-blockquote-skin-<?php echo $skin;?>">
        	<div class="ssocial_icon_container"><div class="ssocial_formate_icon"><i class="fa fa-quote-left"></i></div></div>		
			<div class="ssocial-instagram-title">
				<span> 
					<?php echo $quote; ?>
					<span class="sscoial_author_name">- <?php echo $svc_social_author_name;?></span>
				</span>
			</div>
		</div>		
        <?php }
	
		}
		$m = ob_get_clean();
		echo $m;
}
function ssocial_instagram_feed_data($skin,$lauyout_array){
	extract($lauyout_array);
	//$title = get_post_meta(get_the_ID() , '_svc_social_title', true);
	$svc_social_text = get_post_meta(get_the_ID(), '_svc_social_text', true);
	$svc_social_link = get_post_meta(get_the_ID(), '_svc_social_link', true);
	$svc_social_img =  get_post_meta(get_the_ID() , '_svc_social_img', true);
	
	$svc_social_author_name = get_post_meta(get_the_ID() , '_svc_social_author_name', true);
	$svc_social_author_img = get_post_meta(get_the_ID() , '_svc_social_author_img', true);
	$svc_social_author_link = get_post_meta(get_the_ID() , '_svc_social_author_link', true);
	$svc_social_date = get_post_meta(get_the_ID() , '_svc_social_date', true);
	$svc_social_media = get_post_meta(get_the_ID() , '_svc_social_media', true);
	$svc_social_media_url = get_post_meta(get_the_ID() , '_svc_social_media_url', true);
	
	ob_start();
	if($skin == 's1'){?>
		<div class="ssocial-instagram-wrapper ssocial-instagram-skin-<?php echo $skin;?>">
        <?php if($svc_social_img && $svc_social_img != NULL){?>
			<div class="featured-image">
            	<?php if($popup_type == 'image_popup' && $svc_social_media){?>
                    <a class="full-cover-link svc_video_play ajax-insta-popup-link-special-video" href="<?php echo $svc_social_link; ?>" data-mfp-src="<?php echo admin_url( 'admin-ajax.php' ).'?action=ssocial_inline_social_popup_special&network=instagram&video_url='.$svc_social_media_url;?>"></a>
                <?php }elseif($popup_type == 'content_popup' && $svc_social_media){?>
                	<a class="full-cover-link svc_video_play ajax-insta-popup-link" href="<?php echo $svc_social_link; ?>" data-mfp-src="<?php echo admin_url( 'admin-ajax.php' ).'?action=ssocial_inline_social_popup&network=instagram&url='.$svc_social_link;?>"></a>
				<?php }elseif($popup_type == 'goto' && $svc_social_media){?>
				<a class="full-cover-link svc_video_play" href="<?php echo $svc_social_link; ?>" target="_blank"></a>
                <?php }else{?>
				<a class="full-cover-link" href="<?php echo $svc_social_link; ?>" target="_blank"></a>
                <?php }?>
				<img src="<?php echo $svc_social_img; ?>">
				<div class="image-hover-overlay"></div>
				<div class="post-type-badge">
				<?php if($popup_type == 'image_popup' && !$svc_social_media){
					ssocial_image_popup($svc_social_link,$svc_social_img,'instagram');
				}elseif($popup_type == 'goto' && !$svc_social_media){
					ssocial_goto_link($svc_social_link);	
				}elseif($popup_type == 'content_popup' && !$svc_social_media){
					ssocial_instgarm_inline_popup_link($svc_social_link);
				}?>
				</div>
			</div>
            <?php }
			if($dexcerpt != 'yes' || $duser != 'yes' || $ddate != 'yes'){?>
			<div class="ssocial-instagram-title">
            	<?php if($dexcerpt != 'yes'){?>
				<span><?php echo social_convertHashtags(ssocial_get_words($svc_social_text,$svc_excerpt_length),'instagram'); ?></span>
                <?php }
				if($duser != 'yes'){?>
                <a href="<?php echo $svc_social_author_link;?>" target="_blank"><img class="social_author_media" src="<?php echo $svc_social_author_img;?>"> @<?php echo $svc_social_author_name;?></a>
                <?php }
				if($ddate != 'yes'){?>
				<div class="social_insta_date"><?php echo ssocial_time_elapsed_string($svc_social_date);?></div>
                <?php }?>
			</div>
            <?php }?>
		</div>
	<?php }
	if($skin == 's2'){?>
		<div class="ssocial-instagram-wrapper ssocial-instagram-skin-<?php echo $skin;?>">
        <?php if($svc_social_img && $svc_social_img != NULL){?>
			<div class="featured-image">
            	<?php if($popup_type == 'image_popup' && $svc_social_media){?>
                    <a class="full-cover-link svc_video_play ajax-insta-popup-link-special-video" href="<?php echo $svc_social_link; ?>" data-mfp-src="<?php echo admin_url( 'admin-ajax.php' ).'?action=ssocial_inline_social_popup_special&network=instagram&video_url='.$svc_social_media_url;?>"></a>
                <?php }elseif($popup_type == 'content_popup' && $svc_social_media){?>
                	<a class="full-cover-link svc_video_play ajax-insta-popup-link" href="<?php echo $svc_social_link; ?>" data-mfp-src="<?php echo admin_url( 'admin-ajax.php' ).'?action=ssocial_inline_social_popup&network=instagram&url='.$svc_social_link;?>"></a>
				<?php }elseif($popup_type == 'goto' && $svc_social_media){?>
				<a class="full-cover-link svc_video_play" href="<?php echo $svc_social_link; ?>" target="_blank"></a>
                <?php }else{?>
				<a class="full-cover-link" href="<?php echo $svc_social_link; ?>" target="_blank"></a>
                <?php }?>
				<img src="<?php echo $svc_social_img; ?>">
				<div class="image-hover-overlay"></div>
				<div class="post-type-badge">
				<?php if($popup_type == 'image_popup' && !$svc_social_media){
					ssocial_image_popup($svc_social_link,$svc_social_img,'instagram');
				}elseif($popup_type == 'goto' && !$svc_social_media){
					ssocial_goto_link($svc_social_link);	
				}elseif($popup_type == 'content_popup' && !$svc_social_media){
					ssocial_instgarm_inline_popup_link($svc_social_link);
				}?>
				</div>
                <div class="ssocial_formate_icon"><i class="fa fa-instagram"></i></div>
			</div>
            <?php }
			if($dexcerpt != 'yes' || $duser != 'yes' || $ddate != 'yes'){?>
			<div class="ssocial-instagram-title">
            	<?php if($dexcerpt != 'yes'){?>
				<span><?php echo social_convertHashtags(ssocial_get_words($svc_social_text,$svc_excerpt_length),'instagram'); ?></span>
                <?php }
				if($duser != 'yes'){?>
                <a href="<?php echo $svc_social_author_link;?>" target="_blank"><img class="social_author_media" src="<?php echo $svc_social_author_img;?>"> @<?php echo $svc_social_author_name;?></a>
                <?php }
				if($ddate != 'yes'){?>
				<div class="social_insta_date"><?php echo ssocial_time_elapsed_string($svc_social_date);?></div>
                <?php }?>
			</div>
            <?php }?>
		</div>
	<?php }
	
	if($skin == 's3'){?>
		<div class="ssocial-instagram-wrapper ssocial-instagram-skin-<?php echo $skin;?>">
			<div class="featured-image">
				<?php if($popup_type == 'image_popup' && $svc_social_media){?>
                    <a class="full-cover-link svc_video_play ajax-insta-popup-link-special-video" href="<?php echo $svc_social_link; ?>" data-mfp-src="<?php echo admin_url( 'admin-ajax.php' ).'?action=ssocial_inline_social_popup_special&network=instagram&video_url='.$svc_social_media_url;?>"></a>
                <?php }elseif($popup_type == 'content_popup' && $svc_social_media){?>
                	<a class="full-cover-link svc_video_play ajax-insta-popup-link" href="<?php echo $svc_social_link; ?>" data-mfp-src="<?php echo admin_url( 'admin-ajax.php' ).'?action=ssocial_inline_social_popup&network=instagram&url='.$svc_social_link;?>"></a>
				<?php }elseif($popup_type == 'goto' && $svc_social_media){?>
				<a class="full-cover-link svc_video_play" href="<?php echo $svc_social_link; ?>" target="_blank"></a>
                <?php }else{?>
				<a class="full-cover-link" href="<?php echo $svc_social_link; ?>" target="_blank"></a>
                <?php }?>
				<img src="<?php echo $svc_social_img; ?>">
				<div class="image-hover-overlay"></div>
				<div class="post-type-badge">
				<?php if($popup_type == 'image_popup' && !$svc_social_media){
					ssocial_image_popup($svc_social_link,$svc_social_img,'instagram');
				}elseif($popup_type == 'goto' && !$svc_social_media){
					ssocial_goto_link($svc_social_link);	
				}elseif($popup_type == 'content_popup' && !$svc_social_media){
					ssocial_instgarm_inline_popup_link($svc_social_link);
				}?>
				</div>
			</div>			
			<div class="svc_content">
            	<?php if($dexcerpt != 'yes'){?>
				<div class="svc-text-wrapper">
					<div class="social-feed-text"><?php echo social_convertHashtags(ssocial_get_words($svc_social_text,$svc_excerpt_length),'instagram'); ?></div>
				</div>
                <?php }?>
				<div class="svc_top_author">
					<a class="svc-pull-left" href="<?php echo $svc_social_author_link;?>" target="_blank"><img class="media-object" src="<?php echo $svc_social_author_img;?>"></a>
					<div class="media-body"><p><span class="svc-author-title"><a class="svc-pull-left" href="<?php echo $svc_social_author_link;?>" target="_blank"><?php echo $svc_social_author_name;?></a></span> </p></div>
				</div>
			</div>
			<div class="svc_bottom_info svc_instagram"><span class="svc-date"> <?php echo ssocial_time_elapsed_string($svc_social_date);?></span><i class="fa fa-instagram"></i></div>
		</div>
	<?php }
	
	if($skin == 's4'){?>
		<div class="ssocial-instagram-wrapper ssocial-instagram-skin-<?php echo $skin;?>">
        <?php if($svc_social_img && $svc_social_img != NULL){?>
			<div class="featured-image">
            	<?php if($popup_type == 'image_popup' && $svc_social_media){?>
                    <a class="full-cover-link svc_video_play ajax-insta-popup-link-special-video" href="<?php echo $svc_social_link; ?>" data-mfp-src="<?php echo admin_url( 'admin-ajax.php' ).'?action=ssocial_inline_social_popup_special&network=instagram&video_url='.$svc_social_media_url;?>"></a>
                <?php }elseif($popup_type == 'content_popup' && $svc_social_media){?>
                	<a class="full-cover-link svc_video_play ajax-insta-popup-link" href="<?php echo $svc_social_link; ?>" data-mfp-src="<?php echo admin_url( 'admin-ajax.php' ).'?action=ssocial_inline_social_popup&network=instagram&url='.$svc_social_link;?>"></a>
				<?php }elseif($popup_type == 'goto' && $svc_social_media){?>
				<a class="full-cover-link svc_video_play" href="<?php echo $svc_social_link; ?>" target="_blank"></a>
                <?php }else{?>
				<a class="full-cover-link" href="<?php echo $svc_social_link; ?>" target="_blank"></a>
                <?php }?>
				<img src="<?php echo $svc_social_img; ?>">
				<div class="image-hover-overlay"></div>
				<div class="post-type-badge">
				<?php if($popup_type == 'image_popup' && !$svc_social_media){
					ssocial_image_popup($svc_social_link,$svc_social_img,'instagram');
				}elseif($popup_type == 'goto' && !$svc_social_media){
					ssocial_goto_link($svc_social_link);	
				}elseif($popup_type == 'content_popup' && !$svc_social_media){
					ssocial_instgarm_inline_popup_link($svc_social_link);
				}?>
				</div>
			</div>
            <?php }?>
            <div class="ssocial_icon_container"><div class="ssocial_formate_icon"><i class="fa fa-instagram"></i></div></div>
            <?php
			if($dexcerpt != 'yes' || $duser != 'yes' || $ddate != 'yes'){?>
			<div class="ssocial-instagram-title">
            	<?php if($duser != 'yes'){?>
                <a href="<?php echo $svc_social_author_link;?>" target="_blank"><img class="social_author_media" src="<?php echo $svc_social_author_img;?>"> @<?php echo $svc_social_author_name;?></a>
                <?php }
				if($ddate != 'yes'){?>
				<div class="social_insta_date"><?php echo ssocial_time_elapsed_string($svc_social_date);?></div>
                <?php }
				if($dexcerpt != 'yes'){?>
				<span><?php echo social_convertHashtags(ssocial_get_words($svc_social_text,$svc_excerpt_length),'instagram'); ?></span>
                <?php }?>
			</div>
            <?php }?>
		</div>
	<?php }
	
		$m = ob_get_clean();
        echo $m;
}