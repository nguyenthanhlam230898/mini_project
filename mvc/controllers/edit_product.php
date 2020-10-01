<?php
	/**
	 * 
	 */
	class edit_product extends Controller
	{
		function show(){
			$this->view("master_layout",[
				"page" => "product/edit_product"
			]);
			// $this->view("page/product/edit_product");

		}
		
		
	}

?>