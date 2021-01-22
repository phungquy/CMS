<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Statistical extends MY_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->lang->load('statistical',$this->_data['language']);
        $this->load->Model("admin/mnews");
        $this->load->Model("admin/mcategory_translation");
        $this->mpermission->checkPermissionModule($this->uri->segment(2),$this->_data['user_active']['active_user_module']);
    }

    public function index()
    {
        $this->mpermission->checkPermission("statistical","index",$this->_data['user_active']['active_user_group']);
        $this->_data['year'] = $this->input->get('year') ?? date("Y");
        $this->_data['totalNews'] = $this->mnews->countAnd('news_state = 3 and year(news_createdate) = '.$this->_data['year']);
        $this->_data['title'] = lang('title').lang('in').$this->_data['year'];
        for ($i=1; $i < 13; $i++) { 
            $this->_data['listNewsinYear'][$i] = $this->mnews->countQuery('news_state = 3 and month(news_createdate) = '.$i.' and year(news_createdate) = '.$this->_data['year']);
        }

        //Category
        $sqlCategory = 'select news_category, count(id) as total from cms_news where news_state = 3 and year(news_createdate) = '.$this->_data['year'].' group by news_category';
        $queryCategory = $this->db->query($sqlCategory);
        $listCategory = $queryCategory->result_array();
        $this->_data['labelsCategory'] = '';
        $this->_data['dataCategory'] = '';
        $this->_data['colorCategory'] = '';
        foreach ($listCategory as $value) {
            $this->_data['dataCategory'] .= $value['total'].',';
            $category = $this->mcategory_translation->getData('category_name','category_id = '.$value['news_category'].' and language_code = "'.$this->_data['language'].'"');
            $categoryName = $category['category_name'] ?? '';
            $this->_data['labelsCategory'] .= '"'.$categoryName.'",';
            $this->_data['colorCategory'] .= '"rgb('.mt_rand(0, 255).','.mt_rand(0, 255).','.mt_rand(0, 255).')",';
        }
        $this->_data['labelsCategory'] = rtrim($this->_data['labelsCategory'],',');
        $this->_data['dataCategory'] = rtrim($this->_data['dataCategory'],',');
        $this->_data['colorCategory'] = rtrim($this->_data['colorCategory'],',');

        //User
        $sqlUser = 'select user, count(id) as total from cms_news where news_state = 3 and year(news_createdate) = '.$this->_data['year'].' group by user';
        $queryUser = $this->db->query($sqlUser);
        $listUser = $queryUser->result_array();
        $this->_data['labelsUser'] = '';
        $this->_data['dataUser'] = '';
        $this->_data['colorUser'] = '';
        foreach ($listUser as $value) {
            $this->_data['dataUser'] .= $value['total'].',';
            $user = $this->muser->getData('user_fullname','id = '.$value['user']);
            $fullname = $user['user_fullname'] ?? '';
            $this->_data['labelsUser'] .= '"'.$fullname.'",';
            $this->_data['colorUser'] .= '"rgb('.mt_rand(0, 255).','.mt_rand(0, 255).','.mt_rand(0, 255).')",';
        }
        $this->_data['labelsUser'] = rtrim($this->_data['labelsUser'],',');
        $this->_data['dataUser'] = rtrim($this->_data['dataUser'],',');
        $this->_data['colorUser'] = rtrim($this->_data['colorUser'],',');
        //Layout
    	$this->my_layout->view("admin/statistical/index", $this->_data);
    }
}
