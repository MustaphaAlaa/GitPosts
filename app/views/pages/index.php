<?php require_once APPROOT.'/views/inc/header.php'; ?>
<?php flash('loggedOut'); ?>
<?php flash('Not_Logged'); ?>
<div class="jumbotron">
	<div style="text-align: center;">
		<h1 >Welcome</h1>
		<p> <?php echo $data['welcome']; ?></p>
	</div>
</div>
<?php require_once APPROOT.'/views/inc/footer.php'; ?>
