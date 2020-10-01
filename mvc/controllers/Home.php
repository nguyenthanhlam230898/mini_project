<?php
	
	class Home extends Controller
	{
		// function show(){
		// 	$this->view("master_layout" );
		// 	$this->view("page/Dashboard" );
		// }

		function show()
		{
			$this->view("master_layout",[
				"page" => "Dashboard"
			]);		
		}
	}
?>