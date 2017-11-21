<?php
	require_once('functions.php');
	view($_GET['id']);
?>

<?php include(HEADER_TEMPLATE); ?>

<?php if ($candidate) : ?>
	<h2>Candidato</h2>
	<h3><b>Nome:</b> <?php echo $candidate['name']; ?></h3> <br>
	<h3><b>Sexo:</b> <?php echo ($candidate['gender']=='M')?'Masculino':'Feminino'; ?></h3> <br>
	<h3><b>Nascimento:</b> <?php echo date('d/m/Y', strtotime($candidate['birth'])); ?></h3> <br>
	<h3><b>Profissão:</b> <?php echo $candidate['profession']; ?></h3> <br>
	<h3><b>Cargo:</b> <?php echo $candidate['role']; ?></h3> <br>
	<h3><b>Estado:</b></h3> <br>
	<h3><b>Partido:</b></h3> <br>
<?php endif; ?>

<?php include(FOOTER_TEMPLATE); ?>