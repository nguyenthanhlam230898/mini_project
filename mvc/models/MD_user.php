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
		$sql = "SELECT user_mail, user_pass, user_level FROM user WHERE user_mail = '$user_mail' AND user_pass = '$user_pass'";
		$this->execute($sql);
		$data = $this->Data();
		return $data;
	}
	public function checkUserById($id){
		$sql = "SELECT user_mail, user_pass FROM user WHERE user_id = '$id'";
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
	public function Update($user_full,$user_pass,$user_level, $id){
		$sql = "UPDATE user SET user_full = '$user_full',
								-- user_mail = '$user_mail',
								user_pass = '$user_pass',
								user_level = '$user_level'
							WHERE user_id = '$id'";
		$this->execute($sql);
	}
	public function Delete($id){
		$sql = "DELETE FROM user WHERE user_id = '$id'";
		$this->execute($sql);	
		
	}

	public function check($user_mail){
		$sql = "SELECT user_mail FROM user WHERE user_mail = '$user_mail'";
		$query = $this->execute($sql);
		$kq = NULL;
			if (mysqli_num_rows($query)	> 0) {
				$kq = "Email đã tồn tại";
			}
		return $kq;
	}

	public function check_mail($id){
		$sql = "SELECT user_mail FROM user WHERE user_id <> '$id'";
		$query = $this->execute($sql);
		$kq = "";
			if (mysqli_num_rows($query)	> 0) {
				$kq = "Email đã tồn tại";
			}
		return $kq;
	}

}


?>