<?php

	require_once('../config.php');
	require_once(DBAPI);

	$state = null;
	$cities = null;
	$city = null;
	
	function state($id) {
		global $state;
		$state = find('states', $id);
	}

	function index() {
		global $cities, $state;
		$cities = find('cities', $state['id'], true, 'state_id');
	}

	function view($id) {
		global $city;
		$city = find('cities', $id);
	}

	function add() {
		if (isset($_POST['city'])) {
			save('cities', $_POST['city']);
			header('location: index.php?id=' . $_GET['id']);
		}
	}

	function edit() {
		if (isset($_GET['id'])) {
			$id = $_GET['id'];
			
			if (isset($_POST['city'])) {
				update('cities', $id, $_POST['city']);
				header('location: index.php?id=' . $_POST['state_id']);
			} else {
				view($id);
			}
		}
	}