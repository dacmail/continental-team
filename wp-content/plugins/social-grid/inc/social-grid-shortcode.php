<?php
function ssocial_grid_shortcode($attr,$content=null){
	global $wpdb,$animate_slider_table;
	$grid_table = $wpdb->base_prefix.$animate_slider_table;
	$cat_id = $taxonomi_name = $tag_id = $post_id = '';
	extract(shortcode_atts( array(
		'id' => ''
	), $attr));
	$grid_data = $wpdb->get_row("select * from ".$grid_table." where id=".$id);
	if(count($grid_data) == 1){
		$grid = unserialize($grid_data->slider_params);
		$social_type_array = implode(',',$grid["social_type"]);//serialize($grid["social_type"]);
		//echo $social_type_array;
		//print_r(  );die;
		return do_shortcode('[social_layout svc_type="'.$grid["grid_type"].'" query_loop="size:'.$grid["post_count"].'|order_by:'.$grid["order_by"].'|order:'.$grid["order"].'|post_type:'.implode(",",$grid["post_type"]).'" social_type="'.$social_type_array.'" skin_type="'.$grid["skin_type"].'" car_display_item="'.$grid["car_display_item"].'" car_pagination="'.$grid["car_pagination"].'" car_pagination_num="'.$grid["car_pagination_num"].'" car_navigation="'.$grid["car_navigation"].'" car_autoplay="'.$grid["car_autoplay"].'" car_autoplay_time="'.$grid["car_autoplay_time"].'" grid_columns_count_for_desktop="'.$grid["grid_columns_count_for_desktop"].'" grid_columns_count_for_tablet="'.$grid["grid_columns_count_for_tablet"].'" grid_columns_count_for_mobile="'.$grid["grid_columns_count_for_mobile"].'" filter="'.$grid["filter"].'" exclude_texo="'.$grid["exclude_texo"].'" grid_layout_mode="'.$grid["grid_layout_mode"].'" s5_min_height="'.$grid["s5_min_height"].'" svc_excerpt_length="'.$grid["svc_excerpt_length"].'" load_more="'.$grid["load_more"].'" hide_showmore="'.$grid["hide_showmore"].'" dexcerpt="'.$grid["dexcerpt"].'" ddate="'.$grid["ddate"].'" duser="'.$grid["duser"].'" dvideo_title="'.$grid["dvideo_title"].'" hide_social_share="'.$grid["hide_social_share"].'" effect="'.$grid["effect"].'" viewport="'.$grid["viewport"].'" loadmore_text="'.$grid["loadmore_text"].'" svc_class="'.$grid["svc_class"].'" title="'.$grid["title"].'" pbgcolor="'.$grid["pbgcolor"].'" tcolor="'.$grid["tcolor"].'" tsize="'.$grid["tsize"].'" descolor="'.$grid["descolor"].'" dessize="'.$grid["dessize"].'" twitter_size="'.$grid["twitter_size"].'" linkcolor="'.$grid["linkcolor"].'" overlay_color="'.$grid["overlay_color"].'" load_more_color="'.$grid["load_more_color"].'" filter_text_color="'.$grid["filter_text_color"].'" filter_text_active_color="'.$grid["filter_text_active_color"].'" filter_text_active_bgcolor="'.$grid["filter_text_active_bgcolor"].'" pagination_bgcolor="'.$grid["pagination_bgcolor"].'" pagination_active_bgcolor="'.$grid["pagination_active_bgcolor"].'" pagination_number_color="'.$grid["pagination_number_color"].'" car_navigation_color="'.$grid["car_navigation_color"].'" popup_type="'.$grid["popup_type"].'"]');
	}else{
		_e('Not Found Social Grid.','ssocial');
	}
}
function ssocial_layout_shortcode($attr,$content=null){
	extract(shortcode_atts( array(
		'title' => '',
		'svc_type' => '',
		'query_loop' => '',
		'social_type' => '',
		'skin_type' => 's1',
		'car_display_item' => '',
		'car_pagination' => '',
		'car_pagination_num' => '',
		'car_navigation' => '',
		'car_autoplay' => '',
		'car_autoplay_time' => '',
		'grid_columns_count_for_desktop' => '',
		'grid_columns_count_for_tablet' => '',
		'grid_columns_count_for_mobile' => '',
		'filter' => '',
		'exclude_texo' => '',
		'grid_layout_mode' => 'masonry',
		's5_min_height' => '',
		'svc_excerpt_length' => '20',
		'load_more' => '',
		'hide_showmore' => '',
		'effect' => '',
		'viewport' => '',
		'loadmore_text' => '',
		'svc_class' => '',
		'dexcerpt' => '',
		'ddate' => '',
		'duser' => '',
		'dvideo_title' => '',
		'hide_social_share' => '',
		'pbgcolor' => '',
		'tcolor' => '',
		'tsize' => '18',
		'dessize' => '14',
		'twitter_size' => '19',
		'descolor' => '',
		'linkcolor' => '',
		'overlay_color' => '',
		'load_more_color' => '',
		'filter_text_color' => '',
		'filter_text_active_color' => '',
		'filter_text_active_bgcolor' => '',
		'pagination_bgcolor' => '',
		'pagination_active_bgcolor' => '',
		'pagination_number_color' => '',
		'car_navigation_color' => '',
		'popup_type' => 'image_popup',
		'paged' => '1',
		'svc_grid_id' => '',
		'ajax' => '0'
	), $attr));
	$social_type = explode(',',$social_type);
	//print_r($social_type);die;
	/*wp_register_style( 'svc-post-grid-css', plugins_url('css/css.css', __FILE__));
	wp_enqueue_style( 'svc-post-grid-css');
	wp_enqueue_style( 'svc-bootstrap-css' );
	wp_enqueue_style( 'svc-megnific-css' );
	wp_enqueue_style( 'svc-animate-css');
	
	wp_enqueue_script('svc-imagesloaded-js');
	wp_enqueue_script('svc-isotop-js');
	wp_enqueue_script('svc-script-js');
	wp_enqueue_script('svc-megnific-js');
	wp_enqueue_script('svc-ddslick-js');
	wp_enqueue_script('svc-carousel-js');*/
	
	
	$var = get_defined_vars();
	$loop=$query_loop;
	$posts = array();
	if(empty($loop)) return;
	//$paged = 1;
	$query=$query_loop;
	$query=explode('|',$query);
	
	$query_posts_per_page=10;
	$query_post_type='social';
	$query_meta_key='';
	$query_orderby='date';
	$query_order='ASC';
	
	$query_by_id='';
	$query_by_id_not_in='';
	$query_by_id_in='';
	
	$query_categories='';
	$query_cat_not_in='';
	$query_cat_in='';
	$query_tags='';
	$query_tags_in='';
	$query_tags_not_in='';
	
	$query_author='';
	$query_author_in='';
	$query_author_not_in='';
	
	$query_tax_query='';
	
	foreach($query as $query_part){
		$q_part=explode(':',$query_part);
		switch($q_part[0])
		{
			case 'post_type':
				$query_post_type=explode(',',$q_part[1]);
			break;
			
			case 'size':
				$query_posts_per_page=($q_part[1]=='All' ? -1:$q_part[1]);
			break;
			
			case 'order_by':
				
				$query_orderby='';
				
				$public_orders_array=array('ID','date','author','title','modified','rand','comment_count','menu_order');
				if(in_array($q_part[1],$public_orders_array))
				{
					$query_orderby=$q_part[1];
				}
				
			break;
			
			case 'order':
				$query_order=$q_part[1];
			break;
			
			case 'by_id':
				$query_by_id=explode(',',$q_part[1]);
				$query_by_id_not_in=array();
				$query_by_id_in=array();
				foreach($query_by_id as $ids)
				{
					if($ids<0)
					{
						$query_by_id_not_in[]=$ids;
					}else{
						$query_by_id_in[]=$ids;
					}
				}
			break;
			
			case 'categories':
				$query_categories=explode(',',$q_part[1]);
				$query_cat_not_in=array();
				$query_cat_in=array();
				foreach($query_categories as $cat)
				{
					if($cat<0)
					{
						$query_cat_not_in[]=$cat;
					}else
					{
						$query_cat_in[]=$cat;
					}
				}
			break;
			
			case 'tags':
				$query_tags=explode(',',$q_part[1]);
				$query_tags_not_in=array();
				$query_tags_in=array();
				foreach($query_tags as $tags)
				{
					if($tags<0)
					{
						$query_tags_not_in[]=$tags;
					}else
					{
						$query_tags_in[]=$tags;
					}
				}
			break;
			
			case 'authors':
				$query_author=explode(',',$q_part[1]);
				$query_author_not_in=array();
				$query_author_in=array();
				foreach($query_author as $author)
				{
					if($tags<0)
					{
						$query_author_not_in[]=$author;
					}else
					{
						$query_author_in[]=$author;
					}
				}
				
			break;
			case 'tax_query':
				$all_tax=get_object_taxonomies( $query_post_type );
				$tax_query=array();
				$query_tax_query=array('relation' => 'AND');
				foreach ( $all_tax as $tax ) {
					$values=$tax;
					$query_taxs_in=array();
					$query_taxs_not_in=array();
					
					$query_taxs=explode(',',$q_part[1]);
					foreach($query_taxs as $taxs)
					{
						if(term_exists( absint($taxs), $tax )){
							if($taxs<0)
							{
								$query_taxs_not_in[]=absint($taxs);
							}else
							{
								$query_taxs_in[]=$taxs;
							}
						}
					}
					if(count($query_taxs_not_in)>0)
					{
						$query_tax_query[]=array(
							'taxonomy' => $tax,
							'field'    => 'id',
							'terms'    => $query_taxs_not_in,
							'operator' => 'NOT IN',
						);
					}else if(count($query_taxs_in)>0)
					{
						$query_tax_query[]=array(
							'taxonomy' => $tax,
							'field'    => 'id',
							'terms'    => $query_taxs_in,
							'operator' => 'IN',
						);
					}
					
					//break;
				}
				
			break;
		}
	}
//echo $query_post_type;die;
	$query_final=array(
		'post_type' => 'social',//$query_post_type,
		'post_status'=>'publish',
		'posts_per_page'=>$query_posts_per_page,
		'meta_key' => '_single_post_type',
		'meta_value' => $social_type,
		'orderby' => $query_orderby,
		'order' => $query_order,
		'paged'=>$paged,
		
		//'post__in'=>$query_by_id_in,
		//'post__not_in'=>$query_by_id_not_in,
		
		//'category__in'=>$query_cat_in,
		//'category__not_in'=>$query_cat_not_in,
		
		//'tag__in'=>$query_tags_in,
		//'tag__not_in'=>$query_tags_not_in,
		
		//'author__in'=>$query_author_in,
		//'author__not_in'=>$query_author_not_in,
		
		//'tax_query'=>$query_tax_query
	 );
	$exclude_texo_array = explode(',',$exclude_texo);
	$my_query = new WP_Query($query_final);	
	if(!$ajax){
		$svc_grid_id = rand(50,1000);
	}
	$var['svc_grid_id'] = $svc_grid_id;
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	ob_start();
	if(!$ajax){
	?>
	<style type="text/css">
	<?php if($dexcerpt == 'yes' && $duser == 'yes' && $ddate == 'yes' && $dvideo_title != 'yes'){?>
	.ssocil_video_title{ padding-bottom:0 !important;}
	<?php }
	if($filter_text_color != ''){?>
	.svc_categories_filter_<?php echo $svc_grid_id;?> li a{color:<?php echo $filter_text_color;?> !important;border:1px solid <?php echo $filter_text_color;?> !important;}
	<?php }?>
	.svc_categories_filter_<?php echo $svc_grid_id;?> li.active a{color:<?php echo $filter_text_active_color;?> !important;background:<?php echo $filter_text_active_bgcolor;?> !important;}
	
	nav.svc_infinite_<?php echo $svc_grid_id;?> div.loading-spinner .ui-spinner .side .fill{ background:<?php echo $load_more_color;?> !important;}
	<?php if($pagination_bgcolor != ''){?>
	.svc_pagination_<?php echo $svc_grid_id;?> a{ background:<?php echo $pagination_bgcolor;?> !important;}
	<?php }
	if($pagination_active_bgcolor != ''){?>
	.svc_pagination_<?php echo $svc_grid_id;?> a:hover,.svc_pagination_<?php echo $svc_grid_id;?> .current{background:<?php echo $pagination_active_bgcolor;?> !important;}
	<?php }
	if($pagination_number_color != ''){?>
	.svc_pagination_<?php echo $svc_grid_id;?> a:hover,.svc_pagination_<?php echo $svc_grid_id;?> a{color:<?php echo $pagination_number_color;?> !important;}
	<?php }
	if($svc_type == 'carousel' && $car_navigation_color != ''){?>
	.svc_carousel_container_<?php echo $svc_grid_id;?>.owl-theme .owl-controls .owl-buttons div,.svc_carousel_container_<?php echo $svc_grid_id;?>.owl-theme .owl-controls .owl-page span{ background:<?php echo $car_navigation_color;?> !important;}
	.svc_carousel2_container_<?php echo $svc_grid_id;?> .owl-item.synced:after{border-bottom: 8px solid <?php echo $car_navigation_color;?> !important;}
	.svc_carousel2_container_<?php echo $svc_grid_id;?> .owl-item.synced:before {border-bottom: 3px solid <?php echo $car_navigation_color;?> !important;}
	<?php }
	if($pbgcolor){?>
	.svc_post_grid_<?php echo $svc_grid_id;?> .ssocial_article .ssocial-isotop-item{ background:<?php echo $pbgcolor;?> !important;}
	<?php }
	if($tcolor){?>
	.svc_post_grid_<?php echo $svc_grid_id;?> .ssocial_article .ssocil_video_title{ color:<?php echo $tcolor;?> !important;}
	<?php 
	}
	if($tsize){?>
	.svc_post_grid_<?php echo $svc_grid_id;?> .ssocial_article .ssocil_video_title{font-size:<?php echo $tsize;?>px !important;}
	<?php }
	if($descolor){
		if($skin_type=='s3'){?>
			.svc_post_grid_<?php echo $svc_grid_id;?> .ssocial_article .ssocial-instagram-wrapper .social-feed-text,
			.svc_post_grid_<?php echo $svc_grid_id;?> .ssocial_article .ssocial-instagram-wrapper .ssocial-instagram-title span{ color:<?php echo $descolor;?> !important;}
		<?php }else{?>
			.svc_post_grid_<?php echo $svc_grid_id;?> .ssocial_article .ssocial-instagram-wrapper .ssocial-instagram-title span,
			.svc_post_grid_<?php echo $svc_grid_id;?> .ssocial_article .social_insta_date{color:<?php echo $descolor;?> !important;}
	<?php }
	}
	if($dessize){
		if($skin_type=='s3'){?>
			.svc_post_grid_<?php echo $svc_grid_id;?> .ssocial_article .ssocial-instagram-wrapper .social-feed-text{font-size:<?php echo $dessize;?>px !important;}
		<?php }else{?>
			.svc_post_grid_<?php echo $svc_grid_id;?> .ssocial_article .ssocial-instagram-wrapper .ssocial-instagram-title span{font-size:<?php echo $dessize;?>px !important;}
	<?php }
	}
	if($twitter_size){?>
	.svc_post_grid_<?php echo $svc_grid_id;?> .ssocial_article.svc_blockquote .ssocial-instagram-wrapper .ssocial-instagram-title span,
	.svc_post_grid_<?php echo $svc_grid_id;?> .ssocial_article.svc_twitter .ssocial-instagram-wrapper .ssocial-instagram-title span{font-size:<?php echo $twitter_size;?>px !important;}
	<?php }
	if($linkcolor){?>
	.svc_post_grid_<?php echo $svc_grid_id;?> .ssocial_article .ssocial-instagram-wrapper a{color:<?php echo $linkcolor; ?> !important;}
	<?php }
	if($overlay_color){?>
	.svc_post_grid_<?php echo $svc_grid_id;?> .ssocial_article .ssocial-isotop-item:hover .featured-image .image-hover-overlay{ background-color:<?php echo $overlay_color;?> !important;}
	<?php }?>
	</style>
	<div class="svc_post_grid_list <?php echo $svc_class;?>">
	<div class="svc_mask <?php echo $svc_class;?>" id="svc_mask_<?php echo $svc_grid_id;?>">
		<div id="loader"></div>
	</div>
	<div class="ssocial_grid_list_container <?php echo $svc_class;?>" id="ssocial_grid_list_container_<?php echo $svc_grid_id;?>">
	<?php 
	if($svc_type != 'carousel'){?>
        <div class="svc_filter_main_div">
        <?php
			$for_liner = '';
			if($filter == 'yes'){?>
				<ul class="svc_categories_filter vc_col-sm-12 vc_clearfix svc_categories_filter_<?php echo $svc_grid_id;?>" id="svc_categories_filter_<?php echo $svc_grid_id;?>">
					<li data-filter="*" class="active"><a href="javascript:;"><?php _e( 'All', 'ssocial' ); ?></a></li>
                    <?php if(in_array('facebook',$social_type)){?>
                    <li data-filter="svc_facebook"><a href="javascript:;"><i class="fa fa-facebook"></i></a></li>
                    <?php }
					if(in_array('twitter',$social_type)){?>
                    <li data-filter="svc_twitter"><a href="javascript:;"><i class="fa fa-twitter"></i></a></li>
                    <?php }
					if(in_array('instagram',$social_type)){?>
                    <li data-filter="svc_instagram"><a href="javascript:;"><i class="fa fa-instagram"></i></a></li>
                    <?php }
					if(in_array('youtube',$social_type)){?>
                    <li data-filter="svc_youtube"><a href="javascript:;"><i class="fa fa-youtube-play"></i></a></li>
                    <?php }
					if(in_array('vimeo',$social_type)){?>
                    <li data-filter="svc_vimeo"><a href="javascript:;"><i class="fa fa-vimeo-square"></i></a></li>
                    <?php }
					if(in_array('dribbble',$social_type)){?>
                    <li data-filter="svc_dribbble"><a href="javascript:;"><i class="fa fa-dribbble"></i></a></li>
                    <?php }
					if(in_array('pinterest',$social_type)){?>
                    <li data-filter="svc_pinterest"><a href="javascript:;"><i class="fa fa-pinterest-p"></i></a></li>
                    <?php }
					if(in_array('vk',$social_type)){?>
                    <li data-filter="svc_vk"><a href="javascript:;"><i class="fa fa-vk"></i></a></li>
                    <?php }
					if(in_array('blockquote',$social_type)){?>
                    <li data-filter="svc_blockquote"><a href="javascript:;"><i class="fa fa-quote-left"></i></a></li>
                    <?php }?>
				</ul>
			<?php }?>
		
        </div>
       
       
	<div id="ssocial-posts-wrap" class="ssocial-posts-wrap ssocial_layout_<?php echo $skin_type;?> svc_post_grid_<?php echo $svc_grid_id;?> <?php echo $svc_class;?>">
	<?php 
		}else{?>
	<div class="ssocial-posts-wrap svc_post_grid svc_post_grid_<?php echo $skin_type;?> svc_post_grid_<?php echo $svc_grid_id;?> svc_carousel_container_<?php echo $svc_grid_id;?> <?php echo $svc_class;?>" id="svc_carousel_container_<?php echo $svc_grid_id;?>">
		<?php 
		$grid_columns_count_for_desktop = $grid_columns_count_for_tablet = $grid_columns_count_for_mobile = '';
		}
	}
	if($svc_type == 'carousel'){
		$grid_columns_count_for_desktop = $grid_columns_count_for_tablet = $grid_columns_count_for_mobile = '';
	}
	
	$lauyout_array = array(
		'svc_excerpt_length' => $svc_excerpt_length,
		'dexcerpt' => $dexcerpt,
		'ddate' => $ddate,
		'duser' => $duser,
		'dvideo_title' => $dvideo_title,
		'popup_type' => $popup_type
		
	);
	
	$img_array = array();
	
	while ( $my_query->have_posts() ) {
		$my_query->the_post(); // Get post from query
		$post = new stdClass(); // Creating post object.
		$post->id = get_the_ID();
		$post->link = get_permalink($post->id);
		$img_id=get_post_meta( $post->id , '_thumbnail_id' ,true );
		$img_array[] = $img_id;
		
		$post_type = get_post_meta($post->id, '_single_post_type', true);
		$post_type = !empty($post_type) ? $post_type : 'image';?>
        <article id="post-<?php the_ID();?>" class="ssocial_article <?php echo ($viewport == 'yes' && $svc_type != 'carousel') ? 'opacity0 social_animated' : '';?> ssocial-formate-<?php echo $post_type;?> svc_<?php echo $post_type;?> ssocial_article_<?php echo $skin_type;?> <?php echo $grid_columns_count_for_desktop.' '.$grid_columns_count_for_tablet.' '.$grid_columns_count_for_mobile;?>" svc-animation="<?php echo $effect;?>">
        <?php if ($skin_type=='s1'){?>
			<div class="ssocial-blog-classic-item ssocial-isotop-item image-post-type">
            	<?php if($post_type != 'blockquote' && $hide_social_share != 'yes'){
					$svc_social_link = get_post_meta($post->id , '_svc_social_link', true);
					?>    
                	<div class="svc_share ssocial-share ssocial-share-s1 <?php echo ($post_type == 'twitter') ? 'ssocial-share-twitter' : '';?>">                            
                        <i class="fa fa-share-alt"></i>
                        <div class="svc_share-box full-color">
                          <ul class="s8-social" style="padding-left: 1em; text-indent: -1em;">
                            <li class="facebook">
                                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $svc_social_link;?>" target="_blank" title="">
                                    <i class="fa fa-facebook"></i>
                                </a>
                            </li>
                            <li class="google">
                                <a href="https://plusone.google.com/share?url=<?php echo $svc_social_link;?>" target="_blank" title="">
                                    <i class="fa fa-google-plus"></i>
                                </a>
                            </li>
                            <li class="twitter">
                                <a href="https://twitter.com/intent/tweet?text=&amp;url=<?php echo $svc_social_link;?>" target="_blank" title="">
                                    <i class="fa fa-twitter"></i>
                                </a>
                            </li>
                          </ul>
                        </div>
                    </div>
				<?php }
				if($post_type == 'twitter'){
					ssocial_twitter_feed_data($skin_type,$lauyout_array);
					echo '<div class="ssocial_formate_icon"><i class="fa fa-twitter"></i></div>';
				}elseif($post_type == 'blockquote'){
					ssocial_blockquote_data($skin_type,$lauyout_array);
					echo '<div class="ssocial_formate_icon"><i class="fa fa-quote-left"></i></div>';
				}elseif($post_type == 'instagram'){
					ssocial_instagram_feed_data($skin_type,$lauyout_array);
					echo '<div class="ssocial_formate_icon"><i class="fa fa-instagram"></i></div>';
				}elseif($post_type == 'facebook'){
					ssocial_facebook_feed_data($skin_type,$lauyout_array);
					echo '<div class="ssocial_formate_icon"><i class="fa fa-facebook"></i></div>';
				}elseif($post_type == 'youtube'){
					ssocial_youtube_feed_data($skin_type,$lauyout_array);
					echo '<div class="ssocial_formate_icon"><i class="fa fa-youtube-play"></i></div>';
				}elseif($post_type == 'vimeo'){
					ssocial_vimeo_feed_data($skin_type,$lauyout_array);
					echo '<div class="ssocial_formate_icon"><i class="fa fa-vimeo-square"></i></div>';
				}elseif($post_type == 'dribbble'){
					ssocial_dribbble_feed_data($skin_type,$lauyout_array);
					echo '<div class="ssocial_formate_icon"><i class="fa fa-dribbble"></i></div>';
				}elseif($post_type == 'pinterest'){
					ssocial_pinterest_feed_data($skin_type,$lauyout_array);
					echo '<div class="ssocial_formate_icon"><i class="fa fa-pinterest-p"></i></div>';
				}elseif($post_type == 'vk'){
					ssocial_vk_feed_data($skin_type,$lauyout_array);
					echo '<div class="ssocial_formate_icon"><i class="fa fa-vk"></i></div>';
				}?>
				</div>
		<?php
		}
		
		if ($skin_type=='s2'){?>			
				<div class="ssocial-blog-classic-item ssocial-isotop-item image-post-type">
				<?php if($post_type != 'blockquote' && $hide_social_share != 'yes'){
					$svc_social_link = get_post_meta($post->id , '_svc_social_link', true);
					?>    
                	<div class="svc_share ssocial-share ssocial-share-s2 <?php echo ($post_type == 'twitter') ? 'ssocial-share-twitter' : '';?>">                            
                        <i class="fa fa-share-alt"></i>
                        <div class="svc_share-box full-color">
                          <ul class="s8-social" style="padding-left: 1em; text-indent: -1em;">
                            <li class="facebook">
                                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $svc_social_link;?>" target="_blank" title="">
                                    <i class="fa fa-facebook"></i>
                                </a>
                            </li>
                            <li class="google">
                                <a href="https://plusone.google.com/share?url=<?php echo $svc_social_link;?>" target="_blank" title="">
                                    <i class="fa fa-google-plus"></i>
                                </a>
                            </li>
                            <li class="twitter">
                                <a href="https://twitter.com/intent/tweet?text=&amp;url=<?php echo $svc_social_link;?>" target="_blank" title="">
                                    <i class="fa fa-twitter"></i>
                                </a>
                            </li>
                          </ul>
                        </div>
                    </div>
				<?php }
				if($post_type == 'twitter'){
					ssocial_twitter_feed_data($skin_type,$lauyout_array);
					echo '<div class="ssocial_formate_icon"><i class="fa fa-twitter"></i></div>';
				}elseif($post_type == 'blockquote'){
					ssocial_blockquote_data($skin_type,$lauyout_array);
					echo '<div class="ssocial_formate_icon"><i class="fa fa-quote-left"></i></div>';
				}elseif($post_type == 'instagram'){
					ssocial_instagram_feed_data($skin_type,$lauyout_array);
					//echo '<div class="ssocial_formate_icon"><i class="fa fa-instagram"></i></div>';
				}elseif($post_type == 'facebook'){
					ssocial_facebook_feed_data($skin_type,$lauyout_array);
					//echo '<div class="ssocial_formate_icon"><i class="fa fa-facebook"></i></div>';
				}elseif($post_type == 'youtube'){
					ssocial_youtube_feed_data($skin_type,$lauyout_array);
					//echo '<div class="ssocial_formate_icon"><i class="fa fa-youtube-play"></i></div>';
				}elseif($post_type == 'vimeo'){
					ssocial_vimeo_feed_data($skin_type,$lauyout_array);
					//echo '<div class="ssocial_formate_icon"><i class="fa fa-vimeo-square"></i></div>';
				}elseif($post_type == 'dribbble'){
					ssocial_dribbble_feed_data($skin_type,$lauyout_array);
					//echo '<div class="ssocial_formate_icon"><i class="fa fa-dribbble"></i></div>';
				}elseif($post_type == 'pinterest'){
					ssocial_pinterest_feed_data($skin_type,$lauyout_array);
					//echo '<div class="ssocial_formate_icon"><i class="fa fa-pinterest-p"></i></div>';
				}elseif($post_type == 'vk'){
					ssocial_vk_feed_data($skin_type,$lauyout_array);
					//echo '<div class="ssocial_formate_icon"><i class="fa fa-pinterest-p"></i></div>';
				}?>
				</div>
		<?php
		}
		
		if ($skin_type=='s3'){?>			
            <div class="social-feed-element ssocial-isotop-item">
            <?php if($post_type != 'blockquote' && $hide_social_share != 'yes'){
					$svc_social_link = get_post_meta($post->id , '_svc_social_link', true);
					?>    
                	<div class="svc_share ssocial-share ssocial-share-s3 <?php echo ($post_type == 'twitter') ? 'ssocial-share-twitter' : '';?>">                            
                        <i class="fa fa-share-alt"></i>
                        <div class="svc_share-box full-color">
                          <ul class="s8-social" style="padding-left: 1em; text-indent: -1em;">
                            <li class="facebook">
                                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $svc_social_link;?>" target="_blank" title="">
                                    <i class="fa fa-facebook"></i>
                                </a>
                            </li>
                            <li class="google">
                                <a href="https://plusone.google.com/share?url=<?php echo $svc_social_link;?>" target="_blank" title="">
                                    <i class="fa fa-google-plus"></i>
                                </a>
                            </li>
                            <li class="twitter">
                                <a href="https://twitter.com/intent/tweet?text=&amp;url=<?php echo $svc_social_link;?>" target="_blank" title="">
                                    <i class="fa fa-twitter"></i>
                                </a>
                            </li>
                          </ul>
                        </div>
                    </div>
			<?php }
			if($post_type == 'twitter'){
				ssocial_twitter_feed_data($skin_type,$lauyout_array);
				//echo '<div class="ssocial_formate_icon"><i class="fa fa-twitter"></i></div>';
			}elseif($post_type == 'blockquote'){
				ssocial_blockquote_data($skin_type,$lauyout_array);
				//echo '<div class="ssocial_formate_icon"><i class="fa fa-quote-left"></i></div>';
			}elseif($post_type == 'instagram'){
				ssocial_instagram_feed_data($skin_type,$lauyout_array);
				//echo '<div class="ssocial_formate_icon"><i class="fa fa-instagram"></i></div>';
			}elseif($post_type == 'facebook'){
				ssocial_facebook_feed_data($skin_type,$lauyout_array);
				//echo '<div class="ssocial_formate_icon"><i class="fa fa-facebook"></i></div>';
			}elseif($post_type == 'youtube'){
				ssocial_youtube_feed_data($skin_type,$lauyout_array);
				//echo '<div class="ssocial_formate_icon"><i class="fa fa-youtube-play"></i></div>';
			}elseif($post_type == 'vimeo'){
				ssocial_vimeo_feed_data($skin_type,$lauyout_array);
				//echo '<div class="ssocial_formate_icon"><i class="fa fa-vimeo-square"></i></div>';
			}elseif($post_type == 'dribbble'){
				ssocial_dribbble_feed_data($skin_type,$lauyout_array);
				//echo '<div class="ssocial_formate_icon"><i class="fa fa-dribbble"></i></div>';
			}elseif($post_type == 'pinterest'){
				ssocial_pinterest_feed_data($skin_type,$lauyout_array);
				//echo '<div class="ssocial_formate_icon"><i class="fa fa-pinterest-p"></i></div>';
			}elseif($post_type == 'vk'){
				ssocial_vk_feed_data($skin_type,$lauyout_array);
				//echo '<div class="ssocial_formate_icon"><i class="fa fa-pinterest-p"></i></div>';
			}?>
            </div>
		<?php
		}
		
		if ($skin_type=='s4'){?>
            <div class="social-feed-element4 ssocial-isotop-item">
            <?php if($post_type != 'blockquote' && $hide_social_share != 'yes'){
					$svc_social_link = get_post_meta($post->id , '_svc_social_link', true);
					?>    
                	<div class="svc_share ssocial-share ssocial-share-s4 <?php echo ($post_type == 'twitter') ? 'ssocial-share-twitter' : '';?>">                            
                        <i class="fa fa-share-alt"></i>
                        <div class="svc_share-box full-color">
                          <ul class="s8-social" style="padding-left: 1em; text-indent: -1em;">
                            <li class="facebook">
                                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $svc_social_link;?>" target="_blank" title="">
                                    <i class="fa fa-facebook"></i>
                                </a>
                            </li>
                            <li class="google">
                                <a href="https://plusone.google.com/share?url=<?php echo $svc_social_link;?>" target="_blank" title="">
                                    <i class="fa fa-google-plus"></i>
                                </a>
                            </li>
                            <li class="twitter">
                                <a href="https://twitter.com/intent/tweet?text=&amp;url=<?php echo $svc_social_link;?>" target="_blank" title="">
                                    <i class="fa fa-twitter"></i>
                                </a>
                            </li>
                          </ul>
                        </div>
                    </div>
			<?php }
			if($post_type == 'twitter'){
				ssocial_twitter_feed_data($skin_type,$lauyout_array);
				//echo '<div class="ssocial_formate_icon"><i class="fa fa-twitter"></i></div>';
			}elseif($post_type == 'blockquote'){
				ssocial_blockquote_data($skin_type,$lauyout_array);
				//echo '<div class="ssocial_formate_icon"><i class="fa fa-quote-left"></i></div>';
			}elseif($post_type == 'instagram'){
				ssocial_instagram_feed_data($skin_type,$lauyout_array);
				//echo '<div class="ssocial_formate_icon"><i class="fa fa-instagram"></i></div>';
			}elseif($post_type == 'facebook'){
				ssocial_facebook_feed_data($skin_type,$lauyout_array);
				//echo '<div class="ssocial_formate_icon"><i class="fa fa-facebook"></i></div>';
			}elseif($post_type == 'youtube'){
				ssocial_youtube_feed_data($skin_type,$lauyout_array);
				//echo '<div class="ssocial_formate_icon"><i class="fa fa-youtube-play"></i></div>';
			}elseif($post_type == 'vimeo'){
				ssocial_vimeo_feed_data($skin_type,$lauyout_array);
				//echo '<div class="ssocial_formate_icon"><i class="fa fa-vimeo-square"></i></div>';
			}elseif($post_type == 'dribbble'){
				ssocial_dribbble_feed_data($skin_type,$lauyout_array);
				//echo '<div class="ssocial_formate_icon"><i class="fa fa-dribbble"></i></div>';
			}elseif($post_type == 'pinterest'){
				ssocial_pinterest_feed_data($skin_type,$lauyout_array);
				//echo '<div class="ssocial_formate_icon"><i class="fa fa-pinterest-p"></i></div>';
			}elseif($post_type == 'vk'){
				ssocial_vk_feed_data($skin_type,$lauyout_array);
				//echo '<div class="ssocial_formate_icon"><i class="fa fa-pinterest-p"></i></div>';
			}?>
            </div>
		<?php }?>
        
        </article>
   <?php 		
	}
	wp_reset_query();
	if(!$ajax){ 
	//end main div ?>
	</div>
	
    
	<?php 
	$all_page_number=$my_query->max_num_pages;
	$fields='';
	$arr=$var;
	$social_type = implode(',',$social_type);
	foreach($arr as $key => $value){
		if($key != 'paged' && $key != 'social_type'){
			$fields.='<input type="hidden" name="'.$key.'" value="'.$value.'" id="'.$key.'_'.$svc_grid_id.'"/>';
		}
	}
	?>
	<form id="svc_form_load_more_<?php echo $svc_grid_id;?>">
		<?php echo $fields;?>
		<input type="hidden" name="_wpnonce " value="<?php echo rand(0,100000);?>"/>
		<input type="hidden" name="paged" value="<?php echo $paged;?>" id="svc_paged_<?php echo $svc_grid_id;?>"/>
        <input type="hidden" name="social_type" value="<?php echo $social_type;?>" id="svc_social_type_<?php echo $svc_grid_id;?>"/>
		<input type="hidden" name="total_paged" value="<?php echo $all_page_number;?>" id="svc_total_paged_<?php echo $svc_grid_id;?>"/>
	</form>
	<?php if($all_page_number>1 && $hide_showmore != 'yes' && $load_more != 'pagination' && $svc_type != 'carousel'){?>
	<div class="load_more_main_div <?php echo $svc_class;?>">
		<nav id="svc_infinite" class="svc_infinite_<?php echo $svc_grid_id;?>">
		  <div class="loading-spinner">
			<div class="ui-spinner">
			  <span class="side side-left">
				<span class="fill"></span>
			  </span>
			  <span class="side side-right">
				<span class="fill"></span>
			  </span>
			</div>
		  </div>
		  <p><a href="/page/<?php echo $paged;?>/" class="svc_load_more_<?php echo $svc_grid_id;?> load-more-link" rel="<?php echo $svc_grid_id;?>"><?php if($loadmore_text != ''){echo $loadmore_text;}else{echo 'Show More';}?></a></p>
		</nav>
	</div>
	<input type="hidden" id="svc_infinite_<?php echo $svc_grid_id;?>" value="0" />
	<?php }?>
	<?php if($all_page_number>1 && ($load_more == 'pagination') && $svc_type != 'carousel'){?>
	<div class="svc_pagination_div">
	<?php ssocial_kriesi_pagination($all_page_number,$svc_grid_id);?>
	</div>
	<?php }?>
	</div>    
	</div>
	<script>
	var wl = jQuery(window);
	jQuery(document).ready(function(){
	<?php if($svc_type == 'carousel'){?>
	var sync1 = jQuery(".svc_post_grid_<?php echo $svc_grid_id;?>");
	sync1.imagesLoaded(function(){
		 sync1.owlCarousel({
			<?php if($car_autoplay == 'yes'){?>
			autoPlay: <?php echo $car_autoplay_time*1000;?>,
			<?php }?>
			items : <?php echo $car_display_item;?>,
			pagination:<?php if($car_pagination == 'yes'){echo 'true';}else{echo 'false';}?>,
			navigation: <?php if($car_navigation == 'yes'){echo 'false';}else{echo 'true';}?>,
			<?php if($car_pagination == 'yes' && $car_pagination_num == 'yes'){?>
			paginationNumbers:true,
			<?php }
			if($car_display_item == 1 && $car_transition != ''){?>
			transitionStyle : "<?php echo $car_transition;?>",
			<?php }
			if($car_display_item == 1){?>
			autoHeight:true,
			singleItem:true,
			<?php }?>
			navigationText: [
				"<i class='fa fa-chevron-left icon-white'></i>",
				"<i class='fa fa-chevron-right icon-white'></i>"
			],
			afterInit:function(){
				jQuery('#svc_mask_<?php echo $svc_grid_id;?>').hide();
				jQuery('#ssocial_grid_list_container_<?php echo $svc_grid_id;?>').show();
				<?php if($popup_type == 'content_popup'){?>
				ssocial_magnific_popup_with_content();
				<?php }elseif($popup_type == 'image_popup'){?>
				ssocial_magnific_popup();
				<?php }?>			
			}
		});		
	});
	<?php 
}else{?>
		var iso_cont = jQuery('.svc_post_grid_<?php echo $svc_grid_id;?>');
		<?php if($filter == 'yes'){?>
		jQuery('.svc_categories_filter_<?php echo $svc_grid_id;?> li').on( 'click', function(e) {
		  e.preventDefault();
		  jQuery('.svc_categories_filter_<?php echo $svc_grid_id;?> li').removeClass('active');
		  jQuery(this).addClass('active');
		  var filterValue = jQuery(this).attr('data-filter');
		  
		  var filterValue = '';
		  jQuery('.svc_categories_filter_<?php echo $svc_grid_id;?> li').each(function(){
		  	if(jQuery(this).hasClass('active')){
				var v = jQuery(this).attr('data-filter');
				if(typeof v != 'undefined' ){
					if(v === '*'){
						filterValue += v;
					}else{
						filterValue += '.'+v;
					}
				}
			}
		  });
		  iso_cont.isotope({transformsEnabled: true,isResizeBound: true,transitionDuration: '0.8s'}).isotope({ filter: filterValue }).isotope();
		});
		<?php }?>
		
		
<?php if($load_more == 'infinite'){?>
	jQuery(document).scroll(function(){
		if (((jQuery( '.svc_load_more_<?php echo $svc_grid_id;?>' ).offset().top - wl.scrollTop()) - 10) < wl.height()) {
			if(jQuery('#svc_infinite_<?php echo $svc_grid_id;?>').val() == '0'){
				jQuery('#svc_infinite_<?php echo $svc_grid_id;?>').val('1');
				jQuery( '.svc_load_more_<?php echo $svc_grid_id;?>' ).click();
			}
		}
	});
	<?php }
	if($load_more != 'pagination'){?>
		jQuery('.svc_load_more_<?php echo $svc_grid_id;?>').click(function(event) {
			event.preventDefault(event);
			jQuery('nav.svc_infinite_<?php echo $svc_grid_id;?> p').css('visibility','hidden');
			jQuery('nav.svc_infinite_<?php echo $svc_grid_id;?> div.loading-spinner').show();
			var div_position=jQuery('#svc_form_load_more_<?php echo $svc_grid_id;?>').position().top;
			jQuery('#svc_paged_<?php echo $svc_grid_id;?>').val(Number(jQuery('#svc_paged_<?php echo $svc_grid_id;?>').val())+1);
	
			var params=jQuery('#svc_form_load_more_<?php echo $svc_grid_id;?>').serialize();
			jQuery.ajax({
				type: 'POST',
				url: '<?php echo admin_url( 'admin-ajax.php' );?>',
				data:  params+'&action=ssocial_layout_post',
				success: function(response) {
					isotop_callback(response,'');				
				}
			});
		});
	<?php }?>
	
	<?php if($load_more == 'pagination'){?>
	jQuery('.svc_pagination_<?php echo $svc_grid_id;?> a').click(function(event) {
		event.preventDefault(event);
		if(jQuery(this).hasClass('current') == false){
		jQuery('#svc_mask_<?php echo $svc_grid_id;?>').show();
		jQuery('#ssocial_grid_list_container_<?php echo $svc_grid_id;?>').hide();
		div_position=jQuery('#ssocial_grid_list_container_<?php echo $svc_grid_id;?>').position().top;
		jQuery('#svc_paged_<?php echo $svc_grid_id;?>').val(Number(jQuery(this).attr('page')));
		jQuery('.svc_pagination_<?php echo $svc_grid_id;?> a').removeClass('current').addClass('inactive');
		jQuery(this).addClass('current').removeClass('inactive');
			var params=jQuery('#svc_form_load_more_<?php echo $svc_grid_id;?>').serialize();
			jQuery.ajax({
				type: 'POST',
				url: '<?php echo admin_url( 'admin-ajax.php' );?>',
				data:  params+'&action=ssocial_layout_post',
				success: function(response) {
					<?php if($skin_type == 's7'){?>
					jQuery('.svc_post_grid_<?php echo $svc_grid_id;?>').html(response);					
					jQuery('.svc_highres_<?php echo $svc_grid_id;?>').magnificPopup({
					  type: 'image',
					  closeOnContentClick: false,
					  closeBtnInside: false
					});
					jQuery('.ajax-popup-link-<?php echo $svc_grid_id;?>').magnificPopup({
					  type: 'ajax',
					  closeBtnInside:false
					});
				<?php }else{?>
					isotop_callback(response,'');
				<?php }?>
					jQuery('#svc_mask_<?php echo $svc_grid_id;?>').hide();
					jQuery('#ssocial_grid_list_container_<?php echo $svc_grid_id;?>').show();
					jQuery("#ssocial_grid_list_container_<?php echo $svc_grid_id;?>").animate({top: 0}, 1000);
				}
			});
		}
	});
	<?php }?>
		
		var container = iso_cont.imagesLoaded( function() {
			console.log('Loaded');
			jQuery('#ssocial_grid_list_container_<?php echo $svc_grid_id;?>').show();
			jQuery('#svc_mask_<?php echo $svc_grid_id;?>').hide();
			
			container.isotope({
			  itemSelector: '.ssocial_article',
			  <?php //if($effect != ''){?>
			  transformsEnabled: true,
			  isResizeBound: true,
			  transitionDuration: '0.8s',
			  <?php //}?>
			  filter: '*',
			  <?php if($grid_layout_mode == 'fitRows'){?>
			  layoutMode: 'fitRows',
			  <?php }elseif($grid_layout_mode == 'masonry'){?>
			  layoutMode: 'masonry',
			  masonry: {
				columnWidth: 1
			  }
			  <?php }?>
			});
			
			<?php if($popup_type == 'content_popup'){?>
			ssocial_magnific_popup_with_content();
			<?php }elseif($popup_type == 'image_popup'){?>
			ssocial_magnific_popup();
			<?php }?>
			
			<?php if($viewport == 'yes'){?>
			jQuery(".svc_post_grid_<?php echo $svc_grid_id;?> .ssocial_article").viewportChecker({
				classToAdd: '<?php echo $effect;?>', // Class to add to the elements when they are visible
				classToRemove: 'opacity0', // Class to remove before adding 'classToAdd' to the elements
				callbackFunction: function(elem, action){
					if(action == 'add'){
						elem.removeAttr('svc-animation');
						setTimeout(function(){
							elem.removeClass('social_animated');
						},1000);
					}
				},
			});
			<?php }else{?>
			jQuery('.svc_post_grid_<?php echo $svc_grid_id;?> .ssocial_article').each(function () {
				var animation_style = jQuery(this).attr('svc-animation');
				ssocial_add_animation(jQuery(this), animation_style);
			});
			<?php }?>
		});		
		
		function isotop_callback(response,view_filter){
			var res = jQuery(response);
			res.imagesLoaded( function() {
				if(view_filter == 'yes'){
					container.html('');
				}
				<?php if($load_more == 'pagination'){?>
				container.html('');
				<?php }?>
				container.isotope({transformsEnabled: false,isResizeBound: false,transitionDuration: 0}).isotope( 'insert',res ).isotope({transformsEnabled: false,isResizeBound: false,transitionDuration: '0.8s'});
				
				<?php if($viewport == 'yes'){?>
				jQuery(".svc_post_grid_<?php echo $svc_grid_id;?> .ssocial_article").viewportChecker({
					classToAdd: '<?php echo $effect;?>', // Class to add to the elements when they are visible
					classToRemove: 'opacity0', // Class to remove before adding 'classToAdd' to the elements
					callbackFunction: function(elem, action){
						if(action == 'add'){
							elem.removeAttr('svc-animation');
							setTimeout(function(){
								elem.removeClass('social_animated');
							},1000);
						}
					},
				});
				<?php }else{?>
				jQuery('.svc_post_grid_<?php echo $svc_grid_id;?> .ssocial_article').each(function () {
					var animation_style = jQuery(this).attr('svc-animation');
					ssocial_add_animation(jQuery(this), animation_style);
				});
				<?php }?>
				
				jQuery('#svc_infinite_<?php echo $svc_grid_id;?>').val('0');
				if(jQuery('#svc_paged_<?php echo $svc_grid_id;?>').val() == jQuery('#svc_total_paged_<?php echo $svc_grid_id;?>').val()){
					jQuery('nav.svc_infinite_<?php echo $svc_grid_id;?>').hide();
					jQuery('#svc_infinite_<?php echo $svc_grid_id;?>').val('1');
				}
				jQuery('nav.svc_infinite_<?php echo $svc_grid_id;?> p').css('visibility','visible');
				jQuery('nav.svc_infinite_<?php echo $svc_grid_id;?> div.loading-spinner').hide(); 
				<?php if($popup_type == 'content_popup'){?>
				ssocial_magnific_popup_with_content();
				<?php }elseif($popup_type == 'image_popup'){?>
				ssocial_magnific_popup();
				<?php }?>
			});
		}
	<?php }?>
	});

	</script>
<?php
	}
	$message = ob_get_clean();
	return $message;
}
?>
