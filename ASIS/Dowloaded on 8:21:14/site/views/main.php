<?php $this->load->view("header"); ?>
<?php $this->load->view("topnav"); ?>
<?php if(isset($page)): ?>
	<?php $this->load->view($page); ?>
<?php else: ?>
	<?php $this->load->view("404"); ?>
<?php endif; ?>


<?php $this->load->view("social"); ?>
<?php $this->load->view("footer"); ?>