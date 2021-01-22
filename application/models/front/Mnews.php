<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class mnews extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    protected $table = "cms_news";
    protected $table_translation = "cms_news_translation";

    public function getNewsbyID($id,$obj='*',$lang='vietnamese')
    {
        $sql = 'select '.$obj.' from '.$this->table.' n inner join '.$this->table_translation.' nt on n.id = nt.news_id where n.id = '.$id.' and n.news_status = 1 and n.news_state = 3 and n.news_publicdate < "'.date("Y-m-d H:i:s").'" and nt.language_code = "'.$lang.'"';
        $query = $this->db->query($sql);
        return $query->row_array();
    }

    public function getNews($obj = "", $and = "", $orderby ="", $limit ="")
    {
        if ($obj) {
            $sql = 'select '.$obj.' ';
        } else {
            $sql = 'select * ';
        }
        $sql .= 'from '.$this->table.' n inner join '.$this->table_translation.' nt on n.id = nt.news_id';
        if ($and) {
            $sql .= ' where '.$and;
        }
        if ($orderby) {
            $sql .= ' order by '.$orderby;
        }
        if ($limit) {
            $sql .= ' limit '.$limit;
        }
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    
    public function countNews($and='')
    {
        $sql = 'select count(*) as total from '.$this->table.' n inner join '.$this->table_translation.' nt on n.id = nt.news_id where '.$and;
        $query = $this->db->query($sql);
        $total = $query->row_array();
        return $total['total'];
    }

    public function upview($id,$view)
    {
        $this->db->update($this->table,array('news_view' => $view + 1),"id = ".$id);
    }
}
