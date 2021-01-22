<?php if (! defined('BASEPATH')) exit('No direct script access allowed');
//include ( APPPATH . 'core/MY_Shortcodes_Model.php' );
class Scategory extends CI_Model
{
    protected $CI;
    function __construct ()
    {
        parent::__construct();
        $this->CI =& get_instance();
        $this->load->Model("front/mcategory");
        $this->load->Model("front/mnews");
    }
    
    //[IntyNets:Special_Content id=1|alias=ve-ago]
    public function run($params = array()){
        $Id = isset($params['id']) ? $params['id'] : '0';
        $Type = isset($params['type']) ? $params['type'] : '';
        $Limit = isset($params['limit']) ? $params['limit'] : '-1';        
        $layout = isset($params['layout']) ? $params['layout'] : FALSE;
        $view = isset($params['view']) ? $params['view'] : 'index';
        $view = $Type.'_'.$view;
        switch ($Type) {
            case 'subcat':
                $dataShortcode['list_cate'] = $this->mcategory->getSubCategorybyID($Id,'*', $this->session->userdata('language'), $Limit);                
                break;   
            case 'post':
                $dataShortcode['cat'] = $this->mcategory->getCategorybyID($Id,'ct.category_name,ct.category_alias', $this->session->userdata('language'));     
                $dataShortcode['list_post'] = $this->mnews->getNews("n.id,n.news_category,n.news_secondary_category,n.news_picture,n.news_publicdate,n.news_view,nt.news_title,nt.news_alias,nt.news_summary",'n.news_status = 1 and n.news_state = 3 and n.news_publicdate <= "'.date('Y-m-d H:i:s').'" and (n.news_category = '.$Id.' or n.news_secondary_category like ("%,'.$Id.',%")) and nt.language_code = "'.$this->session->userdata('language').'"',"n.id desc, n.news_orderby desc",$Limit);
                break;            
            default:
                # code...
                break;
        }
        $content = !$layout ? $dataShortcode['sc_description'] : $this->load->view("shortcodes/category/".$view, $dataShortcode, true);
        return $content;
    }
}
    