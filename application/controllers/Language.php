<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include ( APPPATH . 'core/MY_Controllerfront.php' );
class Language extends MY_Controllerfront {
	public function __construct()
    {
		parent::__construct();
    }
	public function language()
	{
		$language = $this->input->get('l') ?? $this->config->item('language');
		$redirect = $this->input->get('r') ?? base64_encode(base_url());
		//if ($language == 'vietnamese' || $language == 'english') {
			$this->session->unset_userdata('language');
			$this->session->set_userdata('language', $language);
		//}
		redirect(base64_decode($redirect),'refresh');
	}
}
