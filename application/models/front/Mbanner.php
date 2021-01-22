<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class mbanner extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    protected $table = "cms_banner";
    protected $table_translation = "cms_banner_translation";

    // public function getBanner($position,$qty=1,$obj='*',$lang='vietnamese')
    // {
    //     if ($position) {
    //         $sql = 'select '.$obj.' from '.$this->table.' where banner_position = '.$position.' and banner_status = 1 order by id desc';
    //         $query = $this->db->query($sql);
    //         if ($qty == 1) {
    //             $rs = $query->row_array();
    //             $sql_translation = 'select banner_title,banner_description from '.$this->table_translation.' where banner_id = '.$rs['id'].' and language_code = "'.$lang.'"';
    //             $rs_translation = $this->db->query($sql_translation)->row_array();
    //             $rs = array_merge($rs,$rs_translation);
    //         } else {
    //             $rs = $query->result_array();
    //         }
    //         return $rs;
    //     }
    // }

    public function getBanner($position,$qty='all',$obj='*',$lang='vietnamese')
    {
        if ($position) {
            $sql = 'select '.$obj.' from '.$this->table.' b inner join '.$this->table_translation.' bt on b.id = bt.banner_id where b.banner_position = '.$position.' and b.banner_status = 1 and bt.language_code = "'.$lang.'" order by b.banner_orderby';
            $query = $this->db->query($sql);
            if ($qty == 'all') {
                $rs = $query->result_array();
            } else {
                $rs = $query->row_array();
            }
            return $rs;
        }
    }
}
