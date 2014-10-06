<?php
/**
* Simple Facebook Events Explorer Script
*
* author: Harman Goei
*
*/
	class About extends CI_Controller {
		

		function __construct()
		{
			parent::__construct();
			
			
		}
		
		/**
		* Gallery Index. 
		* Displays all the albums
		*/
		function index()
		{
			$data["page"] = "about";
			$this->load->view('main', $data);
		}
		
		
	
	}