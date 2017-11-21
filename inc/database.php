<?php
	
	/**
	*  Connects to the database
	*/
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

	/**
	*  Closes the database
	*/
	function close_database($connection) {
		try {
			mysqli_close($connection);
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}

	/**
	*  Locates records with (also in child tables) or without the id parameter.
	*/
	function find($table, $id = null, $is_fk_id = false, $fk = null) {
		$database = open_database();
		$found = null;

		try {

			if ($id && !($is_fk_id || $fk)) {
				$sql = "SELECT * FROM $table WHERE `id` = $id";
				$result = $database->query($sql);
				
				if ($result->num_rows > 0)
					$found = $result->fetch_assoc();
			} 
			else {
				if ($id && $is_fk_id && $fk)
					$sql = "SELECT * FROM $table WHERE `$fk` = $id";
				else
					$sql = "SELECT * FROM $table";

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

	/**
	*  Locates all records from a table
	*/
	function find_all($table) {
		return find($table);
	}

	/**
	*  Saves data in a table 
	*/
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

		try {
			
			$sql = "INSERT INTO $table ($columns) VALUES ($values)";
			$database->query($sql);
			
			$_SESSION['message'] = 'Registro cadastrado com sucesso';
			$_SESSION['type'] = 'success';
		
		} catch (Exception $e) {

			$_SESSION['message'] = 'Não foi possível realizar a operação.';
			$_SESSION['type'] = 'danger';
		
		}

		close_database($database);
	}

	/**
	*  Updates data from a table record
	*/
	function update($table = null, $id = 0, $data = null) {
		$database = open_database();
		$items = null;

		foreach ($data as $key => $value)
			$items .= "`" . trim($key, "'") . "` = '$value',";
		$items = rtrim($items, ',');

		try {

			$sql = "UPDATE $table SET $items WHERE `id` = $id";
			$database->query($sql);

			$_SESSION['message'] = 'Registro atualizado com sucesso';
			$_SESSION['type'] = 'success';
		
		} catch (Exception $e) {

			$_SESSION['message'] = 'Não foi possível realizar a operação.';
			$_SESSION['type'] = 'danger';
		
		}

		close_database($database);
	}

	/**
	*  Removes records from parent and child tables
	*/
	function remove($table, $id, $is_parent = null, $child_tables = null, $fk = null) {
		$database = open_database();

		try {
			
			if ($is_parent && $child_tables && $fk) {
				foreach ($child_tables as $child_table) 
					$database->query("DELETE FROM $child_table WHERE `$fk` = $id");
			}
			
			$sql = "DELETE FROM " . $table . " WHERE `id` = " . $id;
			$database->query($sql);

			$_SESSION['message'] = 'Registro removido com sucesso';
			$_SESSION['type'] = 'success';
		
		} catch (Exception $e) {
			
			$_SESSION['message'] = 'Não foi possível realizar a operação.';
			$_SESSION['type'] = 'danger';
		
		}

		close_database($database);
	}