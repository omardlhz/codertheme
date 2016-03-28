<!DOCTYPE html>
<html>

<div id="container">

<head>
<title><?php bloginfo('name'); ?></title>
<meta charset="<?php bloginfo('charset'); ?>">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/3.0.3/normalize.css">
<link href='https://fonts.googleapis.com/css?family=Lato:700,400,300,100|Roboto:300,500' rel='stylesheet' type='text/css'>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<?php wp_head(); ?>
</head>
<div id="header">
	<?php if (!is_singular('project')) { ?>
	<div class="topWrapper">
		<div class="profileContainer">
		<a href="/"><img class="profilePicture" src="assets/temp.png" /></a>
		</div>
	</div>
	<?php }; ?>

<p class="introMsg">Hello, Im Omar De La Hoz</p>
<p class="subMsg"><?php bloginfo('description'); ?></p>

<hr>
<div class="linkWrapper">
<a class="bar" href="http://never.com">About</a>
<a class="bar" href="http://never.com">Github</a>
<a class="bar" href="http://never.com">Resume</a>
<a class="bar" href="http://never.com">LinkedIn</a>
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