<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Evaluate_records extends MY_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->mpermission->checkPermissionModule($this->uri->segment(2),$this->_data['user_active']['active_user_module']);
        $this->lang->load('er',$this->_data['language']);
        // $this->load->Model("admin/mevaluate_records");
    }
	public function index()
	{
		$this->mpermission->checkPermission("evaluate_records","index",$this->_data['user_active']['active_user_group']);
		$this->load->library("My_paging");
        $this->_data['title'] = lang('list');
        $obj = 'id,brief_fullname,brief_phone,brief_age,brief_asset,brief_program,brief_appointment,brief_status,brief_date';
        $this->_data['formData'] = array(
        	'fkeyword' => $_GET['fkeyword'] ?? '',
            'fnetworth' => $_GET['fnetworth'] ?? 0,
            'fprogram' => $_GET['fprogram'] ?? 0,
            'fstatus' => $_GET['fstatus'] ?? 0
        );
        $and = '1';
        if ($this->_data['formData']['fkeyword'] != '') {
            $and .= ' and (brief_fullname like "%' . $this->_data['formData']['fkeyword'] . '%"';
            $and .= ' or brief_phone like "%' . $this->_data['formData']['fkeyword'] . '%"';
            $and .= ' or brief_email like "%' . $this->_data['formData']['fkeyword'] . '%")';
        }
        if ($this->_data['formData']['fnetworth'] > 0) {
            $and .= ' and brief_asset = '. $this->_data['formData']['fnetworth'];
        }
        if ($this->_data['formData']['fprogram'] > 0) {
            $and .= ' and brief_program = '. $this->_data['formData']['fprogram'];
        }
        if ($this->_data['formData']['fstatus'] > 0) {
            $and .= ' and brief_status = '. $this->_data['formData']['fstatus'];
        }
        $orderby = 'brief_status desc, id desc';
        $paging['per_page'] = 20;
        $paging['num_links'] = 5;
        $paging['page'] = $this->_data['page'] = $_GET['page'] ?? 1;
        $paging['start'] = (($paging['page'] - 1) * $paging['per_page']);
        $query_string = isset($_SERVER['QUERY_STRING']) && $_SERVER['QUERY_STRING'] ? str_replace("&page=" . $this->_data['page'], "", $_SERVER['QUERY_STRING']) : '';
        $paging['base_url'] = my_library::admin_site() . 'evaluate_records/?' . $query_string . '&page=';
        $limit = $paging['start'] . ',' . $paging['per_page'];
        $this->_data['list'] = $this->mevaluate_records->getQuery($obj, $and, $orderby, $limit);
        $this->_data['record'] = $this->mevaluate_records->countQuery($and);
        $this->_data["pagination"] = $this->my_paging->paging_donturl($this->_data["record"], $paging['page'], $paging['per_page'], $paging['num_links'], $paging['base_url']);
        $this->_data['fnetworth'] = $this->mevaluate_records->dropdownlistNetworth($this->_data['formData']['fnetworth']);
        $this->_data['fprogram'] = $this->mevaluate_records->dropdownlistProgram($this->_data['formData']['fprogram']);
        $this->_data['fstatus'] = $this->mevaluate_records->dropdownlistStatus($this->_data['formData']['fstatus']);
        $this->my_layout->view("admin/evaluate_records/index", $this->_data);
	}

	public function process($id)
	{
		if (isset($_POST['to'])) {
            $to = $this->input->post('to');
            $cc = $this->input->post('cc') ?? '';
            $subject = $this->input->post('subject');
            $content = $this->input->post('content');
            $error = false;
            do {
                if ($to == null || $to == '') {
                    $text = lang('pleaseinput').lang('receiver');$error = true;break;
                }
                if ($subject == null || $subject == '') {
                    $text = lang('pleaseinput').lang('subject');$error = true;break;
                }
                if ($content == null || $content == '') {
                    $text = lang('pleaseinput').lang('content');$error = true;break;
                }
            } while (0);
            if ($error == true) {
                $notify = array(
                    'title' => lang('unsuccessful'), 
                    'text' => $text,
                    'type' => 'error'
                );
                $this->session->set_userdata('notify', $notify);
            } else {
                $rs = $this->sendmail($to,$cc,$subject,$content);
                if ($rs == true) {
                    $notify = array(
                        'title' => lang('success'), 
                        'text' => lang('sendmail').' '.$to.' '.lang('success'),
                        'type' => 'success'
                    );
                } else {
                    $notify = array(
                        'title' => lang('unsuccessful'), 
                        'text' => lang('sendmail').' '.lang('unsuccessful'),
                        'type' => 'error'
                    );
                }
                $this->session->set_userdata('notify', $notify);
                redirect(my_library::admin_site()."evaluate_records/process/".$id);
            }
        }
		$this->mpermission->checkPermission("evaluate_records","process",$this->_data['user_active']['active_user_group']);
		if (is_numeric($id) && $id > 0) {
			$this->_data['myEr'] = $this->mevaluate_records->getData("",array('id' => $id));
			if ($this->_data['myEr']) {
				$this->_data['title'] = lang('viewprofile').' #'.$id;
                $this->_data['extraJs'] = ['tinymce/jquery.tinymce.min.js','tinymce/tinymce.min.js','module/er.js'];
				$this->_data['token_name'] = $this->security->get_csrf_token_name();
        		$this->_data['token_value'] = $this->security->get_csrf_hash();
				$this->my_layout->view("admin/evaluate_records/process", $this->_data);
			} else {
                $notify = array(
	                'title' => lang('unsuccessful'), 
	                'text' => lang('notfound').' '.lang('brief'),
	                'type' => 'error'
	            );
	            $this->session->set_userdata('notify', $notify);
	            redirect(my_library::admin_site()."evaluate_records");
			}
		} else {
			$notify = array(
                'title' => lang('notfound'), 
                'text' => lang('wrongid'),
                'type' => 'error'
            );
            $this->session->set_userdata('notify', $notify);
            redirect(my_library::admin_site()."evaluate_records");
		}
	}

	public function delete($id)
	{
		$this->mpermission->checkPermission("evaluate_records","delete",$this->_data['user_active']['active_user_group']);
		if (is_numeric($id) && $id > 0) {
			$myEr = $this->mevaluate_records->getData("",array('id' => $id));
			if ($myEr) {
				$this->mevaluate_records->delete($id);
				$title = lang('success');
                $text = lang('brief').lang('deleted');
                $type = 'success';
			} else {
				$title = lang('unsuccessful');
                $text = lang('notfound').' '.lang('brief');
                $type = 'error';
			}
		} else {
			$title = lang('unsuccessful');
            $text = lang('wrongid');
            $type = 'error';
		}
		$notify = array(
            'title' => $title, 
            'text' => $text,
            'type' => $type
        );
		$this->session->set_userdata('notify', $notify);
        redirect(my_library::admin_site()."evaluate_records");
	}

	public function changestatus($id)
	{
		$this->mpermission->checkPermission("evaluate_records","changestatus",$this->_data['user_active']['active_user_group']);
		if (is_numeric($id) && $id > 0) {
			$myEr = $this->mevaluate_records->getData("",array('id' => $id));
			if ($myEr) {
				if ($myEr['brief_status'] == 2) {
					if ($this->mevaluate_records->edit($id,array('brief_status' => 1))) {
						$title = lang('success');
                		$text = lang('brief').lang('edited');
                		$type = 'success';
					} else {
						$title = lang('unsuccessful');
                		$text = lang('checkinfo');
                		$type = 'error';
					}
				} else {
					if ($this->mevaluate_records->edit($id,array('brief_status' => 2))) {
						$title = lang('success');
                		$text = lang('brief').lang('edited');
                		$type = 'success';
					} else {
						$title = lang('unsuccessful');
                		$text = lang('checkinfo');
                		$type = 'error';
					}
				}
			} else {
				$title = lang('unsuccessful');
                $text = lang('notfound').' '.lang('brief');
                $type = 'error';
			}
		} else {
			$title = lang('unsuccessful');
            $text = lang('wrongid');
            $type = 'error';
		}
		$notify = array(
            'title' => $title, 
            'text' => $text,
            'type' => $type
        );
		$this->session->set_userdata('notify', $notify);
		if ($type == 'success') {
			redirect(my_library::admin_site()."evaluate_records/process/".$id);
		} else {
			redirect(my_library::admin_site()."evaluate_records");
		}
	}

	public function sendmail($to,$cc,$subject,$content)
    {
        $mySetting = $this->msetting->getSetting("email,alias,smtp_user,smtp_server,smtp_password,smtp_port,smtp_use_ssl");
        $configMail = Array(
            'protocol' => 'smtp',
            'smtp_host' => $mySetting['smtp_server'],
            'smtp_port' => $mySetting['smtp_port'],
            'smtp_user' => $mySetting['smtp_user'],
            'smtp_pass' => $mySetting['smtp_password'],
            'mailtype'  => 'html', 
            'charset'   => 'utf-8'
        );
        $this->load->library('email', $configMail);
        $this->email->set_newline("\r\n");

        $this->email->from($mySetting['email'], $mySetting['alias']);
        $this->email->to($to);
        if ($cc != '') {
            $this->email->cc($cc);
        }
        $this->email->subject($subject);
        $this->email->message($content);

        $result = $this->email->send();
        return $result;
    }
}
