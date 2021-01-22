<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class mmail extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    protected $table = "cms_mail";

    public function addMail($data)
    {
        if ($this->db->insert($this->table, $data)) {
            return true;
        } else {
            return false;
        }
    }
}
