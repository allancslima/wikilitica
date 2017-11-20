<?php
	require_once('functions.php');
	state($_GET['id']);
	add();
?>

<?php include(HEADER_TEMPLATE); ?>

<h2>+ Adicionar Cidade em <?php echo $state['name']; ?></h2>
<form class="container" action="add.php?id=<?php echo $state['id']; ?>" method="post">
	<input type="text" name="city['name']" placeholder="Nome">
	<input type="hidden" name="city['state_id']" value="<?php echo $_GET['id']; ?>">
	<button class="btn btn-primary" type="submit">Salvar</button>
</form>

<?php include(FOOTER_TEMPLATE); ?>