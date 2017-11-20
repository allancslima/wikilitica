<?php
	require_once('functions.php');
	add();
?>

<?php include(HEADER_TEMPLATE); ?>

<h2>+ Adicionar partido</h2>
<form class="container" action="add.php" method="post">
	<input type="text" name="political_party['name']" placeholder="Nome">
	<input type="text" name="political_party['initials']" placeholder="Sigla">
	<textarea rows="5" name="political_party['description']" placeholder="Descrição"></textarea>
	<button class="btn btn-primary" type="submit">Salvar</button>
</form>

<?php include(FOOTER_TEMPLATE); ?>