<?php
	require_once('functions.php');
	$id = $_GET['id'];

	if (isset($id)) view($id);
?>

<?php include(HEADER_TEMPLATE); ?>

<?php if ($city) : ?>

	<h2><?php echo $city['name']; ?></h2>
	<h3>Candidatos</h3> <br>

	<?php if ($candidates) : ?>
		
		<?php foreach ($candidates as $candidate) : ?>
			
			<div class="container data-item">
				<h3><?php echo "<b>" . $candidate['role'] . "</b> - " . $candidate['name']; ?></h3>
				<div>
					<a class="btn btn-primary" href="../city-candidates/view.php?id=<?php echo $candidate['id']; ?>">Visualizar</a>
					<!--<a class="btn btn-warning" href="../state-candidates/edit.php?id=<?php echo $candidate['id']; ?>&state_id=<?php echo $state['id']; ?>">Editar</a>-->
					<a class="btn btn-danger" href="../city-candidates/delete.php?id=<?php echo $candidate['id']; ?>">Excluir</a>
				</div>
			</div>

		<?php endforeach; ?>
	
	<?php else : ?>
		
		<p>Nenhum candidato cadastrado.</p>
	
	<?php endif; ?>
	
	<a class="link-next-page" href="../city-candidates/add.php?id=<?php echo $city['id']; ?>">+ Adicionar candidato</a>

<?php endif; ?>

<?php include(FOOTER_TEMPLATE); ?>