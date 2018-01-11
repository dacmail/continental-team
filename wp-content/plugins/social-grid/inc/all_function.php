<?php
add_action('wp_head','ssocial_inline_css_for_imageloaded');
function ssocial_inline_css_for_imageloaded(){
	?>
    <style>
	.ssocial_grid_list_container{ display:none;}
	#loader {background-image: url("<?php echo plugins_url('../assets/css/loader.GIF',__FILE__);?>");}
	</style>
    <?php	
}

add_action('wp_ajax_ssocial_layout_post','ssocial_layout_post');
add_action('wp_ajax_nopriv_ssocial_layout_post','ssocial_layout_post');
function ssocial_layout_post(){
	extract($_POST);
	echo do_shortcode('[social_layout query_loop="'.$query_loop.'" social_type="'.$social_type.'" grid_link_target="'.$grid_link_target.'" grid_layout_mode="'.$grid_layout_mode.'" grid_columns_count_for_desktop="'.$grid_columns_count_for_desktop.'" grid_columns_count_for_tablet="'.$grid_columns_count_for_tablet.'" grid_columns_count_for_mobile="'.$grid_columns_count_for_mobile.'" svc_excerpt_length="'.$svc_excerpt_length.'" skin_type="'.$skin_type.'" title="'.$title.'" effect="'.$effect.'" viewport="'.$viewport.'" svc_class="'.$svc_class.'" dexcerpt="'.$dexcerpt.'" ddate="'.$ddate.'" duser="'.$duser.'" dvideo_title="'.$dvideo_title.'" hide_social_share="'.$hide_social_share.'" popup_type="'.$popup_type.'" paged="'.$paged.'" svc_grid_id="'.$svc_grid_id.'" ajax="1"]');
	die();
}
add_action('wp_ajax_ssocial_post_layout_carousel','ssocial_post_layout_carousel');
add_action('wp_ajax_nopriv_ssocial_post_layout_carousel','ssocial_post_layout_carousel');
function ssocial_post_layout_carousel(){
	extract($_POST);
	echo do_shortcode('[spost_layout svc_type="'.$svc_type.'" query_loop="'.$query_loop.'" grid_link_target="'.$grid_link_target.'" grid_layout_mode="'.$grid_layout_mode.'" grid_thumb_size="'.$grid_thumb_size.'" svc_excerpt_length="'.$svc_excerpt_length.'" skin_type="'.$skin_type.'" title="'.$title.'" read_more="'.$read_more.'" svc_class="'.$svc_class.'" dexcerpt="'.$dexcerpt.'" dfeatured="'.$dfeatured.'" dpost_popup="'.$dpost_popup.'" dcategory="'.$dcategory.'" dmeta_data="'.$dmeta_data.'" dimg_popup="'.$dimg_popup.'" dsocial="'.$dsocial.'" pbgcolor="'.$pbgcolor.'" pbghcolor="'.$pbghcolor.'" tcolor="'.$tcolor.'" thcolor="'.$thcolor.'" paged="'.$paged.'" svc_grid_id="'.$svc_grid_id.'" ajax="1"]');
	die();
}
add_action('init','svc_social_register_post_type',0);
function svc_social_register_post_type(){
	// Set UI labels for Custom Post Type
		$labels = array(
			'name'                => _x( 'Socials', 'Post Type General Name', 'twentythirteen' ),
			'singular_name'       => _x( 'Social', 'Post Type Singular Name', 'twentythirteen' ),
			'menu_name'           => __( 'Socials', 'twentythirteen' ),
			'parent_item_colon'   => __( 'Parent Social', 'twentythirteen' ),
			'all_items'           => __( 'All Socials', 'twentythirteen' ),
			'view_item'           => __( 'View Social', 'twentythirteen' ),
			'add_new_item'        => __( 'Add New Social', 'twentythirteen' ),
			'add_new'             => __( 'Add New', 'twentythirteen' ),
			'edit_item'           => __( 'Edit Social', 'twentythirteen' ),
			'update_item'         => __( 'Update Social', 'twentythirteen' ),
			'search_items'        => __( 'Search Social', 'twentythirteen' ),
			'not_found'           => __( 'Not Found', 'twentythirteen' ),
			'not_found_in_trash'  => __( 'Not found in Trash', 'twentythirteen' ),
		);
		
	// Set other options for Custom Post Type
		
		$args = array(
			'label'               => __( 'socials', 'twentythirteen' ),
			'description'         => __( 'Social reviews', 'twentythirteen' ),
			'labels'              => $labels,
			// Features this CPT supports in Post Editor
			'supports'            => array( 'title', 'revisions' ),
			// You can associate this CPT with a taxonomy or custom taxonomy. 
			'taxonomies'          => array( 'social-category' ),
			/* A hierarchical CPT is like Pages and can have
			* Parent and child items. A non-hierarchical CPT
			* is like Posts.
			*/	
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => true,
			'menu_position'       => 5,
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'capability_type'     => 'page',
		);
		
		// Registering your Custom Post Type
		register_post_type( 'social', $args );
}
function ssocial_share_post($id){
	ob_start();
	$ssocial_layout = new ssocial_layout();
	$options = $ssocial_layout->ssocial_get_options();
	$link = get_the_permalink($id);
	$title = get_the_title();
	$feat_image_url = wp_get_attachment_url( get_post_thumbnail_id($id) );?>
	<span class="blog-share-container">
		<span class="ssocial-blog-share ssocial-toggle-trigger"><svg class="ssocial-svg-icon" style="height:16px;width:16px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M432 352c-22.58 0-42.96 9.369-57.506 24.415l-215.502-107.751c.657-4.126 1.008-8.353 1.008-12.664s-.351-8.538-1.008-12.663l215.502-107.751c14.546 15.045 34.926 24.414 57.506 24.414 44.183 0 80-35.817 80-80s-35.817-80-80-80-80 35.817-80 80c0 4.311.352 8.538 1.008 12.663l-215.502 107.752c-14.546-15.045-34.926-24.415-57.506-24.415-44.183 0-80 35.818-80 80 0 44.184 35.817 80 80 80 22.58 0 42.96-9.369 57.506-24.414l215.502 107.751c-.656 4.125-1.008 8.352-1.008 12.663 0 44.184 35.817 80 80 80s80-35.816 80-80c0-44.182-35.817-80-80-80z"></path></svg></span>
		<ul class="blog-social-share ssocial-box-to-trigger">
		<?php if($options->get('fb_hide') != 'yes'){?>
			<li class="ssocial-facebook-share"><a href="http://www.facebook.com/share.php?u=<?php echo $link;?>" target="_blank"><svg class="ssocial-svg-icon" style="height:16px;width:16px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M192.191 92.743v60.485h-63.638v96.181h63.637v256.135h97.069v-256.135h84.168s6.674-51.322 9.885-96.508h-93.666v-42.921c0-8.807 11.565-20.661 23.01-20.661h71.791v-95.719h-83.57c-111.317 0-108.686 86.262-108.686 99.142z"></path></svg></a></li>
		<?php }
		if($options->get('twit_hide') != 'yes'){?>
			<li class="ssocial-twitter-share"><a href="https://twitter.com/share?text=<?php echo $title;?>&url=<?php echo $link;?>" target="_blank"><svg class="ssocial-svg-icon" style="height:16px;width:16px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M454.058 213.822c28.724-2.382 48.193-15.423 55.683-33.132-10.365 6.373-42.524 13.301-60.269 6.681-.877-4.162-1.835-8.132-2.792-11.706-13.527-49.679-59.846-89.698-108.382-84.865 3.916-1.589 7.914-3.053 11.885-4.388 5.325-1.923 36.678-7.003 31.749-18.079-4.176-9.728-42.471 7.352-49.672 9.597 9.501-3.581 25.26-9.735 26.93-20.667-14.569 1.991-28.901 8.885-39.937 18.908 3.998-4.293 7.01-9.536 7.666-15.171-38.91 24.85-61.624 74.932-80.025 123.523-14.438-13.972-27.239-25.008-38.712-31.114-32.209-17.285-70.722-35.303-131.156-57.736-1.862 19.996 9.899 46.591 43.723 64.273-7.325-.986-20.736 1.219-31.462 3.773 4.382 22.912 18.627 41.805 57.251 50.918-17.642 1.163-26.767 5.182-35.036 13.841 8.043 15.923 27.656 34.709 62.931 30.82-39.225 16.935-15.998 48.234 15.93 43.565-54.444 56.244-140.294 52.123-189.596 5.08 128.712 175.385 408.493 103.724 450.21-65.225 31.23.261 49.605-10.823 60.994-23.05-17.99 3.053-44.072-.095-57.914-5.846z"></path></svg></a></li>
		<?php }
		if($options->get('gplus_hide') != 'yes'){?>
			<li class="ssocial-googleplus-share"><a href="https://plusone.google.com/share?url=<?php echo $link;?>" target="_blank"><svg class="ssocial-svg-icon" style="height:16px;width:16px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M416.146 153.104v-95.504h-32.146v95.504h-95.504v32.146h95.504v95.504h32.145v-95.504h95.504v-32.146h-95.504zm-128.75-95.504h-137.717c-61.745 0-119.869 48.332-119.869 102.524 0 55.364 42.105 100.843 104.909 100.843 4.385 0 8.613.296 12.772 0-4.074 7.794-6.982 16.803-6.982 25.925 0 12.17 5.192 22.583 12.545 31.46-5.303-.046-10.783.067-16.386.402-37.307 2.236-68.08 13.344-91.121 32.581-18.765 12.586-32.751 28.749-39.977 46.265-3.605 8.154-5.538 16.62-5.538 25.14l.018.82-.018.983c0 49.744 64.534 80.863 141.013 80.863 87.197 0 135.337-49.447 135.337-99.192l-.003-.363.003-.213-.019-1.478c-.007-.672-.012-1.346-.026-2.009-.012-.532-.029-1.058-.047-1.583-1.108-36.537-13.435-59.361-48.048-83.887-12.469-8.782-36.267-30.231-36.267-42.81 0-14.769 4.221-22.041 26.439-39.409 22.782-17.79 38.893-39.309 38.893-68.424 0-34.65-15.439-76.049-44.392-76.049h43.671l30.81-32.391zm-85.642 298.246c19.347 13.333 32.891 24.081 37.486 41.754v.001l.056.203c1.069 4.522 1.645 9.18 1.666 13.935-.325 37.181-26.35 66.116-100.199 66.116-52.713 0-90.82-31.053-91.028-68.414.005-.43.008-.863.025-1.292l.002-.051c.114-3.006.505-5.969 1.15-8.881.127-.54.241-1.082.388-1.617 1.008-3.942 2.502-7.774 4.399-11.478 18.146-21.163 45.655-33.045 82.107-35.377 28.12-1.799 53.515 2.818 63.95 5.101zm-47.105-107.993c-35.475-1.059-69.194-39.691-75.335-86.271-6.121-46.61 17.663-82.276 53.154-81.203 35.483 1.06 69.215 38.435 75.336 85.043 6.121 46.583-17.685 83.517-53.154 82.43z"></path></svg></a></li>
		<?php }
		if($options->get('linkedin_hide') != 'yes'){?>
			<li class="ssocial-linkedin-share"><a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo $link;?>&title=<?php echo $title;?>&summary=<?php echo $title;?>" target="_blank"><svg class="ssocial-svg-icon" style="height:16px;width:16px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M80.111 25.6c-29.028 0-48.023 20.547-48.023 47.545 0 26.424 18.459 47.584 46.893 47.584h.573c29.601 0 47.999-21.16 47.999-47.584-.543-26.998-18.398-47.545-47.442-47.545zm-48.111 128h96v320.99h-96v-320.99zm323.631-7.822c-58.274 0-84.318 32.947-98.883 55.996v1.094h-.726c.211-.357.485-.713.726-1.094v-48.031h-96.748c1.477 31.819 0 320.847 0 320.847h96.748v-171.241c0-10.129.742-20.207 3.633-27.468 7.928-20.224 25.965-41.185 56.305-41.185 39.705 0 67.576 31.057 67.576 76.611v163.283h97.717v-176.313c0-104.053-54.123-152.499-126.347-152.499z"></path></svg></a></li>
		<?php }
		if($options->get('pin_hide') != 'yes'){?>
			<li class="ssocial-pinterest-share"><a href="http://pinterest.com/pin/create/button/?title=<?php echo $title;?>&media=<?php echo $feat_image_url;?>&description=<?php echo $title;?>, <?php echo $link;?>&url=<?php echo $link;?>" target="_blank"><svg class="ssocial-svg-icon" style="height:16px;width:16px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M267.702-6.4c-135.514 0-203.839 100.197-203.839 183.724 0 50.583 18.579 95.597 58.402 112.372 6.536 2.749 12.381.091 14.279-7.361 1.325-5.164 4.431-18.204 5.83-23.624 1.913-7.363 1.162-9.944-4.107-16.38-11.483-13.968-18.829-32.064-18.829-57.659 0-74.344 53.927-140.883 140.431-140.883 76.583 0 118.657 48.276 118.657 112.707 0 84.802-36.392 156.383-90.42 156.383-29.827 0-52.161-25.445-45.006-56.672 8.569-37.255 25.175-77.456 25.175-104.356 0-24.062-12.529-44.147-38.469-44.147-30.504 0-55 32.548-55 76.119 0 27.782 9.097 46.546 9.097 46.546s-31.209 136.374-36.686 160.269c-10.894 47.563-1.635 105.874-.853 111.765.456 3.476 4.814 4.327 6.786 1.67 2.813-3.781 39.131-50.022 51.483-96.234 3.489-13.087 20.066-80.841 20.066-80.841 9.906 19.492 38.866 36.663 69.664 36.663 91.686 0 153.886-86.2 153.886-201.577 0-87.232-71.651-168.483-180.547-168.483z"></path></svg></a></li>
		<?php }?>
		</ul>
	</span>
	<?php
	$m = ob_get_clean();
	echo $m;
}
function ssocial_format_type($link,$post_type){
	ob_start();
	if($post_type == 'instagram'){?>
	<a href="<?php echo $link;?>" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1536 1792"><path d="M1362 1426v-648h-135q20 63 20 131 0 126-64 232.5t-174 168.5-240 62q-197 0-337-135.5t-140-327.5q0-68 20-131h-141v648q0 26 17.5 43.5t43.5 17.5h1069q25 0 43-17.5t18-43.5zm-284-533q0-124-90.5-211.5t-218.5-87.5q-127 0-217.5 87.5t-90.5 211.5 90.5 211.5 217.5 87.5q128 0 218.5-87.5t90.5-211.5zm284-360v-165q0-28-20-48.5t-49-20.5h-174q-29 0-49 20.5t-20 48.5v165q0 29 20 49t49 20h174q29 0 49-20t20-49zm174-208v1142q0 81-58 139t-139 58h-1142q-81 0-139-58t-58-139v-1142q0-81 58-139t139-58h1142q81 0 139 58t58 139z"></path></svg></a>
	<?php }elseif($post_type == 'audio'){?>
	<a href="<?php echo $link;?>"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M445.097 106.188c-6.131-6.127-16.062-6.127-22.194 0-6.131 6.127-6.131 16.067 0 22.195 70.376 70.383 70.376 184.893 0 255.261-6.131 6.131-6.131 16.071 0 22.194 3.065 3.066 7.081 4.599 11.097 4.599 4.016 0 8.031-1.533 11.096-4.599 82.616-82.606 82.616-217.035.001-299.65zm-44.395 44.392c-6.131-6.131-16.063-6.131-22.194 0-6.131 6.127-6.131 16.066 0 22.19 45.898 45.905 45.898 120.588.008 166.486-6.131 6.131-6.131 16.062 0 22.194 3.065 3.065 7.081 4.598 11.096 4.598 4.016 0 8.032-1.533 11.097-4.598 58.137-58.136 58.129-152.737-.007-210.87zm-44.396 44.392c-6.131-6.123-16.063-6.123-22.195.008-6.131 6.131-6.131 16.063 0 22.194 21.42 21.412 21.42 56.267.008 77.694-6.131 6.131-6.131 16.063 0 22.194 3.066 3.066 7.082 4.599 11.097 4.599 4.016 0 8.031-1.533 11.097-4.599 33.659-33.659 33.652-88.431-.007-122.09zm-54.956-188.871c-1.954-.82-4.016-1.222-6.061-1.222-4.031 0-8.008 1.551-11.005 4.49l-139.419 136.767h-92.838c-26.002 0-47.086 21.083-47.086 47.082v125.562c0 26.01 21.083 47.086 47.086 47.086h95.673l136.467 136.659c3.004 3.004 7.02 4.598 11.104 4.598 2.023 0 4.062-.383 6.001-1.188 5.87-2.429 9.694-8.154 9.694-14.507v-470.854c.002-6.323-3.792-12.024-9.616-14.473zm-186.542 171.421v156.952h-31.39v-156.952h31.39zm-78.476 141.257v-125.562c0-8.645 7.043-15.695 15.695-15.695h15.695v156.952h-15.695c-8.652 0-15.695-7.035-15.695-15.695zm243.245 134.727l-109.667-109.82c-5.886-5.901-13.878-9.212-22.209-9.212h-17.197v-156.952h14.362c8.223 0 16.117-3.219 21.98-8.982l112.731-110.582v395.548z"></path></svg></a>
	<?php }elseif($post_type == 'video'){?>
	<a href="<?php echo $link;?>"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M83.383 224.521c43.345 0 78.476-35.138 78.476-78.476s-35.131-78.468-78.476-78.468c-43.346 0-78.476 35.131-78.476 78.468 0 43.338 35.13 78.476 78.476 78.476zm0-125.554c25.965 0 47.086 21.121 47.086 47.078 0 25.958-21.121 47.086-47.086 47.086s-47.086-21.128-47.086-47.086c.001-25.957 21.122-47.078 47.086-47.078zm219.703 125.631c60.673 0 109.866-49.186 109.866-109.859 0-60.674-49.194-109.866-109.866-109.866-60.682 0-109.866 49.193-109.866 109.866-.001 60.673 49.184 109.859 109.866 109.859zm0-188.335c43.268 0 78.476 35.207 78.476 78.476s-35.208 78.468-78.476 78.468c-43.269 0-78.476-35.199-78.476-78.468s35.206-78.476 78.476-78.476zm172.647 251.131c-6.905 0-13.236 2.292-18.416 6.077v-.108l-60.06 44.373v-34.646c0-26.003-21.083-47.086-47.086-47.086h-298.209c-26.003 0-47.086 21.083-47.086 47.086v156.952c0 26.002 21.082 47.086 47.086 47.086h298.209c26.002 0 47.086-21.083 47.086-47.086v-35.23l60.819 45.476c5.027 3.433 11.104 5.449 17.657 5.449 17.335 0 31.39-14.048 31.39-31.39v-125.562c0-17.343-14.055-31.391-31.39-31.391zm-109.867 50.343v122.304c0 8.652-7.043 15.695-15.695 15.695h-298.209c-8.653 0-15.695-7.043-15.695-15.695v-156.951c0-8.653 7.042-15.695 15.695-15.695h298.209c8.652 0 15.695 7.042 15.695 15.695v34.647zm50.19 61.938l-24.754-18.5 84.431-62.383.045 125.531-59.722-44.648z"></path></svg></a>
	<?php }elseif($post_type == 'portfolio'){?>
	<a href="<?php echo $link;?>"><svg class="ssocial-svg-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M64 352v-320h448v320h-448zm416-266.667l-64 106.667-72.533-60.444-55.467 92.444-192-160v256h384v-234.667zm-352 154.667a48 48 7740 1 0 96 0 48 48 7740 1 0-96 0zm320 176h-448v-320h32v288h416z" transform="scale(1 -1) translate(0 -480)"></path></svg></a>
	<?php }else{?>
	<a href="<?php echo $link;?>"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M460.038 4.877h-408.076c-25.995 0-47.086 21.083-47.086 47.086v408.075c0 26.002 21.09 47.086 47.086 47.086h408.075c26.01 0 47.086-21.083 47.086-47.086v-408.076c0-26.003-21.075-47.085-47.085-47.085zm-408.076 31.39h408.075c8.66 0 15.695 7.042 15.695 15.695v321.744h-52.696l-55.606-116.112c-2.33-4.874-7.005-8.208-12.385-8.821-5.318-.583-10.667 1.594-14.039 5.817l-35.866 44.993-84.883-138.192c-2.989-4.858-8.476-7.664-14.117-7.457-5.717.268-10.836 3.633-13.35 8.775l-103.384 210.997h-53.139v-321.744c0-8.652 7.05-15.695 15.695-15.695zm72.437 337.378l84.04-171.528 81.665 132.956c2.667 4.361 7.311 7.135 12.415 7.45 5.196.314 10.039-1.894 13.227-5.879l34.196-42.901 38.272 79.902h-263.815zm335.639 102.088h-408.076c-8.645 0-15.695-7.043-15.695-15.695v-54.941h439.466v54.941c0 8.652-7.036 15.695-15.695 15.695zm-94.141-266.819c34.67 0 62.781-28.111 62.781-62.781 0-34.671-28.111-62.781-62.781-62.781-34.671 0-62.781 28.11-62.781 62.781s28.11 62.781 62.781 62.781zm0-94.171c17.304 0 31.39 14.078 31.39 31.39s-14.086 31.39-31.39 31.39c-17.32 0-31.39-14.079-31.39-31.39 0-17.312 14.07-31.39 31.39-31.39z"></path></svg></a>
	<?php }
	$m = ob_get_clean();
	echo $m;
}

function ssocial_instgarm_inline_popup_link($url){
	ob_start();
	////http://localhost/sblog/wp-admin/admin-ajax.php?action=ssocial_insta_popup&url=https://www.instagram.com/p/BSxfkU3jMKO/?>
	<a href="<?php echo $url;?>" data-mfp-src="<?php echo admin_url( 'admin-ajax.php' ).'?action=ssocial_inline_social_popup&network=instagram&url='.$url;?>" class="ajax-insta-popup-link"><svg class="ssocial-svg-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M240 24c115.2 0 209.6 94.4 209.6 209.6s-94.4 209.6-209.6 209.6-209.6-94.4-209.6-209.6 94.4-209.6 209.6-209.6zm0-30.4c-132.8 0-240 107.2-240 240s107.2 240 240 240 240-107.2 240-240-107.2-240-240-240zm80 256h-160c-9.6 0-16-6.4-16-16s6.4-16 16-16h160c9.6 0 16 6.4 16 16s-6.4 16-16 16zm-80 80c-9.6 0-16-6.4-16-16v-160c0-9.6 6.4-16 16-16s16 6.4 16 16v160c0 9.6-6.4 16-16 16z"></path></svg></a>
	<?php
	$m = ob_get_clean();
	echo $m;
}
function ssocial_facebook_inline_popup_link($url,$svc_facebook_id,$svc_social_media_type,$svc_social_text,$svc_fb_story_id){
	ob_start();
	//http://plugin.saragna.com/vc-addon/wp-admin/admin-ajax.php?action=svc_inline_social_popup&network=facebook&facebook_id=10151928076803313&fb_type=photo&story=undefined&share=11608?>
	<a href="<?php echo $url;?>" data-mfp-src="<?php echo admin_url( 'admin-ajax.php' ).'?action=ssocial_inline_social_popup&network=facebook&fb_type='.$svc_social_media_type.'&facebook_id='.$svc_facebook_id.'&svc_fb_story_id='.$svc_fb_story_id.'&story='.$svc_social_text;?>" class="ajax-insta-popup-link"><svg class="ssocial-svg-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M240 24c115.2 0 209.6 94.4 209.6 209.6s-94.4 209.6-209.6 209.6-209.6-94.4-209.6-209.6 94.4-209.6 209.6-209.6zm0-30.4c-132.8 0-240 107.2-240 240s107.2 240 240 240 240-107.2 240-240-107.2-240-240-240zm80 256h-160c-9.6 0-16-6.4-16-16s6.4-16 16-16h160c9.6 0 16 6.4 16 16s-6.4 16-16 16zm-80 80c-9.6 0-16-6.4-16-16v-160c0-9.6 6.4-16 16-16s16 6.4 16 16v160c0 9.6-6.4 16-16 16z"></path></svg></a>
	<?php
	$m = ob_get_clean();
	echo $m;
}
function ssocial_vimeo_inline_popup_link($url,$single_vimeo_id,$svc_social_author_img,$svc_social_author_name,$user_id){
	ob_start();?>
	<a href="<?php echo $url;?>" data-mfp-src="<?php echo admin_url( 'admin-ajax.php' ).'?action=ssocial_inline_social_popup&network=vimeo&videoId='.$single_vimeo_id.'&userid='.$user_id.'&from='.$svc_social_author_name.'&profileImg='.$svc_social_author_img;?>" class="ajax-insta-popup-link"><svg class="ssocial-svg-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M240 24c115.2 0 209.6 94.4 209.6 209.6s-94.4 209.6-209.6 209.6-209.6-94.4-209.6-209.6 94.4-209.6 209.6-209.6zm0-30.4c-132.8 0-240 107.2-240 240s107.2 240 240 240 240-107.2 240-240-107.2-240-240-240zm80 256h-160c-9.6 0-16-6.4-16-16s6.4-16 16-16h160c9.6 0 16 6.4 16 16s-6.4 16-16 16zm-80 80c-9.6 0-16-6.4-16-16v-160c0-9.6 6.4-16 16-16s16 6.4 16 16v160c0 9.6-6.4 16-16 16z"></path></svg></a>
	<?php
	$m = ob_get_clean();
	echo $m;
}
function ssocial_youtube_inline_popup_link($url,$single_youtube_id){
	ob_start();
	//http://plugin.saragna.com/vc-addon/wp-admin/admin-ajax.php?action=svc_inline_social_popup&network=youtube&videoId=Lj2R45YHi8M?>
	<a href="<?php echo $url;?>" data-mfp-src="<?php echo admin_url( 'admin-ajax.php' ).'?action=ssocial_inline_social_popup&network=youtube&videoId='.$single_youtube_id;?>" class="ajax-insta-popup-link"><svg class="ssocial-svg-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M240 24c115.2 0 209.6 94.4 209.6 209.6s-94.4 209.6-209.6 209.6-209.6-94.4-209.6-209.6 94.4-209.6 209.6-209.6zm0-30.4c-132.8 0-240 107.2-240 240s107.2 240 240 240 240-107.2 240-240-107.2-240-240-240zm80 256h-160c-9.6 0-16-6.4-16-16s6.4-16 16-16h160c9.6 0 16 6.4 16 16s-6.4 16-16 16zm-80 80c-9.6 0-16-6.4-16-16v-160c0-9.6 6.4-16 16-16s16 6.4 16 16v160c0 9.6-6.4 16-16 16z"></path></svg></a>
	<?php
	$m = ob_get_clean();
	echo $m;
}
function ssocial_dribbble_inline_popup_link($url,$id){
	ob_start();?>
	<a href="<?php echo $url;?>" data-mfp-src="<?php echo admin_url( 'admin-ajax.php' ).'?action=ssocial_inline_social_popup&network=dribbble&postid='.$id;?>" class="ajax-insta-popup-link"><svg class="ssocial-svg-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M240 24c115.2 0 209.6 94.4 209.6 209.6s-94.4 209.6-209.6 209.6-209.6-94.4-209.6-209.6 94.4-209.6 209.6-209.6zm0-30.4c-132.8 0-240 107.2-240 240s107.2 240 240 240 240-107.2 240-240-107.2-240-240-240zm80 256h-160c-9.6 0-16-6.4-16-16s6.4-16 16-16h160c9.6 0 16 6.4 16 16s-6.4 16-16 16zm-80 80c-9.6 0-16-6.4-16-16v-160c0-9.6 6.4-16 16-16s16 6.4 16 16v160c0 9.6-6.4 16-16 16z"></path></svg></a>
	<?php
	$m = ob_get_clean();
	echo $m;
}
function ssocial_pinterest_inline_popup_link($url,$id){
	ob_start();?>
	<a href="<?php echo $url;?>" data-mfp-src="<?php echo admin_url( 'admin-ajax.php' ).'?action=ssocial_inline_social_popup&network=pinterest&postid='.$id;?>" class="ajax-insta-popup-link"><svg class="ssocial-svg-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M240 24c115.2 0 209.6 94.4 209.6 209.6s-94.4 209.6-209.6 209.6-209.6-94.4-209.6-209.6 94.4-209.6 209.6-209.6zm0-30.4c-132.8 0-240 107.2-240 240s107.2 240 240 240 240-107.2 240-240-107.2-240-240-240zm80 256h-160c-9.6 0-16-6.4-16-16s6.4-16 16-16h160c9.6 0 16 6.4 16 16s-6.4 16-16 16zm-80 80c-9.6 0-16-6.4-16-16v-160c0-9.6 6.4-16 16-16s16 6.4 16 16v160c0 9.6-6.4 16-16 16z"></path></svg></a>
	<?php
	$m = ob_get_clean();
	echo $m;
}
function ssocial_vk_inline_popup_link($url,$id){
	ob_start();?>
	<a href="<?php echo $url;?>" data-mfp-src="<?php echo admin_url( 'admin-ajax.php' ).'?action=ssocial_inline_social_popup&network=vk&postid='.$id;?>" class="ajax-insta-popup-link"><svg class="ssocial-svg-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M240 24c115.2 0 209.6 94.4 209.6 209.6s-94.4 209.6-209.6 209.6-209.6-94.4-209.6-209.6 94.4-209.6 209.6-209.6zm0-30.4c-132.8 0-240 107.2-240 240s107.2 240 240 240 240-107.2 240-240-107.2-240-240-240zm80 256h-160c-9.6 0-16-6.4-16-16s6.4-16 16-16h160c9.6 0 16 6.4 16 16s-6.4 16-16 16zm-80 80c-9.6 0-16-6.4-16-16v-160c0-9.6 6.4-16 16-16s16 6.4 16 16v160c0 9.6-6.4 16-16 16z"></path></svg></a>
	<?php
	$m = ob_get_clean();
	echo $m;
}
function ssocial_image_popup($url,$svc_social_img,$social_type){
	ob_start();
	if($social_type == 'pinterest'){
		$image_url = str_replace('237x','564x',$svc_social_img);	
	}else{
		$image_url = $svc_social_img;	
	}?>
	<a href="<?php echo $url;?>" data-mfp-src="<?php echo $image_url;?>" class="ajax-insta-popup-image"><svg class="ssocial-svg-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M240 24c115.2 0 209.6 94.4 209.6 209.6s-94.4 209.6-209.6 209.6-209.6-94.4-209.6-209.6 94.4-209.6 209.6-209.6zm0-30.4c-132.8 0-240 107.2-240 240s107.2 240 240 240 240-107.2 240-240-107.2-240-240-240zm80 256h-160c-9.6 0-16-6.4-16-16s6.4-16 16-16h160c9.6 0 16 6.4 16 16s-6.4 16-16 16zm-80 80c-9.6 0-16-6.4-16-16v-160c0-9.6 6.4-16 16-16s16 6.4 16 16v160c0 9.6-6.4 16-16 16z"></path></svg></a>
	<?php
	$m = ob_get_clean();
	echo $m;
}
function ssocial_goto_link($url,$social_type){
	ob_start();
	if($social_type == 'youtube'){?>
		<a href="<?php echo $url;?>" target="_blank" class="ajax-insta-popup-link"><svg class="ssocial-svg-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M240 24c115.2 0 209.6 94.4 209.6 209.6s-94.4 209.6-209.6 209.6-209.6-94.4-209.6-209.6 94.4-209.6 209.6-209.6zm0-30.4c-132.8 0-240 107.2-240 240s107.2 240 240 240 240-107.2 240-240-107.2-240-240-240zm80 256h-160c-9.6 0-16-6.4-16-16s6.4-16 16-16h160c9.6 0 16 6.4 16 16s-6.4 16-16 16zm-80 80c-9.6 0-16-6.4-16-16v-160c0-9.6 6.4-16 16-16s16 6.4 16 16v160c0 9.6-6.4 16-16 16z"></path></svg></a>
	<?php }else{?>
		<a href="<?php echo $url;?>" target="_blank"><svg class="ssocial-svg-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M240 24c115.2 0 209.6 94.4 209.6 209.6s-94.4 209.6-209.6 209.6-209.6-94.4-209.6-209.6 94.4-209.6 209.6-209.6zm0-30.4c-132.8 0-240 107.2-240 240s107.2 240 240 240 240-107.2 240-240-107.2-240-240-240zm80 256h-160c-9.6 0-16-6.4-16-16s6.4-16 16-16h160c9.6 0 16 6.4 16 16s-6.4 16-16 16zm-80 80c-9.6 0-16-6.4-16-16v-160c0-9.6 6.4-16 16-16s16 6.4 16 16v160c0 9.6-6.4 16-16 16z"></path></svg></a>
	<?php }
	$m = ob_get_clean();
	echo $m;
}

add_action('wp_ajax_nopriv_ssocial_insta_popup','ssocial_insta_popup');
add_action('wp_ajax_ssocial_insta_popup','ssocial_insta_popup');
add_action('wp_ajax_nopriv_ssocial_inline_social_popup','ssocial_inline_social_popup');
add_action('wp_ajax_ssocial_inline_social_popup','ssocial_inline_social_popup');
function ssocial_inline_social_popup(){
	
	if($_GET['network'] == 'dribbble'){
		$svc_social_text = get_post_meta($_GET['postid'], '_svc_social_text', true);
		$svc_social_link = get_post_meta($_GET['postid'], '_svc_social_link', true);
		$svc_social_img =  get_post_meta($_GET['postid'], '_svc_social_img', true);
		
		$svc_social_author_name = get_post_meta($_GET['postid'] , '_svc_social_author_name', true);
		$svc_social_author_img = get_post_meta($_GET['postid'] , '_svc_social_author_img', true);
		$svc_social_author_link = get_post_meta($_GET['postid'] , '_svc_social_author_link', true);
		$svc_social_date = get_post_meta($_GET['postid'] , '_svc_social_date', true);?>
    <style>
	.svc_dribbble_div {
		margin: 20px auto;
		max-width: 500px;
		position: relative;
		width: 100%;
		background: #333;
		display: -webkit-flex;
		display: flex;
		background:#fff;
		border-radius: 4px !important;
	}
	.svc_dribbble_div .pin_main_img{ width:100%;}
	.dribbble-main-container{ padding:15px;border: 0;background: #fff;-moz-box-sizing: border-box;box-sizing: border-box;border-radius: 4px !important;}
	.ssocil_pin_content{
		padding: 10px 0 15px 0;
		font-size: 16px;
		line-height: 1.5em;
		border-bottom: 1px solid #ccc;
		margin-bottom: 15px;
	}
	.popup_social_insta_date{
		font-size: 13px;
	}
	.popup_pin_user_link{
		line-height: 27px;
    	font-size: 15px;
	}
	.popup_social_author_media{
		width: 50px;
		height: 50px;
		border-radius: 50%;
		float: left;
		margin-right: 10px;
	}
	.svc_dribbble_div .svc_share{ bottom: 15px !important;top: inherit;}
	</style>
    <div class="svc_dribbble_div">
    	<div class="dribbble-main-container">
    	<img src="<?php echo $svc_social_img; ?>" class="pin_main_img">
        <div class="ssocil_pin_content"> 
			<?php $svc_social_text = strip_tags($svc_social_text);
            echo social_convertHashtags($svc_social_text,'dribbble');?>
        </div>
        <a href="<?php echo $svc_social_author_link;?>" target="_blank" class="popup_pin_user_link"><img class="popup_social_author_media" src="<?php echo $svc_social_author_img;?>"> <?php echo $svc_social_author_name;?></a>
        <?php if($svc_social_date && $svc_social_date != NULL){?>
        	<div class="popup_social_insta_date"><?php echo ssocial_time_elapsed_string(strtotime($svc_social_date));?></div>
        <?php }?>
        <div class="svc_share">                            
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
        </div>
    </div>
    <?php }
	
	if($_GET['network'] == 'vk'){
		$vk_id = get_post_meta($_GET['postid'], '_vk_id', true);
		$svc_social_text = get_post_meta($_GET['postid'], '_svc_social_text', true);
		$svc_social_link = get_post_meta($_GET['postid'], '_svc_social_link', true);
		$svc_social_img =  get_post_meta($_GET['postid'], '_svc_social_img', true);
		
		$svc_social_author_name = get_post_meta($_GET['postid'] , '_svc_social_author_name', true);
		$svc_social_author_img = get_post_meta($_GET['postid'] , '_svc_social_author_img', true);
		$svc_social_author_link = get_post_meta($_GET['postid'] , '_svc_social_author_link', true);
		$svc_social_date = get_post_meta($_GET['postid'] , '_svc_social_date', true);
		$svc_vk_type = get_post_meta($_GET['postid'] , '_svc_vk_type', true);
		$svc_vk_external_link = get_post_meta($_GET['postid'] , '_svc_vk_external_link', true);
		$svc_vk_external_title = get_post_meta($_GET['postid'] , '_svc_vk_external_title', true);
		
		$api_url = 'https://api.vk.com/method/wall.getById?posts='.$vk_id.'&extended=1';
        $response=json_decode(file_get_contents($api_url));
		?>
    <style>
	.svc_vk_div {
		margin: 20px auto;
		max-width: 550px;
		position: relative;
		width: 100%;
		background: #333;
		display: -webkit-flex;
		display: flex;
		background:#fff;
		border-radius: 4px !important;
	}
	.svc_vk_div .pin_main_img{ width:100%;}
	.vk-main-container{ padding:15px;border: 0;background: #fff;-moz-box-sizing: border-box;box-sizing: border-box;border-radius: 4px !important;width: 100%;}
	.ssocil_pin_content{
		padding: 20px 0 15px 0;
		font-size: 16px;
		line-height: 1.5em;
		margin-bottom: 0px;
	}
	.popup_social_insta_date{
		font-size: 13px;
	}
	.popup_pin_user_link{
		line-height: 27px;
    	font-size: 15px;
	}
	.popup_social_author_media{
		width: 50px;
		height: 50px;
		border-radius: 50%;
		float: left;
		margin-right: 10px;
	}
	.svc_dribbble_div .svc_share{ bottom: 15px !important;top: inherit;}
	.vk_external_link_popup{display: block;line-height: 0; color:#000;}
	.vk_external_link_div{
		border: 1px solid #ccc;
		padding: 10px;
		font-size: 14px;
		line-height:1.5;
	}
	.vk_external_link_div span{ font-size:13px; color:#666;}
	.vk_main_img{ margin-bottom:15px;}
	.insta_like_date{ margin-top:5px; margin-bottom:0px !important;}
	.insta_likes{color: #6888AD;}
	</style>
    <div class="svc_vk_div">
    	<div class="vk-main-container">
        <a href="<?php echo $svc_social_author_link;?>" target="_blank" class="popup_pin_user_link"><img class="popup_social_author_media" src="<?php echo $svc_social_author_img;?>"> <?php echo $svc_social_author_name;?></a>
        <?php if($svc_social_date && $svc_social_date != NULL){?>
        	<div class="popup_social_insta_date"><?php echo date("M j,Y", $svc_social_date);//ssocial_time_elapsed_string($svc_social_date);?></div>
        <?php }?>
        <div class="ssocil_pin_content"> 
			<?php //$svc_social_text = strip_tags($svc_social_text);
            echo nl2br(social_convertHashtags($svc_social_text,'vk'));?>
        </div>
        <?php if($svc_social_img && $svc_social_img != NULL){
        	if($svc_vk_type == 'link'){?>
                <a href="<?php echo $svc_vk_external_link;?>" target="_blank" class="vk_external_link_popup"><img src="<?php echo $svc_social_img; ?>" class="pin_main_img">
                <div class="vk_external_link_div"><?php echo $svc_vk_external_title;?><br /><span><?php echo str_ireplace('', '', parse_url($svc_vk_external_link, PHP_URL_HOST));?></span></div></a>
			<?php }else{
				$count_attach = count($response->response->wall[0]->attachments);
				if($count_attach > 1){
					foreach($response->response->wall[0]->attachments as $imgs){
						if($imgs->type == 'photo'){
							if($imgs->photo->src_xxbig){?>
                            	<img src="<?php echo $imgs->photo->src_xxbig; ?>" class="pin_main_img vk_main_img">
							<?php }elseif($imgs->photo->src_xbig){?>
                            	<img src="<?php echo $imgs->photo->src_xbig; ?>" class="pin_main_img vk_main_img">
                            <?php }elseif($imgs->photo->src_big){?>
								<img src="<?php echo $imgs->photo->src_big; ?>" class="pin_main_img vk_main_img">
							<?php }else{?>
								<img src="<?php echo $imgs->photo->src; ?>" class="pin_main_img vk_main_img">
							<?php }
						}
					}
				}else{?>
            	<img src="<?php echo $svc_social_img; ?>" class="pin_main_img">
            <?php }
			}
		}?>
        <div class="insta_like_date">
            <div class="insta_likes"><i class="fa fa-heart"></i>&nbsp;<?php _e('Like','ssocial');?>&nbsp;<?php echo ssocial_insta_like_counter($response->response->wall[0]->likes->count);?></div>
        </div>
        
        <div class="svc_share">                            
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
        </div>
    </div>
    <?php }
	
	if($_GET['network'] == 'pinterest'){
		$svc_social_text = get_post_meta($_GET['postid'], '_svc_social_text', true);
		$svc_social_title = get_post_meta($_GET['postid'], '_svc_social_title', true);
		$svc_social_link = get_post_meta($_GET['postid'], '_svc_social_link', true);
		$svc_social_img =  get_post_meta($_GET['postid'], '_svc_social_img', true);
		
		$svc_social_author_name = get_post_meta($_GET['postid'] , '_svc_social_author_name', true);
		$svc_social_author_img = get_post_meta($_GET['postid'] , '_svc_social_author_img', true);
		$svc_social_author_link = get_post_meta($_GET['postid'] , '_svc_social_author_link', true);
		$svc_social_date = get_post_meta($_GET['postid'] , '_svc_social_date', true);?>
    <style>
	.svc_pintrest_div {
		margin: 20px auto;
		max-width: 500px;
		position: relative;
		width: 100%;
		background: #333;
		display: -webkit-flex;
		display: flex;
		background:#fff;
		border-radius: 4px !important;
	}
	.svc_pintrest_div .pin_main_img{ width:100%;}
	.pintrest-main-container{ padding:15px;border: 0;background: #fff;-moz-box-sizing: border-box;box-sizing: border-box;border-radius: 4px !important;}
	.ssocil_pin_content{
		padding: 10px 0 15px 0;
		font-size: 16px;
		line-height: 1.5em;
		border-bottom: 1px solid #ccc;
		margin-bottom: 15px;
	}
	.popup_social_insta_date{
		font-size: 13px;
	}
	.popup_pin_user_link{
		line-height: 27px;
    	font-size: 15px;
	}
	.popup_social_author_media{
		width: 50px;
		height: 50px;
		border-radius: 50%;
		float: left;
		margin-right: 10px;
	}
	.svc_pintrest_div .svc_share{ bottom: 15px !important;top: inherit;}
	</style>
    <div class="svc_pintrest_div">
    	<div class="pintrest-main-container">
    	<img src="<?php echo $svc_social_img; ?>" class="pin_main_img">
        <div class="ssocil_pin_content"> 
			<?php $svc_social_text = strip_tags($svc_social_text);
            echo social_convertHashtags($svc_social_text,'pinterest');?>
        </div>
        <a href="<?php echo $svc_social_author_link;?>" target="_blank" class="popup_pin_user_link"><img class="popup_social_author_media" src="<?php echo $svc_social_author_img;?>"> <?php echo $svc_social_author_name;?></a>
        <?php if($svc_social_date && $svc_social_date != NULL){?>
        	<div class="popup_social_insta_date"><?php echo ssocial_time_elapsed_string(strtotime($svc_social_date));?></div>
        <?php }?>
        <div class="svc_share">                            
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
        </div>
    </div>
    <?php }
	
	if($_GET['network'] == 'twitter'){?>
		<div class="svc_tweet_conatiner">
		<style type="text/css">
		.svc_tweet_conatiner{ max-width:500px; background:#f5f8fa;margin:0 auto 15px;border-radius: 6px;}
		.tweet_img_video{ text-align: center; line-height: 0;}
		.tweet_img_video img{ max-width: 100%; width:100%;border-radius: 6px 6px 0 0;}
		.tweet_content{padding: 15px;}
		.tweet_title{ font-size: 17px; color: #333; display:inline-block;line-height: 1.4em;}
		.tweet_title a {color: #8899a6;font-size: 13px;}
		.tweet_message{ margin-top: 3px;margin-bottom:7px; }
		.tweet_tags a{ font-size: 14px; color: #aaa; float: left; margin-right: 5px; }
		.tweet_notes{width:100%; display:inline-block; margin-top:10px;}
		.tweet_notes div{ font-weight: bold; color: #949494; float:left; font-size:15px; margin-right:15px; }
		.twit_profile_img{ float:left;margin-right: 12px;border-radius: 4px;}
		</style>
			<div class="tweet_img_video">
			<?php if($_GET['image_url']){?>
				<img src="<?php echo $_GET['image_url'];//$tweet->entities->media[0]->media_url;?>">
			<?php }?>
			</div>
			<div class="tweet_content">
				<img src="<?php echo $_GET['authore_img'];?>" class="twit_profile_img"><div class="tweet_title"><?php echo $_GET['authore_name'];?> <a href="https://twitter.com/<?php echo $_GET['username'];?>" target="_blank">@<?php echo $_GET['username'];?></a></div>
				<div class="tweet_message"><?php echo $_GET['msg'];?></div>
				<div class="tweet_notes">
					<div><i class="fa fa-retweet" aria-hidden="true"></i> <?php echo $_GET['retweet'];?></div>
					<div><i class="fa fa-heart" aria-hidden="true"></i> <?php echo $_GET['like'];?></div>
				</div>
			</div>
		</div>
        
	<?php }
	
	if($_GET['network'] == 'vimeo'){?>
		<style>
		.svc_vimeo_popup {
			margin: 20px auto;
			max-width: 850px;
			position: relative;
			width: 100%;
			background: #333;
			display: -webkit-flex;
			display: flex;
			background:#fff;
		}
		.svc_vimeo_popup > div{ width:100%;}
		.vimeo-main-container,.vimeo-panel-details{ padding:15px;border: 0;background: #fff;-moz-box-sizing: border-box;box-sizing: border-box;}
		.vimeo-watch-title{ font-size:23px; display:block; margin-bottom:10px;}
		.vimeo-profile-container{ display:inline-block;padding-bottom: 15px; width:100%;position: relative;}
		.vimeo-profile-container > span{ display:table-row;font-size: 14px;}
		.vimeo_profile_img{ width:48px; float:left; margin-right:10px;border-radius: 100%;}
		.vimeo-suscriber_div {
			margin-top: 4px;
		}
		.vimeo-suscriber_div div {
			background: #e62117;
			color: #fff;
			font-size: 13px;
			padding: 3px 6px;
			float: left;
			margin-right: 7px;
		}
		.vimeo-suscriber_div small{
			background: #e62117;
			color: #fff;
			font-size: 13px;
			padding: 2px 6px;
		}
		.vimeo-suscriber_div span{
		    border: 1px solid #ccc;
		    padding: 1px 5px;
			font-size: 13px;
		    background: #f2f2f2;
		}
		.vimeo_view_count {
			position: absolute;
			right: 0;
			font-size: 25px;
			bottom: -1px;
			border-bottom: 2px solid #167ac6;
		}
		.vimeo_publish_date {
			color: #222;
			font-weight: bold;
			font-size: 14px;
			margin-bottom: 5px;
		}
		.vimeo_comments{
			padding:0 0 0 15px;
		}
		.vimeo_comments span{
			width:100%;
			display:inline-block;
			padding: 8px 8px 8px 0;
			box-sizing: border-box;
		}
		.vimeo_comments_inner{
			overflow-y: auto;
			max-height: 380px;
			margin:10px 0 0;
		}
		.vimeo_comments_inner span img{
			float: left;
			margin-right: 10px;
			max-width: 45px;
			border-radius: 50%;
		}
		.vimeo_comments_inner span a {
			font-weight:bold;
		}
		.vimeo_comments_inner span {
			margin: 0 0 6px;
			font-size: 12px;
			line-height: 16px;
			color: #333;
			margin-bottom: 15px;
			display: inline-block;
			width:100%;
		}
		.vimeo_comment_a{ font-size:13px; margin-right:4px;}
		.vimeo_comment_text{ font-size:16px;margin-top: 25px;margin-bottom: 20px;}
		.vimeo_comment_content{ margin-top:5px; font-size:13px; color:#222;}
		.vimeo_profile_data{ font-size:15px;}
		.vimeo-panel-details { background:#F4F6F6 !important;background: #F4F6F6;border-top: 1px solid #D0D8DB;position: relative;}
		.vimeo_like_dislike {padding: 10px 0;font-size: 16px;display: inline-block; width:100%;}
		.vimeo_up {float: left;margin-right: 10px;}
		.you-desc-panel-height-css{}
		.you-desc-panel-height{max-height: 110px;overflow: hidden;}
		.you-desc-hide-show {
			padding-top: 8px;
			font-size: 13px;
			cursor: pointer;
			margin-bottom: 15px;
			padding-bottom: 5px;
			padding-left: 15px;
			font-weight: bold;
			border-bottom: 1px solid #D0D8DB;
			background: #F4F6F6;
		}
		</style>
		<?php		
		
		$api_url1 = 'https://api.vimeo.com/users/'.$_GET['userid'].'/videos/'.$_GET['videoId'].'?access_token=73e23e410b2fe14504a59ff863c2eeae';
		$api_url2 =  'https://api.vimeo.com/videos/'.$_GET['videoId'].'/comments?per_page=25&access_token=73e23e410b2fe14504a59ff863c2eeae';
		
		$response1=json_decode(file_get_contents($api_url1));
		$snippet = $response1;
		//$statistics = $response1->items[0]->statistics;	
		
		$response2=json_decode(file_get_contents($api_url2));
		$snippet_comment = $response2->data;	
		$feed_url = 'https://vimeo.com/'.$_GET['videoId'];
		?>
		<div class="svc_vimeo_popup">
			<div>
				<iframe class="mfp-iframe" src="//player.vimeo.com/video/<?php echo $_GET['videoId'];?>?autoplay=0" frameborder="0" allowfullscreen=""></iframe>
				
				<div class="vimeo-watch-header vimeo-main-container">
					<div class="clearfix">
				      <div class="vimeo-watch-title"><?php echo $snippet->name;?></div>
					  <div class="vimeo-profile-container">
					  	<img src="<?php echo $_GET['profileImg'];?>" class="vimeo_profile_img"/>
						<div class="vimeo_profile_data"><strong><?php echo $_GET['from'];?></strong>  <div class="vimeo_publish_date"><?php echo ssocial_time_elapsed_string(strtotime($snippet->created_time));?></div></div>
					  </div>				  
					</div>
				</div>
				
				<div class="vimeo-panel-details you-panel-details you-desc-panel-height you-desc-panel-height-css">
					<div class="svc_share">                            
						<i class="fa fa-share-alt"></i>
						<div class="svc_share-box full-color">
						  <ul class="s8-social" style="padding-left: 1em; text-indent: -1em;">
							<li class="facebook">
								<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $feed_url;?>" target="_blank" title="">
									<i class="fa fa-facebook"></i>
								</a>
							</li>
							<li class="google">
								<a href="https://plusone.google.com/share?url=<?php echo $feed_url;?>" target="_blank" title="">
									<i class="fa fa-google-plus"></i>
								</a>
							</li>
							<li class="twitter">
								<a href="https://twitter.com/intent/tweet?text=&amp;url=<?php echo $feed_url;?>" target="_blank" title="">
									<i class="fa fa-twitter"></i>
								</a>
							</li>
						  </ul>
						</div>
					</div>
					<div class="vimeo_like_dislike_container">
						<div class="vimeo_like_dislike">
							<div class="vimeo_up"><i class="fa fa-play"></i> <?php echo number_format($snippet->stats->plays);?></div>
							<div class="vimeo_up"><i class="fa fa-heart"></i> <?php echo number_format($snippet->metadata->connections->likes->total);?></div>
						</div>
					</div>
					<div class="vimeo_description"><?php echo nl2br(social_convertHashtags($snippet->description,'vimeo'));?></div>
				</div>
                <div class="you-desc-hide-show vimeo-show-more"><?php _e('Read More...','ssocial');?></div>
                
				
				<div class="vimeo-comment-details">
					<?php $comm_count = count($snippet_comment);
					if($comm_count > 0){?>
					<div class="vimeo_comments">
						<?php $comments = $snippet_comment;?>
						<div class="vimeo_comment_text"><?php _e('COMMENTS','ssocial');?></div>
						<div class="vimeo_comments_inner">
						<?php for($i=0;$i<$comm_count;$i++){?>
						<div>
							<span><img src="<?php echo $comments[$i]->user->pictures->sizes[1]->link;?>" /><a href="<?php echo $comments[$i]->user->link;?>" target="_blank" class="vimeo_comment_a"><?php echo $comments[$i]->user->name;?></a> <?php echo ssocial_time_elapsed_string(strtotime($comments[$i]->created_on));?><div class="vimeo_comment_content"><?php echo $comments[$i]->text;?></div></span>
						</div>
						<?php }?>
						</div>
					</div>
					<?php }?>
				</div>
				
			</div>
		</div>
	
	<?php }
	
	if($_GET['network'] == 'youtube'){?>
		<style>
		.svc_youtube_popup {
			margin: 20px auto;
			max-width: 900px;
			position: relative;
			width: 100%;
			background: #333;
			display: -webkit-flex;
			display: flex;
			background:#fff;
		}
		.svc_youtube_popup > div{ width:100%;}
		.youtube-main-container,.you-panel-details{ padding:15px;margin: 0 0 10px;border: 0;background: #fff;-moz-box-sizing: border-box;box-sizing: border-box;}
		.you-watch-title{ font-size:20px; display:block; margin-bottom:10px;}
		.you-profile-container{ display:inline-block;border-bottom: 1px solid #ccc;padding-bottom: 15px; width:100%;position: relative;}
		.you-profile-container > span{ display:table-row;font-size: 14px;}
		.you_profile_img{ width:48px; float:left; margin-right:10px;}
		.you-suscriber_div {
			margin-top: 4px;
		}
		.you-suscriber_div div {
			background: #e62117;
			color: #fff;
			font-size: 13px;
			padding: 3px 6px;
			float: left;
			margin-right: 7px;
		}
		.you-suscriber_div small{
			background: #e62117;
			color: #fff;
			font-size: 13px;
			padding: 2px 6px;
		}
		.you-suscriber_div span{
		    border: 1px solid #ccc;
		    padding: 1px 5px;
			font-size: 13px;
		    background: #f2f2f2;
		}
		.you_view_count {
			position: absolute;
			right: 0;
			font-size: 25px;
			bottom: -1px;
			border-bottom: 2px solid #167ac6;
		}
		.you_view_count span{ font-size:18px;}
		.you_like_dislike > div {
			display: inline-block;
			margin-right: 14px;
		}
		.you_like_dislike_container{
			display: inline-block;
			width: 100%;
			padding: 10px 10px 0 10px;
			box-sizing: border-box;
		}
		.you_like_dislike {
			color: #807e7e;
			font-size: 14px;
			float: right;
		}
		.you_like_dislike i{ font-size:20px; margin-right:3px;}
		.you_publish_date {
			color: #222;
			font-weight: bold;
			font-size: 14px;
			margin-bottom: 5px;
		}
		.you_comments{
			padding:0 0 0 15px;
		}
		.you_comments span{
			width:100%;
			display:inline-block;
			padding: 8px 8px 8px 0;
			box-sizing: border-box;
		}
		.you_comments_inner{
			overflow-y: auto;
			height: 380px;
			max-height: 100%;
			margin:10px 0 0;
		}
		.you_comments_inner span img{
			float: left;
			margin-right: 10px;
			max-width: 45px;
			border-radius: 2px;
		}
		.you_comments_inner span a {
			font-weight:bold;
		}
		.you_comments_inner span {
			margin: 0 0 6px;
			font-size: 12px;
			line-height: 16px;
			color: #333;
			margin-bottom: 15px;
			display: inline-block;
			width:100%;
		}
		.you_comment_a{ font-size:13px; margin-right:4px;}
		.you_comment_text{ font-size:16px;}
		.you_comment_content{ margin-top:5px; font-size:13px; color:#222;}		
		.you-desc-panel-height-css{margin:-14px 0 12px 0;border-top: 1px solid #e6e3e3; position:relative;}
		.you-desc-panel-height{max-height: 110px;overflow: hidden;}
		.you-desc-hide-show {
			text-align: center;
			box-shadow: 1px -1px 2px rgba(0,0,0,.1);
			-moz-box-sizing: border-box;
			padding-top: 5px;
			font-size: 11px;
			cursor: pointer;
			margin-bottom: 15px;
			border-bottom: 1px solid #f2f2f2;
    		padding-bottom: 5px;
		}
		</style>
		<?php
		$api_url1 = 'https://www.googleapis.com/youtube/v3/videos?part=contentDetails%2Cstatistics%2Csnippet&id='.$_GET['videoId'].'&key=AIzaSyAJKeuhWtuqt7tp8gfg2bWeCXjPSj2Ev_4';
		$api_url2 = 'https://www.googleapis.com/youtube/v3/commentThreads?part=id%2Csnippet&videoId='.$_GET['videoId'].'&key=AIzaSyAJKeuhWtuqt7tp8gfg2bWeCXjPSj2Ev_4';
		
		$response1=json_decode(file_get_contents($api_url1));
		$snippet = $response1->items[0]->snippet;
		$statistics = $response1->items[0]->statistics;
		
		$api_url3 = 'https://www.googleapis.com/youtube/v3/channels?part=brandingSettings,snippet,statistics,contentDetails&id='.$snippet->channelId.'&key=AIzaSyAJKeuhWtuqt7tp8gfg2bWeCXjPSj2Ev_4';		
		
		$response2=json_decode(file_get_contents($api_url2));
		$snippet_comment = $response2->items;
		//$statistics_comment = $response2->items[0]->statistics;
		//echo "<pre>";print_r($snippet_comment);echo "</pre>";die;
		
		$response3=json_decode(file_get_contents($api_url3));
		$snippet_channel = $response3->items[0]->snippet;
		$statistics_channel = $response3->items[0]->statistics;		
		$feed_url = 'https://www.youtube.com/watch?v='.$_GET['videoId'];
		?>
		<div class="svc_youtube_popup">
			<div>
				<iframe class="mfp-iframe" src="//www.youtube.com/embed/<?php echo $_GET['videoId'];?>?rel=0&amp;autoplay=0" frameborder="0" allowfullscreen=""></iframe>
				
				<div class="youtube-watch-header youtube-main-container" style="position:relative;">
                	<div class="svc_share">                            
						<i class="fa fa-share-alt"></i>
						<div class="svc_share-box full-color">
						  <ul class="s8-social" style="padding-left: 1em; text-indent: -1em;">
							<li class="facebook">
								<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $feed_url;?>" target="_blank" title="">
									<i class="fa fa-facebook"></i>
								</a>
							</li>
							<li class="google">
								<a href="https://plusone.google.com/share?url=<?php echo $feed_url;?>" target="_blank" title="">
									<i class="fa fa-google-plus"></i>
								</a>
							</li>
							<li class="twitter">
								<a href="https://twitter.com/intent/tweet?text=&amp;url=<?php echo $feed_url;?>" target="_blank" title="">
									<i class="fa fa-twitter"></i>
								</a>
							</li>
						  </ul>
						</div>
					</div>
					<div class="clearfix">
				      <div class="you-watch-title"><?php echo $snippet->title;?></div>
					  <div class="you-profile-container">
					  	<img src="<?php echo $snippet_channel->thumbnails->default->url;?>" class="you_profile_img"/>
						<span><?php echo $snippet_channel->title;?></span>
						<span><div class="you-suscriber_div"><small><i class="fa fa-youtube-play"></i> <?php _e('subscriber','ssocial');?></small><span><?php echo number_format($statistics_channel->subscriberCount);?></span></div></span>
						<div class="you_view_count"><?php echo number_format($statistics->viewCount);?> <span><?php _e('views','ssocial');?></span></div>
					  </div>
					  <div class="you_like_dislike_container">
					  		<div class="you_like_dislike">
								<div class="you_up"><i class="fa fa-thumbs-up"></i><?php echo number_format($statistics->likeCount);?></div>
								<div class="you_down"><i class="fa fa-thumbs-down"></i><?php echo number_format($statistics->dislikeCount);?></div>
							</div>                            
					  </div>				  
					</div>
				</div>
				
				<div class="you-panel-details you-desc-panel-height you-desc-panel-height-css">
					<div class="you_publish_date"><?php _e('Published on','ssocial');?> <?php echo date('M d,Y',strtotime($snippet->publishedAt));?></div>
					<div class="you_description"><?php echo nl2br(social_convertHashtags($snippet->description,'youtube'));?></div>
				</div>
				<div class="you-desc-hide-show" show-more="<?php _e('SHOW MORE','ssocial');?>" show-less="<?php _e('SHOW LESS','ssocial');?>"><?php _e('SHOW MORE','ssocial');?></div>
                
				<div class="you-comment-details">
					<?php $comm_count = count($snippet_comment);
					if($comm_count > 0){?>
					<div class="you_comments">
						<?php $comments = $snippet_comment;?>
						<div class="you_comment_text"><?php _e('COMMENTS','ssocial');?></div>
						<div class="you_comments_inner">
						<?php for($i=0;$i<$comm_count;$i++){?>
						<div>
							<span><img src="<?php echo $comments[$i]->snippet->topLevelComment->snippet->authorProfileImageUrl;?>" /><a href="<?php echo $comments[$i]->snippet->topLevelComment->snippet->authorChannelUrl;?>" target="_blank" class="you_comment_a"><?php echo $comments[$i]->snippet->topLevelComment->snippet->authorDisplayName;?></a> <?php echo ssocial_time_elapsed_string(strtotime($comments[$i]->snippet->topLevelComment->snippet->publishedAt));?><div class="you_comment_content"><?php echo $comments[$i]->snippet->topLevelComment->snippet->textDisplay;?></div></span>
						</div>
						<?php }?>
						</div>
					</div>
					<?php }?>
				</div>
				
			</div>
		</div>
		<?php
	}
	
	if($_GET['network'] == 'facebook'){
		if($_GET['fb_type'] == 'photo'){
			$api_url1 = 'https://graph.facebook.com/'.$_GET["facebook_id"].'?access_token=939642459399515|GT91tLv3rE7vCXn9UNP1tHsHZSA&fields=images,from,link,created_time,icon,id';
		}else{
			$api_url1 = 'https://graph.facebook.com/'.$_GET["facebook_id"].'?access_token=939642459399515|GT91tLv3rE7vCXn9UNP1tHsHZSA&fields=created_time,icon,from,embed_html';
		}
		$api_url2 = 'https://graph.facebook.com/'.$_GET["facebook_id"].'/likes?limit=1&access_token=939642459399515|GT91tLv3rE7vCXn9UNP1tHsHZSA&summary=1';
		$api_url3 = 'https://graph.facebook.com/'.$_GET["facebook_id"].'/comments?access_token=939642459399515|GT91tLv3rE7vCXn9UNP1tHsHZSA&summary=1';
		$api_url4 = 'https://graph.facebook.com/'.$_GET["svc_fb_story_id"].'?fields=shares&access_token=939642459399515|GT91tLv3rE7vCXn9UNP1tHsHZSA';		
		$response1=json_decode(file_get_contents($api_url1));
		$response2=json_decode(file_get_contents($api_url2));
		$response3=json_decode(file_get_contents($api_url3));
		$response4=json_decode(file_get_contents($api_url4));		
		if($_GET['fb_type'] == 'photo'){
			$feed_url = $response1->link;
		}else{
			$feed_url = 'https://www.facebook.com'.$response1->permalink_url.'/';
		}
		//$response = wp_remote_get( $url );?>
			<div class="svc_facebok_popup">
			<div>
				<div class="sa-col-md-8 sa-col-sm-6" style="line-height:0;text-align: center;">
					<?php 
					if($_GET['fb_type'] == 'photo'){?>
					<a href="<?php echo $feed_url;?>" target="_blank"><img src="<?php echo $response1->images[1]->source;?>" class="fb_popup_img"/></a>
					<?php }else{
						echo $response1->embed_html;
					}?>
				</div>
				<div class="sa-col-md-4 sa-col-sm-6 pos_relative">
				<div class="svc_link">
					<a href="<?php echo $feed_url;?>" target="_blank"><i class="fa fa-link"></i></a>
				</div>
				<div class="svc_share">
					<i class="fa fa-share-alt"></i>
					<div class="svc_share-box full-color">
					  <ul class="s8-social" style="padding-left: 1em; text-indent: -1em;">
						<li class="facebook">
							<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $feed_url;?>" target="_blank" title="">
								<i class="fa fa-facebook"></i>
							</a>
						</li>
						<li class="google">
							<a href="https://plusone.google.com/share?url=<?php echo $feed_url;?>" target="_blank" title="">
								<i class="fa fa-google-plus"></i>
							</a>
						</li>
						<li class="twitter">
							<a href="https://twitter.com/intent/tweet?text=&amp;url=<?php echo $feed_url;?>" target="_blank" title="">
								<i class="fa fa-twitter"></i>
							</a>
						</li>
					  </ul>
					</div>
				</div>
				<div class="fb_popup_content">
					<div class="fb_popup_header">
						<a href="javascript:;" class="fb_profile_img" target="_blank"><img src="https://graph.facebook.com/<?php echo $response1->from->id;?>/picture" /></a>
						<a href="javascript:;" class="fb_profile_name" target="_blank"><?php echo $response1->from->name;?></a>
					</div>
					<hr class="fb_hr"/>
					<div class="fb_like_date">
                    <?php //echo "<pre>";print_r($response4);echo "</pre>";?>
						<div class="fb_likes"><i class="fa fa-thumbs-o-up"></i>&nbsp;<?php echo ssocial_insta_like_counter($response2->summary->total_count);?>&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-comments-o"></i>&nbsp;<?php echo ssocial_insta_like_counter($response3->summary->total_count);?></div>
						<div class="fb_date"><?php echo ssocial_time_elapsed_string(strtotime($response1->created_time));?></div>
					</div>
					<div class="fb_caption">
						<?php if($_GET['story'] != 'undefined'){
							echo social_convertHashtags($_GET['story'],'facebook');
						}?>
					</div>
					</div>
					<?php $comm_count = count($response3->data);
					if($comm_count > 0){?>
					<div class="fb_comments">
						<?php $comments = $response3->data;?>
						<span><?php echo ssocial_insta_like_counter($response4->shares->count);?> <?php _e('shares','ssocial');?><div class="pull_right"><?php echo ssocial_insta_like_counter($response3->summary->total_count);?> <?php _e('Comments','ssocial');?></div></span>
						<div class="fb_comments_inner">
						<?php for($i=0;$i<$comm_count;$i++){?>
						<p><img src="https://graph.facebook.com/<?php echo $comments[$i]->from->id;?>/picture" /><a href="javascript:;" target="_blank"><?php echo $comments[$i]->from->name;?></a> <?php echo $comments[$i]->message;?></p>
						<?php }?>
						</div>
					</div>
					<?php }?>
				</div>
				</div>
			</div>
			<?php
		}
		
	if($_GET['network'] == 'instagram'){
		$url = $_GET['url'].'?taken-by=alexstrohl&__a=1';
		$response=json_decode(file_get_contents($url));
		$media = $response->graphql->shortcode_media;
		$feed_url = 'https://www.instagram.com/p/'.$media->shortcode.'/';?>
		
		<div class="svc_instagram_popup">
		<div>
			<div class="sa-col-md-7 sa-col-sm-6" style="line-height:0">
				<?php if($media->is_video){?>
				<iframe frameborder="0" allowfullscreen="" class="mfp-iframe" src="<?php echo $media->video_url;?>"></iframe>
				<?php }else{?>
				<a href="<?php echo $feed_url;?>" target="_blank"><img src="<?php echo $media->display_url?>" class="insta_popup_img"/></a>
				<?php }?>
			</div>
			<div class="sa-col-md-5 sa-col-sm-6 pos_relative">
			<div class="svc_link">                            
				<a href="<?php echo $feed_url;?>" target="_blank"><i class="fa fa-link"></i></a>
			</div>
			<div class="svc_share">                            
				<i class="fa fa-share-alt"></i>
				<div class="svc_share-box full-color">
				  <ul class="s8-social" style="padding-left: 1em; text-indent: -1em;">
					<li class="facebook">
						<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $feed_url;?>" target="_blank" title="">
							<i class="fa fa-facebook"></i>
						</a>
					</li>
					<li class="google">
						<a href="https://plusone.google.com/share?url=<?php echo $feed_url;?>" target="_blank" title="">
							<i class="fa fa-google-plus"></i>
						</a>
					</li>
					<li class="twitter">
						<a href="https://twitter.com/intent/tweet?text=&amp;url=<?php echo $feed_url;?>" target="_blank" title="">
							<i class="fa fa-twitter"></i>
						</a>
					</li>
				  </ul>
				</div>
			</div>
			<div class="insta_popup_content">
				<div class="insta_popup_header">
					<a href="https://www.instagram.com/<?php echo $media->owner->username;?>/" class="insta_profile_img" target="_blank"><img src="<?php echo $media->owner->profile_pic_url?>" /></a>
					<a href="https://www.instagram.com/<?php echo $media->owner->username;?>/" class="insta_profile_name" target="_blank"><?php echo $media->owner->full_name;?></a>
				</div>
				<hr class="insta_hr"/>
				<div class="insta_like_date">
					<div class="insta_likes"><i class="fa fa-heart-o"></i>&nbsp;<?php echo ssocial_insta_like_counter($media->edge_media_preview_like->count);?>&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-comments-o"></i>&nbsp;<?php echo ssocial_insta_like_counter($media->edge_media_to_comment->count);?></div>
					<div class="insta_date"><?php echo ssocial_time_elapsed_string($media->taken_at_timestamp);?></div>
				</div>
				<div class="insta_caption">
					<?php  $len_caption = strlen($media->edge_media_to_caption->edges[0]->node->text);
						if($len_caption > 350){
							echo social_convertHashtags(substr($media->edge_media_to_caption->edges[0]->node->text,0,350),'instagram').'...';
						}else{
							echo social_convertHashtags($media->edge_media_to_caption->edges[0]->node->text,'instagram');
						}?>
				</div>
				</div>
				<?php $comm_count = count($media->edge_media_to_comment->edges);
					if($comm_count > 0){?>
                <div class="insta_comments">
                    <?php $comments = $media->edge_media_to_comment->edges;?>
                    <span><?php _e('Comments','ssocial');?></span>
                    <div class="insta_comments_inner">
                    <?php for($i=0;$i<$comm_count;$i++){?>
                    <p><a href="https://www.instagram.com/<?php echo $comments[$i]->node->owner->username;?>" target="_blank"><?php echo $comments[$i]->node->owner->username;?></a> <?php echo $comments[$i]->node->text;?></p>
                    <?php }?>
                    </div>
                </div>
                <?php }?>
			</div>
			</div>
        </div>
			<?php
		}
	die();
}

add_action('wp_ajax_nopriv_ssocial_inline_social_popup_special','ssocial_inline_social_popup_special');
add_action('wp_ajax_ssocial_inline_social_popup_special','ssocial_inline_social_popup_special');
function ssocial_inline_social_popup_special(){
	if($_GET['network'] == 'instagram'){?>
		<style>
		.ssocial_insta_mp4_container {
			margin: 20px auto;
			max-width: 500px;
			position: relative;
			width: 100%;
			background: #333;
			display: -webkit-flex;
			display: flex;
			background:#fff;
			border-radius: 4px !important;
		}
		.ssocial_insta_mp4_container video{
			max-width:100%;	
		}
		</style>
        <div class="ssocial_insta_mp4_container">
        	<video controls autoplay>
              <source src="<?php echo $_GET['video_url']?>" type="video/mp4">
              Your browser does not support the video tag.
            </video>
        </div>
	<?php }
	die();
}


if(!function_exists('ssocial_insta_like_counter')){
	function ssocial_insta_like_counter($value){
		if ($value > 999 && $value <= 999999) {
			$result = floor($value / 1000) . 'k';
		} elseif ($value > 999999) {
			$result = floor($value / 1000000) . 'M';
		} else {
			$result = $value;
		}
		return $result;
	}
}
if(!function_exists('ssocial_time_elapsed_string')){
	function ssocial_time_elapsed_string($ptime){
		$etime = time() - $ptime;
	
		if ($etime < 1)
		{
			return '0 seconds';
		}
	
		$a = array( 365 * 24 * 60 * 60  =>  'year',
					 30 * 24 * 60 * 60  =>  'month',
						  24 * 60 * 60  =>  'day',
							   60 * 60  =>  'hour',
									60  =>  'minute',
									 1  =>  'second'
					);
		$a_plural = array( 'year'   => 'years',
						   'month'  => 'months',
						   'day'    => 'days',
						   'hour'   => 'hours',
						   'minute' => 'minutes',
						   'second' => 'seconds'
					);
	
		foreach ($a as $secs => $str)
		{
			$d = $etime / $secs;
			if ($d >= 1)
			{
				$r = round($d);
				return $r . ' ' . ($r > 1 ? $a_plural[$str] : $str) . ' ago';
			}
		}
	}
}
function ssocial_kriesi_pagination($pages = '',$svc_grid_id, $range = 2)
{  
     $showitems = ($range * 2)+1;  
     global $paged;
     if(empty($paged)) $paged = 1;
     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }   
     if(1 != $pages)
     {
         echo "<div class='svc_pagination svc_pagination_".$svc_grid_id."'>";
         //if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo;</a>";
         if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo;</a>";
         for ($i=1; $i <= $pages; $i++)
         {
             //if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )){
                 echo ($paged == $i)? "<a href='".get_pagenum_link($i)."' class='current' page='".$i."'>".$i."</span>":"<a href='".get_pagenum_link($i)."' class='inactive' page='".$i."'>".$i."</a>";
             //}
         }
         //if ($paged < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($paged + 1)."' page='".($paged + 1)."'>&rsaquo;</a>";  
         //if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."' page='".($pages)."'>&raquo;</a>";
         echo "</div>\n";
     }
}

function ssocial_grid_delete(){
	global $wpdb,$animate_slider_table;
	$slider_table = $wpdb->base_prefix.$animate_slider_table;
	$id = intval($_POST['id']);
	$wpdb->delete($slider_table,array('id'=>$id));
die();
}
add_action('wp_ajax_spost_grid_delete', 'spost_grid_delete' );

function social_convertHashtags($str,$social){
	$regex = "/#+([a-zA-Z0-9_]+)/";
	if($social == 'instagram'){
		$str = preg_replace($regex, '<a href="https://www.instagram.com/explore/tags/$1/" target="_blank" class="svc_hashtags">$0</a>', $str);
	}
	if($social == 'facebook'){
		$str = preg_replace($regex, '<a href="https://www.facebook.com/hashtag/$1/" target="_blank" class="svc_hashtags">$0</a>', $str);
	}
	if($social == 'twitter'){
		$str = social_autolink($str);
		$str = preg_replace($regex, '<a href="https://twitter.com/hashtag/$1/" target="_blank" class="svc_hashtags">$0</a>', $str);
	}
	if($social == 'youtube'){
		$str = social_autolink($str);
	}
	if($social == 'dribbble'){
		$str = social_autolink($str);
	}
	if($social == 'vimeo'){
		$str = social_autolink($str);
	}
	if($social == 'vk'){
		$str = social_autolink($str);
	}
	return($str);
}

function social_autolink($string){
	$string = preg_replace("/([\w]+\:\/\/[\w-?&;#~=\.\/\@]+[\w\/])/", "<a target=\"_blank\" href=\"$1\" class=\"svc_hashtags\">$1</a>", $string);
	return $string;
}

function ssocial_get_words($sentence, $count = 10) {
  	$words = explode(" ",$sentence);
    return implode(" ", array_splice($words, 0, $count));
  //preg_match("/(?:\w+(?:\W+|$)){0,$count}/", $sentence, $matches);
  //return $matches[0];
}?>