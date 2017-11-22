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
	
	function index() {
		global $cities, $state;
		$cities = find('cities', $state['id'], true, 'state_id');
	}
	
	function view($id) {
		global $city;
		$city = find('cities', $id);
		candidates($id);
	}

	function candidates($city_id) {
		global $candidates;
		$candidates = find('city_candidates', $city_id, true, 'city_id');
	}

	function add() {
		if (isset($_POST['city'])) {
			save('cities', $_POST['city']);
			global $state;
			header('location: index.php?id=' . $state['id']);
		}
	}

	function edit() {
		$id = $_GET['id'];
		
		if (isset($id)) {
			
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