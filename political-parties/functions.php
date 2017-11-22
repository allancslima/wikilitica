<?php

	require_once('../config.php');
	require_once(DBAPI);

	$political_parties = null;
	$political_party = null;
	$state_candidates = null;
	$city_candidates = null;

	function index() {
		global $political_parties;
		$political_parties = find_all('political_parties');
	}

	function view($id) {
		global $political_party;
		$political_party = find('political_parties', $id);
	}

	function state_candidates($political_party_id) {
		global $state_candidates;
		$state_candidates = find('state_candidates', $political_party_id, true, 'political_party_id');
	}

	function city_candidates($political_party_id) {
		global $city_candidates;
		$city_candidates = find('city_candidates', $political_party_id, true, 'political_party_id');
	}

	function add() {
		if (isset($_POST['political_party'])) {
			save('political_parties', $_POST['political_party']);
			header('location: index.php');
		}
	}

	function edit() {
		$id = $_GET['id'];
		
		if (isset($id)) {
			
			if (isset($_POST['political_party'])) {
				update('political_parties', $id, $_POST['political_party']);
				header('location: index.php');
			} else {
				view($id);
			}

		}
	}

	function delete($id) {
		remove('political_parties', $id, true, ['state_candidates', 'city_candidates'], 'political_party_id');
		header('location: index.php');
	}