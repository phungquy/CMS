<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include ( APPPATH . 'core/MY_Controllerfront.php' );
class Errors extends MY_Controllerfront {
	public function __construct()
    {
        parent::__construct();
        $this->lang->load('home',$this->_data['language'].'_front');
    }
	public function index()
	{
		$this->output->set_status_header('404');
		$this->my_layout->view("front/404/404_view", $this->_data);
	}
}
