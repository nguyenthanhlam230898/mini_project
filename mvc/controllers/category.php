<?php
	/**
	 * 
	 */
	class category extends Controller
	{
		// private $table = 'category';
		function show(){

			$cat = $this->model("MD_category");
			$this->view("master_layout", [
				"page" => "category",
				"data" => $cat->getAllData()
			]);	

		}

		function add(){
			$this->view("master_layout", [
				"page" => "add_category"
			]);
		}
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
	}

	?>