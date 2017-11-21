<?php
	require_once('functions.php');
	political_parties();
	edit();
?>

<?php include(HEADER_TEMPLATE); ?>

<?php if ($candidate) : ?>
	<h2>Editar candidato</h2>
	<form class="container" action="edit.php?id=<?php echo $candidate['id']; ?>" method="post">
		<input type="text" name="candidate['name']" value="<?php echo $candidate['name']; ?>" placeholder="Nome">
		
		<select name="candidate['gender']">
			<option>Selecione o gênero</option>
			<option value="M">Masculino</option>
			<option value="F">Feminino</option>
		</select>
		Atual: <?php echo ($candidate['gender']=='M')?'Masculino':'Feminino'; ?>
		
		<input type="date" name="candidate['birth']" value="<?php echo $candidate['birth']; ?>">
		<input type="text" name="candidate['profession']" value="<?php echo $candidate['profession']; ?>" placeholder="Profissão">
		
		<select name="candidate['role']">
			<option>Selecione o cargo</option>
			<option value="Governador">Governador</option>
			<option value="Senador">Senador</option>
			<option value="Deputado Federal">Deputado Federal</option>
			<option value="Deputado Estadual">Deputado Estadual</option>
		</select>
		<?php echo "Atual: " . $candidate['role']; ?>
		
		<?php if ($political_parties) : ?>
			<select name="candidate['political_party_id']">
				<option>Selecione o partido</option>
				<?php foreach ($political_parties as $political_party) : ?>
					<option value="<?php echo $political_party['id']; ?>"><?php echo $political_party['initials']; ?></option>
				<?php endforeach; ?>
			</select>
			Atual: <?php echo find('political_parties', $candidate['political_party_id'])['initials']; ?>
		<?php endif; ?>
		
		<button class="btn btn-primary" type="submit">Salvar</button>
	</form>
<?php endif; ?>

<?php include(FOOTER_TEMPLATE); ?>