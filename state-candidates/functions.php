<?php

	require_once('../config.php');
	require_once(DBAPI);

	$state = null;
	$candidates = null;
	$candidate = null;
	$political_parties = null;
	
	function state($id) {
		global $state;
		$state = find('states', $id);
	}

	function political_parties() {
		global $political_parties;
		$political_parties = find_all('political_parties');
	}

	function add() {
		if (isset($_POST['candidate'])) {
			save('state_candidates', $_POST['candidate']);
			header('location: ' . BASEURL . 'states/view.php?id=' . $_GET['id']);
		}
	}

	function delete($id) {
		$state_id = find('state_candidates', $id)['state_id'];

		remove('state_candidates', $id);
		header('location: ../states/view.php?id=' . $state_id);
	}