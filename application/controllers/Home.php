<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include ( APPPATH . 'core/MY_Controllerfront.php' );
class Home extends MY_Controllerfront {
	public function __construct()
    {
        parent::__construct();
        $this->load->Model("front/mbanner");
        $this->load->Model("front/mspecial_content");
        $this->load->Model("front/malbum");
        $this->load->Model("front/mnews");
        $this->load->Model("front/mcategory");
        $this->lang->load('home',$this->_data['language'].'_front');
    }
	public function index()
	{
		$this->_data['title'] = lang('home');
		
		// Slide Home Banner
		$this->_data['slide_home'] = $this->mbanner->getBanner(1,'all','b.id,b.banner_link,b.banner_picture,bt.banner_title,bt.banner_description',$this->_data['language']);
		$this->_data['partner'] = $this->mbanner->getBanner(3,'all','b.id,b.banner_link,b.banner_picture,bt.banner_title,bt.banner_description',$this->_data['language']);

		// About Us
		$this->_data['about_us'] = $this->mspecial_content->getSpecialcontent(1,'st.sc_name,st.sc_description,s.code_position',$this->_data['language']);
		$this->_data['why_choose_us'] = $this->mspecial_content->getSpecialcontent(2,'st.sc_name,st.sc_description,s.code_position',$this->_data['language']);
		$this->_data['video_intro'] = $this->mspecial_content->getSpecialcontent(8,'st.sc_name,st.sc_description,s.code_position',$this->_data['language']);
		$this->_data['slogans'] = $this->mspecial_content->getListSpecialcontent('st.sc_name,st.sc_description,s.code_position','s.code_position in ("vision","mission") and s.sc_status = 1 and st.language_code = "'.$this->_data['language'].'"');

		// Canada
		$this->_data['canada_category'] = $this->mcategory->getCategorybyID(3,'c.category_picture,ct.category_name,ct.category_alias',$this->_data['language']);
		$this->_data['listProgramCanada'] = $this->mnews->getNews("n.id,n.news_picture,nt.news_title,nt.news_alias,nt.news_summary",'n.news_status = 1 and n.news_state = 3 and n.news_publicdate < "'.date('Y-m-d H:i:s').'" and n.news_category = 3 and nt.language_code = "'.$this->_data['language'].'"',"n.news_orderby asc, n.id desc","0,5");

		// EB-5
		$this->_data['eb5_category'] = $this->mcategory->getCategorybyID(4,'c.category_picture,ct.category_name,ct.category_alias',$this->_data['language']);
		$this->_data['listProjectEB5'] = $this->mnews->getNews("n.id,nt.news_title,nt.news_alias",'n.news_status = 1 and n.news_state = 3 and n.news_publicdate < "'.date('Y-m-d H:i:s').'" and n.news_category = 4 and nt.language_code = "'.$this->_data['language'].'"',"n.news_orderby asc, n.id desc","0,5");
		$this->_data['categoryNewsUS'] = $this->mcategory->getCategorybyIDTranslation(10,'category_name,category_alias',$this->_data['language']);

		// News - Workshop
		$this->_data['news_workshop'] = $this->mcategory->getCategorybyID(5,'ct.category_name,ct.category_alias',$this->_data['language']);
		$this->_data['list_news_workshop'] = $this->mnews->getNews('n.id,n.news_category,n.news_secondary_category,n.news_picture,n.news_publicdate,nt.news_title,nt.news_alias,nt.news_summary','(n.news_category in (5,6,7,10,11) or n.news_secondary_category like ("%,5,%")) and n.news_hot = 1 and n.news_status = 1 and n.news_state = 3 and n.news_publicdate < "'.date('Y-m-d H:i:s').'" and nt.language_code = "'.$this->_data['language'].'"','n.news_orderby desc, n.id desc','0,6');

		// Life in Canada
		$this->_data['life_in_canada'] = $this->mcategory->getCategorybyID(8,'ct.category_name,ct.category_alias',$this->_data['language']);
		$list_album_life_in_canada = $this->malbum->getListAlbumbyCategoryID(8,'a.id,a.album_picture,at.album_name,at.album_alias,at.album_description','0,6',$this->_data['language']);
		$this->_data['album_all'] = $list_album_life_in_canada;
		$this->_data['album_col_1'] = array_slice($list_album_life_in_canada,0,2);
		$this->_data['album_col_2'] = array_slice($list_album_life_in_canada,2,2);
		$this->_data['album_col_3'] = array_slice($list_album_life_in_canada,4,2);

		// Specialists
		$this->_data['listSpecialists'] = $this->mnews->getNews('n.id,n.news_picture,nt.news_title,nt.news_summary,nt.news_detail','n.news_category = 9 and n.news_status = 1 and n.news_state = 3 and n.news_publicdate < "'.date('Y-m-d H:i:s').'" and nt.language_code = "'.$this->_data['language'].'"','n.news_orderby asc,n.id asc','0,12');
		$this->my_layout->view("front/home/home_view", $this->_data);
	}
}
