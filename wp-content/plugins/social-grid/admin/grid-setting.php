<script type="text/javascript">
jQuery(function($){
	//on-off start
	$(".on_off label").click(function(){
		var id = $(this).attr('id');
		var data = $(this).attr('data');
		if(data == 'y'){
			$('.'+id).show();
		}
		if(data == 'n'){
			$('.'+id).hide();
		}
        $(this).parent('div').children('label').removeClass("on");
        $(this).addClass("on");
    });
	//on-off end
	$('.post-list-tabs-menu li').click(function(){
		var tab = $(this).attr('data-tab-index');
		$('.post-list-tabs-menu li').removeClass('spl_active');
		$(this).addClass('spl_active');
		$('.spl_tabs').hide();
		$('#'+tab).show();
	});
	
	$('#grid_query').click(function(){
		$('#grid_query_div').slideToggle();	
	});
});
</script>
<style type="text/css">
.new_fields{ background:#fff; margin-top:0px; padding:5px 5px 0; border:1px solid #e7e4e4; border-top:0px;}
.widefat.dataa,.widefat.dataa td{ border:0px; box-shadow:none; cursor:move;}
.post-list-tabs-menu li {
    background: none repeat scroll 0 0 #fff;
    cursor: pointer;
    float: left;
    padding: 0.7%;
    text-align: center;
    width: 23.55%;
}
.post-list-tabs-menu li.spl_active {
    background: #002B36;
	color:#fff;
}
.post-list-tabs-menu {
    clear: both;
    list-style: none outside none;
}
.spost_button {
    background: #002b36 !important;
    border: 1px solid #002b36 !important;
    border-radius: 0 !important;
    box-shadow: none !important;
    font-size: 15px !important;
    height: 36px !important;
    line-height: 2em !important;
}
</style>
<?php 
$grid = $difault_grid_array;
if(isset($_GET['sid'])){
$id = intval($_GET['sid']);
$grid_data = $wpdb->get_row("select * from ".self::$table_prefix.self::TABLE_SLIDERS_NAME." where id=".$id);
$grid_ori = unserialize($grid_data->slider_params);
$grid = array_merge($difault_grid_array,$grid_ori);
}
//echo "<pre>";print_r($grid);echo "</pre>";?>
<ul class="post-list-tabs-menu">
	<li data-tab-index="general_tab" class="spl_active"><?php _e('General','ssocial');?></li>
	<li data-tab-index="display_tab" class=""><?php _e('Display Setting','ssocial');?></li>
	<li data-tab-index="color_tab" class=""><?php _e('Color / Font Setting','ssocial');?></li>
	<li data-tab-index="popup_tab" class=""><?php _e('Popup Setting','ssocial');?></li>
</ul>
<div class="sblog_setting_container">
<div id="general_tab" class="spl_tabs" style="display:block;">
	<div class="metabox-holder" id="dashboard-widgets" style="width:100%;">
		<div class="postbox-container" style="width:100%;">	
			<div class="meta-box-sortables ui-sortable" style="margin:0">	
				<div class="postbox">
				<div class="inside">	
				<table class="anew_slider_setting">
                	<tr>
						<th><strong class="afl"><?php _e('Title','ssocial');?> :</strong></th>	
						<td>
						<input type="text" name="title" value="<?php echo $grid['title'];?>">
						<p class="description"><?php _e('Enter Social grid title','ssocial');?></p>	
						</td>
					</tr>
					<tr>	
						<th><strong class="afl"><?php _e('Social Grid Type','ssocial');?> :</strong></th>	
						<td>	
						<select name="grid_type" id="spost_grid_type" data-check-depen="yes">
							<option value="post_layout" <?php selected( $grid['grid_type'], 'post_layout' ); ?>><?php _e('Post Layout','ssocial');?></option>
							<option value="carousel" <?php selected( $grid['grid_type'], 'carousel' ); ?>><?php _e('Carousel','ssocial');?></option>
						</select>
						<p class="description">Select Post Grid Type.</p></td>	
					</tr>	
					<tr>	
						<th><strong class="afl"><?php _e('Build Post Query','ssocial');?> :</strong></th>	
						<td>
                        <input type="button" value="Build query" id="grid_query">
                        <p class="description"><?php _e('Create WordPress loop, to populate content from your site.','ssocial');?></p>
                        <div id="grid_query_div">
                            <table style="width:86%">
                                <tr>
                                	<td style="width:200px;">
                                    	<strong class="afl"><?php _e('Post Count','ssocial');?></strong><br>
                                        <input type="text" name="post_count" value="<?php echo $grid['post_count'];?>"/>					
                                    	<p class="description"><?php _e('How many teasers to show? Enter number or word "All".','ssocial');?></p>
                                    </td>
                                    <td style="width:200px;">
                                    	<strong class="afl"><?php _e('Order By','ssocial');?></strong><br>
                                        <select name="order_by">
                                            <option value="date" <?php selected( $grid['order_by'], 'date' ); ?>>Date</option>
                                            <option value="ID" <?php selected( $grid['order_by'], 'ID' ); ?>>ID</option>
                                            <option value="author" <?php selected( $grid['order_by'], 'author' ); ?>>Author</option>
                                            <option value="title" <?php selected( $grid['order_by'], 'title' ); ?>>Title</option>
                                            <option value="modified" <?php selected( $grid['order_by'], 'modified' ); ?>>Modified</option>
                                            <option value="rand" <?php selected( $grid['order_by'], 'rand' ); ?>>Random</option>
                                            <option value="comment_count" <?php selected( $grid['order_by'], 'comment_count' ); ?>>Comment count</option>
                                            <option value="menu_order" <?php selected( $grid['order_by'], 'menu_order' ); ?>>Menu order</option>            
                                        </select>					
                                    	<p class="description"><?php _e('Select how to sort retrieved posts. More at
<a target="_blank" href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters"> WordPress codex page</a>','ssocial');?></p>
                                    </td>
                                    <td style="width:200px;">
                                    	<strong class="afl"><?php _e('Order','ssocial');?></strong><br>
                                        <select name="order">
                                            <option value="" <?php selected( $grid['order'], '' ); ?>></option>
                                            <option value="ASC" <?php selected( $grid['order'], 'ASC' ); ?>>Ascending</option>
                                            <option value="DESC" <?php selected( $grid['order'], 'DESC' ); ?>>Descending</option>
                                        </select>					
                                    	<p class="description"><?php _e('Designates the ascending or descending order.','ssocial');?></p>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </td>	
					</tr>
                    <tr>	
						<th><strong class="afl"><?php _e('Select Social Data','ssocial');?>:</strong></th>	
						<td>
						<input type="checkbox" value="facebook" name="social_type[]" <?php checked( in_array('facebook',$grid['social_type']), '1' ); ?>/><?php _e('Facebook','ssocial');?>
                        <input type="checkbox" value="twitter" name="social_type[]" <?php checked( in_array('twitter',$grid['social_type']), '1' ); ?>/><?php _e('Twitter','ssocial');?>
                        <input type="checkbox" value="youtube" name="social_type[]" <?php checked( in_array('youtube',$grid['social_type']), '1' ); ?>/><?php _e('YouTube','ssocial');?>
                        <input type="checkbox" value="vimeo" name="social_type[]" <?php checked( in_array('vimeo',$grid['social_type']), '1' ); ?>/><?php _e('Vimeo','ssocial');?>
                        <input type="checkbox" value="instagram" name="social_type[]" <?php checked( in_array('instagram',$grid['social_type']), '1' ); ?>/><?php _e('Instagram','ssocial');?>
                        <input type="checkbox" value="dribbble" name="social_type[]" <?php checked( in_array('dribbble',$grid['social_type']), '1' ); ?>/><?php _e('Dribbble','ssocial');?>
                        <input type="checkbox" value="pinterest" name="social_type[]" <?php checked( in_array('pinterest',$grid['social_type']), '1' ); ?>/><?php _e('Pinterest','ssocial');?>
                        <input type="checkbox" value="vk" name="social_type[]" <?php checked( in_array('vk',$grid['social_type']), '1' ); ?>/><?php _e('VK','ssocial');?>
                        <input type="checkbox" value="blockquote" name="social_type[]" <?php checked( in_array('blockquote',$grid['social_type']), '1' ); ?>/><?php _e('Blockquote','ssocial');?>
						<p class="description"><?php _e('Select social data for front side display.','ssocial');?></p>	
						</td>	
					</tr>
					<tr>		
						<th><strong class="afl"><?php _e('Skin type','ssocial');?>:</strong></th>	
						<td>	
							<select name="skin_type" id="spost_skin_type" data-check-depen="yes">
                            	<option value="s1" <?php selected( $grid['skin_type'], 's1' ); ?>>Style1</option>
                                <option value="s2" <?php selected( $grid['skin_type'], 's2' ); ?>>Style2</option>
                                <option value="s3" <?php selected( $grid['skin_type'], 's3' ); ?>>Style3</option>
                                <option value="s4" <?php selected( $grid['skin_type'], 's4' ); ?>>Style4</option>
                           </select>
					<p class="description"><?php _e('Choose skin type for grid layout','ssocial');?>.</p></td>	
					</tr>
                    <tr data-depen-set="true" data-value="carousel" data-id="spost_grid_type" data-attr="select">	
						<th><strong class="afl"><?php _e('Items Display','ssocial');?> :</strong></th>	
						<td>	
						<input type="number" step="1" value="<?php echo $grid['car_display_item'];?>" name="car_display_item" max="100" min="1" data-check-depen="yes" id="spost_car_display_item">
						<p class="description"><?php _e('This variable allows you to set the maximum amount of items displayed at a time with the widest browser width','ssocial');?></p>
						</td>	
					</tr>
                    <tr data-depen-set="true" data-value="carousel" data-id="spost_grid_type" data-attr="select">	
						<th><strong class="afl"><?php _e('Show pagination','ssocial');?> :</strong></th>	
						<td>
                        <div class="onoffswitch">
                            <input type="checkbox" value="yes" name="car_pagination" id="spost_car_pagination" data-check-depen="yes" <?php checked( $grid['car_pagination'], 'yes' ); ?> class="onoffswitch-checkbox"/>
                            <label class="onoffswitch-label" for="myonoffswitch">
                                <span class="sa-onoffswitch-inner"></span>
                                <span class="onoffswitch-switch"></span>
                            </label>
                        </div>
						<p class="description"><?php _e('Show pagination','ssocial');?></p>	
						</td>
					</tr>
                    <tr data-depen-set="true" data-value="yes" data-id="spost_car_pagination" data-attr="checkbox">	
						<th><strong class="afl"><?php _e('Show pagination Numbers','ssocial');?> :</strong></th>	
						<td>
                        <div class="onoffswitch">
                            <input type="checkbox" value="yes" name="car_pagination_num" <?php checked( $grid['car_pagination_num'], 'yes' ); ?> class="onoffswitch-checkbox"/>
                            <label class="onoffswitch-label" for="myonoffswitch">
                                <span class="sa-onoffswitch-inner"></span>
                                <span class="onoffswitch-switch"></span>
                            </label>
                        </div>
						<p class="description"><?php _e('Show numbers inside pagination buttons.','ssocial');?></p>	
						</td>	
					</tr>
                    <tr data-depen-set="true" data-value="carousel" data-id="spost_grid_type" data-attr="select">	
						<th><strong class="afl"><?php _e('Hide navigation','ssocial');?> :</strong></th>	
						<td>
                        <div class="onoffswitch">
                            <input type="checkbox" value="yes" name="car_navigation" <?php checked( $grid['car_navigation'], 'yes' ); ?> class="onoffswitch-checkbox"/>
                            <label class="onoffswitch-label" for="myonoffswitch">
                                <span class="sa-onoffswitch-inner"></span>
                                <span class="onoffswitch-switch"></span>
                            </label>
                        </div>
						<p class="description"><?php _e('Display "next" and "prev" buttons.','ssocial');?></p>	
						</td>	
					</tr>
                    <tr data-depen-set="true" data-value="carousel" data-id="spost_grid_type" data-attr="select">	
						<th><strong class="afl"><?php _e('AutoPlay','ssocial');?> :</strong></th>	
						<td>
                        <div class="onoffswitch">
                            <input type="checkbox" value="yes" name="car_autoplay" id="spost_car_autoplay" data-check-depen="yes" <?php checked( $grid['car_autoplay'], 'yes' ); ?> class="onoffswitch-checkbox"/>
                            <label class="onoffswitch-label" for="myonoffswitch">
                                <span class="sa-onoffswitch-inner"></span>
                                <span class="onoffswitch-switch"></span>
                            </label>
                        </div>
						<p class="description"><?php _e('Set Slider Autoplay.','ssocial');?></p>	
						</td>	
					</tr>
                    <tr data-depen-set="true" data-value="yes" data-id="spost_car_autoplay" data-attr="checkbox">	
						<th><strong class="afl"><?php _e('autoPlay Time','ssocial');?> :</strong></th>	
						<td>	
						<input type="number" step="1" value="<?php echo $grid['car_autoplay_time'];?>" name="car_autoplay_time" max="100" min="1"><?php _e('seconds','ssocial');?>
						<p class="description"><?php _e('Set Autoplay slider speed.','ssocial');?></p>	
						</td>
					</tr>
					<tr data-depen-set="true" data-value="post_layout" data-id="spost_grid_type" data-attr="select">	
						<th><strong class="afl"><?php _e('Desktop Columns Count','ssocial');?> :</strong></th>	
						<td>	
						<select name="grid_columns_count_for_desktop">
                        	<option value="sa-col-md-12" <?php selected( $grid['grid_columns_count_for_desktop'], 'sa-col-md-12' ); ?>><?php _e('1 Column','ssocial');?></option>
                            <option value="sa-col-md-6" <?php selected( $grid['grid_columns_count_for_desktop'], 'sa-col-md-6' ); ?>><?php _e('2 Columns','ssocial');?></option>
                            <option value="sa-col-md-4" <?php selected( $grid['grid_columns_count_for_desktop'], 'sa-col-md-4' ); ?>><?php _e('3 Columns','ssocial');?></option>
                            <option value="sa-col-md-3" <?php selected( $grid['grid_columns_count_for_desktop'], 'sa-col-md-3' ); ?>><?php _e('4 Columns','ssocial');?></option>
                            <option value="sa-col-md-15" <?php selected( $grid['grid_columns_count_for_desktop'], 'sa-col-md-15' ); ?>><?php _e('5 Columns','ssocial');?></option>
                        </select>
						<p class="description"><?php _e('Choose Desktop(PC Mode) Columns Count','ssocial');?></p>	
						</td>	
					</tr>
                    <tr data-depen-set="true" data-value="post_layout" data-id="spost_grid_type" data-attr="select">	
						<th><strong class="afl"><?php _e('Tablet Columns Count','ssocial');?> :</strong></th>	
						<td>	
						<select name="grid_columns_count_for_tablet">
                        	<option value="sa-col-sm-12" <?php selected( $grid['grid_columns_count_for_tablet'], 'sa-col-sm-12' ); ?>><?php _e('1 Column','ssocial');?></option>
                            <option value="sa-col-sm-6" <?php selected( $grid['grid_columns_count_for_tablet'], 'sa-col-sm-6' ); ?>><?php _e('2 Columns','ssocial');?></option>
                            <option value="sa-col-sm-4" <?php selected( $grid['grid_columns_count_for_tablet'], 'sa-col-sm-4' ); ?>><?php _e('3 Columns','ssocial');?></option>
                            <option value="sa-col-sm-3" <?php selected( $grid['grid_columns_count_for_tablet'], 'sa-col-sm-3' ); ?>><?php _e('4 Columns','ssocial');?></option>
                        </select>
						<p class="description"><?php _e('Choose Tablet Columns Count','ssocial');?></p>	
						</td>	
					</tr>
                    <tr data-depen-set="true" data-value="post_layout" data-id="spost_grid_type" data-attr="select">	
						<th><strong class="afl"><?php _e('Mobile Columns Count','ssocial');?> :</strong></th>	
						<td>	
						<select name="grid_columns_count_for_mobile">
                        	<option value="sa-col-xs-12" <?php selected( $grid['grid_columns_count_for_mobile'], 'sa-col-xs-12' ); ?>><?php _e('1 Column','ssocial');?></option>
                            <option value="sa-col-xs-6" <?php selected( $grid['grid_columns_count_for_mobile'], 'sa-col-xs-6' ); ?>><?php _e('2 Columns','ssocial');?></option>
                            <option value="sa-col-xs-4" <?php selected( $grid['grid_columns_count_for_mobile'], 'sa-col-xs-4' ); ?>><?php _e('3 Columns','ssocial');?></option>
                            <option value="sa-col-xs-3" <?php selected( $grid['grid_columns_count_for_mobile'], 'sa-col-xs-3' ); ?>><?php _e('4 Columns','ssocial');?></option>
                        </select>
						<p class="description"><?php _e('Choose Mobile Columns Count','ssocial');?></p>	
						</td>	
					</tr>
					<tr data-depen-set="true" data-value="post_layout" data-id="spost_grid_type" data-attr="select">	
						<th><strong class="afl"><?php _e('Show filter','ssocial');?>:</strong></th>	
						<td>
                        <div class="onoffswitch">
                            <input type="checkbox" value="yes" name="filter" id="spost_filter" data-check-depen="yes" <?php checked( $grid['filter'], 'yes' ); ?> class="onoffswitch-checkbox"/>
                            <label class="onoffswitch-label" for="myonoffswitch">
                                <span class="sa-onoffswitch-inner"></span>
                                <span class="onoffswitch-switch"></span>
                            </label>
                        </div>
						<p class="description"><?php _e('Select to add animated category filter to your posts grid.','ssocial');?></p>	
						</td>	
					</tr>
                    <tr data-depen-set="true" data-value="post_layout" data-id="spost_grid_type" data-attr="select">
						<th><strong class="afl"><?php _e('Layout mode','ssocial');?> :</strong></th>	
						<td>	
						<select name="grid_layout_mode">
                        	<option value="masonry" <?php selected( $grid['grid_layout_mode'], 'masonry' ); ?>><?php _e('Masonry','ssocial');?></option>
                        	<option value="fitRows" <?php selected( $grid['grid_layout_mode'], 'fitRows' ); ?>><?php _e('Fit rows','ssocial');?></option>                            
                        </select>
						<p class="description"><?php _e('Select layout template.','ssocial');?></p>	
						</td>	
					</tr>
                    <tr data-depen-set="true" data-value="s5" data-value1="s8" data-id="spost_skin_type" data-attr="select">
                    	<th><strong class="afl"><?php _e('Minimum Height','ssocial');?></strong></th>
                        <td>
							<input type="number" step="1" value="<?php echo $grid['s5_min_height'];?>" name="s5_min_height" max="9000" min="0">
                            <p class="description"><?php _e('if you not set fetured image so set Minimum Height for artical.default:150px','ssocial');?></p>
                        </td>
                    </tr>
                    <tr data-depen-set="true" data-value="post_layout" data-id="spost_grid_type" data-attr="select">	
						<th><strong class="afl"><?php _e('Pagination Style','ssocial');?> :</strong></th>	
						<td>	
						<select name="load_more" id="spost_load_more" data-check-depen="yes">
                        	<option value="loadmore" <?php selected( $grid['load_more'], 'loadmore' ); ?>><?php _e('Show More','ssocial');?></option>
                            <option value="infinite" <?php selected( $grid['load_more'], 'infinite' ); ?>><?php _e('Infinite Scroll','ssocial');?></option>
                            <option value="pagination" <?php selected( $grid['load_more'], 'pagination' ); ?>><?php _e('Number Pagination','ssocial');?></option>
                        </select>
						<p class="description"><?php _e('Select Pagination Style.','ssocial');?></p>	
						</td>	
					</tr>
                    <tr data-depen-set="true" data-value="post_layout" data-id="spost_grid_type" data-attr="select">	
						<th><strong class="afl"><?php _e('Hide Show more Button','ssocial');?>:</strong></th>	
						<td>
                        <div class="onoffswitch">
                            <input type="checkbox" value="yes" name="hide_showmore" <?php checked( $grid['hide_showmore'], 'yes' ); ?> class="onoffswitch-checkbox"/>
                            <label class="onoffswitch-label" for="myonoffswitch">
                                <span class="sa-onoffswitch-inner"></span>
                                <span class="onoffswitch-switch"></span>
                            </label>
                        </div>
						<p class="description"><?php _e('hide Show more button','ssocial');?>.</p>	
						</td>	
					</tr>
                    <tr data-depen-set="true" data-value="post_layout" data-id="spost_grid_type" data-attr="select">	
						<th><strong class="afl"><?php _e('Post load Effect','ssocial');?> :</strong></th>	
						<td>
						<select name="effect">
                        <?php foreach($animations as $animation){?>
                        	<option value="<?php echo $animation;?>" <?php selected( $grid['effect'], $animation ); ?>><?php echo $animation;?></option>
						<?php }?>
                        </select>
						<p class="description"><?php _e('Select post load effect','ssocial');?>.</p>	
						</td>	
					</tr>
                    <tr data-depen-set="true" data-value="post_layout" data-id="spost_grid_type" data-attr="select">	
						<th><strong class="afl"><?php _e('Viewport Loading','ssocial');?> :</strong></th>	
						<td>
                        <div class="onoffswitch">
                            <input type="checkbox" value="yes" name="viewport" <?php checked( $grid['viewport'], 'yes' ); ?> class="onoffswitch-checkbox"/>
                            <label class="onoffswitch-label" for="myonoffswitch">
                                <span class="sa-onoffswitch-inner"></span>
                                <span class="onoffswitch-switch"></span>
                            </label>
                        </div>
						<p class="description"><?php _e('Viewport Loading is Scroll wise loading feed.','ssocial');?>.</p>	
						</td>	
					</tr>
                    <tr>
                    	<th><strong class="afl"><?php _e('Show more text','ssocial');?></strong></th>
                        <td>
                            <input type="text" name="loadmore_text" value="<?php echo $grid['loadmore_text'];?>"/>
                            <p class="description"><?php _e('add Show more button text.Default:Show More','ssocial');?></p>
                        </td>
                    </tr>
                    <tr>
                    	<th><strong class="afl"><?php _e('Extra class name','ssocial');?></strong></th>
                        <td>
                            <input type="text" name="svc_class" value="<?php echo $grid['svc_class'];?>"/>
                            <p class="description"><?php _e('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.','ssocial');?></p>
                        </td>
                    </tr>
				</table>
				</div>	
				</div>	
			</div>	
		</div>
	</div>
</div>
<div id="display_tab" class="spl_tabs">
	<div class="metabox-holder" id="dashboard-widgets" style="width:100%;">
		<div class="postbox-container" style="width:100%;">	
			<div class="meta-box-sortables ui-sortable" style="margin:0">	
				<div class="postbox">
				<div class="inside">	
				<table class="anew_slider_setting">	
					<tr >	
						<th><strong class="afl"><?php _e('Hide Excerpt','ssocial');?>:</strong></th>	
						<td>
                        <div class="onoffswitch">
                            <input type="checkbox" value="yes" name="dexcerpt" id="spost_dexcerpt" data-check-depen="yes" <?php checked( $grid['dexcerpt'], 'yes' ); ?> class="onoffswitch-checkbox"/>
                            <label class="onoffswitch-label" for="myonoffswitch">
                                <span class="sa-onoffswitch-inner"></span>
                                <span class="onoffswitch-switch"></span>
                            </label>
                        </div>
						<p class="description"><?php _e('hide Excerpt content. Twitter and Blockquote content not hide.','ssocial');?></p>	
						</td>	
					</tr>
                    <tr data-depen-set="true" data-value="" data-id="spost_dexcerpt" data-attr="checkbox">
                    	<th><strong class="afl"><?php _e('Excerpt Length','ssocial');?></strong></th>
                        <td>
							<input type="number" step="1" value="<?php echo $grid['svc_excerpt_length'];?>" name="svc_excerpt_length" max="900" min="10">
                            <p class="description"><?php _e('set excerpt length.default:20','ssocial');?></p>
                        </td>
                    </tr>
                    <tr>	
						<th><strong class="afl"><?php _e('Hide Date','ssocial');?>:</strong></th>	
						<td>
                        <div class="onoffswitch">
                            <input type="checkbox" value="yes" name="ddate" <?php checked( $grid['ddate'], 'yes' ); ?> class="onoffswitch-checkbox"/>
                            <label class="onoffswitch-label" for="myonoffswitch">
                                <span class="sa-onoffswitch-inner"></span>
                                <span class="onoffswitch-switch"></span>
                            </label>
                        </div>
						<p class="description"><?php _e('hide Date.','ssocial');?></p>	
						</td>	
					</tr>
                    <tr>	
						<th><strong class="afl"><?php _e('Hide Username and User Image','ssocial');?>:</strong></th>	
						<td>
                        <div class="onoffswitch">
                            <input type="checkbox" value="yes" name="duser" <?php checked( $grid['duser'], 'yes' ); ?> class="onoffswitch-checkbox"/>
                            <label class="onoffswitch-label" for="myonoffswitch">
                                <span class="sa-onoffswitch-inner"></span>
                                <span class="onoffswitch-switch"></span>
                            </label>
                        </div>
						<p class="description"><?php _e('hide Username and User Image.','ssocial');?></p>	
						</td>	
					</tr>
                    <tr>	
						<th><strong class="afl"><?php _e('Hide YouTube and Vimeo Title','ssocial');?>:</strong></th>	
						<td>
                        <div class="onoffswitch">
                            <input type="checkbox" value="yes" name="dvideo_title" <?php checked( $grid['dvideo_title'], 'yes' ); ?> class="onoffswitch-checkbox"/>
                            <label class="onoffswitch-label" for="myonoffswitch">
                                <span class="sa-onoffswitch-inner"></span>
                                <span class="onoffswitch-switch"></span>
                            </label>
                        </div>
						<p class="description"><?php _e('Hide YouTube and Vimeo Title.','ssocial');?></p>	
						</td>	
					</tr>
                    <tr>	
						<th><strong class="afl"><?php _e('Hide Social Share','ssocial');?>:</strong></th>	
						<td>
                        <div class="onoffswitch">
                            <input type="checkbox" value="yes" name="hide_social_share" <?php checked( $grid['hide_social_share'], 'yes' ); ?> class="onoffswitch-checkbox"/>
                            <label class="onoffswitch-label" for="myonoffswitch">
                                <span class="sa-onoffswitch-inner"></span>
                                <span class="onoffswitch-switch"></span>
                            </label>
                        </div>
						<p class="description"><?php _e('Hide Social Share.','ssocial');?></p>	
						</td>	
					</tr>
				</table>
				</div>	
				</div>	
			</div>	
		</div>
	</div>
</div>
<div id="color_tab" class="spl_tabs">
	<div class="metabox-holder" id="dashboard-widgets" style="width:100%;">
		<div class="postbox-container" style="width:100%;">	
			<div class="meta-box-sortables ui-sortable" style="margin:0">	
				<div class="postbox">
				<div class="inside">	
				<table class="vertical-top">	
					<tr>
						<th><strong class="afl"><?php _e('Post Background Color','ssocial');?> :</strong></th>	
						<td>	
							<input type="text" class="my-color-field" name="pbgcolor" data-default-color="" value="<?php echo $grid['pbgcolor'];?>"/>	
						<p class="description"><?php _e('set post background color.','ssocial');?></p></td>	
					</tr>
					<tr>	
						<th><strong class="afl"><?php _e('Title Color/Font Size for Youtube and Vimeo','ssocial');?> :</strong></th>	
						<td>	
						<input type="text" class="my-color-field" name="tcolor" data-default-color="" value="<?php echo $grid['tcolor'];?>"/>
                        <div class="sblog-font-size"><input type="number" step="1" value="<?php echo $grid['tsize'];?>" name="tsize" max="900" min="1">px</div>	
						<p class="description"><?php _e('Set Title Color/Font Size for Youtube and Vimeo. Default font size : 18px','ssocial');?>.</p>	
						</td>	
					</tr>
					<tr>	
						<th><strong class="afl"><?php _e('Description Color/Font size','ssocial');?> :</strong></th>	
						<td>	
						<input type="text" class="my-color-field" name="descolor" data-default-color="" value="<?php echo $grid['descolor'];?>"/>
                        <div class="sblog-font-size"><input type="number" step="1" value="<?php echo $grid['dessize'];?>" name="dessize" max="900" min="1">px</div>	
						<p class="description"><?php _e('Set Description Color/Font size. Default font size : 14px','ssocial');?>.</p>	
						</td>	
					</tr>
                    <tr>	
						<th><strong class="afl"><?php _e('Twitter and Blockquote Font size','ssocial');?> :</strong></th>	
						<td>
                        <div class="sblog-font-size"><input type="number" step="1" value="<?php echo $grid['twitter_size'];?>" name="twitter_size" max="900" min="1">px</div>	
						<p class="description"><?php _e('Set Twitter and Blockquote Font size. Default font size : 19px','ssocial');?>.</p>	
						</td>	
					</tr>
                    <tr>	
						<th><strong class="afl"><?php _e('Description Link and User Link Color','ssocial');?> :</strong></th>	
						<td>	
						<input type="text" class="my-color-field" name="linkcolor" data-default-color="" value="<?php echo $grid['linkcolor'];?>"/>	
						<p class="description"><?php _e('Set Description Link and User Link Color','ssocial');?>.</p>	
						</td>	
					</tr>
                    <tr>	
						<th><strong class="afl"><?php _e('Image Hover Overlay Background Color','ssocial');?> :</strong></th>	
						<td>	
						<input type="text" class="my-color-field" name="overlay_color" data-default-color="" value="<?php echo $grid['overlay_color'];?>"/>	
						<p class="description"><?php _e('Set Image Hover Overlay Background Color','ssocial');?>.</p>	
						</td>	
					</tr>
					<tr data-depen-set="true" data-value="loadmore" data-value1="infinite" data-id="spost_load_more" data-attr="select">	
						<th><strong class="afl"><?php _e('Show More Color','ssocial');?> :</strong></th>	
						<td>	
						<input type="text" class="my-color-field" name="load_more_color" data-default-color="" value="<?php echo $grid['load_more_color'];?>"/>	
						<p class="description"><?php _e('Set Show More Color','ssocial');?>.</p>	
						</td>	
					</tr>
					<tr data-depen-set="true" data-value="yes" data-id="spost_filter" data-attr="checkbox">
						<th><strong class="afl"><?php _e('Filter text and border color','ssocial');?> :</strong></th>	
						<td>	
						<input type="text" class="my-color-field" name="filter_text_color" data-default-color="" value="<?php echo $grid['filter_text_color'];?>"/>	
						<p class="description"><?php _e('Set Filter text and border color','ssocial');?>.</p>	
						</td>	
					</tr>
					<tr data-depen-set="true" data-value="yes" data-id="spost_filter" data-attr="checkbox">
						<th><strong class="afl"><?php _e('Active Filter text color','ssocial');?> :</strong></th>	
						<td>	
						<input type="text" class="my-color-field" name="filter_text_active_color" data-default-color="" value="<?php echo $grid['filter_text_active_color'];?>"/>	
						<p class="description"><?php _e('Set Active Filter text color','ssocial');?>.</p>	
						</td>	
					</tr>
					<tr data-depen-set="true" data-value="yes" data-id="spost_filter" data-attr="checkbox">
						<th><strong class="afl"><?php _e('Active Filter text background color','ssocial');?> :</strong></th>	
						<td>	
						<input type="text" class="my-color-field" name="filter_text_active_bgcolor" data-default-color="" value="<?php echo $grid['filter_text_active_bgcolor'];?>"/>	
						<p class="description"><?php _e('Set Active Filter text background color','ssocial');?>.</p>	
						</td>	
					</tr>
					<tr data-depen-set="true" data-value="pagination" data-id="spost_load_more" data-attr="select">
						<th><strong class="afl"><?php _e('Pagination background color','ssocial');?> :</strong></th>	
						<td>	
						<input type="text" class="my-color-field" name="pagination_bgcolor" data-default-color="" value="<?php echo $grid['pagination_bgcolor'];?>"/>	
						<p class="description"><?php _e('Set Pagination background color','ssocial');?>.</p>	
						</td>	
					</tr>
					<tr data-depen-set="true" data-value="pagination" data-id="spost_load_more" data-attr="select">
						<th><strong class="afl"><?php _e('Pagination active background color','ssocial');?> :</strong></th>	
						<td>	
						<input type="text" class="my-color-field" name="pagination_active_bgcolor" data-default-color="" value="<?php echo $grid['pagination_active_bgcolor'];?>"/>	
						<p class="description"><?php _e('Set Pagination active background color','ssocial');?>.</p>	
						</td>	
					</tr>
					<tr data-depen-set="true" data-value="pagination" data-id="spost_load_more" data-attr="select">	
						<th><strong class="afl"><?php _e('Pagination Number color','ssocial');?> :</strong></th>	
						<td>	
						<input type="text" class="my-color-field" name="pagination_number_color" data-default-color="" value="<?php echo $grid['pagination_number_color'];?>"/>	
						<p class="description"><?php _e('Set Pagination Number color','ssocial');?>.</p>	
						</td>	
					</tr>
					<tr data-depen-set="true" data-value="carousel" data-id="spost_grid_type" data-attr="select">	
						<th><strong class="afl"><?php _e('Navigation and Pagination color','ssocial');?> :</strong></th>	
						<td>	
						<input type="text" class="my-color-field" name="car_navigation_color" data-default-color="" value="<?php echo $grid['car_navigation_color'];?>"/>	
						<p class="description"><?php _e('Set Navigation and Pagination color','ssocial');?>.</p>	
						</td>	
					</tr>
				</table>
				</div>	
				</div>	
			</div>	
		</div>
	</div>
</div>
<div id="popup_tab" class="spl_tabs">
	<div class="metabox-holder" id="dashboard-widgets" style="width:100%;">
		<div class="postbox-container" style="width:100%;">	
			<div class="meta-box-sortables ui-sortable" style="margin:0">	
				<div class="postbox">
				<div class="inside">	
				<table class="vertical-top">
					<tr>	
						<th><strong class="afl"><?php _e('Popup Style','ssocial');?>:</strong></th>	
						<td>
                        <select name="popup_type">
                        	<option value="image_popup" <?php selected( $grid['popup_type'], 'image_popup' ); ?>><?php _e('Image/Video','ssocial');?></option>
                            <option value="content_popup" <?php selected( $grid['popup_type'], 'content_popup' ); ?>><?php _e('Content Popup','ssocial');?></option>
                            <option value="goto" <?php selected( $grid['popup_type'], 'goto' ); ?>><?php _e('Goto Social site','ssocial');?></option>
                        </select>
						<p class="description"><?php _e('set popup type.','ssocial');?></p>	
						</td>	
					</tr>
				</table>
				</div>	
				</div>	
			</div>	
		</div>
	</div>
</div>
</div>
<?php if(isset($_GET['sid'])){?>
<input type="submit" class="button-primary spost_button" value="<?php _e('Update Setting','ssocial');?>" name="spost_Update_Setting" style="width:100%;">
<?php }else{?>
<input type="submit" class="button-primary spost_button" value="<?php _e('Save Setting','ssocial');?>" name="spost_save_Setting" style="width:100%;">
<?php }?>
<div id="dialog" title="Edit Level" style="display:none"></div>
