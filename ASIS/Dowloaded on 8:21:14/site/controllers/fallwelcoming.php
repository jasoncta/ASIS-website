<?php
    /**
     * Simple Facebook Events Explorer Script
     *
     * author: Harman Goei
     *
     */
	class Fallwelcoming extends CI_Controller {
		
        
		function __construct()
		{
			parent::__construct();
			
			
		}
		
		
		function index()
		{
			$data["page"] = "fallwelcoming";
			$this->load->view('main', $data);
		}
		
		
        
	}