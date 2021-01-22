<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class mmenu extends CI_Model

{

    public function __construct()

    {

        parent::__construct();

    }

    protected $table = "cms_menu_detail";





    public function getMenubyId($id,$submenu=true,$language='vietnamese')

    {

        $this->load->Model("front/mcategory");
        $this->load->Model("admin/mcategory_translation");

        $this->load->Model("front/mpage");
        $this->load->Model("admin/mpage_translation");

        $this->load->Model("admin/mlink");

        $this->load->Model("admin/mlink_translation");
        $url_file = new my_library();
        $sql = 'select id,ingredient,ingredient_id,click_allow,target from '.$this->table.' where parent = 0 and menu_id = '.$id.' order by order_by asc';

        $query = $this->db->query($sql);

        $rs = $query->result_array();

        if ($rs) {

            foreach ($rs as $key => $value) {

                $name = '';$alias = '';$thumb = '';$detail = '';

                switch ($value['ingredient']) {

                    case 1:
                        $ingredient = $this->mcategory->getCategorybyID($value['ingredient_id'],"c.category_picture,ct.category_name,ct.category_alias,ct.category_seo_description",$language);

                        if (!empty($ingredient)) {
                            $name = $ingredient['category_name'];
                            $alias = $ingredient['category_alias'];
                            $thumb = 'media/category/'.$ingredient['category_picture'];
                            $detail = $ingredient['category_seo_description'];
                        }
                        break;
                    case 2:
                        $ingredient = $this->mpage->getPagebyID($value['ingredient_id'],"p.page_picture,pt.page_title,pt.page_alias,pt.page_seo_description",$language);
                        if (!empty($ingredient)) {
                            $name = $ingredient['page_title'];
                            $alias = $ingredient['page_alias'].'.html';
                            $thumb = 'media/page/'.$ingredient['page_picture'];
                            $detail = $ingredient['page_seo_description'];
                        }
                        break;
                    case 3:
                        $ingredient_link = $this->mlink->getData("link",array('id' => $value['ingredient_id']));
                        $ingredient_link_name = $this->mlink_translation->getData("link_name",array('link_id' => $value['ingredient_id'],'language_code' => $language));
                        if (!empty($ingredient_link)) {
                            $alias = $ingredient_link['link'];
                        }
                        if (!empty($ingredient_link_name)) {
                            $name = $ingredient_link_name['link_name'];
                        }
                        break;
                }

                $rs[$key]['name'] = $name;
                $rs[$key]['alias'] = $alias;
                $rs[$key]['thumb'] = $thumb;
                $rs[$key]['detail'] = $detail;
                // unset($rs[$key]['ingredient']);

                unset($rs[$key]['ingredient_id']);

                if ($submenu==true) {

                    $sqlsub = 'select id,ingredient,ingredient_id,click_allow,target from '.$this->table.' where parent = '.$value['id'].' and menu_id = '.$id.' order by order_by asc';

                    $querysub = $this->db->query($sqlsub);

                    $rssub = $querysub->result_array();

                    if ($rssub) {

                        foreach ($rssub as $k => $val) {

                            $name = '';

                            $alias = '';

                            switch ($val['ingredient']) {

                                case 1:

                                    $ingredient = $this->mcategory_translation->getData("category_name,category_alias",array('category_id' => $val['ingredient_id'],'language_code' => $language));

                                    if (!empty($ingredient)) {

                                        $name = $ingredient['category_name'];

                                        $alias = $ingredient['category_alias'];

                                    }

                                    break;

                                case 2:

                                    $ingredient = $this->mpage_translation->getData("page_title,page_alias",array('page_id' => $val['ingredient_id'],'language_code' => $language));

                                    if (!empty($ingredient)) {

                                        $name = $ingredient['page_title'];

                                        $alias = $ingredient['page_alias'].'.html';

                                    }

                                    break;

                                case 3:

                                    $ingredient_link = $this->mlink->getData("link",array('id' => $val['ingredient_id']));

                                    $ingredient_link_name = $this->mlink_translation->getData("link_name",array('link_id' => $val['ingredient_id'],'language_code' => $language));

                                    if (!empty($ingredient_link)) {

                                        $alias = $ingredient_link['link'];

                                    }

                                    if (!empty($ingredient_link_name)) {

                                        $name = $ingredient_link_name['link_name'];

                                    }

                                    break;

                            }

                            $rssub[$k]['name'] = $name;

                            $rssub[$k]['alias'] = $alias;

                            // unset($rssub[$k]['ingredient']);

                            unset($rssub[$k]['ingredient_id']);

                            //Sub of sub

                            $sqlsub_sub = 'select ingredient,ingredient_id,click_allow,target from '.$this->table.' where parent = '.$val['id'].' and menu_id = '.$id.' order by order_by asc';

                            $querysub_sub = $this->db->query($sqlsub_sub);

                            $rssub_sub = $querysub_sub->result_array();

                            if ($rssub_sub) {

                                foreach ($rssub_sub as $e => $v) {

                                    $name = '';

                                    $alias = '';

                                    switch ($v['ingredient']) {

                                        case 1:

                                            $ingredient = $this->mcategory_translation->getData("category_name,category_alias",array('category_id' => $v['ingredient_id'],'language_code' => $language));

                                            if (!empty($ingredient)) {

                                                $name = $ingredient['category_name'];

                                                $alias = $ingredient['category_alias'];

                                            }

                                            break;

                                        case 2:

                                            $ingredient = $this->mpage_translation->getData("page_title,page_alias",array('page_id' => $v['ingredient_id'],'language_code' => $language));

                                            if (!empty($ingredient)) {

                                                $name = $ingredient['page_title'];

                                                $alias = $ingredient['page_alias'].'.html';

                                            }

                                            break;

                                        case 3:

                                            $ingredient_link = $this->mlink->getData("link",array('id' => $v['ingredient_id']));

                                            $ingredient_link_name = $this->mlink_translation->getData("link_name",array('link_id' => $v['ingredient_id'],'language_code' => $language));

                                            if (!empty($ingredient_link)) {

                                                $alias = $ingredient_link['link'];

                                            }

                                            if (!empty($ingredient_link_name)) {

                                                $name = $ingredient_link_name['link_name'];

                                            }

                                            break;

                                    }

                                    $rssub_sub[$e]['name'] = $name;

                                    $rssub_sub[$e]['alias'] = $alias;

                                    // unset($rssub_sub[$e]['ingredient']);

                                    unset($rssub_sub[$e]['ingredient_id']);

                                }

                                $rssub[$k]['child'] = $rssub_sub;

                            }

                        }

                        $rs[$key]['child'] = $rssub;

                    }

                }

            }

        }

        return $rs;

    }

}

