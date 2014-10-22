<?php
    /**
     * Simple Facebook Events Explorer Script
     *
     * author: Harman Goei
     *
     */
	class TCRegistration extends CI_Controller {
		
        
		function __construct()
		{
			parent::__construct();
			
			
		}
		
		
		function index()
		{
			$data["page"] = "tcregistration";
			$this->load->view('main', $data);
		}
		
		
        
	}