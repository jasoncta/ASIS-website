<section class="container " id="social">
	<div class="row">
		<div class="fourcol">
		<h2>Be Social with us</h2>
		</div>
		<div class="fourcol">
			&nbsp;
		</div>
		<div class="fourcol last" style="text-align:right;">
			<nav>
				<?php foreach($this->welcomemodel->data->social as $social):  ?>
					<a href="<?php echo $social->url; ?>" target="_blank"><img src="<?php echo base_url("images/") . $social->img; ?>"></a>
				<?php endforeach; ?>
			</nav>
		</div>
	</div>

</section>