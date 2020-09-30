<?php
	class add_product extends Controller{
		function __construct(){

			$this->view("master_layout");
			$this->view("page/product/add_product");
		}
	}

?>