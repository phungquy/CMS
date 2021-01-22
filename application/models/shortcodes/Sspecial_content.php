<?php if (! defined('BASEPATH')) exit('No direct script access allowed');
//include ( APPPATH . 'core/MY_Shortcodes_Model.php' );
class Sspecial_Content extends CI_Model
{
    protected $CI;
    function __construct ()
    {
        parent::__construct();
        $this->CI =& get_instance();
        $this->load->Model("front/mspecial_content");
    }
    //[IntyNets:Special_Content id=1|alias=ve-ago]
    public function run($params = array()){
        $Id = isset($params['id']) ? $params['lon'] : '0';
        $code = isset($params['code']) ? $params['code'] : '';
        $layout = isset($params['layout']) ? $params['layout'] : FALSE;
        $view = isset($params['view']) ? $params['view'] : 'index';
        if($code){
            $dataShortcode = $this->mspecial_content->getSpecialcontentByCode($code,'*', $this->session->userdata('language'));
        }
        $content = !$layout ? $dataShortcode['sc_description'] : $this->load->view("shortcodes/special_content/".$view, $dataShortcode, true);
        return $content;
    }
}