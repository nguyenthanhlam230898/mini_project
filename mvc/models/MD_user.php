<?php
/**
 * 
 */
class MD_user extends DB
{
	public function getAllData($table){
		$sql = "SELECT * FROM $table";
		$this->execute($sql);
		if($this->num_rows()==0){
			$data = 0;
		}else{
			while ($datas = $this->Data()) {
				$data[] = $datas;
			}
		}
		return $data;
	}
	

	public function getData($id){
		$sql = "SELECT * FROM user WHERE user_id = '$id'";
		$this->execute($sql);
		if ($this->num_rows($sql)!=0) {
			$data = mysqli_fetch_array($this->result);
		}else{
			// echo "Bạn không có quyền sửa";
			$data = 0;

		}
		return $data;
	}
}


?>