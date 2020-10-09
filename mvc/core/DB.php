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
	protected $result = NULL;
	public function execute($sql){
		$this->result = $this->conn->query($sql);
		return $this->result;
	}

	public function Data(){
		if ($this->result) {
			$data = mysqli_fetch_array($this->result);
		}else{
			$data = 0;

		}
		return $data;
	}

	
	public function num_rows(){
		if($this->result){
			$num = mysqli_num_rows($this->result);	
		}else{
			$num = 0;
		}

		return $num;
	}

}
?>