<?php

	function open_database() {
		try {
			$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
			return $connection;
		} catch (Exception $e) {
			echo $e->getMessage();
			return null;
		}
	}

	function close_database($connection) {
		try {
			mysqli_close($connection);
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}