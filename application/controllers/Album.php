<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include ( APPPATH . 'core/MY_Controllerfront.php' );
class Album extends MY_Controllerfront {
	public function __construct()
    {
        parent::__construct();
        $this->load->Model("front/malbum");
        $this->lang->load('home',$this->_data['language'].'_front');
    }
	public function detail($id)
	{
		$this->_data['myAlbum'] = $this->malbum->getAlbumbyID($id,'*',$this->_data['language']);
		if ($this->_data['myAlbum'] == null) {
			redirect('404-not-found.html','refresh');
		} else {
			$this->_data['myAlbumDetail'] = $this->malbum->getAlbumDetail($id,'id,picture,description');
			$this->_data['id'] = $id;
			$this->_data['title'] = $this->_data['myAlbum']['album_name'];
			$this->_data['description_seo'] = strip_tags($this->_data['myAlbum']['album_description']);
			if ($this->_data['myAlbum']['album_picture']) {
				$this->_data['picture_seo'] = base_url().'media/album/'.$id.'/'.$this->_data['myAlbum']['album_picture'];
			}
			// $this->my_layout->view("front/album/detail_view", $this->_data);
			$this->load->view('front/album/detail_view', $this->_data);
		}
	}
}
