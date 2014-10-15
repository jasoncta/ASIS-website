<?php
    /**
     * Simple Facebook Events Explorer Script
     *
     * author: Harman Goei
     *
     */
	class Reelection extends CI_Controller {
		
        
		function __construct()
		{
			parent::__construct();
			
			
		}
		
		
		function index()
		{
			$data["page"] = "reelection";
			$this->load->view('main', $data);
		}
		
		
        
	}