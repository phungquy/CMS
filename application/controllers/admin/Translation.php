<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Translation extends MY_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->lang->load('translation',$this->_data['language']);
        $this->mpermission->checkPermissionModule($this->uri->segment(2),$this->_data['user_active']['active_user_module']);
    }
    public function index()
    {
        $this->_data['info_language'] = $this->mlanguage->getLanguage($this->_data['language']);
        //CMS
        $dir = APPPATH . '/language/'.$this->_data['language'];
        $this->_data['files'] = scandir($dir);
        unset($this->_data['files'][0],$this->_data['files'][1]);
        $this->_data['filename'] = $this->input->get('file') ?? '';
        if ($this->_data['filename'] != null && $this->_data['filename'] != '') {
            $this->load->helper('file');
            $filePathLangDefault = APPPATH . '/language/english/'.$this->_data['filename'].'.php';
            $filePathLang = APPPATH . '/language/'.$this->_data['language'].'/'.$this->_data['filename'].'.php';
            $contenten = read_file($filePathLangDefault);
            $this->_data['arrDefault'] = explode(';', $contenten);
            array_shift($this->_data['arrDefault']);
            array_pop($this->_data['arrDefault']);
            //VN
            $contentvn = read_file($filePathLang);
            $this->_data['arrContent'] = explode(';', $contentvn);
            array_shift($this->_data['arrContent']);
            array_pop($this->_data['arrContent']);
        }
        //Front
        $dir_front = APPPATH . '/language/'.$this->_data['language'].'_front';
        $this->_data['files_front'] = scandir($dir_front);
        unset($this->_data['files_front'][0],$this->_data['files_front'][1]);
        $this->_data['filename_front'] = $this->input->get('file_front') ?? '';
        if ($this->_data['filename_front'] != null && $this->_data['filename_front'] != '') {
            $this->load->helper('file');
            $filePathLangDefault = APPPATH . '/language/english_front/'.$this->_data['filename_front'].'.php';
            $filePathLang = APPPATH . '/language/'.$this->_data['language'].'_front/'.$this->_data['filename_front'].'.php';
            $contenten = read_file($filePathLangDefault);
            $this->_data['arrDefault'] = explode(';', $contenten);
            array_shift($this->_data['arrDefault']);
            array_pop($this->_data['arrDefault']);
            //VN
            $contentvn = read_file($filePathLang);
            $this->_data['arrContent'] = explode(';', $contentvn);
            array_shift($this->_data['arrContent']);
            array_pop($this->_data['arrContent']);
        }
        $this->_data['title'] = lang('title');
        $this->_data['extraJs'] = ['module/translation.js'];
        $this->my_layout->view("admin/translation/index", $this->_data);
    }
    public function edit()
    {
        $rs = array("status" => 0,"title" => lang('unsuccessful'),"message" => lang('nonpermission'));
    	if ($this->mpermission->permission("translation_edit",$this->_data['user_active']['active_user_group']) == true) {
            $lang = $this->input->get('lang');
    		$folder = $this->input->get('folder');
            if ($folder == 'front') {
                $lang .= '_front';
            }
	    	$filename = $this->input->get('filename');
	    	$content = $this->input->get('content');
	    	$newcontent = $this->input->get('newcontent');
	    	if ($lang && $filename && $content) {
    	    	$filePath = APPPATH . '/language/'.$lang.'/'.$filename.'.php';
	    		$file_contents = file_get_contents($filePath);
	    		$file_contents = str_replace($content, $newcontent, $file_contents);
	    		if (file_put_contents($filePath, $file_contents)) {
    	    			$rs = array("status" => 1,"title" => lang('success'),"message" => lang('editsuccess'));
	    		} else {
    	    			$rs = array("status" => 0,"title" => lang('unsuccessful'),"message" => lang('editunsuccess'));
	    		}
	    	} else {
    	    		$rs = array("status" => 0,"title" => lang('unsuccessful'),"message" => lang('checkinfo'));
	    	}
    	}
    	echo json_encode($rs);
    }
}
