<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include ( APPPATH . 'core/MY_Controllerfront.php' );
class Category extends MY_Controllerfront {
		public function __construct()
    {
	    parent::__construct();
        $this->load->Model("front/mcategory");
        $this->load->Model("front/mnews");
        $this->load->Model("front/mbanner");
        $this->lang->load('category',$this->_data['language'].'_front');
    }
	public function index($alias)
	{
		$this->_data['myCategory'] = $this->mcategory->getCategorybyAlias($alias,'c.id,c.category_component,c.category_view_type,c.category_view,c.category_status,c.category_picture,ct.category_name,ct.category_alias,ct.category_detail,ct.category_seo_title,ct.category_seo_description,ct.category_seo_keyword',$this->_data['language']);
		if ($this->_data['myCategory'] != null && $this->_data['myCategory']['category_status'] == 1) {
				$this->_data['title'] = $this->_data['myCategory']['category_name'];
			if ($this->_data['myCategory']['category_seo_title']) {
					$this->_data['title_seo'] = $this->_data['myCategory']['category_seo_title'];
			}
			if ($this->_data['myCategory']['category_seo_description']) {
					$this->_data['description_seo'] = $this->_data['myCategory']['category_seo_description'];
			}
			if ($this->_data['myCategory']['category_seo_keyword']) {
					$this->_data['keyword_seo'] = $this->_data['myCategory']['category_seo_keyword'];
			}
			if ($this->_data['myCategory']['category_picture']) {
					$this->_data['picture_seo'] = base_url().'media/category/'.$this->_data['myCategory']['category_picture'];
			}
			switch ($this->_data['myCategory']['category_component']) {
				case 'album':
					$this->load->Model("front/malbum");
					//Paging
					$this->load->library("My_paging");
					$paging['per_page'] = 12;
			        $paging['num_links'] = 5;
			        $paging['page'] = $this->_data['page'] = $_GET['page'] ?? 1;
			        $paging['start'] = (($paging['page'] - 1) * $paging['per_page']);
			        $paging['base_url'] = base_url().$this->_data['myCategory']['category_alias'].'?page=';
			        $limit = $paging['start'] . ',' . $paging['per_page'];
					//
					$this->_data['listAlbum'] = $this->malbum->getListAlbumbyCategoryID(8,'a.id,a.album_picture,at.album_name,at.album_alias,at.album_description',$limit,$this->_data['language']);
					$record = $this->malbum->countAlbum('a.album_parent = 8 and a.album_status = 1 and at.language_code = "'.$this->_data['language'].'"');
					$this->_data["pagination"] = $this->my_paging->paging_donturl($record, $paging['page'], $paging['per_page'], $paging['num_links'], $paging['base_url']);
					$this->my_layout->view("front/category/life_in_canada_view", $this->_data);
					break;
				case 'news':
					if ($this->_data['myCategory']['category_view_type'] == 1) {
							//Paging
						$this->load->library("My_paging");
						$paging['per_page'] = 6;
				        $paging['num_links'] = 5;
				        $paging['page'] = $this->_data['page'] = $_GET['page'] ?? 1;
				        $paging['start'] = (($paging['page'] - 1) * $paging['per_page']);
				        $paging['base_url'] = base_url().$this->_data['myCategory']['category_alias'].'?page=';
				        $limit = $paging['start'] . ',' . $paging['per_page'];
						$view = 'news';
						$this->_data['listNews'] = $this->mnews->getNews("n.id,n.news_category,n.news_secondary_category,n.news_picture,n.news_publicdate,n.news_view,nt.news_title,nt.news_alias,nt.news_summary",'n.news_status = 1 and n.news_state = 3 and n.news_publicdate <= "'.date('Y-m-d H:i:s').'" and (n.news_category = '.$this->_data['myCategory']['id'].' or n.news_secondary_category like ("%,'.$this->_data['myCategory']['id'].',%")) and nt.language_code = "'.$this->_data['language'].'"',"n.id desc, n.news_orderby desc",$limit);

						$this->_data['listNewsHot'] = $this->mnews->getNews("n.id,n.news_picture,n.news_publicdate,nt.news_title,nt.news_alias",'n.news_hot = 1 and n.news_status = 1 and n.news_state = 3 and n.news_publicdate <= "'.date('Y-m-d H:i:s').'" and nt.language_code = "'.$this->_data['language'].'"',"n.id desc, n.news_orderby desc",'0,6');

						$record = $this->mnews->countNews('n.news_status = 1 and n.news_state = 3 and n.news_publicdate <= "'.date('Y-m-d H:i:s').'" and n.news_category = '.$this->_data['myCategory']['id'].' and nt.language_code = "'.$this->_data['language'].'"');

						$this->_data["pagination"] = $this->my_paging->paging_donturl($record, $paging['page'], $paging['per_page'], $paging['num_links'], $paging['base_url']);
					} else {
							switch ($this->_data['myCategory']['id']) {
								case 3: case 15:
								$view = 'program';
								$this->_data['listProgram'] = $this->mnews->getNews("n.id,n.news_picture,n.news_tag,nt.news_title,nt.news_alias",'n.news_status = 1 and n.news_state = 3 and n.news_publicdate < "'.date('Y-m-d H:i:s').'" and n.news_category = '.$this->_data['myCategory']['id'].' and nt.language_code = "'.$this->_data['language'].'"',"n.news_orderby asc, n.id desc");
								$this->_data['linkCompare'] = 'so-sanh-cac-chuong-trinh-canada.html';
								break;
							case 4:
								$view = 'program';
								$this->_data['listProgram'] = $this->mnews->getNews("n.id,n.news_picture,n.news_tag,nt.news_title,nt.news_alias,nt.news_summary,nt.news_seo_title",'n.news_status = 1 and n.news_state = 3 and n.news_publicdate < "'.date('Y-m-d H:i:s').'" and n.news_category = '.$this->_data['myCategory']['id'].' and nt.language_code = "'.$this->_data['language'].'"',"n.news_orderby asc, n.id desc","0,8");
								$this->_data['linkCompare'] = 'so-sanh-cac-du-an-eb-5-my.html';
								break;
							case 12:
								$view = 'program';
								$this->_data['listProgram'] = $this->mnews->getNews("n.id,n.news_picture,n.news_tag,nt.news_title,nt.news_alias,nt.news_summary,nt.news_seo_title",'n.news_status = 1 and n.news_state = 3 and n.news_publicdate < "'.date('Y-m-d H:i:s').'" and n.news_category = '.$this->_data['myCategory']['id'].' and nt.language_code = "'.$this->_data['language'].'"',"n.news_orderby asc, n.id desc","0,8");
								$this->_data['linkCompare'] = 'so-sanh-cac-du-an-eu.html';
								break;
							default:
								break;
						}
					}
					$this->my_layout->view("front/category/".$view."_view", $this->_data);
					break;
			}
		} else {
				redirect('404-not-found.html','refresh');
		}
	}
}
