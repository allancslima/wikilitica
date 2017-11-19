<?php

	require_once('../config.php');
	require_once(DBAPI);

	$states = null;
	$state = null;

	function index() {
		global $states;
		$states = find_all('states');
	}

	function add() {
		if (isset($_POST['state'])) {
			save('states', $_POST['state']);
			header('location: index.php');
		}
	}