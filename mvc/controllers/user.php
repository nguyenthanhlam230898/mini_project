
<?
/**
 * 
 */
class user extends Controller
{
	private $table = 'user';
	function show(){
		
		$user = $this->model("MD_user");
		$this->view("master_layout", [
			"page" => "user",
			"data" => $user->getAllData($this->table)
		]);	

	}

	function add(){
		$this->view("master_layout", [
			"page" => "add_user"
		]);
	}
	function edit($id){
		$user = $this->model("MD_user");
		$this->view("master_layout",[
			"page" => "edit_user", 
			"data" => $user->getData($id)
		]);
	}
}
?>