<?php
	require_once('functions.php');
	index();
?>

<?php include(HEADER_TEMPLATE); ?>

<h2>Partidos</h2>

<?php if ($political_parties) : ?>
	<?php foreach ($political_parties as $political_party) : ?>
		<div class="container data-item">	
			<h3><?php echo $political_party['initials'] . " - " . $political_party['name']; ?></h3>
			<div>
				<a class="btn btn-primary" href="view.php?id=<?php echo $political_party['id']; ?>">Visualizar</a>
				<a class="btn btn-warning" href="edit.php?id=<?php echo $political_party['id']; ?>">Editar</a>
				<a class="btn btn-danger" href="delete.php?id=<?php echo $political_party['id']; ?>">Excluir</a>
			</div>
		</div>
	<?php endforeach; ?>
<?php else : ?>
	<p>Nenhum registro encontrado.</p>
<?php endif; ?>

<a class="link-next-page" href="add.php">+ Adicionar partido</a>

<?php include(FOOTER_TEMPLATE);