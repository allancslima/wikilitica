<?php
	require_once('functions.php');
	view($_GET['id']);
?>

<?php include(HEADER_TEMPLATE); ?>

<?php if ($state) : ?>
	<h2><?php echo $state['name']; ?></h2>
	<a class="link-next-page" href="../cities/index.php?id=<?php echo $state['id']; ?>">Cidades ></a>
<?php endif; ?>

<?php include(FOOTER_TEMPLATE); ?>