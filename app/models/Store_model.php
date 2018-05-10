<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Store_model extends CI_Model
{

	// Store Basic Modules
	public function getStorePricesByGroup($store_plan_group)
	{
		$this->db->where('store_plan_group', $store_plan_group);
		$this->db->order_by('store_plan_units', 'ASC');
		$this->db->order_by('store_plan_date', 'DESC');
		$result = $this->db->get('store_plan');
		return $result;
	}

	public function getStorePlanInfoByStorePlanID($store_plan_id)
	{
		$this->db->where('store_plan_id', $store_plan_id);
		$result = $this->db->get('store_plan');
		return $result;
	}

	public function getMPConfiguration()
	{
		$result = $this->db->get('store_mercadopago_conf');
		return $result->result()[0];
	}

	public function getMovementsByUserID($user_id)
	{
		$this->db->where('user_movements_user_id', $user_id);
		$this->db->join('users', 'users.id = user_movements.user_movements_user_id');
		$this->db->join('user_movement_type', 'user_movement_type.user_movement_type_id = user_movements.user_movements_type');
		$result = $this->db->get('user_movements');
		return $result;
	}

	public function getStoreConfiguration()
	{
		$result = $this->db->get('store_conf');
		return $result;
	}

	public function checkIfMPOperationExist($external_reference)
	{
		$this->db->where('external_reference', $external_reference);
		$result = $this->db->get('store_mp_operation_reg');

		if ($result->num_rows() > 0) {
			return true;
		}else{
			return false;
		}
	}

	public function checkIfMovementExist($user_movements_code)
	{
		$this->db->where('user_movements_code', $user_movements_code);
		$result = $this->db->get('user_movements');

		if ($result->num_rows() > 0) {
			return true;
		}else{
			return false;
		}
	}

}
