<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<title>USC ASIS | Association of Indonesian Students</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<!-- Header Font : Oswald -->
	<link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/jquery.fancybox.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/jquery.fancybox-buttons.css?v=2.0.3" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/jquery.fancybox-thumbs.css?v=2.0.3" type="text/css" media="screen" />
	<!-- 1140px Grid styles for IE -->
	<!--[if lte IE 9]><link rel="stylesheet" href="<?php echo base_url(); ?>css/ie.css" type="text/css" media="screen" /><![endif]-->
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/flexslider.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/hrdx-base.css" type="text/css" media="screen" />
	<!-- The 1140px Grid - http://cssgrid.net/ -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/1140.css" type="text/css" media="screen" />
	
	<!-- Your styles -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/styles.css" type="text/css" media="screen" />
	
	<!--css3-mediaqueries-js - http://code.google.com/p/css3-mediaqueries-js/ - Enables media queries in some unsupported browsers-->
	
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>js/bootstrap-scrollspy.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>js/css3-mediaqueries.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.flexslider-min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.fancybox.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.fancybox-buttons.js?v=2.0.3"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.fancybox-thumbs.js?v=2.0.3"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.tweet.js"></script>
	
	
	<script type="text/javascript">
	$(function () { 
		$('#nav').scrollSpy(); 
		<?php if(isset($welcome->slideshow) and count($welcome->slideshow->slide) == 1): ?>
		$('.flexslider').flexslider({controlNav:false, directionNav:false});
		<?php endif; ?>
		<?php if(isset($welcome->slideshow) and count($welcome->slideshow->slide) > 1): ?>
		$('.flexslider').flexslider({controlNav:false});
		<?php endif; ?>
		
		$('.fancybox-thumbs').fancybox({
				prevEffect : 'none',
				nextEffect : 'none',

				nextClick : true,

				helpers : { 
					thumbs : {
						width  : 125,
						height : 84
					}
				}
			});
		  
		  
	
        $(".tweet").tweet({
            username: "USCASIS",
            join_text: "auto",
            avatar_size: 32,
            count: 3,
            auto_join_text_default: "we said,",
            auto_join_text_ed: "we",
            auto_join_text_ing: "we were",
            auto_join_text_reply: "we replied to",
            auto_join_text_url: "we were checking out",
            loading_text: "loading tweets..."
        });

		
	})
	
	</script>
	
	<!--Delete embedded styles, just for example.-->

</head>
<body>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=223919930968760";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
