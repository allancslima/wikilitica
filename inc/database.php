<?php

	function open_database() {
		try {
			$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
			mysqli_set_charset($connection, 'utf8');
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

	function find($table, $id = null) {
		$database = open_database();
		$found = null;

		try {
			if ($id) {
				$sql = 'SELECT * FROM ' . $table . ' WHERE id = ' . $id;
				$result = $database->query($sql);
				
				if ($result->num_rows > 0)
					$found = $result->fetch_assoc();
			} else {
				$sql = 'SELECT * FROM ' . $table;
				$result = $database->query($sql);

				if ($result->num_rows > 0)
					$found = $result->fetch_all(MYSQLI_ASSOC);
			}
		}	catch (Exception $e) {
			$_SESSION['message'] = $e->getMessage();
			$_SESSION['type'] = 'danger';
		}

		close_database($database);
		return $found;	
	}

	function find_all($table) {
		return find($table);
	}