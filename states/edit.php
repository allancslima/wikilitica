<?php
	require_once('functions.php');
	edit();
?>

<?php include(HEADER_TEMPLATE); ?>

<h2>Editar Estado</h2>
<form class="container" action="edit.php?id=<?php echo $state['id']; ?>" method="post">
	<input type="text" name="state['name']" value="<?php echo $state['name']; ?>" placeholder="Nome">
	<button class="btn btn-primary" type="submit">Atualizar</button>
</form>

<?php include(FOOTER_TEMPLATE); ?>