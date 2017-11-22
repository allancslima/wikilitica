<?php
	require_once('functions.php');
	$id = $_GET['id'];

	if (isset($id)) {
		view($id);
		add_realization();
	}
?>

<?php include(HEADER_TEMPLATE); ?>

<?php if ($candidate) : ?>

	<h2>Candidato</h2>
	<h4><b>Nome:</b> <?php echo $candidate['name']; ?></h4> <br>
	<h4><b>Sexo:</b> <?php echo ($candidate['gender']=='M')?'Masculino':'Feminino'; ?></h4> <br>
	<h4><b>Nascimento:</b> <?php echo date('d/m/Y', strtotime($candidate['birth'])); ?></h4> <br>
	<h4><b>Profissão:</b> <?php echo $candidate['profession']; ?></h4> <br>
	<h4><b>Cargo:</b> <?php echo $candidate['role']; ?></h4> <br>
	<h4><b>Estado:</b> <?php echo $city['name'] ?></h4> <br>
	<h4><b>Partido:</b> <?php echo $political_party['initials'] . " - " . $political_party['name']; ?></h4> <br><br>

	<h2>Realizações</h2>

	<?php if ($realizations) : ?>

		<?php foreach ($realizations as $realization): ?>
			
			<div class="container data-item">
				<h4><?php echo "<b>{" . $realization['type'] . "}</b> " . $realization['body']; ?></h4>
				<div>
					<a class="btn btn-danger" href="delete_realization.php?id=<?php echo $realization['id']; ?>">Excluir</a>
				</div>
			</div>
			
		<?php endforeach ?>
	
	<?php else : ?>

		<p>Nenhuma realização encontrada.</p>
	
	<?php endif; ?>

	<br><br>
	<p>Adicionar realização</p>
	<form action="view.php?id=<?php echo $candidate['id']; ?>" method="post">
		<input type="hidden" name="realization['candidate_id']" value='<?php echo $candidate['id']; ?>'">
		<textarea name="realization['body']" placeholder="Texto"></textarea>
		<select name="realization['type']">
			<option>Selecione o tipo</option>
			<option value="Pública">Pública</option>
			<option value="Profissional">Profissional</option>
		</select>
		<button class="btn btn-primary" type="submit">Salvar</button>
	</form>

<?php endif; ?>

<?php include(FOOTER_TEMPLATE); ?>