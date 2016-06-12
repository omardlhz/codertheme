/*
Agregar comentario..
*/
<!DOCTYPE html>
<html>

<div id="container">

<head>
<style>
.topWrapper{ width: 100%; height: 200px; background-image: url(<?php echo get_theme_mod("cover_image"); ?>); background-size: 100% 100%; position: relative; }

</style>
<title>
	<?php
	if(is_single()){
		$title = wp_title('', FALSE);
		$title .= " - ";
		$title .=  get_bloginfo('name');
		echo $title;
	}
	else{
		bloginfo('name');
	}
	?>
</title>
<meta charset="<?php bloginfo('charset'); ?>">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/3.0.3/normalize.css">
<link href='https://fonts.googleapis.com/css?family=Lato:700,400,300,100|Open+Sans:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<?php wp_head(); ?>
</head>
<div id="header">
	<?php if (!is_singular('project')) { ?>
	<div id="cover_image" class="topWrapper">
		<div class="profileContainer">
		<a href="/"><img id="profile_image" class="profilePicture" src="<?php echo get_theme_mod("profile_image"); ?>" /></a>
		</div>
	</div>
	<?php }; ?>

<p id="header_title" class="introMsg">
	<?php if (get_theme_mod("header_title") == ""){

		echo bloginfo('name');
	}
	else{

		echo get_theme_mod("header_title");

	}
	?>
</p>
<p id="header_caption" class="subMsg">
	<?php if (get_theme_mod("header_caption") == ""){

		echo bloginfo('description');
	}
	else{

		echo get_theme_mod("header_caption");

	}
	?>
</p>
<hr>
<div class="linkWrapper">
<?php if(get_theme_mod("about_link") != ""){ ?>
<a class="bar" id="about_link" href="<?php echo get_theme_mod("about_link") ;?>">About</a>
<?php }; ?>
<?php if(get_theme_mod("github_link") != ""){ ?>
<a class="bar" id="github_link" href="<?php echo get_theme_mod("github_link") ;?>">Github</a>
<?php }; ?>
<?php if(get_theme_mod("resume_link") != ""){ ?>
	<a class="bar" id="resume_link" href="<?php echo get_theme_mod("resume_link") ;?>">Resume</a>
<?php }; ?>
<?php if(get_theme_mod("linkedin_link") != ""){ ?>
	<a class="bar" id="linkedin_link" href="<?php echo get_theme_mod("linkedin_link") ;?>">LinkedIn</a>
<?php }; ?>
<?php if(get_theme_mod("custom1_link") != "" && get_theme_mod("custom1name_link") != ""){ ?>
	<a class="bar" id="custom1_link" href="<?php echo get_theme_mod("custom1_link") ;?>"><?php echo get_theme_mod("custom1name_link");?></a>
<?php }; ?>
<?php if(get_theme_mod("custom2_link") != "" && get_theme_mod("custom2name_link") != ""){ ?>
	<a class="bar" id="custom2_link" href="<?php echo get_theme_mod("custom2_link") ;?>"><?php echo get_theme_mod("custom2name_link");?></a>
<?php }; ?>
<?php if(get_theme_mod("custom3_link") != "" && get_theme_mod("custom3name_link") != ""){ ?>
	<a class="bar" id="custom3_link" href="<?php echo get_theme_mod("custom3_link") ;?>"><?php echo get_theme_mod("custom3name_link");?></a>
<?php }; ?>
</div>
<hr>
<div id="siteController" class="siteController">
<button class="shrinkController">Shrink</button>
<button class="expandController">Expand</button>
</div>
</div>

<script>


var page = <?php echo json_encode(is_single()); ?>;
var project = <?php echo json_encode(is_singular('project')); ?>;


if( page == true && project == true){

	document.getElementById('header').style.height = '210px';
	document.getElementById('siteController').style.paddingTop = '20px';

}
else if( page == true){

	$('#header').animate({height:'400px'})
	$('div.siteController').animate({'padding-top' : '20px'})
}

$('.shrinkController').click(function(){

	if ($('#header').height() == 600){

		$('#header').animate({height:'400px'})
		$('div.siteController').animate({'padding-top' : '20px'})

	}
	else if($('#header').height() == 1000){

		$('#header').animate({height:'600px'})
		$('div.siteController').animate({'padding-top' : '220px'})

	}
	else if($('#header').height() == 800){

		$('#header').animate({height:'405px'})
		$('div.siteController').animate({'padding-top' : '220px'})

	}
	else if($('#header').height() == 405){

		$('#header').animate({height:'210px'})
		$('div.siteController').animate({'padding-top' : '20px'})

	}


})

$('.expandController').click(function(){

	if ($('#header').height() == 600){

		$('#header').animate({height:'1000px'})
		$('div.siteController').animate({'padding-top' : '620px'})


	}
	else if ($('#header').height() == 400){

		$('#header').animate({height:'600px'})
		$('div.siteController').animate({'padding-top' : '220px'})

	}
	else if ($('#header').height() == 210){
		$('#header').animate({height:'405px'})
		$('div.siteController').animate({'padding-top' : '220px'})
	}
	else if ($('#header').height() == 405){
		$('#header').animate({height:'800px'})
		$('div.siteController').animate({'padding-top' : '620px'})
	}

})

</script>
