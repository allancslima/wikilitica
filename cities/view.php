<?php
	require_once('functions.php');
	view($_GET['id']);
?>

<?php include(HEADER_TEMPLATE); ?>

<?php if ($city) : ?>
	<h2><?php echo $city['name']; ?></h2>
<?php endif; ?>

<?php include(FOOTER_TEMPLATE); ?>