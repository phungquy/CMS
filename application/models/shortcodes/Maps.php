<?php if (! defined('BASEPATH')) exit('No direct script access allowed');
//include ( APPPATH . 'core/MY_Shortcodes_Model.php' );
class Maps extends CI_Model
{
    protected $CI;
    function __construct ()
    {
        parent::__construct();
        $this->CI =& get_instance();
        $this->load->Model("front/mpage");
    }
    
    public function run($params = array()){
    
        $lat = isset($params['lat']) ? $params['lat'] : '0';
        $lon = isset($params['lon']) ? $params['lon'] : '0';
        $pageId = isset($params['id']) ? $params['lon'] : '0';
        $pageAlias = isset($params['alias']) ? $params['alias'] : '';
        if($pageAlias){
            $dataShortcode = $this->mpage->getPagebyAlias($pageAlias,'*', $this->session->userdata('language'));
        }
        return $this->load->view("shortcodes/page/index", $dataShortcode, true);
    }
}