<?php
class login extends Controller
{
	public function show(){
		$this->view("login");
	}
	public function login(){
		$result_mess = false;
		if(isset($_POST["submit"])){
			$username = $_POST["username"];
			$password = $_POST["password"];
			if(empty($_POST["username"])||empty($_POST["password"])){	
				$this->view("login",["result_empty"=>"Require username and password!"]);
			}else{
				$model = $this->model("model_login");
				$row = $model->login($username,$password);
				// if(mysqli_num_rows($result)>0){
					// $row = mysqli_fetch_array($result);
				$id = $row['user_id'];
				$username = $row['user_mail'];
				$password = $row['user_pass'];
				// $this->view("master_layout",[
				// 	"data" => $model->login($username,$password)
				// ]);
				header("location: ../product");
				$_SESSION["id"]=$id;
				if(!empty($_POST["check_remember"])){							
					setcookie("remember_me_u",$username,time()+3600,"/","",0);
					setcookie("remember_me_p",$password,time()+3600,"/","",0);
					// }
					header("location: ../product");
					// $this->view("master_layout",[
					// 	"data" => $model->login($username,$password)
					// ]);
				// }else{
				// 	$this->view("login",["result"=>$result_mess]);
				// }

				}else{
					$this->view("login",[]);
				}
			}
		}
	}


		public function logout(){
			unset($_SESSION["id"]);
			session_destroy();
			unset($_COOKIE["remember_me_u"]);
			unset($_COOKIE["remember_me_p"]);
			$this->view("login",[]);
		}

	}

	?>
