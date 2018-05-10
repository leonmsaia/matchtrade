<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('User_model');
		$this->load->model('Location_model');
		$this->load->model('List_Advise_model');
	}

	public function login() {
		if ($this->ion_auth->logged_in()) {
			redirect('Home','refresh');
		}else{
			// Template Information
			$data['layout'] = 'basic';
			$data['page'] = 'user/login';

			// Page Information
			$data['title'] = 'Match and Trade | Iniciar Sesion';
			$data['description'] = 'Consegui contactos comerciales de calidad hoy';
			$data['keywords'] = 'contactos; ventas, vendedores, bla';
			$data['author'] = 'Match Trade SRL';

			$this->load->view('layout/' . $data['layout'], $data);
		}
	}

	public function profile() {
		if ($this->ion_auth->logged_in()) {
			// Template Information
			$data['layout'] = 'basic';
			$data['page'] = 'user/profile';

			// Get User Information
			$user_id = getMyID();
			$data['user_nfo'] = $this->User_model->getUser($user_id);

			// Page Information
			$data['title'] = 'Match and Trade | Perfil';
			$data['description'] = 'Consegui contactos comerciales de calidad hoy';
			$data['keywords'] = 'contactos; ventas, vendedores, bla';
			$data['author'] = 'Match Trade SRL';

			$this->load->view('layout/' . $data['layout'], $data);
		}else{
			redirect('Home','refresh');
		}
	}

	public function settings() {
		if ($this->ion_auth->logged_in()) {
			// Template Information
			$data['layout'] = 'basic';
			$data['page'] = 'user/settings';

			// Page Information
			$data['title'] = 'Match and Trade | Perfil';
			$data['description'] = 'Consegui contactos comerciales de calidad hoy';
			$data['keywords'] = 'contactos; ventas, vendedores, bla';
			$data['author'] = 'Match Trade SRL';

			$this->load->view('layout/' . $data['layout'], $data);
		}else{
			redirect('Home','refresh');
		}
	}

	public function matchList() {
		if ($this->ion_auth->logged_in()) {
			// Template Information
			$data['layout'] = 'basic';
			$data['page'] = 'user/matchlist';

			$user_id = getMyID();
			$provider_id = getCompanyTaxNfoBYUserID($user_id)['company_id'];
			$data['matches_list'] = $this->List_Advise_model->getMatchesByProviderID($provider_id);

			// Page Information
			$data['title'] = 'Match and Trade | Lista de Matchs';
			$data['description'] = 'Consegui contactos comerciales de calidad hoy';
			$data['keywords'] = 'contactos; ventas, vendedores, bla';
			$data['author'] = 'Match Trade SRL';

			$this->load->view('layout/' . $data['layout'], $data);
		}else{
			redirect('Home','refresh');
		}
	}

	public function processMatch()
	{
		if ($this->ion_auth->logged_in()) {

			$match_id = $_POST['match_id'];
			$status = $_POST['status'];

			if ($status == 'accept') {
				// Check if Vendedor have Credits
				// TEST ALWAYS TRUE
				$salesManCredits = TRUE;

				if ($salesManCredits == TRUE) {
					$status = 2;
				}else{
					$status = 3;
				}

			}elseif($status == 'reject') {
				$status = 4;
			}
			$dataBasic = array(
				'status' => $status
			);

			$this->db->where('match_id', $match_id);
			$this->db->update('list_advise_match', $dataBasic);

			redirect('user/matchList','refresh');

		}else{
			redirect('Home','refresh');
		}
	}



	public function loginAction() {
		$identity = $_POST['logmail'];
		$password = $_POST['logpass'];

		if(isset($_POST['logrem'])){
		  $remember = 1;
		}else{
		  $remember = 0;
		}

		$this->ion_auth->login($identity, $password, $remember);

		if ($this->ion_auth->login($identity, $password, $remember))
		{
			redirect('Home','refresh');
		}
		else
		{
			redirect('User/login','refresh');
		}
	}

	public function logUserOut() {
		if ($this->ion_auth->logged_in()) {
			$this->ion_auth->logout();
			redirect('Home','refresh');
		}else{
			redirect('Home','refresh');
		}
	}

	public function create($account_type) {
		if ($this->ion_auth->logged_in()) {
			redirect('Home','refresh');
		}else{
			// Template Information
			$data['layout'] = 'basic';
			$data['page'] = 'user/create';
			$data['account_type'] = $account_type;

			// Page Information
			$data['title'] = 'Match and Trade | Crear Cuenta ' . $account_type;
			$data['description'] = 'Consegui contactos comerciales de calidad hoy';
			$data['keywords'] = 'contactos; ventas, vendedores, bla';
			$data['author'] = 'Match Trade SRL';

			$this->load->view('layout/' . $data['layout'], $data);
		}
	}

	public function create_type() {
		if ($this->ion_auth->logged_in()) {
			redirect('Home','refresh');
		}else{
			// Template Information
			$data['layout'] = 'basic';
			$data['page'] = 'user/create_type';

			// Page Information
			$data['title'] = 'Match and Trade | Tipo de Cuenta';
			$data['description'] = 'Consegui contactos comerciales de calidad hoy';
			$data['keywords'] = 'contactos; ventas, vendedores, bla';
			$data['author'] = 'Match Trade SRL';

			$this->load->view('layout/' . $data['layout'], $data);
		}
	}

	public function createUserAction() {
		if ($this->ion_auth->logged_in()) {
			redirect('Home','refresh');
		}else{
			$regname = $_POST['first_name'];
			$reglastname = $_POST['last_name'];
			$regphone = $_POST['phone'];
			$regmail = $_POST['email'];
			$regdni = $_POST['dni'];
			$regcuit = $_POST['cuit'];
			$regcompany = $_POST['company'];
			$regpass = $_POST['password'];
			$additional_data = array(
				'first_name' => $regname,
				'last_name' => $reglastname,
				'username' => $regmail,
				'dni' => $regdni,
				'cuit' => $regcuit,
				'phone' => $regphone,
				'company' => $regcompany
			);
			$group = array('2');
			$this->ion_auth->register($regmail, $regpass, $regmail, $additional_data, $group);
			redirect('user/login', 'refresh');
		}
	}

	public function recover() {
		if ($this->ion_auth->logged_in()) {
			redirect('Home','refresh');
		}else{
			// Template Information
			$data['layout'] = 'basic';
			$data['page'] = 'user/recover';

			// Page Information
			$data['title'] = 'Match and Trade | Recuperar Password';
			$data['description'] = 'Consegui contactos comerciales de calidad hoy';
			$data['keywords'] = 'contactos; ventas, vendedores, bla';
			$data['author'] = 'Match Trade SRL';

			$this->load->view('layout/' . $data['layout'], $data);
		}
	}

	public function taxInformation() {
		if ($this->ion_auth->logged_in()) {
			// Template Information
			$data['layout'] = 'basic';
			$data['page'] = 'user/taxes';

			// Load Data
			$user_id = getMyID();
			$data['tax_information'] = $this->User_model->getMyTaxInformation($user_id);

			// Get Original Locations Information
			foreach ($data['tax_information']->result() as $txt_nfo) {
				if ($txt_nfo->company_pais != 0) {
					$data['company_country'] = $this->Location_model->getPais();
					$data['company_province'] = $this->Location_model->getProvinciaByPais($txt_nfo->company_pais);
					$data['company_party'] = $this->Location_model->getPartidoByProvincia($txt_nfo->company_province);
					$data['company_locality'] = $this->Location_model->getLocalidadByPartido($txt_nfo->company_partido);
					$data['company_suburb'] = $this->Location_model->getBarrioByLocalidad($txt_nfo->company_localidad);
					$data['company_subsuburb'] = $this->Location_model->getSubBarrioByBarrio($txt_nfo->company_barrio);
					$data['statusData'] = TRUE;
				}else{
					$data['statusData'] = FALSE;
				}
			}

			// Page Information
			$data['title'] = 'Match and Trade | Informacion Fiscal';
			$data['description'] = 'Consegui contactos comerciales de calidad hoy';
			$data['keywords'] = 'contactos; ventas, vendedores, bla';
			$data['author'] = 'Match Trade SRL';

			$this->load->view('layout/' . $data['layout'], $data);
		}else{
			redirect('Home','refresh');
		}
	}

	public function getMyReferences() {
		if ($this->ion_auth->logged_in()) {
			// Template Information
			$data['layout'] = 'basic';
			$data['page'] = 'user/reviews';

			// Load Data
			$user_id = getMyID();
			$data['reference'] = $this->User_model->getMyReferencesByID($user_id);
			$data['countReference'] =$this->User_model->countReferencesByUserID($user_id);
			$data['countReview'] =$this->User_model->countReviewsByUserID($user_id);
			$data['myScore'] =$this->User_model->getAverageReferencedScore($user_id);

			// Page Information
			$data['title'] = 'Match and Trade | Informacion Fiscal';
			$data['description'] = 'Consegui contactos comerciales de calidad hoy';
			$data['keywords'] = 'contactos; ventas, vendedores, bla';
			$data['author'] = 'Match Trade SRL';

			// View Elements
			$data['page_title'] = 'Mis Referencias';

			$this->load->view('layout/' . $data['layout'], $data);
		}else{
			redirect('Home','refresh');
		}
	}

	public function getMyReviews() {
		if ($this->ion_auth->logged_in()) {
			// Template Information
			$data['layout'] = 'basic';
			$data['page'] = 'user/reviews';

			// Load Data
			$user_id = getMyID();
			$data['reference'] = $this->User_model->getMyReviewsByID($user_id);
			$data['countReference'] =$this->User_model->countReferencesByUserID($user_id);
			$data['countReview'] =$this->User_model->countReviewsByUserID($user_id);
			$data['myScore'] =$this->User_model->getAverageReferencedScore($user_id);

			// Page Information
			$data['title'] = 'Match and Trade | Informacion Fiscal';
			$data['description'] = 'Consegui contactos comerciales de calidad hoy';
			$data['keywords'] = 'contactos; ventas, vendedores, bla';
			$data['author'] = 'Match Trade SRL';

			// View Elements
			$data['page_title'] = 'Mis Reseñas';

			$this->load->view('layout/' . $data['layout'], $data);
		}else{
			redirect('Home','refresh');
		}
	}

	public function saveTaxInformation() {
		if ($this->ion_auth->logged_in()) {
			// Normalize Vars
			$legal_name = '';
			$cuit = '';
			$user_id = '';
			$tax_position = '';
			$tax_street_adress = '';
			$tax_number_adress = '';
			$tax_country_selector = '';
			$tax_province_selector = '';
			$tax_party_selector = '';
			$tax_locality_selector = '';
			$tax_suburb_selector = '';
			$tax_subsuburb_selector = '';
			$countryName = '';
			$provinceName = '';
			$partyName = '';
			$localityName = '';
			$suburbName = '';
			$subsuburbName = '';
			// Process User Information
			$user_id = getMyID();
			$checkTax = checkIfTaxInfoExist($user_id);
			// Check Variables INPUT
			if (!empty($_POST['legal_name'])) {
				$legal_name = $_POST['legal_name'];
			}
			if (!empty($_POST['cuit'])) {
				$cuit = $_POST['cuit'];
			}
			if (!empty($_POST['tax_position'])) {
				$tax_position = $_POST['tax_position'];
			}
			if (!empty($_POST['street_adress'])) {
				$tax_street_adress = $_POST['street_adress'];
			}
			if (!empty($_POST['number_adress'])) {
				$tax_number_adress = $_POST['number_adress'];
			}
			if (!empty($_POST['country_selector'])) {
				$tax_country_selector = $_POST['country_selector'];
				$countryName = ', ' . getLocationName($tax_country_selector, 'country')['name'];
			}
			if (!empty($_POST['province_selector'])) {
				$tax_province_selector = $_POST['province_selector'];
				$provinceName = ', ' . getLocationName($tax_province_selector, 'province')['name'];
			}
			if (!empty($_POST['party_selector'])) {
				$tax_party_selector = $_POST['party_selector'];
				$partyName = ', ' . getLocationName($tax_party_selector, 'party')['name'];
			}
			if (!empty($_POST['locality_selector'])) {
				$tax_locality_selector = $_POST['locality_selector'];
				$localityName = ', ' . getLocationName($tax_locality_selector, 'locality')['name'];
			}
			if (!empty($_POST['suburb_selector'])) {
				$tax_suburb_selector = $_POST['suburb_selector'];
				$suburbName = ', ' . getLocationName($tax_suburb_selector, 'suburb')['name'];
			}
			if (!empty($_POST['subsuburb_selector'])) {
				$tax_subsuburb_selector = $_POST['subsuburb_selector'];
				$subsuburbName = ', ' . getLocationName($tax_subsuburb_selector, 'subsuburb')['name'];
			}
			$legal_adress = $_POST['street_adress'] . ' ' .	$_POST['number_adress'] . $subsuburbName . $suburbName . $localityName . $partyName . $provinceName . $countryName;
			$dataBasic = array(
				'company_legal_name' => $legal_name,
				'company_cuit' => $cuit,
				'user_id' => $user_id,
				'company_tax_position' => $tax_position,
				'company_adress_street' => $tax_street_adress,
				'company_adress_number' => $tax_number_adress,
				'company_pais' => $tax_country_selector,
				'company_province' => $tax_province_selector,
				'company_partido' => $tax_party_selector,
				'company_localidad' => $tax_locality_selector,
				'company_barrio' => $tax_suburb_selector,
				'company_subbarrio' => $tax_subsuburb_selector,
				'company_legal_adress' => $legal_adress
			);
			if ($checkTax) {
				$this->db->where('user_id', $user_id);
				$this->db->update('provider_company_tax', $dataBasic);
			}else{
				$this->db->insert('provider_company_tax', $dataBasic);
			}
			redirect('user/tax/', 'refresh');
		}else{
			redirect('Home','refresh');
		}
	}



	public function companyInformation() {
		if ($this->ion_auth->logged_in()) {
			// Template Information
			$data['layout'] = 'basic';
			$data['page'] = 'user/company';

			// Load Data
			$user_id = getMyID();
			$company_id = getCompanyTaxNfoBYUserID($user_id)['company_id'];
			$data['tax_information'] = $this->User_model->getMyTaxInformation($user_id);
			$data['categories_list'] = $this->List_Advise_model->getAllCategories();
			$data['company_sub_categories'] = $this->User_model->getMySubCategoriesByProviderID($company_id);
			$data['company_sub_categories_complete'] = $this->User_model->getMySubCategoriesCompleteByProviderID($company_id);

			// Decode Data
			$data['fatherCat'] = $data['company_sub_categories_complete']->result()[0]->sub_category_father;
			$data['company_category'] = $this->User_model->getMyCategorieByID($data['fatherCat']);

			// Get Original Locations Information
			foreach ($data['tax_information']->result() as $txt_nfo) {
				if ($txt_nfo->company_pais != 0) {
					$data['company_country'] = $this->Location_model->getPais();
					$data['company_province'] = $this->Location_model->getProvinciaByPais($txt_nfo->company_pais);
					$data['company_party'] = $this->Location_model->getPartidoByProvincia($txt_nfo->company_province);
					$data['company_locality'] = $this->Location_model->getLocalidadByPartido($txt_nfo->company_partido);
					$data['company_suburb'] = $this->Location_model->getBarrioByLocalidad($txt_nfo->company_localidad);
					$data['company_subsuburb'] = $this->Location_model->getSubBarrioByBarrio($txt_nfo->company_barrio);
					$data['statusData'] = TRUE;
				}else{
					$data['statusData'] = FALSE;
				}
			}

			// Page Information
			$data['title'] = 'Match and Trade | Informacion Fiscal';
			$data['description'] = 'Consegui contactos comerciales de calidad hoy';
			$data['keywords'] = 'contactos; ventas, vendedores, bla';
			$data['author'] = 'Match Trade SRL';

			$this->load->view('layout/' . $data['layout'], $data);
		}else{
			redirect('Home','refresh');
		}
	}


	public function saveCategoryCompany()
	{
		if ($this->ion_auth->logged_in()) {

			$user_id = $_POST['user_id'];
			$company_id = getCompanyTaxNfoBYUserID($user_id)['company_id'];

			if (isset($_POST['subcategory'])) {
				$optionArray = $_POST['subcategory'];

				// Clear Previusly Sub Categories
				$this->db->where('provider_id', $company_id);
				$this->db->delete('provider_company_section');

				// Save Sub Categories
				for ($i = 0; $i<count($optionArray); $i++) {
					$provider_id = $company_id;
					$sub_category_id = $optionArray[$i];
					$dataBasic = array(
						'provider_id' => $provider_id,
						'sub_category_id' => $sub_category_id
					);
					$this->db->insert('provider_company_section', $dataBasic);
				}
			}
			redirect('user/company','refresh');
		}else{
			redirect('Home','refresh');
		}
	}

	public function get_sub_category_by_father_id($father_id)
	{

		$list_crude = $this->List_Advise_model->getSubCategoryByFatherID($father_id);

		$sub_category_list = array();

		foreach ($list_crude->result() as $bs_list) {
			$dataBasic = array(
			   'sub_category_id' => $bs_list->sub_category_id,
				 'sub_category_father' => $bs_list->sub_category_father,
			   'sub_category_name' => $bs_list->sub_category_name,
			   'sub_category_desc' => $bs_list->sub_category_desc,
				 'sub_category_high' => $bs_list->sub_category_high,
				 'sub_category_img' => $bs_list->sub_category_img
			);
			array_push($sub_category_list, $dataBasic);
		}

		echo json_encode($sub_category_list);
	}

}
