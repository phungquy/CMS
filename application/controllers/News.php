<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include ( APPPATH . 'core/MY_Controllerfront.php' );
class News extends MY_Controllerfront {
		public function __construct()
    {
		parent::__construct();
        $this->load->Model("front/mnews");
        $this->load->Model("front/mcategory");
        $this->lang->load('category',$this->_data['language'].'_front');
    }
	public function detail($id)
	{
		$this->_data['myNews'] = $this->mnews->getNewsbyID($id,'n.id,n.news_category,n.news_view,n.news_layout,n.news_tag,n.news_status,n.news_state,n.news_picture,n.news_publicdate,nt.news_title,nt.news_summary,nt.news_detail,nt.news_seo_title,nt.news_seo_keyword,nt.news_seo_description',$this->_data['language']);
		if ($this->_data['myNews'] != null && $this->_data['myNews']['news_status'] == 1 && $this->_data['myNews']['news_state'] == 3) {
				$this->_data['title'] = $this->_data['title_seo'] = $this->_data['myNews']['news_title'];
			if ($this->_data['myNews']['news_seo_title']) {
				$this->_data['title_seo'] = $this->_data['myNews']['news_seo_title'];
			}
			if ($this->_data['myNews']['news_seo_description']) {
				$this->_data['description_seo'] = $this->_data['myNews']['news_seo_description'];
			}
			if ($this->_data['myNews']['news_seo_keyword']) {
				$this->_data['keyword_seo'] = $this->_data['myNews']['news_seo_keyword'];
			}
			if ($this->_data['myNews']['news_picture']) {
				$this->_data['picture_seo'] = base_url().'media/news/'.$this->_data['myNews']['id'].'/'.$this->_data['myNews']['news_picture'];
			}
			$this->mnews->upview($id,$this->_data['myNews']['news_view']);
			$this->_data['listLatestnews'] = $this->mnews->getNews('n.id,n.news_picture,nt.news_title,nt.news_alias','n.id != '.$id.' and n.news_status = 1 and n.news_state = 3 and n.news_publicdate < "'.date('Y-m-d H:i:s').'" and nt.language_code = "'.$this->_data['language'].'"','n.news_publicdate desc','0,6');
			if ($this->_data['myNews']['news_layout'] == 1) {
				if ($this->_data['myNews']['news_tag'] != '') {
					$this->_data['listTags'] = explode(',', $this->_data['myNews']['news_tag']);
				}
				$this->my_layout->view("front/news/detail_view", $this->_data);
			} else {
					$this->_data['id_news'] = $id;
				// $this->_data['myCategory'] = $this->mcategory->getCategorybyID(3,'c.id,c.category_picture,ct.category_name,ct.category_alias,ct.category_seo_title',$this->_data['language']);
				if ($this->_data['myNews']['news_category'] == 3 || $this->_data['myNews']['news_category'] ==15) {
					$this->_data['listProgram'] = $this->mnews->getNews("n.id,n.news_picture,n.news_tag,nt.news_title,nt.news_alias",'n.news_status = 1 and n.news_state = 3 and n.news_publicdate < "'.date('Y-m-d H:i:s').'" and n.news_category = '.$this->_data['myNews']['news_category'].' and nt.language_code = "'.$this->_data['language'].'"',"n.news_orderby asc, n.id desc");
					$this->_data['linkCompare'] = $this->_data['myNews']['news_category'] == 3 ? 'so-sanh-cac-chuong-trinh-canada.html' : '';
				} elseif ($this->_data['myNews']['news_category']==12) {
					$this->_data['listProgram'] = $this->mnews->getNews("n.id,n.news_picture,n.news_tag,nt.news_title,nt.news_alias",'n.news_status = 1 and n.news_state = 3 and n.news_publicdate < "'.date('Y-m-d H:i:s').'" and n.news_category = 12 and nt.language_code = "'.$this->_data['language'].'"',"n.news_orderby asc, n.id desc","0,5");
					$this->_data['linkCompare'] = 'so-sanh-cac-chuong-trinh-eu.html';
				} else{
					$this->_data['listProgram'] = $this->mnews->getNews("n.id,n.news_picture,n.news_tag,nt.news_title,nt.news_alias",'n.news_status = 1 and n.news_state = 3 and n.news_publicdate < "'.date('Y-m-d H:i:s').'" and n.news_category = 4 and nt.language_code = "'.$this->_data['language'].'"',"n.news_orderby asc, n.id desc","0,5");
					$this->_data['linkCompare'] = 'so-sanh-cac-du-an-eb-5-my.html';
				}
				$this->my_layout->view("front/news/program_view", $this->_data);
			}
		} else {
				redirect('404-not-found.html','refresh');
		}
	}
	public function search()
	{
		$this->_data['keyword'] = $this->input->get('k');
		if ($this->_data['keyword']) {
			$this->_data['keyword'] = $this->security->xss_clean($this->_data['keyword']);
			$this->_data['title'] = lang('searchresults').': '.$this->_data['keyword'];
			$this->load->library("My_paging");
			$paging['per_page'] = 6;
	        $paging['num_links'] = 5;
	        $paging['page'] = $this->_data['page'] = $_GET['page'] ?? 1;
	        $paging['start'] = (($paging['page'] - 1) * $paging['per_page']);
	        $paging['base_url'] = base_url().'search?k='.$this->_data['keyword'].'&page=';
	        $limit = $paging['start'] . ',' . $paging['per_page'];
			$this->_data['listNews'] = $this->mnews->getNews("n.id,n.news_picture,n.news_publicdate,nt.news_title,nt.news_alias,nt.news_summary",'n.news_status = 1 and n.news_state = 3 and n.news_publicdate < "'.date('Y-m-d H:i:s').'" and nt.language_code = "'.$this->_data['language'].'" and (n.news_tag like "%'.$this->_data['keyword'].'%" or nt.news_title like "%'.$this->_data['keyword'].'%" or nt.news_alias like "%'.$this->_data['keyword'].'%" or nt.news_summary like "%'.$this->_data['keyword'].'%")',"n.news_orderby desc, n.id desc",$limit);
			$this->my_layout->view("front/news/search_view", $this->_data);
		}
	}
}
