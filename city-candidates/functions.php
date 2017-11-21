<?php

	require_once('../config.php');
	require_once(DBAPI);

	$city = null;
	$candidates = null;
	$candidate = null;
	$political_parties = null;
	$political_party = null;
	$realizations = null;
	
	function city($id) {
		global $city;
		$city = find('cities', $id);
	}

	function political_parties() {
		global $political_parties;
		$political_parties = find_all('political_parties');
	}

	function political_party($id) {
		global $political_party;
		$political_party = find('political_parties', $id);
	}

	function view($id) {
		global $candidate;
		$candidate = find('city_candidates', $id);
	}

	function realizations($id) {
		global $realizations;
		$realizations = find('city_candidates_realizations', $id, true, 'candidate_id');
	}

	function add() {
		if (isset($_POST['candidate'])) {
			save('city_candidates', $_POST['candidate']);
			header('location: ' . BASEURL . 'cities/view.php?id=' . $_GET['id']);
		}
	}

	function edit() {
		if (isset($_GET['id'])) {
			$id = $_GET['id'];
			$state_id = $_GET['state_id'];

			if (isset($_POST['candidate'])) {
				$candidate = $_POST['candidate'];

				update('state_candidates', $id, $candidate);
				header('location: ../states/view.php?id=' . $state_id);
			} else {
				view($id);
			}
		}
	}

	function delete($id) {
		$city_id = find('city_candidates', $id)['city_id'];

		remove('city_candidates', $id, true, ['candidates_realizations'], 'candidate_id');
		header('location: ../cities/view.php?id=' . $city_id);
	}