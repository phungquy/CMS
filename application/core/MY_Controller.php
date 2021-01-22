<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class MY_Controller extends CI_Controller {
		protected $_data;
	public function __construct()
	{
		parent::__construct();
		$this->load->library("My_layout");
		$this->load->helper(array("language", "my_helper"));
		$this->load->Model("admin/muser");
		$this->load->Model("admin/mmodule");
		$this->load->Model("admin/mpermission");
		$this->load->Model("admin/mlanguage");
		$this->load->Model("admin/mmail");
		$this->load->Model("admin/msetting");
		$this->load->Model("admin/mevaluate_records");
		$this->my_layout->setLayout("admin/template/index");
		$this->_data['user_active'] = $this->session->userdata('userActive');
		if ($this->uri->segment(2) != "" && $this->_data['user_active'] == NULL) {
			redirect(my_library::admin_site() . '?redirect=' . base64_encode(my_library::base_url() . ltrim($_SERVER["REQUEST_URI"],'/')));
		}
		if ($this->_data['user_active']['logged'] == false) {
			redirect(my_library::admin_site() . "index/lock");
		}
		$this->_data['title'] = "";
		$this->_data['mailUnread'] = $this->mmail->countUnread();
		$this->_data['listMailUnread'] = $this->mmail->getQuery("id,mail_fullname,mail_email,mail_title,mail_senddate","mail_status = 1","id desc","0,5");
		$this->_data['recordnotprocess'] = $this->mevaluate_records->recordnotprocess();
		$this->_data['setting'] = $this->msetting->getSetting("use_ga,ga_id,ga_profile_id,use_cache,time_cache");
		if (!$this->_data['language'] = $this->session->userdata('language')) {
			$this->_data['language'] = $this->config->item('language');
			$this->session->set_userdata('language', $this->_data['language']);
		}
		if ($this->_data['setting']['use_cache'] == 1) {
			$this->load->driver('cache', array('adapter' => 'apc', 'backup' => 'file'));
			if (!$this->_data['myModule'] = $this->cache->get('module_'.$this->_data['language'])) {
			    $this->_data['myModule'] = $this->mmodule->getModule($this->_data['language']);
		        $this->cache->save('module_'.$this->_data['language'], $this->_data['myModule'], $this->_data['setting']['time_cache']);
			}
			if (!$this->_data['listLanguage'] = $this->cache->get('listlang_admin')) {
				$this->_data['listLanguage'] = $this->mlanguage->getLanguage();
				$this->cache->save('listlang_admin', $this->_data['listLanguage'], $this->_data['setting']['time_cache']);
			}
		} else {
			$this->_data['myModule'] = $this->mmodule->getModule($this->_data['language']);
			$this->_data['listLanguage'] = $this->mlanguage->getLanguage();
		}
		$this->_data['controller'] = $this->uri->segment(2);
		$this->_data['extraCss'] = array();
		$this->_data['extraJs'] = array();
	}
}
