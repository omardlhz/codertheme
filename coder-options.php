<?php
/*
Options for the Customizer of Coder Theme.
Created by Omar De La Hoz (omar.dlhz@hotmail.com) on 06/06/16
Available on Github (https://github.com/omardlhz/codertheme/)
*/


function header_info($wp_customize){

	$wp_customize->add_section("info", array(
		"title" => __("Header Information", "coder_header_sections"),
		"priority" => 30,
	));

	$wp_customize->add_setting("header_title", array(
		"default" => "",
		"transport" => "postMessage",
	));

	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		"header_title",
		array(
			"label" => __("Header Title", "customizer_header_title_label"),
			"description" => "Displayed bellow profile image. (Site title will be used if left empty)",
			"section" => "info",
			"settings" => "header_title",
			"type" => "text",
		)
	));

	$wp_customize->add_setting("header_caption", array(
		"default" => "",
		"transport" => "postMessage",
	));

	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		"header_caption",
		array(
			"label" => __("Header Caption", "customizer_header_title_label"),
			"description" => "Displayed bellow Header title. (Tagline will be used if left empty)",
			"section" => "info",
			"settings" => "header_caption",
			"type" => "text",
		)
	));

	$wp_customize->add_setting("profile_image", array(
		"default" => "",
		"transport" => "postMessage",
	));

	$wp_customize->add_control(new WP_Customize_Image_Control(
           $wp_customize,
           "profile_image",
           array(
               "label"      => __( "Profile Image", 'customizer_header_title_label' ),
               "description" => "Displayed above Header title. (Placeholder image will be used if left empty)",
               "section"    => "info",
               "settings"   => "profile_image",
           )
       ));

	$wp_customize->add_setting("cover_image", array(
		"default" => "",
		"transport" => "postMessage",
	));

	$wp_customize->add_control(new WP_Customize_Image_Control(
           $wp_customize,
           "cover_image",
           array(
               "label"      => __( "Cover Image", 'customizer_header_title_label' ),
               "description" => "Displayed behind profile image. (Recommended size 890x210)",
               "section"    => "info",
               "settings"   => "cover_image",
           )
       ));

	$wp_customize->add_section("links", array(
		"title" => __("Header Links", "coder_header_sections"),
		"priority" => 30,
	));

	$wp_customize->add_setting("about_link", array(
		"default" => "",
		"transport" => "postMessage",
	));

	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		"about_link",
		array(
			"label" => __("About Link", "customizer_header_title_label"),
			"description" => "Link to your About page.",
			"section" => "links",
			"settings" => "about_link",
			"type" => "text",
		)
	));

	$wp_customize->add_setting("github_link", array(
		"default" => "",
		"transport" => "postMessage",
	));

	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		"github_link",
		array(
			"label" => __("Github Link", "customizer_header_title_label"),
			"description" => "Link to your Github profile.",
			"section" => "links",
			"settings" => "github_link",
			"type" => "text",
		)
	));

	$wp_customize->add_setting("resume_link", array(
		"default" => "",
		"transport" => "postMessage",
	));

	$wp_customize->add_control(new WP_Customize_Upload_Control( 
		$wp_customize,
		'resume_link', 
		array(
			"label"      => __( 'Resume Link', "customizer_header_title_label" ),
			"section"    => "links",
			"description" => "Upload your resume file.",
			"settings"   => "resume_link",
		) 
	));

	$wp_customize->add_setting("linkedin_link", array(
		"default" => "",
		"transport" => "postMessage",
	));

	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		"linkedin_link",
		array(
			"label" => __("LinkedIn Link", "customizer_header_title_label"),
			"description" => "Link to your LinkedIn profile.",
			"section" => "links",
			"settings" => "linkedin_link",
			"type" => "text",
		)
	));

	$wp_customize->add_setting("custom1name_link", array(
		"default" => "",
		"transport" => "postMessage",
	));

	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		"custom1name_link",
		array(
			"label" => __("Custom Link #1 Name", "customizer_header_title_label"),
			"description" => "Name of Custom Link #1",
			"section" => "links",
			"settings" => "custom1name_link",
			"type" => "text",
		)
	));

	$wp_customize->add_setting("custom1_link", array(
		"default" => "",
		"transport" => "postMessage",
	));

	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		"custom1_link",
		array(
			"label" => __("Custom Link #1", "customizer_header_title_label"),
			"section" => "links",
			"settings" => "custom1_link",
			"type" => "text",
		)
	));

	$wp_customize->add_setting("custom2name_link", array(
		"default" => "",
		"transport" => "postMessage",
	));

	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		"custom2name_link",
		array(
			"label" => __("Custom Link #2 Name", "customizer_header_title_label"),
			"description" => "Name of Custom Link #2",
			"section" => "links",
			"settings" => "custom2name_link",
			"type" => "text",
		)
	));

	$wp_customize->add_setting("custom2_link", array(
		"default" => "",
		"transport" => "postMessage",
	));

	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		"custom2_link",
		array(
			"label" => __("Custom Link #2", "customizer_header_title_label"),
			"section" => "links",
			"settings" => "custom2_link",
			"type" => "text",
		)
	));
	
}

add_action("customize_register","header_info");

function codertheme_live_preview()
{
	wp_enqueue_script("codertheme_customizer", get_template_directory_uri() . "/coder-livepreview.js", array("jquery", "customize-preview"), '',  true);
}

add_action("customize_preview_init", "codertheme_live_preview");


?>