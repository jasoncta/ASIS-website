<?php
    /**
     * Simple Facebook Events Explorer Script
     *
     * author: Harman Goei
     *
     */
	class Trojanscup extends CI_Controller {
		
        
		function __construct()
		{
			parent::__construct();
			
			
		}
		
		
		function index()
		{
			$data["page"] = "trojanscup";
			$this->load->view('main', $data);
		}
		
		
        
	}