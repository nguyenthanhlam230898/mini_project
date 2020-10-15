
<?
/**
 * 
 */
class user extends Controller
{
	private $table = 'user';
	function show(){
		
		$user = $this->model("MD_user");
		if (isset($_SESSION['mail']) && isset($_SESSION['pass'])) {
			$mail = $_SESSION['mail'];
			$pass = $_SESSION['pass'];
			$level = $user->checkUser($mail , $pass);
		}
		if(!isset($_SESSION["id"])){
			header("location: ./login");
		}
		$this->view("master_layout", [
			"page" => "user",
			"data" => $user->getAllData($this->table),
			"check" => $level["user_level"]
		]);	

	}

	function add(){
		$user = $this->model("MD_user");
		if (isset($_SESSION['mail']) && isset($_SESSION['pass'])) {
			$mail = $_SESSION['mail'];
			$pass = $_SESSION['pass'];
			$level = $user->checkUser($mail , $pass);
			if ($level["user_level"] == 1) {
				if (isset($_POST['sbm']) && (empty($_POST['user_full']) || empty($_POST['user_mail']) || empty($_POST['user_pass']) || empty($_POST['user_level']) || empty($_POST['user_re_pass']))) {
					$this->view("master_layout", [
						"page" => "add_user"
					]);
				}
				if (isset($_POST['sbm'])) {
					$user_full = htmlentities($_POST['user_full']);
					$user_mail = htmlentities($_POST['user_mail']);
					$user_pass = (htmlentities($_POST['user_pass']));
					$user_re_pass = $_POST['user_re_pass'];
					$user_level = $_POST['user_level'];
					$result = $user->check($user_mail);
					$check ="";
					if ( ($result != NULL) || ($user_pass != $user_re_pass)) {	
						$check = "Bạn nhập sai pass";				
						$this->view("master_layout", [
							"page" => "add_user",
							"mess" => $check
						]);
					}else{
						$user->Insert($user_full,$user_mail,$user_pass,$user_level);
						header("location: ../user");
					}
				}else{
					$this->view("master_layout", [
						"page" => "add_user"
						// "mess" => $result
					]);
				}

			}else{
				$this->view("master_layout", [
					"page" => "user",
					"data" => $user->getAllData($this->table),
					"check" => $level["user_level"]
				]);
				
			}
		}
	}
	function edit($id){
		$user = $this->model("MD_user");
		if (isset($_SESSION['mail']) && isset($_SESSION['pass'])) {
			$mail = $_SESSION['mail'];
			$pass = $_SESSION['pass'];
			$level = $user->checkUser($mail , $pass);		
			if ($level["user_level"] == 1 ) {
				if (isset($_POST['sbm'])) {
					$user_full = htmlentities($_POST['user_full']);
					$user_pass = htmlentities($_POST['user_pass']);
					$user_re_pass = $_POST['user_re_pass'];
					$user_level = $_POST['user_level'];
					$result = "";
					if ($user_pass != $user_re_pass) {
						$result = "nhập lại mật khẩu";
						$this->view("master_layout",[
							"page" => "edit_user", 
							"data" => $user->getData($id),
							"mess" => $result
						]);
					}else{
						$user->Update($user_full,$user_pass,$user_level,$id);
						header("location: ../../user");
						
					}
				}else{
					$this->view("master_layout",[
						"page" => "edit_user", 
						"data" => $user->getData($id)
					]);
				}

			}else{
				$this->view("master_layout", [
					"page" => "user",
					"data" => $user->getAllData($this->table)
				]);
				
			}
		}
		
	}

	function Delete($id){
		$user = $this->model("MD_user");
		if (isset($_SESSION['mail']) && isset($_SESSION['pass'])) {
			$mail = $_SESSION['mail'];
			$pass = $_SESSION['pass'];
			$level = $user->checkUser($mail , $pass);
			$check = $user->checkUserById($id);
			$mess = "";
			if (($level["user_level"] == 1) && ($check[0] === $level[0])){
				
				$mess = "bạn không thể xóa chính bạn";
					$this->view("master_layout", [
						"page" => "user",
						"data" => $user->getAllData($this->table),
						"check" => $level["user_level"],
						"result" => $mess

					]);	
					
				}else{
					$user->Delete($id);
					header("location: ../../user");	
				}
				

			}else{
				$this->view("master_layout", [
					"page" => "user",
					"data" => $user->getAllData($this->table),
					"result_del" => $result=true
				]);
				
			}
		}
	// }
}
?>