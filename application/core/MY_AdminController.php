<?php
class MY_AdminController extends CI_Controller{
  public function __construct(){
    parent::__construct();
    $this->load->library(array("form_validation","session"));
    $this->load->helper(array("url","language","my_helper","form"));
    $this->load->Model("backend/muser");
    $this->load->Model("backend/mpermission");
    $this->load->Model("backend/mgroupaction");
    $this->load->Model("backend/mgroup_permission");
    $this->load->Model("backend/mhistory_login");
    $this->load->file('application/helpers/my_helper.php');
	}	
}
?>