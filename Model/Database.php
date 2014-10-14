<?php
namespace Model;

class Database {
	private $m_databaseName = "";
	private $m_mysqli = null;

	public function Connect(DBConfig $config) {
		$message = "";

		$this -> m_mysqli = new \mysqli($config -> m_host, $config -> m_user, $config -> m_pass, $config -> m_db);

		$this -> m_mysqli -> set_charset("utf8");

		if (mysqli_connect_error()) {
			$message = ('Fel vid anslutningen: ' . mysqli_connect_error());
			exit();
		}
	}

	public function SqlStatement($sqlQuery) {
		$stmt = $this -> m_mysqli -> prepare($sqlQuery);

		if ($stmt == FALSE) {
			Throw new \Exception($this -> m_mysqli -> error);
		}
		return $stmt;
	}

	public function Close() {
		$stmt = $this -> m_mysqli -> close();

		if ($stmt === FALSE) {
			throw new \Exception($this -> m_mysqli -> error);
		}
		return $stmt;
	}
	
	public function Execute() {
		$stmt = $this -> m_mysqli -> execute();

		if ($stmt === FALSE) {
			throw new \Exception($this -> m_mysqli -> error);
		}
		return $stmt;
	}
}