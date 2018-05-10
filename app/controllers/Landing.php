<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Landing extends CI_Controller {

	public function sales() {

		// Template Information
		$data['layout'] = 'basic';
		$data['page'] = 'landing/sales';

		// Page Information
		$data['title'] = 'Match and Trade | Vendedor';
		$data['description'] = 'Consegui contactos comerciales de calidad hoy';
		$data['keywords'] = 'contactos; ventas, vendedores, bla';
		$data['author'] = 'Match Trade SRL';

		$this->load->view('layout/' . $data['layout'], $data);
	}

	public function provider() {

		// Template Information
		$data['layout'] = 'basic';
		$data['page'] = 'landing/provider';

		// Page Information
		$data['title'] = 'Match and Trade | Proveedor';
		$data['description'] = 'Consegui contactos comerciales de calidad hoy';
		$data['keywords'] = 'contactos; ventas, vendedores, bla';
		$data['author'] = 'Match Trade SRL';

		$this->load->view('layout/' . $data['layout'], $data);
	}

	public function successCase() {

		// Template Information
		$data['layout'] = 'basic';
		$data['page'] = 'landing/success';

		// Page Information
		$data['title'] = 'Match and Trade | Proveedor';
		$data['description'] = 'Consegui contactos comerciales de calidad hoy';
		$data['keywords'] = 'contactos; ventas, vendedores, bla';
		$data['author'] = 'Match Trade SRL';

		$this->load->view('layout/' . $data['layout'], $data);
	}



}
