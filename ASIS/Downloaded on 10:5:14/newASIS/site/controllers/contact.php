<?php
/**
* Simple Facebook Events Explorer Script
*
* author: Harman Goei
*
*/
	class Contact extends CI_Controller {
		

		function __construct()
		{
			parent::__construct();
			
			
		}
		
		/**
		* Gallery Index. 
		* Displays all the albums
		*/
		function index($limit = null, $until = null, $mode = null)
		{
			$data["page"] = "contact";
			$this->load->view('main', $data);
		}
		
		
	
	}