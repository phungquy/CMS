<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class mevaluate_records extends MY_Model
{
        public function __construct()
    {
            parent::__construct();
    }
    protected $table = "cms_brief";

    public function listStatusName($item = "")
    {
            $arr = array(
                1 => array(
                    'name'  => lang('processed'),
                'color' => 'success'
            ),
            2 => array(
                    'name'  => lang('noprocess'),
                'color' => 'danger'
            )
        );
        if (is_numeric($item)) {
                return $arr[$item];
        } else {
                return $arr;
        }
    }
    public function dropdownlistStatus($active = '')
    {
            $html = '';
        $data = $this->listStatusName();
        if ($data) {
                $html .= '<option value="0">'.lang('choosestatus').'</option>';
            foreach ($data as $key => $value) {
                    $selected = $active == $key ? 'selected' : '';
                $html .= '<option ' . $selected . ' value="' . $key . '"> ' . $value["name"] . '</option>';
            }
        }
        return $html;
    }
    public function listEnglishlevel($item = "")
    {
            $arr = array(
                1 => lang('non'),
            2 => 'IELTS 4.0',
            3 => 'IELTS 5.0',
            4 => 'IELTS 5.5',
            5 => '>= IELTS 6.0'
        );
        if (is_numeric($item)) {
                return $arr[$item];
        } else {
                return $arr;
        }
    }
    public function dropdownlistEnglishlevel($active = '')
    {
            $html = '';
        $data = $this->listEnglishlevel();
        if ($data) {
                $html .= '<option value="0">'.lang('englishlevel').'</option>';
            foreach ($data as $key => $value) {
                    $selected = $active == $key ? 'selected' : '';
                $html .= '<option ' . $selected . ' value="' . $key . '"> ' . $value . '</option>';
            }
        }
        return $html;
    }
    public function listNetworth($item = "")
    {
        $arr = array(
            /* 1 => 'USD 600,000 - 800,000',
            2 => 'USD 800,000 - 1,000,000',
            3 => 'USD 1,000,000 - 2,000,000',
            4 => '> USD 2,000,000', */
            5 => 'USD 600,000 - 800,000',
            6 => 'USD 800,000 - 1,000,000',
            7 => 'USD 1,000,000 - 2,000,000',
            8 => '> USD 2,000,000'
        );
        if (is_numeric($item)) {
            return $arr[$item];
        } else {
            return $arr;
        }
    }
    public function dropdownlistNetworth($active = '')
    {
        $html = '';
        $data = $this->listNetworth();
        if ($data) {
                $html .= '<option value="0">'.lang('networth').'</option>';
            foreach ($data as $key => $value) {
                $selected = $active == $key ? 'selected' : '';
                $html .= '<option ' . $selected . ' value="' . $key . '"> ' . $value . '</option>';
            }
        }
        return $html;
    }
    public function listProgram($item = "")
    {
        $arr = array(
            /* 1 => 'New Brunswick',
            2 => 'Start-Up Visa',
            3 => 'PEI',
            4 => 'Québec',
            5 => 'Saskatchewan',
            6 => 'EB5', */
            7=>'Canada',
            8=>'USA',
            9=>'Australia',
            10=>'Malta',
            11=>'Portugal',
            12=>'Turkey'
        );
        if (is_numeric($item)) {
                return $arr[$item];
        } else {
                return $arr;
        }
    }
    public function dropdownlistProgram($active = '')
    {
        $html = '';
        $data = $this->listProgram();
        if ($data) {
            $html .= '<option value="0">'.lang('program').'</option>';
            foreach ($data as $key => $value) {
                $selected = $active == $key ? 'selected' : '';
                $html .= '<option ' . $selected . ' value="' . $key . '"> ' . $value . '</option>';
            }
        }
        return $html;
    }
    public function recordnotprocess()
    {
        $sql = 'select count(*) as total from '.$this->table.' where brief_status = 2';
        $query = $this->db->query($sql);
        $total = $query->row_array();
        return $total['total'];
    }
}
