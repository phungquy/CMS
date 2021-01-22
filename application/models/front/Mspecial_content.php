<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class mspecial_content extends CI_Model

{

    public function __construct()

    {

        parent::__construct();

    }

    protected $table = "cms_special_content";

    protected $table_translation = "cms_special_content_translation";



    public function getSpecialcontent($id,$obj='*',$lang='vietnamese')

    {

        $sql = 'select '.$obj.' from '.$this->table.' s inner join '.$this->table_translation.' st on s.id = st.sc_id where s.id = '.$id.' and s.sc_status = 1 and st.language_code = "'.$lang.'"';

        $query = $this->db->query($sql);

        return $query->row_array();

    }
    public function getSpecialcontentByCode($code,$obj='*',$lang='vietnamese')

    {

        $sql = 'select '.$obj.' from '.$this->table.' s inner join '.$this->table_translation.' st on s.id = st.sc_id where s.code_position = "'.$code.'" and s.sc_status = 1 and st.language_code = "'.$lang.'"';

        $query = $this->db->query($sql);

        return $query->row_array();

    }



    public function getListSpecialcontent($obj = "", $and = "", $orderby ="", $limit ="")

    {

        if ($obj) {

            $sql = 'select '.$obj.' ';

        } else {

            $sql = 'select * ';

        }

        $sql .= 'from '.$this->table.' s inner join '.$this->table_translation.' st on s.id = st.sc_id';

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

}

