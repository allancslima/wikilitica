<?php
	require_once('functions.php');
	edit();
?>

<?php include(HEADER_TEMPLATE); ?>

<h2>Editar partido</h2>
<form class="container" action="edit.php?id=<?php echo $political_party['id']; ?>" method="post">
	<input type="text" name="political_party['name']" value="<?php echo $political_party['name']; ?>" placeholder="Nome">
	<input type="text" name="political_party['initials']" value="<?php echo $political_party['initials']; ?>" placeholder="Sigla">
	<textarea rows="5" name="political_party['description']" placeholder="Descrição"><?php echo $political_party['description']; ?></textarea>
	<button class="btn btn-primary" type="submit">Atualizar</button>
</form>

<?php include(FOOTER_TEMPLATE); ?>