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
				<a class="btn btn-primary" href="">Visualizar</a>
				<a class="btn btn-warning" href="">Editar</a>
				<a class="btn btn-danger" href="">Excluir</a>
			</div>
		</div>
	<?php endforeach; ?>
<?php else : ?>
	<p>Nenhum registro encontrado.</p>
<?php endif; ?>
<a class="link-add" href="add.php">+ Adicionar Estado</a>

<?php include(FOOTER_TEMPLATE); ?>