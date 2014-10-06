<div class="flexslider">
	<ul class="slides">
	<?php if(isset($welcome->slideshow)): ?>
		<?php foreach($welcome->slideshow->slide as $slide): ?>
		<li>
			<?php if(isset($slide->url)): ?>
				<a href="<?php echo $slide->url; ?>" title="<?php echo $slide->caption; ?>" >
			<?php endif; ?>
			<img src="<?php echo base_url("images/"); ?><?php echo $slide->img; ?>" />
			<?php if(isset($slide->caption)): ?>
				<p class="flex-caption"><?php echo $slide->caption; ?></p>
			<?php endif; ?>
			<?php echo isset($slide->url)?("</a>"):(""); ?>
		</li>
		<?php endforeach;?>
	<?php endif;?>
	</ul>
</div>