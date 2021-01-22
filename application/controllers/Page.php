<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include ( APPPATH . 'core/MY_Controllerfront.php' );
class Page extends MY_Controllerfront {
	public function __construct()
    {
	    parent::__construct();
        $this->load->Model("front/mpage");
        $this->load->Model("front/mspecial_content");
        $this->load->Model("front/mcategory");
        $this->load->Model("front/mnews");
        $this->load->Model("front/mbanner");
        $this->lang->load('page',$this->_data['language'].'_front');
    }
	public function index($alias)
	{
		$this->_data['myPage'] = $this->mpage->getPagebyAlias($alias,'p.id,p.page_template,p.page_status,p.page_picture,pt.page_title,pt.page_alias,pt.page_detail,pt.page_seo_title,pt.page_seo_description,pt.page_seo_keyword',$this->_data['language']);
		if ($this->_data['myPage'] != null && $this->_data['myPage']['page_status'] == 1) {
			switch ($this->_data['myPage']['id']) {
					case 3:
					$this->_data['listInfo'] = $this->mconfig->getConfig($this->_data['language'],1);
					break;
				case 1:
					$this->_data['about_us'] = $this->mspecial_content->getSpecialcontent(1,'st.sc_name,st.sc_description',$this->_data['language']);
					$this->_data['why_choose_us'] = $this->mspecial_content->getSpecialcontent(2,'st.sc_name,st.sc_description',$this->_data['language']);
					$this->_data['video_intro'] = $this->mspecial_content->getSpecialcontent(8,'st.sc_name,st.sc_description,s.code_position',$this->_data['language']);
					$this->_data['slogans'] = $this->mspecial_content->getListSpecialcontent('st.sc_name,st.sc_description,s.code_position','s.code_position in ("vision","mission") and s.sc_status = 1 and st.language_code = "'.$this->_data['language'].'"');
					$this->_data['team'] = $this->mspecial_content->getSpecialcontent(6,'st.sc_name,st.sc_description',$this->_data['language']);
					$this->_data['category_specialists'] = $this->mcategory->getCategorybyID(9,'ct.category_name',$this->_data['language']);
					$this->_data['listSpecialists'] = $this->mnews->getNews('n.id,n.news_picture,nt.news_title,nt.news_summary,nt.news_detail','n.news_category = 9 and n.news_status = 1 and n.news_state = 3 and n.news_publicdate < "'.date('Y-m-d H:i:s').'" and nt.language_code = "'.$this->_data['language'].'"','n.news_orderby asc,n.id asc','0,12');
					$this->_data['partner'] = $this->mbanner->getBanner(3,'all','b.id,b.banner_link,b.banner_picture,bt.banner_title,bt.banner_description',$this->_data['language']);
					break;

				default:
					break;
			}
			$this->_data['title'] = $this->_data['myPage']['page_title'];
			if ($this->_data['myPage']['page_seo_title'] != '') {
				$this->_data['title_seo'] = $this->_data['myPage']['page_seo_title'];
			}
			if ($this->_data['myPage']['page_seo_description']) {
				$this->_data['description_seo'] = $this->_data['myPage']['page_seo_description'];
			}
			if ($this->_data['myPage']['page_seo_keyword']) {
				$this->_data['keyword_seo'] = $this->_data['myPage']['page_seo_keyword'];
			}
			if ($this->_data['myPage']['page_picture']) {
				$this->_data['picture_seo'] = base_url().'media/page/'.$this->_data['myPage']['page_picture'];
			}
			$layout = $this->mpage->listTemplate($this->_data['myPage']['page_template']);
			$this->my_layout->view("front/page/".$layout['file'], $this->_data);
		} else {
				redirect('404-not-found.html','refresh');
		}
	}
	public function ajaxEvaluaterecords()
	{
		$this->load->Model("admin/mevaluate_records");
		$rs = array('status' => 0,'title' => lang('unsuccessful'),'message' => '');
		$er_fullname = $this->input->get('er_fullname');
		$er_phone = $this->input->get('er_phone');
		$er_email = $this->input->get('er_email');
		$er_age = $this->input->get('er_age');
		$er_english_level = $this->input->get('er_english_level');
		$er_managementexperience = $this->input->get('er_managementexperience');
		$er_experiencebusiness = $this->input->get('er_experiencebusiness');
		$er_networth = $this->input->get('er_networth');
		$er_program = $this->input->get('er_program');
		$er_appointment = $this->input->get('er_appointment');
		$er_note = $this->input->get('er_note');
		//XSS
		$er_fullname = $this->security->xss_clean($er_fullname);
		$er_phone = $this->security->xss_clean($er_phone);
		$er_email = $this->security->xss_clean($er_email);
		$er_age = $this->security->xss_clean($er_age);
		$er_english_level = $this->security->xss_clean($er_english_level);
		$er_managementexperience = $this->security->xss_clean($er_managementexperience);
		$er_experiencebusiness = $this->security->xss_clean($er_experiencebusiness);
		$er_networth = $this->security->xss_clean($er_networth);
		$er_program = $this->security->xss_clean($er_program);
		$er_appointment = $this->security->xss_clean($er_appointment);
		$er_note = $this->security->xss_clean($er_note);
		$error = false;
		do {
			if ($er_fullname == NULL || $er_fullname == '') {
				$error = true;$rs['message'] = lang('pleaseinput').lang('fullname').'!';break;
			}
			if ($er_email == NULL || $er_email == '') {
					$error = true;$rs['message'] = lang('pleaseinput').'Email!';break;
			}
			if (!filter_var($er_email, FILTER_VALIDATE_EMAIL)) {
					$error = true;$rs['message'] = lang('invalidemailformat');break;
			}
			if ($er_phone == NULL || $er_phone == '') {
					$error = true;$rs['message'] = lang('pleaseinput').lang('phone').'!';break;
			}
		} while (0);
		if ($error == false) {
			$dataAdd = array(
				'brief_fullname' => $er_fullname,
				'brief_email' => $er_email,
				'brief_phone' => $er_phone,
				'brief_age' => $er_age,
				'brief_english_level' => $er_english_level,
				'brief_management_exp' => $er_managementexperience,
				'brief_business_exp' => $er_experiencebusiness,
				'brief_asset' => $er_networth,
				'brief_program' => $er_program,
				'brief_note' => $er_note,
				'brief_appointment' => $er_appointment,
				'brief_status' => 2,
				'brief_date' => date("Y-m-d H:i:s")
			);
			$added = $this->mevaluate_records->add($dataAdd);
			if ($added > 0) {
				$rs['status'] = 1;
				$rs['title'] = lang('success');
				$rs['message'] = lang('messer');
				//Sendmail
				$content_mail = '<div style="background: #f8f8f8;padding: 30px"><div style="max-width: 500px;margin-left: auto;margin-right: auto;background: #fff;padding: 30px"><a href="http://mapleleafvn.com/" style="text-align: center;display: block;"><img src="http://mapleleafvn.com/media/logo/logo.png" alt="Maple Leaf Vietnam" width="75px" height="75px"></a><p>Xin chào <strong>'.$er_fullname.'</strong>,</p><p>Maple Leaf Vietnam đã nhận được yêu cầu đánh giá hồ sơ của '.$er_fullname.'. Chuyên viên chúng tôi sẽ đánh giá hồ sơ và liên hệ với anh chị qua số điện thoại '.$er_phone.' trong vòng 2 ngày làm việc để sắp xếp lịch tư vấn.</p><p>Mọi thắc mắc khác, anh chị vui lòng gọi đến <span style="color: #e67e22">HOTLINE: 0287 109 9559</span></p><p>Best regards,</p><i style="font-size: 80%">Đây là hôp thư tự động. Xin vui lòng không trả lời thư này | Please do not reply to this email.</i><hr><p style="color:#377a3c;font-weight: bold;font-size: 18px;">MAPLE LEAF VIETNAM</p><p style="font-size: 80%">HCMC: +84 286 286 3010</p><p style="font-size: 80%">Alpha Building, 4th Floor, </p><p style="font-size: 80%"><a target="_blank" href="https://www.google.com/maps/place/T%C3%B2a+nh%C3%A0+Alpha+Tower/@10.776043,106.6856869,17z/data=!3m1!4b1!4m5!3m4!1s0x31752f24d582525b:0x1e2a1dca66526665!8m2!3d10.7760377!4d106.6878756">151-153 Nguyen Dinh Chieu Street , Ward 6, District 3</a></p><p style="font-size: 80%">Hà Nội: +84 246 328 6584</p><p style="font-size: 80%">Hoa Binh Tower, 8th Floor, </p><p style="font-size: 80%"><a target="_blank" href="https://www.google.com/maps/place/106+Ho%C3%A0ng+Qu%E1%BB%91c+Vi%E1%BB%87t,+Ngh%C4%A9a+%C4%90%C3%B4,+C%E1%BA%A7u+Gi%E1%BA%A5y,+H%C3%A0+N%E1%BB%99i,+Vi%E1%BB%87t+Nam/@21.0465622,105.7929502,17z/data=!3m1!4b1!4m5!3m4!1s0x3135ab3ab8f75a7f:0x9140d41f31595d1e!8m2!3d21.0465572!4d105.7951389">106 Hoang Quoc Viet Street, Nghia Do, Cau Giay District</a></p></div></div>';
				$this->sendmail($er_email,'','Xác nhận đánh giá hồ sơ cá nhân với Maple Leaf Vietnam',$content_mail);
				//End
			} else {
				$rs['message'] = lang('messunsuccess');
			}
		}
		echo json_encode($rs);
	}
}
