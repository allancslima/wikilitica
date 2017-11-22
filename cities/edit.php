<?php
	require_once('functions.php');
	edit();
?>

<?php include(HEADER_TEMPLATE); ?>

<h2>Editar cidade</h2>
<form class="container" action="edit.php?id=<?php echo $city['id']; ?>" method="post">
	<input type="hidden" name="state_id" value="<?php echo $city['state_id'] ?>">
	<input type="text" name="city['name']" value="<?php echo $city['name']; ?>" placeholder="Nome">
	<button class="btn btn-primary" type="submit">Atualizar</button>
</form>

<?php include(FOOTER_TEMPLATE); ?>