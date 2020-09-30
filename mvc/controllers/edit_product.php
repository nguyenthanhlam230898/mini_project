<?php
	/**
	 * 
	 */
	class edit_product extends Controller
	{
		function __construct(){
			$this->view("master_layout");
			$this->view("page/product/edit_product");

		}
		
		
	}

?>