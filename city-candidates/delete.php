<?php
	require_once('functions.php');
	$id = $_GET['id'];

	if (isset($id)) delete($id);
?>