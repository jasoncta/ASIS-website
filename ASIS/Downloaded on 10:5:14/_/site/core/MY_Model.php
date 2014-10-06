<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* class DataModel
* 
*/
class MY_Model extends CI_Model {
	var $data;

	function __construct($data=null) { 
		parent::__construct();
		if($data != null)
			$this->data = simplexml_load_file($data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */