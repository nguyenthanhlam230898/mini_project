<?php
	/**
	 * 
	 */
	class category extends Controller
	{
		// cotroller show tất cả danh mục sản phẩm
		function show(){

			$cat = $this->model("MD_category");
			error_reporting(0);
			if(!isset($_SESSION["id"])){
				header("location: ./login");
			}
			$this->view("master_layout", [
				"page" => "category",
				"data" => $cat->getAllData()
			]);	

		}
		// Thêm danh mục sản phẩm
		function add(){
			$cat = $this->model("MD_category");
			
			if(isset($_POST['sbm'])){
				$cat_name = $_POST['cat_name'];
				$result = $cat->checkInsert($cat_name);
				if ($result == 0) {
					$cat->Insert($cat_name);
					header("location: ../category");
				}else{		
					// $result = false;			
					$this->view("master_layout", [
						"page" => "add_category",
						"result" => $result
					]);
				}	
			}else{
				$this->view("master_layout", [
					"page" => "add_category"
					// "result" => $result
				]);
			}
			
		}

		// sửa danh mục sản phẩm
		function edit($id){
			$cat = $this->model("MD_category");
			if (isset($_POST['sbm'])) {
				$cat_name = $_POST['cat_name'];

				$cat->Update($cat_name, $id);	
				header("location: ../../category");
			}else{
				$this->view("master_layout",[
					"page" => "edit_category", 
					"data" => $cat->getDataById($id)
				]);
			}
			
			
		}

		// xóa danh mục sản phẩm
		function Delete($id)
		{
			// $a = true;
			$cat = $this->model("MD_category");
			$result = $cat->Delete($id);
			if ($result = true) {
				header("location: ../../category");
			}else{
				$this->view("master_layout", [
					"page" => "category",
					"data" => $cat->getAllData(),
					"result" => $result
				]);
						
			}

		}
	}
	?>