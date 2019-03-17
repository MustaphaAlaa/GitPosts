<?php require_once APPROOT.'/views/inc/header.php'; ?>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/about.css">
<div class="jumbotron">
	<div style="text-align: center;">
		<h1 >About</h1>
		<p><b>The Site: </b> <?php echo $data['site']; ?> </p>
		<p> <b>The Developer: </b><?php echo $data['me']; ?></p>
	</div>
</div>
<?php require_once APPROOT.'/views/inc/footer.php'; ?>
