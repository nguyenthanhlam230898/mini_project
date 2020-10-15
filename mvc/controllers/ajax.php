<?php
	/**
	 * 
	 */
	class ajax extends Controller
	{
		
		public function check_prd(){
			error_reporting(0);
			$prd = $this->model("MD_product");
			$prd_name = $_POST['prd_name'];
			echo $prd->check($prd_name);
			
		}

		public function check_user(){
			error_reporting(0);
			$user = $this->model("MD_user");
			$user_mail = $_POST['user_mail'];
			echo $user->check($user_mail);
		}
		// public function check_pass(){
		// 	$kq = false;
		// 	$user_pass 
		// }
	}
?>