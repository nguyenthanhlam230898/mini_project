<?php
class product extends Controller
{

	private $table_prd = 'product';
	private $table_cat = 'category';

	//controller dùng để Show ra danh sách tất cả sản phẩm 
	function show()
	{	
		error_reporting(0);
		if(!isset($_SESSION["id"])){
			header("location: ./login");
		}
		$prd = $this->model("MD_product");
		$this->view("master_layout", [
			"page"=>"product",
			"data_product"=>$prd->getAllData()
		]);	

	}

	//controller sửa sản phẩm 
	function edit($id){
		$cat = $this->model("MD_category");
		$prd = $this->model("MD_product");
		
		$data_image = $prd->getData($id);
		if (isset($_POST['sbm'])) {
			$prd_name = htmlentities($_POST['prd_name']);
			$prd_price = htmlentities($_POST['prd_price']);
			$prd_warranty = htmlentities($_POST['prd_warranty']);
			$prd_accessories = $_POST['prd_accessories'];
			if ($_FILES['prd_image']['name'] == ""){
				$prd_image = $data_image['prd_image'];
			}else{
				$prd_image = $_FILES['prd_image']['name'];
				move_uploaded_file($_FILES['prd_image']['tmp_name'], '/opt/lampp/htdocs/mini_project/public/image/'.$prd_image);
			}
			$prd_promotion = htmlentities($_POST['prd_promotion']);
			$cat_id = $_POST['cat_id'];
			$prd_details = $_POST['prd_details'];
			$check = $prd->check($prd_name);
			if ($check != "") {
				$this->view("master_layout",[
				"page" => "edit_product",
				"data" => $prd->getData($id),
				"data_cat" => $cat->getData($id),
				"all_cat" => $cat->getAllData($this->table_cat)

			]);
			}else{
				$prd->Update($prd_name, $prd_price,$prd_warranty,$prd_accessories, $prd_image ,$prd_promotion,$cat_id,$prd_details,$id);
				header("location: ../../product");
			}
			
		}else{
			$this->view("master_layout",[
				"page" => "edit_product",
				"data" => $prd->getData($id),
				"data_cat" => $cat->getData($id),
				"all_cat" => $cat->getAllData($this->table_cat)

			]);
		}

	}

	// controller Thêm sản Phẩm 
	function add(){
		$cat = $this->model("MD_category");
		$prd = $this->model("MD_product");
		
		if ((empty($_POST['prd_name']) || empty($_POST['prd_price']) || empty($_POST['prd_warranty']) || empty($_POST['prd_accessories'])|| empty($_FILES['prd_image']['name'])|| empty($_POST['prd_promotion'])|| empty($_POST['cat_id']))) {
			$this->view("master_layout",[
				"page" => "add_product", 
				"all_cat" => $cat->getAllData($this->table_cat)
			]);
		}
		if (isset($_POST['sbm'])){
			$prd_name = htmlentities($_POST['prd_name']);
			$prd_price = $_POST['prd_price'];
			$prd_warranty = htmlentities($_POST['prd_warranty']);
			$prd_accessories =htmlentities($_POST['prd_accessories']);
			$prd_image = $_FILES['prd_image']['name'];
			$prd_image_tmp_name = $_FILES['prd_image']['tmp_name'];
			
			$prd_promotion = htmlentities($_POST['prd_promotion']);
			$cat_id = $_POST['cat_id'];
			$prd_details = htmlentities($_POST['prd_details']);
			$result = $prd->check($prd_name);
			if($result != NULL ){
				$this->view("master_layout",[
					"page" => "add_product", 
					"all_cat" => $cat->getAllData($this->table_cat),
					"mess"=>$result
				]);
			}else{
				$prd->Insert($prd_name, $prd_price,$prd_warranty,$prd_accessories, $prd_image ,$prd_promotion,$cat_id,$prd_details);
				move_uploaded_file($prd_image_tmp_name, '/opt/lampp/htdocs/mini_project/public/image/'.$prd_image);
				header("location: ../product");
			}

			


		}else{
			$this->view("master_layout",[
				"page" => "add_product", 
				"all_cat" => $cat->getAllData($this->table_cat)
			]);
		}
	}

	// controller delete sản phẩm
	function delete($id){
		$prd = $this->model("MD_product");
		$prd->Delete($id);
		if ($result = true) {
			header("location: ../../product");
		}
	}

}

?>