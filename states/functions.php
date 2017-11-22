<?php

	require_once('../config.php');
	require_once(DBAPI);

	$states = null;
	$state = null;
	$candidates = null;

	function index() {
		global $states;
		$states = find_all('states');
	}

	function view($id) {
		global $state;
		$state = find('states', $id);
		candidates($id);
	}

	function candidates($state_id) {
		global $candidates;
		$candidates = find('state_candidates', $state_id, true, 'state_id');
	}

	function add() {
		if (isset($_POST['state'])) {
			save('states', $_POST['state']);
			header('location: index.php');
		}
	}

	function edit() {
		$id = $_GET['id'];
		
		if (isset($id)) {

			if (isset($_POST['state'])) {
				$state = $_POST['state'];
				update('states', $id, $state);
				header('location: index.php');
			} else {
				view($id);
			}
				
		}
	}

	function delete($id) {
		remove('states', $id, true, ['cities', 'state_candidates'], 'state_id');
		header('location: index.php');
	}