<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
// Core Engine for Match & Trade
// Created by FrikiCode
// All Rights Reserved.
// 2018


function getMyID()
{
    $ci =& get_instance();
    $user = $ci->ion_auth->user()->row();
    if(isset($user->id)) {
        return $user->id;
    }else{
    	return null;
    }
}
function getUserNfo($user_id)
{
    $ci =& get_instance();
    $ci->db->from('users');
    $ci->db->where('id', $user_id);
    $user = $ci->db->get();
    $userNfo = null;
    if ($user->num_rows() > 0)
    {
        foreach ($user->result() as $p)
        {
            $userNfo = array(
                'id' => $p->id,
                'ip_address' => $p->ip_address,
                'username' => $p->username,
                'password' => $p->password
            );
        }
    }
    return $userNfo;
}

function getMPOperationNfo($user_movements_id)
{
    $ci =& get_instance();
    $ci->db->from('store_mp_operation_reg');
    $ci->db->where('user_movements_id', $user_movements_id);
    $result = $ci->db->get();
    return $result;
}

function getPostNfoByID($blog_post_id)
{
    $ci =& get_instance();
    $ci->db->from('blog_post');
    $ci->db->where('blog_post_id', $blog_post_id);
    $post = $ci->db->get();
    return $post->result()[0];
}

function getPostNfoBySlug($blog_post_slug)
{
    $ci =& get_instance();
    $ci->db->from('blog_post');
    $ci->db->where('blog_post_slug', $blog_post_slug);
    $post = $ci->db->get();
    return $post->result()[0];
}

function getMinimalCommission($advise_id)
{
    $ci =& get_instance();
    $ci->db->from('list_advise_base_commission');
    $ci->db->order_by('commission_percent', 'asc');
    $ci->db->limit(1);
    $ci->db->where('advise_id', $advise_id);
    $user = $ci->db->get();
    $userNfo = null;
    return $user->result()[0]->commission_percent;
}
function generateID()
{
  $characters = 'abcdefghijklmnopqrstuvwxyz0123456789';
  $random_string_length = 15;
  $finalID = '';
  $max = strlen($characters) - 1;
  for ($i = 0; $i < $random_string_length; $i++) {
    $finalID .= $characters[mt_rand(0, $max)];
  }
  return $finalID;
}

function calcAdviseVto()
{
  $result = 1;
  return $result;
}
function calcAdviseStatus()
{
  $result = 1;
  return $result;
}

function calcIfTxtSupport($advise_id)
{
  $ci =& get_instance();
  $ci->db->where('advise_id', $advise_id);
  $ci->db->from('list_advise_txt_support');
  $result = $ci->db->count_all_results();
  return $result;
}

function getAdviseNfoByCode($advise_code)
{
    $ci =& get_instance();
    $ci->db->from('list_advise');
    $ci->db->where('advise_code', $advise_code);
    $advise = $ci->db->get();
    $adviseNfo = null;
    if ($advise->num_rows() > 0)
    {
        foreach ($advise->result() as $p)
        {
            $adviseNfo = array(
                'advise_id' => $p->advise_id,
                'advise_code' => $p->advise_code,
                'advise_category' => $p->advise_category,
                'advise_author' => $p->advise_author,
                'advise_publication_start' => $p->advise_publication_start,
                'advise_name' => $p->advise_name,
                'advise_desc' => $p->advise_desc,
                'advise_baseprice' => $p->advise_baseprice,
                'advise_qty_base' => $p->advise_qty_base
            );
        }
    }
    return $adviseNfo;
}

function checkIfUserMatchAdvise($user_id, $advise_id)
{
  $ci =& get_instance();
  $ci->db->from('list_advise_match');
  $ci->db->where('list_advise_id', $advise_id);
  $ci->db->where('user_id', $user_id);
  $advise = $ci->db->get();
  if ($advise->num_rows() > 0)
  {
    return true;
  }else{
    return false;
  }
}

function getAdviseNfoById($advise_id)
{
    $ci =& get_instance();
    $ci->db->from('list_advise');
    $ci->db->where('advise_id', $advise_id);
    $advise = $ci->db->get();
    $adviseNfo = null;
    if ($advise->num_rows() > 0)
    {
        foreach ($advise->result() as $p)
        {
            $adviseNfo = array(
                'advise_id' => $p->advise_id,
                'advise_code' => $p->advise_code,
                'advise_category' => $p->advise_category,
                'advise_author' => $p->advise_author,
                'advise_publication_start' => $p->advise_publication_start,
                'advise_name' => $p->advise_name,
                'advise_desc' => $p->advise_desc,
                'advise_baseprice' => $p->advise_baseprice,
                'advise_qty_base' => $p->advise_qty_base
            );
        }
    }
    return $adviseNfo;
}

function getCategoryIDBySlug($category_slug)
{
    $ci =& get_instance();
    $ci->db->from('list_category');
    $ci->db->where('category_slug', $category_slug);
    $advise = $ci->db->get();
    return $advise->result()[0]->category_id;
}

function getSubCategoryIDBySlug($subcategory_slug)
{
    $ci =& get_instance();
    $ci->db->from('list_sub_category');
    $ci->db->where('sub_category_slug', $subcategory_slug);
    $advise = $ci->db->get();
    return $advise->result()[0]->sub_category_id;
}

function getSubCategoryNfoByID($subcategory_id)
{
    $ci =& get_instance();
    $ci->db->from('list_sub_category');
    $ci->db->where('sub_category_id', $subcategory_id);
    $advise = $ci->db->get();
    return $advise->result()[0];
}

function normaliza ($cadena){
    $originales = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿŔŕ';
    $modificadas = 'aaaaaaaceeeeiiiidnoooooouuuuybsaaaaaaaceeeeiiiidnoooooouuuyybyRr';
    $cadena = utf8_decode($cadena);
    $cadena = strtr($cadena, utf8_decode($originales), $modificadas);
    $cadena = strtolower($cadena);
    return utf8_encode($cadena);
}


function uploadFile($advise_code, $file, $name, $path, $type, $ext, $deletable) {
  $ci =& get_instance();

  // Check if File Path Exist
  $commonPath = './assets/uploads/' . $type . '/';
  $completePath = $commonPath . $advise_code . '/' . $path;

  if (!file_exists($commonPath . $advise_code)) {
    mkdir($completePath, 0777, true);
  }

  if ($deletable == true) {
    if (file_exists($completePath . '/' . $name . $ext)) {
      unlink($completePath . '/' . $name . $ext);
    }
  }

  // Config Upload Engine
  $config['file_name'] = $name;
  $config['upload_path'] = $commonPath . $advise_code . '/pictures';
  $config['allowed_types'] = 'gif|jpg|png|doc|txt';
  $config['max_size'] = 1024 * 8;
  $config['encrypt_name'] = FALSE;
  // Config Upload Engine End

  // Do Upload
  $ci->load->library('upload', $config);
  $ci->upload->do_upload($file);
}

function checkIfSlidePicExist($advise_id, $slideOrder)
{
    $ci =& get_instance();
    $ci->db->from('list_advise_img_slide_support');
    $ci->db->where('advise_id', $advise_id);
    $ci->db->where('img_order', $slideOrder);
    $advise = $ci->db->get();
    $adviseNfo = null;
    if ($advise->num_rows() > 0){
      return true;
    }else{
      return false;
    }
}

function checkIfTaxInfoExist($user_id)
{
    $ci =& get_instance();
    $ci->db->from('provider_company_tax');
    $ci->db->where('user_id', $user_id);
    $advise = $ci->db->get();
    $adviseNfo = null;
    if ($advise->num_rows() > 0){
      return true;
    }else{
      return false;
    }
}

function getLocationName($location_id, $locationType)
{
    switch ($locationType) {
      case 'country':
        $locationType = 'loc_pais';
        break;
      case 'province':
        $locationType = 'loc_provincia';
        break;
      case 'party':
        $locationType = 'loc_partido';
        break;
      case 'locality':
        $locationType = 'loc_localidad';
        break;
      case 'suburb':
        $locationType = 'loc_barrio';
        break;
      case 'subsuburb':
        $locationType = 'loc_subbarrio';
        break;
    }
    $ci =& get_instance();
    $ci->db->from($locationType);
    $ci->db->where('id', $location_id);
    $location = $ci->db->get();
    if ($location->num_rows() > 0)
    {
        foreach ($location->result() as $p)
        {
            $locationNfo = array(
                'name' => $p->nombre
            );
        }
    }
    return $locationNfo;
}

function getIfCompanyVerify($user_id)
{
  $ci =& get_instance();
  $ci->db->from('provider_company_tax');
  $ci->db->where('user_id', $user_id);
  $location = $ci->db->get();
  if ($location->num_rows() > 0)
  {
      foreach ($location->result() as $p)
      {
        if ($p->company_verify == 1) {
          return true;
        }else{
          return false;
        }
      }
  }
}

function getCompanyTaxNfoBYUserID($user_id)
{
    $ci =& get_instance();
    $ci->db->from('provider_company_tax');
    $ci->db->where('user_id', $user_id);
    $company = $ci->db->get();
    $companyNfo = null;
    if ($company->num_rows() > 0)
    {
        foreach ($company->result() as $p)
        {
            $companyNfo = array(
                'company_id' => $p->company_id,
                'user_id' => $p->user_id,
                'company_legal_name' => $p->company_legal_name,
                'company_cuit' => $p->company_cuit,
                'company_tax_position' => $p->company_tax_position,
                'company_legal_adress' => $p->company_legal_adress,
                'company_adress_street' => $p->company_adress_street,
                'company_adress_number' => $p->company_adress_number,
                'company_pais' => $p->company_pais,
                'company_province' => $p->company_province,
                'company_partido' => $p->company_partido,
                'company_localidad' => $p->company_localidad,
                'company_barrio' => $p->company_barrio,
                'company_subbarrio' => $p->company_subbarrio,
                'company_verify' => $p->company_verify
            );
        }
    }
    return $companyNfo;
}
