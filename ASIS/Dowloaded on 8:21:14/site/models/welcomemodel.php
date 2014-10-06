<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* class Welcome
* 
*/
class WelcomeModel extends MY_Model {

	function __construct() { 
		parent::__construct("data/welcome.xml");
	}
	
	function getSemester() { 
		$month = date("m");
		$year = date("Y");
		
		if($month <= 5)
			return "Spring " + $year;
		else if($month >= 8)
			return "Fall " + $year;
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */