<?php
	require_once('functions.php');
	state($_GET['id']);
	index();
?>

<?php include(HEADER_TEMPLATE); ?>

<?php if ($state) : ?>
	<h2><?php echo $state['name']; ?></h2>
	<?php if ($cities) : ?>
		<?php foreach ($cities as $city) : ?>
			<div class="container data-item">
				<h3><?php echo $city['name']; ?></h3>
				<div>
					<a class="btn btn-primary" href="view.php?id=<?php echo $city['id']; ?>">Visualizar</a>
					<a class="btn btn-warning" href="edit.php?id=<?php echo $city['id']; ?>">Editar</a>
					<a class="btn btn-danger" href="">Excluir</a>
				</div>
			</div>
		<?php endforeach; ?>
	<?php else : ?>
		<p>Nenhum registro encontrado.</p>
	<?php endif; ?>
<?php endif; ?>

<?php include(FOOTER_TEMPLATE); ?>