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

	function edit() {
		if (isset($_GET['id'])) {
			$id = $_GET['id'];
			
			if (isset($_POST['state'])) {
				$state = $_POST['state'];

				update('states', $id, $state);
				header('location: index.php');
			} else {
				global $state;
				$state = find('states', $id);
			}
		} else {
			header('location: index.php');
		}
	}