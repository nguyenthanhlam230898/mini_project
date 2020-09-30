<?php
/**
 * 
 */
class DB
{
	public $conn = NULL;
	protected $hostname = 'localhost';
	protected $username = 'root';
	protected $pass = '';
	protected $DBname = 'mini_project';



	function __construct()
	{
		$this->conn = new mysqli($this->hostname , $this->username, $this->pass, $this->DBname);
		if (!$this->conn) {
			echo "ket noi that bai";
			exit();
		}else{
			mysqli_set_charset($this->conn, 'utf8');
		}
	}
}
?>