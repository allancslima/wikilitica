<?php

	require_once('../config.php');
	require_once(DBAPI);

	$states = null;
	$state = null;

	function index() {
		global $states;
		$states = find_all('states');
	}