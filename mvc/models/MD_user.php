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
			$data = $this->Data();
		}else{
			// echo "Bạn không có quyền sửa";
			$data = 0;

		}
		return $data;
	}

	public function checkUser($user_mail,$user_pass){
		$sql = "SELECT user_level FROM user WHERE user_mail = '$user_mail' AND user_pass = '$user_pass'";
		$this->execute($sql);
		$data = $this->Data();
		return $data;
	}

	public function Insert($user_full, $user_mail,$user_pass, $user_level){
		// $data = $this
		// if ($data == 1) {
		$query = "INSERT INTO user(user_full, user_mail, user_pass, user_level) VALUES ('$user_full','$user_mail','$user_pass','$user_level')";
		$this->execute($query);
			// header("location: ../user");
		// }
	}
	public function Update($user_full, $user_mail,$user_pass,$user_level, $id){
		$sql = "UPDATE user SET user_full = '$user_full',
								user_mail = '$user_mail',
								user_pass = '$user_pass',
								user_level = '$user_level'
							WHERE user_id = '$id'";
		return $this->execute($sql);
	}
	public function Delete($id){
		$sql = "DELETE FROM user WHERE user_id = '$id'";
		$this->execute($sql);	
		
	}

}


?>