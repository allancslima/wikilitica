<?php
	require_once('functions.php');
	$id = $_GET['id'];

	if (isset($id)) {
		view($id);
		state_candidates($id);
		city_candidates($id);
	}
?>

<?php include(HEADER_TEMPLATE); ?>

<?php if ($political_party) : ?>

	<h2><?php echo $political_party['initials'] . " - " . $political_party['name']; ?></h2>
	<p><?php echo $political_party['description']; ?></p>

	<h2>Candidatos estaduais</h2>
	<?php if ($state_candidates) : ?>

		<?php foreach ($state_candidates as $candidate) : ?>
			
			<div class="container data-item">
				<h3><?php echo $candidate['name']; ?></h3>
				<div>
					<a class="btn btn-primary" href="../state-candidates/view.php?id=<?php echo $candidate['id']; ?>">Visualizar</a>
				</div>
			</div>
		<?php endforeach; ?>

	<?php else : ?>

		<p>Nenhum candidato estadual cadastrado para o partido.</p>

	<?php endif; ?>

	<br><br>
	<h2>Candidatos municipais</h2>
	<?php if ($city_candidates) : ?>

		<?php foreach ($city_candidates as $candidate) : ?>
			
			<div class="container data-item">
				<h3><?php echo $candidate['name']; ?></h3>
				<div>
					<a class="btn btn-primary" href="../city-candidates/view.php?id=<?php echo $candidate['id']; ?>">Visualizar</a>
				</div>
			</div>
		<?php endforeach; ?>

	<?php else : ?>

		<p>Nenhum candidato municipal cadastrado para o partido.</p>

	<?php endif; ?>

<?php endif; ?>

<?php include(FOOTER_TEMPLATE); ?>