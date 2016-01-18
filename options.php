<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 * 
 */

function optionsframework_option_name() {
	$themename = preg_replace("/\W/", "", strtolower( get_current_theme() ) );

	$optionsframework_settings = get_option('optionsframework');
	$optionsframework_settings['id'] = $themename;
	update_option('optionsframework', $optionsframework_settings);
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the "id" fields, make sure to use all lowercase and no spaces.
 *  
 */

function optionsframework_options() {

	// Pull all the categories into an array
	$options_categories = array();  
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
    	$options_categories[$category->cat_ID] = $category->cat_name;
	}

	// Pull all the pages into an array
	$options_pages = array();  
	$options_pages_obj = get_pages( 'sort_column=post_parent,menu_order' );
	$options_pages[''] = 'Select a page:';
	foreach ($options_pages_obj as $page) {
    	$options_pages[$page->ID] = $page->post_title;
	}

	$options = array();

	$options[] = array( "name" => "Style Settings",
						"type" => "heading");

	$options[] = array( "name" => "Color Style",
						"desc" => "Choose the color style you want.",
						"id" => "style",
						"std" => "blue",
						"type" => "select",
						"class" => "tiny", //mini, tiny, small
						"options" => array('green' => 'green', 'blue' => 'blue', 'orange' => 'orange', 'red' => 'red', 'brown' => 'brown', 'yellow' => 'yellow', 'gray' => 'gray', 'magento' => 'magento', 'purple' => 'purple', 'cyan' => 'cyan'));	

	$options[] = array(
		"name"	=> "Theme Settings",
		"type"	=> "heading"
	);

	$options[] = array(
		"name"	=> "Static Text Logo",
		"desc"	=> "Overrides image based logos and instead uses the site name and description.",
		"id"	=> "text_logo",
		"std"	=> "0",
		"type"	=> "checkbox"
	);

	$options[] = array(
		"name"	=> "Custom Logo",
		"desc"	=> "Upload your custom logo.",
		"id"	=> "logo",
		"type"	=> "upload"
	);

	$options[] = array(
		"name"	=> "Posts Author Info",
		"desc"	=> "Display the atuhor info below a single post",
		"id"	=> "author_info",
		"std"	=> "1",
		"type"	=> "checkbox"
	);

	$options[] = array(
		"name"		=> "Related Posts",
		"desc"		=> "Display the related posts below a single post",
		"id"		=> "related_posts",
		"std"		=> "1",
		"type"		=> "checkbox"
	);

	$options[] = array(
		"name"		=> "Related Posts Count",
		"desc"		=> "How many related posts to display?",
		"id"		=> "related_posts_count",
		"std"		=> "3",
		"type"		=> "select",
		'options'	=>	range( 1, 20 )
	);

	$options[] = array(
		"name"		=> "Image Gallery Count",
		"desc"		=> "How many images will be displayed on Image Gallery page?",
		"id"		=> "gallery_count",
		"std"		=> "5",
		"type"		=> "select",
		'options'	=>	range( 1, 20 )
	);

	$options[] = array(
		"name"		=> "Footer Copyright Text",
		"desc"		=> "Text to display in footer",
		"id"		=> "footer_text",
		"type"		=> "text"
	);

	$options[] = array(
		"name"		=> "Homepage Settings",
		"type"		=> "heading"
	);

	$options[] = array(
		"name"		=> "Heading Text",
		"id"		=> "heading_text",
		"std"		=> "Find people who share your interests.",
		"type"		=> "text"
	);

	$options[] = array(
		"name"		=> "Sub Heading Text",
		"id"		=> "sub_heading_text",
		"std"		=> "With huddle you can find and connect with other people who share in your same interests. Sign in or create an account to start creating and joining groups, find others, and share interests.",
		"type"		=> "textarea"
	);

	$options[] = array(
		"name"		=> "Heading Image",
		"id"		=> "heading_image",
		"type"		=> "upload"
	);

	$options[] = array(
		"name"		=> "Column 1 Heading",
		"id"		=> "column_1_title",
		"std"		=> "Build Your Own Profile",
		"type"		=> "text"
	);

	$options[] = array(
		"name"		=> "Column 1 Content",
		"id"		=> "column_1_text",
		"std"		=> "Lorem ipsum dolor sit amet",
		"type"		=> "text"
	);

	$options[] = array(
		'name'		=>	'Column 1 Icon',
		'id'		=>	'column_1_icon',
		'type'		=>	'upload',
		'desc'		=>	'Add a icon (40x40) for column 1'
	);

	$options[] = array(
		"name"		=> "Column 2 Heading",
		"id"		=> "column_2_title",
		"std"		=> "Build Your Own Profile",
		"type"		=> "text"
	);

	$options[] = array(
		"name"		=> "Column 2 Content",
		"id"		=> "column_2_text",
		"std"		=> "Lorem ipsum dolor sit amet",
		"type"		=> "text"
	);

	$options[] = array(
		'name'		=>	'Column 2 Icon',
		'id'		=>	'column_2_icon',
		'type'		=>	'upload',
		'desc'		=>	'Add a icon (40x40) for column 2'
	);

	$options[] = array(
		"name"		=> "Column 3 Heading",
		"id"		=> "column_3_title",
		"std"		=> "Build Your Own Profile",
		"type"		=> "text"
	);

	$options[] = array(
		"name"		=> "Column 3 Content",
		"id"		=> "column_3_text",
		"std"		=> "Lorem ipsum dolor sit amet",
		"type"		=> "text"
	);

	$options[] = array(
		'name'		=>	'Column 3 Icon',
		'id'		=>	'column_3_icon',
		'type'		=>	'upload',
		'desc'		=>	'Add a icon (40x40) for column 3'
	);

	return $options;
}