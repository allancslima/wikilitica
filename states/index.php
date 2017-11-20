<?php
	require_once('functions.php');
	index();
?>

<?php include(HEADER_TEMPLATE); ?>

<h2>Estados</h2>

<?php if ($states) : ?>
	<?php foreach ($states as $state) : ?>
		<div class="container data-item">	
			<h3><?php echo $state['name']; ?></h3>
			<div>
				<a class="btn btn-primary" href="view.php?id=<?php echo $state['id']; ?>">Visualizar</a>
				<a class="btn btn-warning" href="edit.php?id=<?php echo $state['id']; ?>">Editar</a>
				<a class="btn btn-danger" href="delete.php?id=<?php echo $state['id']; ?>">Excluir</a>
			</div>
		</div>
	<?php endforeach; ?>
<?php else : ?>
	<p>Nenhum registro encontrado.</p>
<?php endif; ?>

<a class="link-next-page" href="add.php">+ Adicionar estado</a>

<?php include(FOOTER_TEMPLATE);