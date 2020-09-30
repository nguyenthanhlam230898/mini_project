<?php
	/**
	 * 
	 */
	class product extends Controller
	{
		
		function __construct()
		{
			$model_prd = $this->model("product");
			$view_master = $this->view("master_layout",[]);
			$name =  $model_prd->getData();
			$this->view("page/product/product", [
				"ten" => $name
			]);

			
		}
	}

?>