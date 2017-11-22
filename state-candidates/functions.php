<?php

	require_once('../config.php');
	require_once(DBAPI);

	$state = null;
	$candidates = null;
	$candidate = null;
	$political_parties = null;
	$political_party = null;
	$realizations = null;
	
	function view($id) {
		global $candidate;
		$candidate = find('state_candidates', $id);
		state($candidate['state_id']);
		political_party($candidate['political_party_id']);
		realizations($candidate['id']);
	}

	function state($id) {
		global $state;
		$state = find('states', $id);
	}

	function political_parties() {
		global $political_parties;
		$political_parties = find_all('political_parties');
	}

	function political_party($id) {
		global $political_party;
		$political_party = find('political_parties', $id);
	}

	function realizations($id) {
		global $realizations;
		$realizations = find('state_candidates_realizations', $id, true, 'candidate_id');
	}

	function add() {
		if (isset($_POST['candidate'])) {
			save('state_candidates', $_POST['candidate']);
			$state_id = $_GET['id'];
			header('location: ../states/view.php?id=' . $state_id);
		}
	}

	function add_realization() {
		if (isset($_POST['realization'])) {
			save('state_candidates_realizations', $_POST['realization']);
			header('location: view.php?id=' . $_GET['id']);
		}
	}

	function edit() {
		$id = $_GET['id'];
		$state_id = $_GET['state_id'];
		
		if (isset($id)) {

			if (isset($_POST['candidate'])) {
				update('state_candidates', $id, $_POST['candidate']);
				header('location: ../states/view.php?id=' . $state_id);
			} else {
				view($id);
			}
		
		}
	}

	function delete($id) {
		$state_id = find('state_candidates', $id)['state_id'];
		remove('state_candidates', $id, true, ['state_candidates_realizations'], 'candidate_id');
		header('location: ../states/view.php?id=' . $state_id);
	}

	function delete_realization($id) {
		$candidate_id = find('state_candidates_realizations', $id)['candidate_id'];
		remove('state_candidates_realizations', $id);
		header('location: view.php?id=' . $candidate_id);
	}