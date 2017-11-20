<?php

	require_once('../config.php');
	require_once(DBAPI);

	$political_parties = null;
	$political_party = null;

	function index() {
		global $political_parties;
		$political_parties = find_all('political_parties');
	}