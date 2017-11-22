<?php
	require_once('functions.php');
	$state_id = $_GET['id'];

	if (isset($state_id)) {
		state($state_id);
		add();
	}
?>

<?php include(HEADER_TEMPLATE); ?>

<?php if ($state) : ?>

	<h2>+ Adicionar cidade em <?php echo $state['name']; ?></h2>
	<form class="container" action="add.php?id=<?php echo $state['id']; ?>" method="post">
		<input type="hidden" name="city['state_id']" value="<?php echo $_GET['id']; ?>">
		<input type="text" name="city['name']" placeholder="Nome">
		<button class="btn btn-primary" type="submit">Salvar</button>
	</form>
	
<?php endif; ?>

<?php include(FOOTER_TEMPLATE); ?>