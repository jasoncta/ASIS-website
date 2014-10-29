<?php 
function printActive($page) { 
	$CI =& get_instance();

	if(strtolower($CI->router->class) == $page or strtolower($CI->router->method) == $page)
		echo "class=\"active\"";
}

?>


<div class="container" id="header">
	<header class="row" data-scrollspy="scrollspy">
		<div class="threecol" id="logo">
			<img src="<?php echo base_url(); ?>images/template/logo.jpg" height="150" width="150" alt="">
		</div>
		<ul class="ninecol last" id="nav" >
			<li <?php echo printActive("welcome"); ?> ><a href="/">home</a></li>
			<li <?php echo printActive("trojanscup"); ?>><a href="/trojanscup">trojans cup</a></li>
			<li <?php echo printActive("events"); ?>><a href="/events">events</a></li>
			<li <?php echo printActive("officers"); ?>><a href="/officers">eboard</a></li>
			<li <?php echo printActive("gallery"); ?>><a href="/gallery">gallery</a></li>
			<li <?php echo printActive("contact"); ?>><a href="/contact">contact</a></li>
			<li <?php echo printActive("about/sponsors"); ?>><a href="/about">about/sponsors</a></li>
		</ul>
	</header>
</div>
