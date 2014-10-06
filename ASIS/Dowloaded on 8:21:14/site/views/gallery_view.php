<section class="container" id="gallery">
<div class="row">
<div class="twelvecol">
<h1>Photo Gallery</h1>
<hr/>
Powered by the Official <a href="http://www.facebook.com/usc.asis">USC ASIS Facebook Page</a><br/>

<div class="alert-message block-message info">
Sometimes the Facebook server might get a little cranky. <br/> In that case, if you can't view the images, then just visit our <a href="http://www.facebook.com/usc.asis">Facebook Page!</a>
</div>


<ul class="gallery">	
	<?php 
		foreach($albums as $album):
	?>
	
	<li>
		<div class="image_container">
			
			<?php 
			// print the cover photo image
			if(isset($album->cover_photo_image) and !empty($album->cover_photo_image)) {
				echo $album->cover_photo_image;
				}
			else { 
			//	var_dump($album);
			}
				
			?>
		</div>
		<a href="/gallery/album/<?php echo $album->id; ?>">
		<?php
		echo $album->name;
		?></a>
		<?php if(isset($album->count)): ?>
		<span class="count"><?php echo ($album->count != 1)?($album->count . " photos"):($album->count . " photo"); ?> </span>
		<?php endif;?>
	</li>
		
		
	<?php  endforeach; ?>
</ul>
<div style="clear:both;"></div>
<div class="pagination center">

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