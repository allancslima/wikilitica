<?php

	require_once('../config.php');
	require_once(DBAPI);

	$state = null;
	$cities = null;
	$city = null;
	$candidates = null;
	
	function state($id) {
		global $state;
		$state = find('states', $id);
	}

	function city_candidates($id) {
		global $candidates;
		$candidates = find('city_candidates', $id, true, 'city_id');
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

	function delete($id) {
		$state_id = find('cities', $id)['state_id'];

		remove('cities', $id, true, ['city_candidates'], 'city_id');
		header("location: index.php?id=$state_id");
	}