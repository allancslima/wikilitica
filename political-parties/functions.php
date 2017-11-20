<?php

	require_once('../config.php');
	require_once(DBAPI);

	$political_parties = null;
	$political_party = null;

	function index() {
		global $political_parties;
		$political_parties = find_all('political_parties');
	}

	function view($id) {
		global $political_party;
		$political_party = find('political_parties', $id);
	}

	function add() {
		if (isset($_POST['political_party'])) {
			save('political_parties', $_POST['political_party']);
			header('location: index.php');
		}
	}

	function edit() {
		if (isset($_GET['id'])) {
			$id = $_GET['id'];
			
			if (isset($_POST['political_party'])) {
				$political_party = $_POST['political_party'];

				update('political_parties', $id, $political_party);
				header('location: index.php');
			} else {
				view($id);
			}
		}
	}

	function delete($id) {
		remove('political_parties', $id);
		header('location: index.php');
	}