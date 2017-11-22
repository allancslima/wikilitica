<?php
	require_once('functions.php');
	$id = $_GET['id'];

	if (isset($id)) view($id);
?>

<?php include(HEADER_TEMPLATE); ?>

<?php if ($political_party) : ?>

	<h2><?php echo $political_party['initials'] . " - " . $political_party['name']; ?></h2>
	<p><?php echo $political_party['description']; ?></p>

<?php endif; ?>

<?php include(FOOTER_TEMPLATE); ?>