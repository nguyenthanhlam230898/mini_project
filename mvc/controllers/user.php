
<?
/**
 * 
 */
class user extends Controller
{
	private $table = 'user';
	function show(){
		
		$user = $this->model("MD_user");
		// error_reporting(0);
		if(!isset($_SESSION["id"])){
			header("location: ./login");
		}
		$this->view("master_layout", [
			"page" => "user",
			"data" => $user->getAllData($this->table)
		]);	

	}

	function add(){
		$user = $this->model("MD_user");
		if (isset($_SESSION['mail']) && isset($_SESSION['pass'])) {
			$mail = $_SESSION['mail'];
			$pass = $_SESSION['pass'];
			$level = $user->checkUser($mail , $pass);
			if ($level["user_level"] == 1) {
				if (isset($_POST['sbm'])) {
					$user_full = $_POST['user_full'];
					$user_mail = $_POST['user_mail'];
					$user_pass = $_POST['user_pass'];
					$user_re_pass = $_POST['user_re_pass'];
					$user_level = $_POST['user_level'];
					if ($user_pass != $user_re_pass) {
						echo "moi ban nhap lai";
					}else{
						$user->Insert($user_full,$user_mail,$user_pass,$user_level);
						header("location: ../user");
					}
				}else{
					$this->view("master_layout", [
						"page" => "add_user"
					]);
				}

			}else{
				$this->view("master_layout", [
					"page" => "user",
					"data" => $user->getAllData($this->table),
					"result" => $result=true
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
			if ($level["user_level"] == 1) {
				if (isset($_POST['sbm'])) {
					$user_full = $_POST['user_full'];
					$user_mail = $_POST['user_mail'];
					$user_pass = $_POST['user_pass'];
					$user_re_pass = $_POST['user_re_pass'];
					$user_level = $_POST['user_level'];
					if ($user_pass === $user_re_pass) {
						$user->Update($user_full,$user_mail,$user_pass,$user_level,$id);
						header("location: ../user");
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
					"data" => $user->getAllData($this->table),
					"result_edit" => $result=true
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
			if ($level["user_level"] == 1) {
				$user->Delete($id);
				header("location: ../../user");	

			}else{
				$this->view("master_layout", [
					"page" => "user",
					"data" => $user->getAllData($this->table),
					"result_del" => $result=true
				]);
				
			}
		}
	}
}
?>