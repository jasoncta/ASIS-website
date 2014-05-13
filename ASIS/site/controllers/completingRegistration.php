<?php
    /**
     * Simple Facebook Events Explorer Script
     *
     * author: Harman Goei
     *
     */
	class CompletingRegistration extends CI_Controller {
		
        
		function __construct()
		{
			parent::__construct();
			
			
		}
		
		
		function index()
		{
			$data["page"] = "completingRegistration";
			$this->load->view('main', $data);
		}
		
		
        
	}