<section class="container" id="gallery">
<div class="row">
<div class="twelvecol">
<h1><?php echo $info->name;?></h1>
<hr/>
<div style="float:left;">
<a href="/gallery" alt="">&larr; Back to Photo Gallery</a>
</div>
<div style="float:right">
Powered by the Official <a href="http://www.facebook.com/usc.asis">USC ASIS Facebook Page</a><br/>
</div>
<div style="clear:both;"></div>
<div class="alert-message block-message info">
Sometimes the Facebook server might get a little cranky. <br/> In that case, if you can't view the images, then just visit our <a href="http://www.facebook.com/AlphaGammaSigma">Facebook Page!</a>
</div>


<ul class="album">	
	<?php 
		foreach($photos as $photo):
	?>
	
	<li>
		<div class="image_container">
			<?php 
			// print the cover photo image
			echo $photo->pic;
			?>
		</div>
	</li>
		
		
	<?php  endforeach; ?>
</ul>
<div style="clear:both;"></div>
<div class="pagination">
<?php if(isset($prev_url)): ?>
	<a class="prev" href="/<?php echo $prev_url; ?>" alt=""> &larr; Prev</a>
<?php endif; ?>
<?php if(isset($next_url)): ?>
	<a class="next" href="/<?php echo $next_url; ?>" alt=""> Next &rarr; </a>
<?php endif; ?>
</div>

</div>
</div>
</section>