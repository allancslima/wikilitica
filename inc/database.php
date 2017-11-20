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

	function find($table = null, $id = null, $is_fk = false, $fk_name = null) {
		$database = open_database();
		$found = null;

		try {
			if ($id && !$is_fk && !$fk_name) {
				$sql = "SELECT * FROM " . $table . " WHERE `id` = $id";
				$result = $database->query($sql);
				
				if ($result->num_rows > 0)
					$found = $result->fetch_assoc();
			} else {
				if ($is_fk && $fk_name)
					$sql = "SELECT * FROM " . $table . " WHERE `$fk_name` = $id";
				else
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

	function save($table = null, $data = null) {
		$database = open_database();

		$columns = null;
		$values = null;

		foreach ($data as $key => $value) {
			$columns .= "`" . trim($key, "'") . "`,";
			$values .= "'$value',";
		}
		
		$columns = rtrim($columns, ',');
		$values = rtrim($values, ',');
		$sql = "INSERT INTO " . $table . "($columns)" . " VALUES " . "($values)";

		try {
			$database->query($sql);
			$_SESSION['message'] = 'Registro cadastrado com sucesso';
			$_SESSION['type'] = 'success';
		} catch (Exception $e) {
			$_SESSION['message'] = 'Não foi possível realizar a operação.';
			$_SESSION['type'] = 'danger';
		}

		close_database($database);
	}

	function update($table = null, $id = 0, $data = null) {
		$database = open_database();

		$items = null;
		foreach ($data as $key => $value)
			$items .= "`" . trim($key, "'") . "`" . "='$value',";
		$items = rtrim($items, ',');

		$sql = "UPDATE " . $table . " SET $items" . " WHERE `id` = $id";
		
		try {
			$database->query($sql);
			$_SESSION['message'] = 'Registro atualizado com sucesso';
			$_SESSION['type'] = 'success';
		} catch (Exception $e) {
			$_SESSION['message'] = 'Não foi possível realizar a operação.';
			$_SESSION['type'] = 'danger';
		}

		close_database($database);
	}