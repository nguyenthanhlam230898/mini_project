<?php
	/**
	 * 
	 */
	class product extends Controller
	{
		// public $prd;
		// $prd = $this->model("product");
		
		function show()
		{	
			// $name =  $prd->getData();
			$this->view("master_layout", [
				"page" => "product"
				// "name" => $name
			]);	
		}

		// function add(){

		// 	$this->view("master_layout",[
		// 		"page" => "add_product"
		// 	]);

		// }

		// function edit(){
		// 	$this->view("master_layout",[
		// 		"page" => "edit_product"
		// 	]);

		// }

	}

?>