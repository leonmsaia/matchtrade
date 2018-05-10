<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model
{

	// Company Tax Identity
	public function getMyTaxInformation($user_id)
	{
		$this->db->where('user_id', $user_id);
		$result = $this->db->get('provider_company_tax');
		return $result;
	}

	public function getMySubCategoriesByProviderID($provider_id)
	{
		$this->db->where('provider_id', $provider_id);
		$result = $this->db->get('provider_company_section');
		return $result;
	}

	public function getMySubCategoriesCompleteByProviderID($provider_id)
	{
		$this->db->where('provider_id', $provider_id);
		$this->db->join('list_sub_category', 'list_sub_category.sub_category_id = provider_company_section.sub_category_id');
		$result = $this->db->get('provider_company_section');
		return $result;
	}

	public function getMyCategorieByID($category_id)
	{
		$this->db->where('category_id', $category_id);
		$result = $this->db->get('list_category');
		return $result;
	}

	public function getMyReviewsByID($User_id)
	{
		$this->db->where('user_referrer_id', $User_id);
		$this->db->join('provider_company_tax', 'provider_company_tax.user_id = users_reference.user_referenced_id');
		$this->db->join('list_advise', 'list_advise.advise_id = users_reference.advise_inspect_id');
		$this->db->join('users_reference_asociated_comment', 'users_reference.reference_id = users_reference_asociated_comment.reference_asociated_id');
		$result = $this->db->get('users_reference');
		return $result;
	}

	public function getMyReferencesByID($User_id)
	{
		$this->db->where('user_referenced_id', $User_id);
		$this->db->join('provider_company_tax', 'provider_company_tax.user_id = users_reference.user_referenced_id');
		$this->db->join('list_advise', 'list_advise.advise_id = users_reference.advise_inspect_id');
		$this->db->join('users_reference_asociated_comment', 'users_reference.reference_id = users_reference_asociated_comment.reference_asociated_id');
		$result = $this->db->get('users_reference');
		return $result;
	}

	public function countReferencesByUserID($User_id)
	{
		$this->db->where('user_referenced_id', $User_id);
		$result = $this->db->get('users_reference');
		return count($result->result());
	}

	public function countReviewsByUserID($User_id)
	{
		$this->db->where('user_referrer_id', $User_id);
		$result = $this->db->get('users_reference');
		return count($result->result());
	}

	public function getAverageReferencedScore($User_id)
	{
		$this->db->where('user_referenced_id', $User_id);
		$result = $this->db->get('users_reference');
		$values = $result->result();
		$counter = 0;
		$acum = 0;
		foreach ($values as $vls) {
			$acum = $acum + $vls->reference_score;
			$counter++;
		}
		$finalScore = $acum/$counter;
		return round($finalScore);
	}

	public function getUser($User_id)
	{
		$this->db->where('users.id', $User_id);
		$this->db->join('users_groups', 'users_groups.user_id = users.id');
		$this->db->join('groups', 'groups.id = users_groups.group_id');
		$result = $this->db->get('users');
		return $result;
	}

	public function getUserPlain($User_id)
	{
		$this->db->where('users.id', $User_id);
		$result = $this->db->get('users');
		return $result;
	}

}
