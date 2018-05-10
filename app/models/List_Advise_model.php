<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class List_Advise_model extends CI_Model
{

	// Categories
	public function getAllCategories()
	{
		$result = $this->db->get('list_category');
		return $result;
	}
	public function getCategoryBySlug($category_slug)
	{
		$this->db->where('category_slug', $category_slug);
		$result = $this->db->get('list_category');
		return $result;
	}
	public function getCategoryByID($category_id)
	{
		$this->db->where('category_id', $category_id);
		$result = $this->db->get('list_category');
		return $result;
	}
	public function getSubCategoryBySlug($sub_category_slug)
	{
		$this->db->where('sub_category_slug', $sub_category_slug);
		$result = $this->db->get('list_sub_category');
		return $result;
	}

	// Sub Categories
	public function getAllSubCategories()
	{
		$result = $this->db->get('list_sub_category');
		return $result;
	}
	public function getSubCategoryByFatherID($father_id)
	{
		$this->db->where('sub_category_father', $father_id);
		$result = $this->db->get('list_sub_category');
		return $result;
	}
	public function getSubCategoriesByAdviseCode($advise_code)
	{
		$this->db->where('advise_code', $advise_code);
		$this->db->join('list_sub_category', 'list_sub_category.sub_category_id = list_advise_sub_category.sub_category_id');
		$result = $this->db->get('list_advise_sub_category');
		return $result;
	}

	// Advises
	public function getAdviseByCode($advise_code)
	{
		$this->db->where('advise_code', $advise_code);
		$result = $this->db->get('list_advise');
		return $result;
	}
	public function getAdvisesByAuthorID($author_id)
	{
		$this->db->where('advise_author', $author_id);
		$result = $this->db->get('list_advise');
		return $result;
	}
	public function getAllAdvisesByPub()
	{
		$this->db->order_by('advise_publication_start', 'desc');
		$this->db->join('list_advise_img_support', 'list_advise_img_support.advise_id = list_advise.advise_id');
		$result = $this->db->get('list_advise');
		return $result;
	}
	public function getAllAdvisesByPubByCat($advise_category)
	{
		$this->db->where('advise_category', $advise_category);
		$this->db->order_by('advise_publication_start', 'desc');
		$this->db->join('list_advise_img_support', 'list_advise_img_support.advise_id = list_advise.advise_id');
		$result = $this->db->get('list_advise');
		return $result;
	}
	public function getAllAdvisesBySubCatRel($advise_sub_category)
	{
		$this->db->where('sub_category_id', $advise_sub_category);
		$this->db->join('list_advise', 'list_advise.advise_code = list_advise_sub_category.advise_code', 'INNER');
		$this->db->join('list_advise_img_support', 'list_advise_img_support.advise_id = list_advise.advise_id', 'INNER');
		$result = $this->db->get('list_advise_sub_category');
		$advises_in_category = $result->result();
		return $result;
	}

	public function getAllAdvisesByRelations($advise_code)
	{
		$this->db->select('sub_category_id');
		$this->db->where('list_advise_sub_category.advise_code', $advise_code);
		$result = $this->db->get('list_advise_sub_category');

		// Subcategories of Advise
		$subcategories = $result->result();

		// Subcategories List Instance
		$subcatego_list = [];
		$counter = 0;
		foreach ($subcategories as $sbct) {
			$subcatego_id = $sbct->sub_category_id;
			array_push($subcatego_list, $subcatego_id);
			$counter++;
		}

		// Get List of Advises in These SubCategories
		$advises_container = [];
		$counter_advise = 0;
		foreach ($subcatego_list as $sub_category_id) {
			$this->db->select('advise_code');
			$this->db->where('sub_category_id', $sub_category_id);
			$result_Advise = $this->db->get('list_advise_sub_category');
			array_push($advises_container, $result_Advise->result());
			$counter_advise++;
		}
		$united_advises = call_user_func_array('array_merge', $advises_container);

		// Order Advises Codes
		$advises_container_order = [];
		$counter_advise_order = 0;
		foreach ($united_advises as $test) {
			array_push($advises_container_order, $test->advise_code);
		}
		$cleaned_list = array_unique($advises_container_order);
		$query_string_container = '';
		$delimiterInFor = 0;
		foreach ($cleaned_list as $cl) {
			$query_element = "advise_code='" . $cl . "'";
			if ($delimiterInFor == 0) {
				$OR = '';
			}else{
				$OR = 'OR';
			}
			$query_string_container = $query_string_container . ' ' . $OR . ' ' . $query_element;
			$delimiterInFor++;
		}
		$query_string_prepared = $query_string_container;

		$this->db->where($query_string_prepared);
		$this->db->join('list_advise_img_support', 'list_advise_img_support.advise_id = list_advise.advise_id');
		$result = $this->db->get('list_advise');

		return $result;
	}
	// Base Commission
	public function getBaseCommisionByAdviseID($advise_id)
	{
		$this->db->where('advise_id', $advise_id);
		$result = $this->db->get('list_advise_base_commission');
		return $result;
	}

	// Support Tab
	public function getSupportTabByAdviseID($advise_id)
	{
		$this->db->where('advise_id', $advise_id);
		$result = $this->db->get('list_advise_tab_support');
		return $result;
	}

	// Text Support
	public function getTextSupportByAdviseID($advise_id)
	{
		$this->db->where('advise_id', $advise_id);
		$result = $this->db->get('list_advise_txt_support');
		return $result;
	}

	// Terms Support
	public function getTermSupportByAdviseID($advise_id)
	{
		$this->db->where('advise_id', $advise_id);
		$result = $this->db->get('list_advise_terms_support');
		return $result;
	}

	// Image Support
	public function getImgSupportByAdviseID($advise_id)
	{
		$this->db->where('advise_id', $advise_id);
		$result = $this->db->get('list_advise_img_support');
		return $result;
	}
	public function getImgSlideSupportByAdviseID($advise_id)
	{
		$this->db->where('advise_id', $advise_id);
		$this->db->order_by('img_order', 'asc');
		$result = $this->db->get('list_advise_img_slide_support');
		return $result;
	}

	// Matches
	public function getMatchesByProviderID($provider_id)
	{
		$this->db->where('provider_id', $provider_id);
		$this->db->join('users', 'list_advise_match.user_id = users.id');
		$this->db->join('list_advise', 'list_advise_match.list_advise_id = list_advise.advise_id');
		$result = $this->db->get('list_advise_match');
		return $result;
	}
}
