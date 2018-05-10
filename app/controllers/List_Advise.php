<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class List_Advise extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('List_Advise_model');
		$this->load->model('User_model');
	}

	// VIEWS
	public function list() {

		// Load Data
		$data['categories_list'] = $this->List_Advise_model->getAllCategories();
		$data['last_publications'] = $this->List_Advise_model->getAllAdvisesByPub();

		// Template Information
		$data['layout'] = 'basic';
		$data['page'] = 'list/main';

		// Page Information
		$data['title'] = 'Match and Trade | Listado General';
		$data['description'] = 'Consegui contactos comerciales de calidad hoy';
		$data['keywords'] = 'contactos; ventas, vendedores, bla';
		$data['author'] = 'Match Trade SRL';

		$this->load->view('layout/' . $data['layout'], $data);
	}

	public function list_by_category($category_slug) {
		// Load Data
		$father_id = getCategoryIDBySlug($category_slug);
		$data['categories_list'] = $this->List_Advise_model->getAllCategories();
		$data['last_publications'] = $this->List_Advise_model->getAllAdvisesByPubByCat($father_id);
		$data['list_category'] = $this->List_Advise_model->getCategoryBySlug($category_slug);

		if ($data['list_category']->num_rows() > 0)
		{
			// Template Information
			$data['layout'] = 'basic';
			$data['page'] = 'list/category';

			$data['list_sub_category_by_fatherid'] = $this->List_Advise_model->getSubCategoryByFatherID($father_id);

			// Page Information
			$data['title'] = 'Match and Trade | Listado General';
			$data['description'] = 'Consegui contactos comerciales de calidad hoy';
			$data['keywords'] = 'contactos; ventas, vendedores, bla';
			$data['author'] = 'Match Trade SRL';

			$this->load->view('layout/' . $data['layout'], $data);
		}else{
			redirect('list', 'refresh');
		}
	}

	public function list_by_subcategory($subcategory_slug) {
		// Load Data
		$sub_category_id = getSubCategoryIDBySlug($subcategory_slug);
		$data['categories_list'] = $this->List_Advise_model->getAllCategories();
		$data['last_publications'] = $this->List_Advise_model->getAllAdvisesBySubCatRel($sub_category_id);
		$data['list_sub_category'] = $this->List_Advise_model->getSubCategoryBySlug($subcategory_slug);
		$data['list_category_father'] = $this->List_Advise_model->getCategoryByID(getSubCategoryNfoByID($sub_category_id)->sub_category_father);

		// Template Information
		$data['layout'] = 'basic';
		$data['page'] = 'list/subcategory';

		$data['list_sub_category_by_fatherid'] = $this->List_Advise_model->getSubCategoryByFatherID($sub_category_id);

		// Page Information
		$data['title'] = 'Match and Trade | Listado General';
		$data['description'] = 'Consegui contactos comerciales de calidad hoy';
		$data['keywords'] = 'contactos; ventas, vendedores, bla';
		$data['author'] = 'Match Trade SRL';

		$this->load->view('layout/' . $data['layout'], $data);
	}

	public function singular($advise_code) {

		$advise_id =  getAdviseNfoByCode($advise_code)['advise_id'];
		$advise_author =  getAdviseNfoByCode($advise_code)['advise_author'];
		$user_id = getMyID();

		// Template Information
		$data['layout'] = 'basic';
		$data['page'] = 'list/singular_view';
		$data['advise_baseic_info'] = $this->List_Advise_model->getAdviseByCode($advise_code);
		$data['advise_baseic_tabs'] = $this->List_Advise_model->getSupportTabByAdviseID($advise_id);
		$data['advise_baseic_commisions'] = $this->List_Advise_model->getBaseCommisionByAdviseID($advise_id);
		$data['advise_txt_support'] = $this->List_Advise_model->getTextSupportByAdviseID($advise_id);
		$data['advise_terms_support'] = $this->List_Advise_model->getTermSupportByAdviseID($advise_id);
		$data['advise_img_support'] = $this->List_Advise_model->getImgSupportByAdviseID($advise_id);
		$data['advise_img_slide_support'] = $this->List_Advise_model->getImgSlideSupportByAdviseID($advise_id);
		$data['advise_author_references'] = $this->User_model->getMyReferencesByID($advise_author);

		$data['provider_id'] = $advise_author;
		$data['prevMatch'] = checkIfUserMatchAdvise($user_id, $advise_id);

		$advise_code = $data['advise_baseic_info']->result()[0]->advise_code;

		$data['advises_relations'] = $this->List_Advise_model->getAllAdvisesByRelations($advise_code);

		// Page Information
		$data['title'] = 'Match and Trade | Aviso';
		$data['description'] = 'Consegui contactos comerciales de calidad hoy';
		$data['keywords'] = 'contactos; ventas, vendedores, bla';
		$data['author'] = 'Match Trade SRL';

		$this->load->view('layout/' . $data['layout'], $data);
	}

	public function match_request() {

		if ($this->ion_auth->logged_in()) {
			$list_advise_id = $_POST['list_advise_id'];
			$provider_id = $_POST['provider_id'];
			$user_id = getMyID();
			$status = 1;

			// Prepare Match Collection
			$dataBasic = array(
			   'list_advise_id' => $list_advise_id,
			   'user_id' => $user_id,
				 'provider_id' => $provider_id,
				 'status' => $status
			);

			$this->db->insert('list_advise_match', $dataBasic);
		}
	}


	// Create and Edit Advises

	public function create_advise() {
		if ($this->ion_auth->logged_in()) {
			// Template Information
			$data['layout'] = 'basic';
			$data['page'] = 'list/create_advise';

			$data['categories_list'] = $this->List_Advise_model->getAllCategories();

			// Page Information
			$data['title'] = 'Match and Trade | Crear Aviso';
			$data['description'] = 'Consegui contactos comerciales de calidad hoy';
			$data['keywords'] = 'contactos; ventas, vendedores, bla';
			$data['author'] = 'Match Trade SRL';

			$this->load->view('layout/' . $data['layout'], $data);
		}
	}

	public function edit_advise($advise_code) {
		if ($this->ion_auth->logged_in()) {
			$data['advise_code'] = $advise_code;
			$advise_id = getAdviseNfoByCode($advise_code)['advise_id'];
			$data['categories_list'] = $this->List_Advise_model->getAllCategories();
			$data['data'] = $this->List_Advise_model->getAdviseByCode($advise_code);
			$data['advise_img_slide_support'] = $this->List_Advise_model->getImgSlideSupportByAdviseID($advise_id);
			$data['advise_sub_category'] = $this->List_Advise_model->getSubCategoriesByAdviseCode($advise_code);

			// Company Data
			$user_id = getMyID();
			$company_id = getCompanyTaxNfoBYUserID($user_id)['company_id'];
			$data['tax_information'] = $this->User_model->getMyTaxInformation($user_id);
			$data['categories_list'] = $this->List_Advise_model->getAllCategories();
			$data['company_sub_categories'] = $this->User_model->getMySubCategoriesByProviderID($company_id);
			$data['company_sub_categories_complete'] = $this->User_model->getMySubCategoriesCompleteByProviderID($company_id);

			// Template Information
			$data['layout'] = 'basic';
			$data['page'] = 'list/edit_advise';

			// Page Information
			$data['title'] = 'Match and Trade | Editar Aviso ' . $data['advise_code'];
			$data['description'] = 'Consegui contactos comerciales de calidad hoy';
			$data['keywords'] = 'contactos; ventas, vendedores, bla';
			$data['author'] = 'Match Trade SRL';

			$this->load->view('layout/' . $data['layout'], $data);
		}else{
			redirect('Home','refresh');
		}
	}

	// User Administration: Provider
	public function getAllMyAdvises()
	{
		if ($this->ion_auth->logged_in()) {
			// Template Information
			$data['layout'] = 'basic';
			$data['page'] = 'user/my_advises_list';

			// Page Information
			$data['title'] = 'Match and Trade | Crear Aviso';
			$data['description'] = 'Consegui contactos comerciales de calidad hoy';
			$data['keywords'] = 'contactos; ventas, vendedores, bla';
			$data['author'] = 'Match Trade SRL';

			// User Advises Retrieving
			$userID = getMyID();
			$data['my_advises'] = $this->List_Advise_model->getAdvisesByAuthorID($userID);

			$this->load->view('layout/' . $data['layout'], $data);
		}else{
			redirect('Home','refresh');
		}
	}


	public function deleteAdviseByID()
	{
		if ($this->ion_auth->logged_in()) {
			$advise_id = $_POST['advise_id'];
			$dataBasic = array(
			   'advise_status' => 3
			);
			$this->db->where('advise_id', $advise_id);
			$this->db->update('list_advise', $dataBasic);

			redirect('advise/my_advises/', 'refresh');
		}
	}

	// ACTIONS
	public function save_basic_advise()
	{
		if ($this->ion_auth->logged_in()) {
			// Generate Advuse Unique Code
			$advise_code = generateID();

			// list_advise
			$advise_name = $_POST['advise_name'];
			$advise_category = $_POST['category_id'];
			$advise_subcategory = $_POST['subcategory'];
			$advise_desc = $_POST['advise_desc'];
			$advise_baseprice = $_POST['advise_baseprice'];
			$advise_qty_base = $_POST['advise_qty_base'];
			$advise_publication_start = $_POST['advise_publication_start'];
			$advise_author = getMyID();

			// Prepare Advise Collection
			$dataBasic = array(
			   'advise_name' => $advise_name,
			   'advise_category' => $advise_category,
			   'advise_desc' => $advise_desc,
				 'advise_baseprice' => $advise_baseprice,
				 'advise_qty_base' => $advise_qty_base,
				 'advise_publication_start' => $advise_publication_start,
				 'advise_author' => $advise_author,
				 'advise_code' => $advise_code
			);
			$this->db->insert('list_advise', $dataBasic);

			// Insert Sub Categories
			// Clear Previusly Sub Categories
			$this->db->where('advise_code', $advise_code);
			$this->db->delete('list_advise_sub_category');
			// Save Sub Categories
			for ($i = 0; $i<count($advise_subcategory); $i++) {
				$sub_category_id = $advise_subcategory[$i];
				$dataBasic = array(
					'advise_code' => $advise_code,
					'sub_category_id' => $sub_category_id
				);
				$this->db->insert('list_advise_sub_category', $dataBasic);
			}

			redirect('advise/edit/' . $advise_code, 'refresh');
		}
	}

	public function edit_basic_advise()
	{
		if ($this->ion_auth->logged_in()) {
			// list_advise
			$advise_code = $_POST['advise_code'];
			$advise_name = $_POST['advise_name'];
			$advise_category = $_POST['category_id'];
			$advise_subcategory = $_POST['subcategory'];
			$advise_desc = $_POST['advise_desc'];
			$advise_baseprice = $_POST['advise_baseprice'];
			$advise_qty_base = $_POST['advise_qty_base'];
			$advise_publication_start = $_POST['advise_publication_start'];
			$advise_author = getMyID();

			// Insert General Step One Package
			$dataBasic = array(
			   'advise_name' => $advise_name,
			   'advise_category' => $advise_category,
			   'advise_desc' => $advise_desc,
				 'advise_baseprice' => $advise_baseprice,
				 'advise_qty_base' => $advise_qty_base,
				 'advise_publication_start' => $advise_publication_start,
				 'advise_author' => $advise_author,
				 'advise_code' => $advise_code
			);
			$this->db->where('advise_code', $advise_code);
			$this->db->update('list_advise', $dataBasic);

			// Insert Sub Categories
			// Clear Previusly Sub Categories
			$this->db->where('advise_code', $advise_code);
			$this->db->delete('list_advise_sub_category');
			// Save Sub Categories
			for ($i = 0; $i<count($advise_subcategory); $i++) {
				$sub_category_id = $advise_subcategory[$i];
				$dataBasic = array(
					'advise_code' => $advise_code,
					'sub_category_id' => $sub_category_id
				);
				$this->db->insert('list_advise_sub_category', $dataBasic);
			}

			redirect('advise/edit/' . $advise_code, 'refresh');
		}
	}

	// Base Commision Operations
	public function add_base_commission_advise()
	{
		if ($this->ion_auth->logged_in()) {
			$advise_id = $_POST['advise_id'];
			$qty_base = $_POST['qty_base'];
			$commission_percent = $_POST['commission_percent'];
			$discount_percent = $_POST['discount_percent'];
			$dataBasic = array(
			   'advise_id' => $advise_id,
			   'qty_base' => $qty_base,
			   'commission_percent' => $commission_percent,
				 'discount_percent' => $discount_percent
			);
			$this->db->insert('list_advise_base_commission', $dataBasic);
		}
	}

	public function delete_base_commission_advise($base_commission_id)
	{
		if ($this->ion_auth->logged_in()) {
			$this->db->where('base_commission_id', $base_commission_id);
			$this->db->delete('list_advise_base_commission');
		}
	}

	public function get_base_commission_advise_list($advise_id)
	{
		$list_crude = $this->List_Advise_model->getBaseCommisionByAdviseID($advise_id);
		$base_commission_list = array();
		foreach ($list_crude->result() as $bs_list) {
			$dataBasic = array(
			   'base_commission_id' => $bs_list->base_commission_id,
				 'advise_id' => $bs_list->advise_id,
			   'qty_base' => $bs_list->qty_base,
			   'commission_percent' => $bs_list->commission_percent,
				 'discount_percent' => $bs_list->discount_percent
			);
			array_push($base_commission_list, $dataBasic);
		}
		echo json_encode($base_commission_list);
	}
	// Base Commision Operations End


	// Support Tabs
	public function saveSupportTab()
	{
		if ($this->ion_auth->logged_in()) {
			$advise_id = $_POST['advise_id'];
			$tab_title = $_POST['tab_title'];
			$tab_order = $_POST['tab_order'];
			$tab_txt = $_POST['tab_txt'];

			$dataBasic = array(
				 'advise_id' => $advise_id,
				 'tab_support_title' => $tab_title,
				 'tab_support_order' => $tab_order,
				 'tab_support_text' => $tab_txt
			);
			$this->db->insert('list_advise_tab_support', $dataBasic);
		}
	}

	public function delete_supporttab_advise($base_commission_id)
	{
		if ($this->ion_auth->logged_in()) {
			$this->db->where('base_commission_id', $base_commission_id);
			$this->db->delete('list_advise_base_commission');
		}
	}

	public function get_support_tab_list($advise_id)
	{
		$list_crude = $this->List_Advise_model->getSupportTabByAdviseID($advise_id);
		$support_tab_list = array();
		foreach ($list_crude->result() as $bs_list) {
			$dataBasic = array(
			   'tab_support_id' => $bs_list->tab_support_id,
				 'advise_id' => $bs_list->advise_id,
			   'tab_support_title' => $bs_list->tab_support_title,
			   'tab_support_text' => $bs_list->tab_support_text,
				 'tab_support_order' => $bs_list->tab_support_order
			);
			array_push($support_tab_list, $dataBasic);
		}
		echo json_encode($support_tab_list);
	}
	// Support Tabs End

	// Get Support Text
	public function get_support_txt($advise_id)
	{
		$list_crude = $this->List_Advise_model->getTextSupportByAdviseID($advise_id);
		$support_txt_list = array();
		foreach ($list_crude->result() as $bs_list) {
			$dataBasic = array(
			   'txt_support_id' => $bs_list->txt_support_id,
				 'advise_id' => $bs_list->advise_id,
			   'txt_support_subtitle' => $bs_list->txt_support_subtitle,
			   'txt_support_maintext' => $bs_list->txt_support_maintext,
				 'txt_support_secondimg_title' => $bs_list->txt_support_secondimg_title,
				 'txt_support_secondimg_txt' => $bs_list->txt_support_secondimg_txt
			);
			array_push($support_txt_list, $dataBasic);
		}
		echo json_encode($support_txt_list);
	}
	public function save_support_txt()
	{
		if ($this->ion_auth->logged_in()) {
			// Vars
			$advise_id = $_POST['advise_id'];
			$advise_code = getAdviseNfoById($advise_id)['advise_code'];
			// Auxiliar
			$checker = calcIfTxtSupport($advise_id);
			// Datta Process
			$txt_support_subtitle = $_POST['txt_support_subtitle'];
			$txt_support_maintext = $_POST['txt_support_maintext'];
			$txt_support_secondimg_title = $_POST['txt_support_secondimg_title'];
			$txt_support_secondimg_txt = $_POST['txt_support_secondimg_txt'];
			// Condition
			if ($checker == 0) {
				$dataBasic = array(
					'advise_id' => $advise_id,
					'txt_support_subtitle' => $txt_support_subtitle,
					'txt_support_maintext' => $txt_support_maintext,
					'txt_support_secondimg_title' => $txt_support_secondimg_title,
					'txt_support_secondimg_txt' => $txt_support_secondimg_txt
				);
				$this->db->insert('list_advise_txt_support', $dataBasic);
			}else{
				$data = array(
					'txt_support_subtitle' => $txt_support_subtitle,
					'txt_support_maintext' => $txt_support_maintext,
					'txt_support_secondimg_title' => $txt_support_secondimg_title,
					'txt_support_secondimg_txt' => $txt_support_secondimg_txt
	      );
				$this->db->where('advise_id', $advise_id);
				$this->db->update('list_advise_txt_support', $data);
			}
			redirect('advise/edit/' . $advise_code, 'refresh');
		}
	}
	// Get Support Text End

	// Get Support Images
	public function get_support_img($advise_id)
	{
		$list_crude = $this->List_Advise_model->getImgSupportByAdviseID($advise_id);
		$support_img_list = array();
		foreach ($list_crude->result() as $bs_list) {
			$dataBasic = array(
			   'main_pic' => $bs_list->main_pic,
				 'second_pic' => $bs_list->second_pic
			);
			array_push($support_img_list, $dataBasic);
		}
		echo json_encode($support_img_list);
	}

	public function delete_img_slide_advise()
	{
		if ($this->ion_auth->logged_in()) {
			$advise_id = $_POST['advise_id'];
			$img_order = $_POST['img_order'];
			$this->db->where('advise_id', $advise_id);
			$this->db->where('img_order', $img_order);
			$this->db->delete('list_advise_img_slide_support');
		}
	}
	// Get Support Images End

}
