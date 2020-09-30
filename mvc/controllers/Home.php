<?php
	
	class Home extends Controller
	{
		// function show(){
		// 	$this->view("master_layout" );
		// 	$this->view("page/Dashboard" );
		// }

		function __construct()
		{
			$this->view("master_layout");
			$this->view("page/Dashboard");
			
			
		}
	}
?>