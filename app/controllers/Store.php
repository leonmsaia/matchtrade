<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Store extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Store_model');
		$this->load->model('User_model');
	}

	public function movements() {
		if ($this->ion_auth->logged_in()) {
			// Template Information
			$data['layout'] = 'basic';
			$data['page'] = 'user/movements';

			$user_id = getMyID();
			$data['movements'] = $this->Store_model->getMovementsByUserID($user_id);

			// Page Information
			$data['title'] = 'Match and Trade | Vendedor';
			$data['description'] = 'Consegui contactos comerciales de calidad hoy';
			$data['keywords'] = 'contactos; ventas, vendedores, bla';
			$data['author'] = 'Match Trade SRL';

			$this->load->view('layout/' . $data['layout'], $data);
		}else{
			redirect('Home','refresh');
		}
	}

	public function prices() {
		if ($this->ion_auth->logged_in()) {
			// Template Information
			$data['layout'] = 'basic';

			if ($this->ion_auth->in_group('provider')) {
				$data['title_plan'] = 'Plan Proovedor';
				$data['meditionUnit'] = 'Publicaciones';
				$store_plan_group = 1;
			}elseif($this->ion_auth->in_group('sales')){
				$data['title_plan'] = 'Plan Vendedor';
				$data['meditionUnit'] = 'Creditos';
				$store_plan_group = 2;
			}
			$data['page'] = 'store/prices';
			$data['prices_list'] = $this->Store_model->getStorePricesByGroup($store_plan_group);

			// Page Information
			$data['title'] = 'Match and Trade | Vendedor';
			$data['description'] = 'Consegui contactos comerciales de calidad hoy';
			$data['keywords'] = 'contactos; ventas, vendedores, bla';
			$data['author'] = 'Match Trade SRL';

			$this->load->view('layout/' . $data['layout'], $data);
		}else{
			redirect('Home','refresh');
		}

	}

	public function response($payment_provider, $payment_response) {
		$data['payment_provider'] = $payment_provider;

		if ($payment_provider == 'mp') {
			$data['payment_response_var'] = $payment_response;

			// Get Parameters From MP
			$callback_uri = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
			$parts = parse_url($callback_uri);
			parse_str($parts['query'], $query);
			$data['reference_id'] = $query['external_reference'];
			$data['mp_response'] = $query;

			// Get Transaction ID
			preg_match('/[US-][!]*\d.*[-]/', $data['reference_id'], $output_array_id);
			$user_transaction_id = str_replace('-', '', $output_array_id)[0];
			$data['user_transaction_id'] = $user_transaction_id;

			// Get Value
			preg_match('/[-VAL-][!]*\d*\z/', $data['reference_id'], $output_array_val);
			$user_transaction_value = str_replace('-', '', $output_array_val)[0];
			$data['user_transaction_value'] = $user_transaction_value;

			if ($this->Store_model->checkIfMovementExist($data['reference_id']) == false) {
				if ($this->Store_model->checkIfMPOperationExist($data['reference_id']) == false) {

					// Prepare MP Collection
					$movementCollection = array(
						 'user_movements_type' => 1,
						 'user_movements_code' => $data['reference_id'],
						 'user_movements_desc' => 'Compra Plan',
						 'user_movements_amount' => $user_transaction_value,
						 'user_movements_amount_type' => 1,
						 'user_movements_pay_method_id' => 1,
						 'user_movements_user_id' => $user_transaction_id
					);
					$this->db->insert('user_movements', $movementCollection);
					// Prepare MP Collection
					$mpCollection = array(
					   'user_id' => $user_transaction_id,
					   'collection_id' => $data['mp_response']['collection_id'],
						 'collection_status' => $data['mp_response']['collection_status'],
						 'preference_id' => $data['mp_response']['preference_id'],
						 'external_reference' => $data['mp_response']['external_reference'],
						 'payment_type' => $data['mp_response']['payment_type'],
						 'merchant_order_id' => $data['mp_response']['merchant_order_id'],
						 'store_mp_operation_reg_status' => $payment_response,
						 'store_mp_operation_reg_value' => $user_transaction_value
					);
					$this->db->insert('store_mp_operation_reg', $mpCollection);

				}
			}

		}

		// Template Information
		$data['layout'] = 'basic';
		$data['page'] = 'store/response';

		// Page Information
		$data['title'] = 'Match and Trade | Vendedor';
		$data['description'] = 'Consegui contactos comerciales de calidad hoy';
		$data['keywords'] = 'contactos; ventas, vendedores, bla';
		$data['author'] = 'Match Trade SRL';

		$this->load->view('layout/' . $data['layout'], $data);
	}

	public function payPlan($store_plan_id) {
		if ($this->ion_auth->logged_in()) {
			// Template Information
			$data['layout'] = 'basic';
			$data['page'] = 'store/prices_checkout';
			$data['plan_spects'] = $this->Store_model->getStorePlanInfoByStorePlanID($store_plan_id);
			$data['store_configuration'] = $this->Store_model->getStoreConfiguration();
			$data['administrative_cost'] = $data['store_configuration']->result()[0]->administrative_cost;

			$user_id = getMyID();
			$data['transaction_id'] = 'US-' . $user_id . '-' . generateID() . '-VAL-' . ($data['plan_spects']->result()[0]->store_plan_value + $data['administrative_cost']);
			$data['user_info'] = $this->User_model->getUserPlain($user_id);

			// Commercial Gateway Configuration
			$data['MP_Conf'] = $this->Store_model->getMPConfiguration();

			// Page Information
			$data['title'] = 'Match and Trade | Vendedor';
			$data['description'] = 'Consegui contactos comerciales de calidad hoy';
			$data['keywords'] = 'contactos; ventas, vendedores, bla';
			$data['author'] = 'Match Trade SRL';

			$this->load->view('layout/' . $data['layout'], $data);
		}else{
			redirect('user/login','refresh');
		}
	}

	public function payMethod() {

		// Template Information
		$data['layout'] = 'basic';
		$data['page'] = 'store/payment_mp';

		// Page Information
		$data['title'] = 'Match and Trade | Vendedor';
		$data['description'] = 'Consegui contactos comerciales de calidad hoy';
		$data['keywords'] = 'contactos; ventas, vendedores, bla';
		$data['author'] = 'Match Trade SRL';

		$this->load->view('layout/' . $data['layout'], $data);
	}


}
