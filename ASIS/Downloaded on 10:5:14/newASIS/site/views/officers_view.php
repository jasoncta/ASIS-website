<section class="container" id="officers">
	<div class="row">
		<div class="twelvecol">
			<h1>Officers 2014-2015</h1> Previous Officer >> <a href="/controllers/officers2.php">2013-2014</a>
			 <hr/>
		</div>
			
		<?php foreach($officers as $officer): ?>
		
		<div class="officer twelvecol">
		<div class="threecol">
			<img src="<?php echo base_url("images/") . $officer->img; ?> " title="<?php echo $officer->position; ?>" />
		</div>
		<div class="ninecol last">
		<a name="<?php echo $officer->slug; ?>">	<h3><?php echo $officer->name; ?></h3>
			<small class="pos"><?php echo $officer->position; ?></small></a>
			<table class="zebra-striped">
				<tr>
					<th width="15%">Major</th>
					<td><?php echo $officer->major; ?></td>
				</tr>
				<tr>
					<th>Hobbies</th>
					<td><?php echo $officer->hobbies; ?></td>
				</tr>
				<tr>
					<th>Educational Background</th>
					<td><?php echo $officer->educationalbackground; ?></td>
				</tr>
				<tr>
					<th>Email</th>
					<td><?php echo $officer->email; ?></td>
				</tr>
				<tr>
					<th>Hometown</th>
					<td><?php echo $officer->hometown; ?></td>
				</tr>
			</table>
		</div>
		</div>
		<?php endforeach; ?>

			
		
	</div>

</section>