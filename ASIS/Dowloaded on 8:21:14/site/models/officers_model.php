<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* class Welcome
* 
*/
class Officers_Model extends MY_Model {

	function __construct() { 
		parent::__construct("data/officers.xml");
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */