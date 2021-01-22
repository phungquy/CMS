<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class MY_Controllerfront extends CI_Controller {
		protected $_data;
	public function __construct()
	{
		parent::__construct();
		$this->load->library("My_layout");
		$this->load->library('shortcodes');
		$this->load->helper("language");
		$this->load->Model("front/mmenu");
		$this->load->Model("front/mnews");
		$this->load->Model("front/mlanguage");
		$this->load->Model("front/mconfig");
		$this->load->Model("front/msetting");
		$this->load->Model("front/mspecial_content");
		$this->load->Model("front/mbanner");
		$this->load->helper('text');
		$setting = $this->msetting->getSetting('use_cache,time_cache');
		$this->_data['submenu'] = true;
		if (!$this->_data['language'] = $this->session->userdata('language')) {
			$this->_data['language'] = $this->config->item('language');
			$this->session->set_userdata('language', $this->_data['language']);
		}
		if ($setting->use_cache == 1) {
			$this->load->driver('cache', array('adapter' => 'apc', 'backup' => 'file'));
			if (!$this->_data['menuMain'] = $this->cache->get('menu1_'.$this->_data['language'])) {
				$this->_data['menuMain'] = $this->mmenu->getMenubyId(1,$this->_data['submenu'],$this->_data['language']);
				$this->cache->save('menu1_'.$this->_data['language'],$this->_data['menuMain'], $setting->time_cache);
			}
			if (!$this->_data['listStudyAbroad'] = $this->cache->get('StudyAbroad_'.$this->_data['language'])) {
				$this->_data['listStudyAbroad'] = $this->mmenu->getMenubyId(3,$this->_data['submenu'],$this->_data['language']);
				$this->cache->save('StudyAbroad_'.$this->_data['language'],$this->_data['listStudyAbroad'], $setting->time_cache);
			}
			if (!$this->_data['listSettlement'] = $this->cache->get('Settlement_'.$this->_data['language'])) {
				$this->_data['listSettlement'] = $this->mmenu->getMenubyId(4,$this->_data['submenu'],$this->_data['language']);
				$this->cache->save('Settlement_'.$this->_data['language'],$this->_data['listSettlement'], $setting->time_cache);
			}
			if (!$this->_data['listProgram'] = $this->cache->get('Program_'.$this->_data['language'])) {
				$this->_data['listProgram'] = $this->mmenu->getMenubyId(2,$this->_data['submenu'],$this->_data['language']);
				$this->cache->save('Program_'.$this->_data['language'],$this->_data['listProgram'], $setting->time_cache);
			}
			if (!$this->_data['config'] = $this->cache->get('config_'.$this->_data['language'])) {
				$this->_data['config'] = $this->mconfig->getConfig($this->_data['language']);
				$this->cache->save('config_'.$this->_data['language'],$this->_data['config'], $setting->time_cache);
			}
			if (!$this->_data['listLanguage'] = $this->cache->get('listlang')) {
				$this->_data['listLanguage'] = $this->mlanguage->getLanguage();
				$this->cache->save('listlang', $this->_data['listLanguage'], $setting->time_cache);
			}
		} else {
			$this->_data['menuMain'] = $this->mmenu->getMenubyId(1,$this->_data['submenu'],$this->_data['language']);
			$this->_data['listStudyAbroad'] = $this->mmenu->getMenubyId(3,$this->_data['submenu'],$this->_data['language']);
			$this->_data['listSettlement'] = $this->mmenu->getMenubyId(4,$this->_data['submenu'],$this->_data['language']);
			$this->_data['listProgram'] = $this->mmenu->getMenubyId(2,$this->_data['submenu'],$this->_data['language']);
			$this->_data['config'] = $this->mconfig->getConfig($this->_data['language']);
			$this->_data['listLanguage'] = $this->mlanguage->getLanguage();
		}
		$this->_data['accreditation'] = $this->mbanner->getBanner(4,'all','b.id,b.banner_link,b.banner_picture,bt.banner_title,bt.banner_description',$this->_data['language']);
		$this->_data['about_footer'] = $this->mspecial_content->getSpecialcontentByCode("about_footer",'st.sc_name,st.sc_description,s.code_position',$this->_data['language']);
		$this->_data['listLatestnews'] = $this->mnews->getNews('n.id,n.news_picture,nt.news_title,nt.news_alias','n.news_status = 1 and n.news_state = 3 and n.news_publicdate < "'.date('Y-m-d H:i:s').'" and nt.language_code = "'.$this->_data['language'].'"','n.news_publicdate desc','0,6');
		$this->my_layout->setLayout("front/template/index");
		$this->_data['title'] = $this->_data['config']['title'];
		$this->_data['picture_seo'] = base_url('media/logo/logo.png');
		$this->_data['title_seo'] = $this->_data['config']['title'];
		$this->_data['description_seo'] = $this->_data['config']['description'];
		$this->_data['keyword_seo'] = $this->_data['config']['keywords'];
	}
	public function sendmail($to,$cc,$subject,$content)
	{
		$mySetting = $this->msetting->getSetting("email,alias,smtp_user,smtp_server,smtp_password,smtp_port");
        $configMail = Array(
	        'protocol' => 'smtp',
            'smtp_host' => $mySetting->smtp_server,
            'smtp_port' => $mySetting->smtp_port,
            'smtp_user' => $mySetting->smtp_user,
            'smtp_pass' => $mySetting->smtp_password,
            'mailtype'  => 'html', 
            'charset'   => 'utf-8'
        );
        $this->load->library('email', $configMail);
        $this->email->set_newline("\r\n");
        $this->email->from($mySetting->email, $mySetting->alias);
        $this->email->to($to);
        if ($cc != '') {
	        $this->email->cc($cc);
        }
        $this->email->subject($subject);
        $this->email->message($content);
        $result = $this->email->send();
        return $result;
	}
	public function ajaxAppointment()
	{
		$this->load->Model("front/mmail");
		$rs = array('status' => 0,'title' => lang('unsuccessful'),'message' => '');
		$fullname = $this->input->get('fullname');
		$email = $this->input->get('email');
		$phone = $this->input->get('phone');
		$time = $this->input->get('time') ?? 0;
		$place = $this->input->get('place') ?? 0;
		$total_assets = $this->input->get('total_assets') ?? '';
		$content = $this->input->get('content') ?? '';
		//XSS
		$fullname = $this->security->xss_clean($fullname);
		$email = $this->security->xss_clean($email);
		$phone = $this->security->xss_clean($phone);
		$time = $this->security->xss_clean($time);
		$place = $this->security->xss_clean($place);
		$total_assets = $this->security->xss_clean($total_assets);
		$content = $this->security->xss_clean($content);
		if ($time > 0) {
			if ($time == 1) {
				$time = 'Vào buổi sáng ';
			} else {
				$time = 'Vào buổi chiều ';
			}
		} else {
			$time = ' ';
		}
		if ($place > 0) {
			if ($place == 1) {
				$place = 'tại TP. Hồ Chí Minh ';
			} else {
				$place = 'tại Hà Nội ';
			}
		} else {
			$place = ' ';
		}
		$error = false;
		do {
			if ($fullname == NULL || $fullname == '') {
				$error = true;$rs['message'] = lang('pleaseinput').lang('fullname').'!';break;
			}
			if ($email == NULL || $email == '') {
					$error = true;$rs['message'] = lang('pleaseinput').'Email!';break;
			}
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
					$error = true;$rs['message'] = lang('invalidemailformat');break;
			}
			if ($phone == NULL || $phone == '') {
					$error = true;$rs['message'] = lang('pleaseinput').lang('phone').'!';break;
			}
		} while (0);
		if ($error == false) {
			$contentMail = 'KHÁCH HÀNG LÊN LỊCH HẸN<br>Tên khách hàng: '.$fullname.'<br>'.$time.$place.'<br>Tổng tài sản: '.$total_assets.'<br>Ghi chú: '.$content;
			$dataAdd = array(
				'mail_fullname' => $fullname,
				'mail_email' => $email,
				'mail_address' => $place,
				'mail_phone' => $phone,
				'mail_title' => 'Đặt lịch hẹn',
				'mail_content' => $contentMail,
				'mail_status' => 1,
				'mail_type' => 1,
				'mail_important' => 0,
				'mail_senddate' => date("Y-m-d H:i:s"),
				'user_read' => 0,
				'readdate' => ''
			);
			if ($this->mmail->addMail($dataAdd) == true) {
				$rs['status'] = 1;
				$rs['title'] = lang('success');
				$rs['message'] = lang('messsuccess');
				//Sendmail
				$content_mail = '<div style="background: #f8f8f8;padding: 30px"><div style="max-width: 500px;margin-left: auto;margin-right: auto;background: #fff;padding: 30px"><a href="http://mapleleafvn.com/" style="text-align: center;display: block;"><img src="http://mapleleafvn.com/media/logo/logo.png" alt="Maple Leaf Vietnam" width="75px" height="75px"></a><p>Xin chào <strong>'.$fullname.'</strong>,</p><p>Cám ơn '.$fullname.' đã quan tâm đến chương trình định cư di trú của Maple Leaf Vietnam. Chuyên viên tư vấn sẽ liên hệ với anh chị qua số điện thoại <span style="color: #e67e22">'.$phone.'</span> trong vòng 2 ngày làm việc để sắp xếp lịch tư vấn.</p><p>Mọi thắc mắc khác, anh chị vui lòng gọi đến <span style="color: #e67e22">HOTLINE: 0287 109 9559</span></p><p>Best regards,</p><i style="font-size: 80%">Đây là hôp thư tự động. Xin vui lòng không trả lời thư này | Please do not reply to this email.</i><hr><p style="color:#377a3c;font-weight: bold;font-size: 18px;">MAPLE LEAF VIETNAM</p><p style="font-size: 80%">HCMC: +84 286 286 3010</p><p style="font-size: 80%">Alpha Building, 4th Floor, </p><p style="font-size: 80%"><a target="_blank" href="https://www.google.com/maps/place/T%C3%B2a+nh%C3%A0+Alpha+Tower/@10.776043,106.6856869,17z/data=!3m1!4b1!4m5!3m4!1s0x31752f24d582525b:0x1e2a1dca66526665!8m2!3d10.7760377!4d106.6878756">151-153 Nguyen Dinh Chieu Street , Ward 6, District 3</a></p><p style="font-size: 80%">Hà Nội: +84 246 328 6584</p><p style="font-size: 80%">Hoa Binh Tower, 8th Floor, </p><p style="font-size: 80%"><a target="_blank" href="https://www.google.com/maps/place/106+Ho%C3%A0ng+Qu%E1%BB%91c+Vi%E1%BB%87t,+Ngh%C4%A9a+%C4%90%C3%B4,+C%E1%BA%A7u+Gi%E1%BA%A5y,+H%C3%A0+N%E1%BB%99i,+Vi%E1%BB%87t+Nam/@21.0465622,105.7929502,17z/data=!3m1!4b1!4m5!3m4!1s0x3135ab3ab8f75a7f:0x9140d41f31595d1e!8m2!3d21.0465572!4d105.7951389">106 Hoang Quoc Viet Street, Nghia Do, Cau Giay District</a></p></div></div>';
				$this->sendmail($email,'','Xác nhận đặt lịch hẹn tư vấn với Maple Leaf Vietnam',$content_mail);
				//End
			} else {
					$rs['message'] = lang('messunsuccess');
			}
		}
		echo json_encode($rs);
	}
}
