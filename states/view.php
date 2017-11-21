<?php
	require_once('functions.php');
	view($_GET['id']);
	state_candidates($_GET['id']);
?>

<?php include(HEADER_TEMPLATE); ?>

<?php if ($state) : ?>
	<h2><?php echo $state['name']; ?></h2>
	<a class="link-next-page" href="../cities/index.php?id=<?php echo $state['id']; ?>">Cidades ></a>
	<br><br>
	<h3>Candidatos</h3><br>
	<?php if ($candidates): ?>
		<?php foreach ($candidates as $candidate) : ?>
			<div class="container data-item">
				<h3><?php echo $candidate['role'] . " - " . $candidate['name']; ?></h3>
			</div>
		<?php endforeach; ?>
	<?php else : ?>
		<p>Nenhum candidato registrado.</p>
	<?php endif; ?>
	<a class="link-next-page" href="../state-candidates/add.php?id=<?php echo $state['id']; ?>">+ Adicionar candidato</a>
<?php endif; ?>

<?php include(FOOTER_TEMPLATE); ?>