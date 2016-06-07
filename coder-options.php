<?php
/*
Options for the Customizer of Coder Theme.
Created by Omar De La Hoz (omar.dlhz@hotmail.com) on 06/06/16
Available on Github at: https://github.com/omardlhz/Trackr
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
}

add_action("customize_register","header_info");


?>