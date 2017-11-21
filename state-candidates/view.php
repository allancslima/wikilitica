<?php
	require_once('functions.php');
	view($_GET['id']);
	state($candidate['state_id']);
	political_party($candidate['political_party_id']);
	realizations($_GET['id']);
?>

<?php include(HEADER_TEMPLATE); ?>

<?php if ($candidate) : ?>
	<h2>Candidato</h2>
	<h4><b>Nome:</b> <?php echo $candidate['name']; ?></h4> <br>
	<h4><b>Sexo:</b> <?php echo ($candidate['gender']=='M')?'Masculino':'Feminino'; ?></h4> <br>
	<h4><b>Nascimento:</b> <?php echo date('d/m/Y', strtotime($candidate['birth'])); ?></h4> <br>
	<h4><b>Profissão:</b> <?php echo $candidate['profession']; ?></h4> <br>
	<h4><b>Cargo:</b> <?php echo $candidate['role']; ?></h4> <br>
	<h4><b>Estado:</b> <?php echo $state['name'] ?></h4> <br>
	<h4><b>Partido:</b> <?php echo $political_party['initials'] . " - " . $political_party['name']; ?></h4> <br><br>

	<h2>Realizações</h2>
	<?php if ($realizations) : ?>
		<?php foreach ($realizations as $realization): ?>
			<div class="container data-item">
				<h4><?php echo "<b>{" . $realization['type'] . "}</b> " . $realization['body']; ?></h4>
			</div>
		<?php endforeach ?>
	<?php else : ?>
		<p>Nenhuma realização encontrada.</p>
	<?php endif; ?>
<?php endif; ?>

<?php include(FOOTER_TEMPLATE); ?>