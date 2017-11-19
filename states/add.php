<?php
	require_once('functions.php');
	add();
?>

<?php include(HEADER_TEMPLATE); ?>

<h2>+ Adicionar Estado</h2>
<form class="container" action="add.php" method="post">
	<input type="text" name="state['name']" placeholder="Nome">
	<button class="btn btn-primary" type="submit">Salvar</button>
</form>

<?php include(FOOTER_TEMPLATE); ?>