<?php
	require_once('functions.php');
	$state_id = $_GET['id'];

	if (isset($state_id)) {
		state($state_id);
		political_parties();
		add();
	}
?>

<?php include(HEADER_TEMPLATE); ?>

<?php if ($state) : ?>

	<h2>+ Adicionar candidato para <?php echo $state['name']; ?></h2>
	<form class="container" action="add.php?id=<?php echo $state['id']; ?>" method="post">
		<input type="hidden" name="candidate['state_id']" value="<?php echo $_GET['id']; ?>">
		<input type="text" name="candidate['name']" placeholder="Nome">
		
		<select name="candidate['gender']">
			<option>Selecione o gênero</option>
			<option value="M">Masculino</option>
			<option value="F">Feminino</option>
		</select>
		
		<input type="date" name="candidate['birth']">
		<input type="text" name="candidate['profession']" placeholder="Profissão">
		
		<select name="candidate['role']">
			<option>Selecione o cargo</option>
			<option value="Governador">Governador</option>
			<option value="Senador">Senador</option>
			<option value="Deputado Federal">Deputado Federal</option>
			<option value="Deputado Estadual">Deputado Estadual</option>
		</select>
		
		<?php if ($political_parties) : ?>

			<select name="candidate['political_party_id']">
				<option>Selecione o partido</option>
				<?php foreach ($political_parties as $political_party) : ?>
					<option value="<?php echo $political_party['id']; ?>"><?php echo $political_party['initials']; ?></option>
				<?php endforeach; ?>
			</select>
			
		<?php endif; ?>
		
		<button class="btn btn-primary" type="submit">Salvar</button>
	</form>

<?php endif; ?>

<?php include(FOOTER_TEMPLATE); ?>