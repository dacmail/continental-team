<?php
$config = array(
    'title' => sprintf('Social Options') ,
    'id' => 'mk-metaboxes-blog',
    'pages' => array(
        'social'
    ) ,
    'callback' => '',
    'context' => 'normal',
    'priority' => 'core'
);
$options = array(
    array(
        "name" => __("Social Format", "mk_framework") ,
        "desc" => __("You can set the Social format using this option.", "mk_framework") ,
        "id" => "_single_post_type",
        "default" => 'image',
        "preview" => false,
        "options" => array(
            "blockquote" => __('Blockquote', "mk_framework") ,
			"facebook" => __('Facebook', "mk_framework") ,
			"youtube" => __('Youtube', "mk_framework") ,
			"vimeo" => __('Vimeo', "mk_framework") ,
			"pinterest" => __('Pinterest', "mk_framework") ,			
            "twitter" => __('Twitter', "mk_framework") ,
            "instagram" => __('Instagram', "mk_framework") ,
			"vk" => __('VK', "mk_framework") ,
            "dribbble" => __('Dribbble', "mk_framework") ,
        ) ,
        "type" => "select"
    ) ,
    array(
        "name" => __("Pinterest Pin Id", "mk_framework") ,
        "desc" => __("Sample ID should look like : https://in.pinterest.com/pin/<strong>ID</strong>/", "mk_framework") ,
        "subtitle" => __("", "mk_framework") ,
        "id" => "_pinterest_id",
        "default" => "",
        "type" => "text",
        "dependency" => array(
            'element' => "_single_post_type",
            'value' => array(
                'pinterest',
            )
        ) ,
    ) ,
	array(
        "name" => __("VK Id", "mk_framework") ,
        "desc" => __("Sample ID should look like : https://vk.com/michael.kuzmin?w=wall<strong>ID</strong>/", "mk_framework") ,
        "subtitle" => __("", "mk_framework") ,
        "id" => "_vk_id",
        "default" => "",
        "type" => "text",
        "dependency" => array(
            'element' => "_single_post_type",
            'value' => array(
                'vk',
            )
        ) ,
    ) ,
    array(
        "name" => __("Dribbble Id", "mk_framework") ,
        "desc" => __("Sample ID should look like : https://dribbble.com/shots/<strong>ID</strong>-Gaslighting", "mk_framework") ,
        "subtitle" => __("", "mk_framework") ,
        "id" => "_dribbble_id",
        "default" => "",
        "type" => "text",
        "dependency" => array(
            'element' => "_single_post_type",
            'value' => array(
                'dribbble',
            )
        ) ,
    ) ,
    
    array(
        "name" => __("Blockquote", "mk_framework") ,
        "desc" => __("Paste the quote content in below textarea.", "mk_framework") ,
        "subtitle" => __("", "mk_framework") ,
        "id" => "_blockquote_content",
        "default" => "",
        "type" => "textarea",
        "dependency" => array(
            'element' => "_single_post_type",
            'value' => array(
                'blockquote',
            )
        ) ,
    ) ,
    array(
        "name" => __("Blockquote Author", "mk_framework") ,
        "desc" => __("", "mk_framework") ,
        "subtitle" => __("", "mk_framework") ,
        "id" => "_blockquote_author",
        "default" => "",
        "type" => "text",
        "dependency" => array(
            'element' => "_single_post_type",
            'value' => array(
                'blockquote',
            )
        ) ,
    ) ,
    
    array(
        "name" => __("Soundcloud", "mk_framework") ,
        "desc" => __("Paste embed iframe. Please note that using this option will ignore above options related to hosted audio player.", "mk_framework") ,
        "subtitle" => __("", "mk_framework") ,
        "id" => "_audio_iframe",
        "default" => "",
        "type" => "textarea",
        "dependency" => array(
            'element' => "_single_post_type",
            'value' => array(
                'soundcloud'
            )
        ) ,
    ) ,
	
	array(
        "name" => __("Facebook Id", "mk_framework") ,
        "desc" => __("Sample ID should look like : https://www.facebook.com/VinDiesel/photos/a.10150844693113313.461646.89562268312/<strong>ID</strong>/?type=3&theater", "mk_framework") ,
        "subtitle" => __("", "mk_framework") ,
        "id" => "_facebook_id",
        "default" => "",
        "type" => "text",
        "dependency" => array(
            'element' => "_single_post_type",
            'value' => array(
                'facebook',
            )
        ) ,
    ) ,
	
	array(
        "name" => __("Facebook Video Id", "mk_framework") ,
        "desc" => __("Sample ID should look like : https://www.facebook.com/plugins/video.php?href=https://www.facebook.com/VinDiesel/videos/<strong>ID</strong>/&show_text=0&width=560", "mk_framework") ,
        "subtitle" => __("", "mk_framework") ,
        "id" => "_facebook_video_id",
        "default" => "",
        "type" => "text",
        "dependency" => array(
            'element' => "_single_post_type",
            'value' => array(
                'facebook',
            )
        ) ,
    ) ,
    
    array(
        "name" => __("The URL of tweet", "mk_framework") ,
        "desc" => __("Sample ID should look like : https://twitter.com/shabbyapple/status/<strong>ID</strong>", "mk_framework") ,
        "subtitle" => __("", "mk_framework") ,
        "id" => "_tweet_oembed",
        "default" => "",
        "type" => "text",
        "dependency" => array(
            'element' => "_single_post_type",
            'value' => array(
                'twitter',
            )
        ) ,
    ) ,
    array(
        "name" => __("Instagram Media Url", "mk_framework") ,
        "desc" => __("Sample url should look like : https://www.instagram.com/p/<strong>ID</strong>/", "mk_framework") ,
        "subtitle" => __("", "mk_framework") ,
        "id" => "_instagram_url",
        "default" => "",
        "type" => "text",
        "dependency" => array(
            'element' => "_single_post_type",
            'value' => array(
                'instagram',
            )
        ) ,
    ) ,
    array(
        "name" => __("Video Id", "mk_framework") ,
        "desc" => __("Please fill this option with the required ID. you can find the ID from the link parameters as examplified below:<br /> http://www.dailymotion.com/embed/video/<strong>ID</strong>", "mk_framework") ,
        "id" => "_single_dailymotion_id",
        "type" => "text",
        "dependency" => array(
            'element' => "_single_post_type",
            'value' => array(
                'dailymotion',
            )
        ) ,
    ) ,
	
	array(
        "name" => __("Video Id", "mk_framework") ,
        "desc" => __("Please fill this option with the required ID. you can find the ID from the link parameters as examplified below:<br />https://vimeo.com/<strong>ID</strong>", "mk_framework") ,
        "id" => "_single_vimeo_id",
        "type" => "text",
        "dependency" => array(
            'element' => "_single_post_type",
            'value' => array(
                'vimeo',
            )
        ) ,
    ) ,
	
	array(
        "name" => __("Video Id", "mk_framework") ,
        "desc" => __("Please fill this option with the required ID. you can find the ID from the link parameters as examplified below:<br /> http://www.youtube.com/watch?v=<strong>ID</strong>", "mk_framework") ,
        "id" => "_single_youtube_id",
        "type" => "text",
        "dependency" => array(
            'element' => "_single_post_type",
            'value' => array(
                'youtube',
            )
        ) ,
    ) ,
    
    /*array(
        "name" => __("Featured Image", "mk_framework") ,
        "desc" => __("This option will disable post featured image, video, audio and gallery (portfolio Post Format).", "mk_framework") ,
        "id" => "_disable_featured_image",
        "default" => 'true',
        "type" => "toggle"
    ),*/
);
new mkMetaboxesGenerator_ssocial($config, $options);
