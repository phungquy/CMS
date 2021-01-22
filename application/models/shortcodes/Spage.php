<?php if (! defined('BASEPATH')) exit('No direct script access allowed');
//include ( APPPATH . 'core/MY_Shortcodes_Model.php' );
class Spage extends CI_Model
{
    protected $CI;
    function __construct ()
    {
        parent::__construct();
        $this->CI =& get_instance();
        $this->load->Model("front/mpage");
    }
    //[IntyNets:Page id=1|alias=ve-ago]
    public function run($params = array()){
        $pageId = isset($params['id']) ? $params['id'] : '0';
        $pageAlias = isset($params['alias']) ? $params['alias'] : '';
        $layout = isset($params['layout']) ? $params['layout'] : FALSE;
        $view = isset($params['view']) ? $params['view'] : 'index';
        if($pageAlias){
            $dataShortcode = $this->mpage->getPagebyAlias($pageAlias,'*', $this->session->userdata('language'));
        }
        $content = !$layout ? $dataShortcode['page_detail'] : $this->load->view("shortcodes/page/index", $dataShortcode, true);
        return $content;
    }
}