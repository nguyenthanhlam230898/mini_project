<?php
	class add_product extends Controller{
		function show(){

			$this->view("master_layout",[
				"page" => "product/add_product"
			]);
			// $this->view("page/add_product");

		}
	}

?>