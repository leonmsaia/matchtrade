<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index() {

		// Template Information
		$data['layout'] = 'basic';
		$data['page'] = 'home/home';

		// Page Information
		$data['title'] = 'Match and Trade | Inicio';
		$data['description'] = 'Consegui contactos comerciales de calidad hoy';
		$data['keywords'] = 'contactos; ventas, vendedores, bla';
		$data['author'] = 'Match Trade SRL';

		$this->load->view('layout/' . $data['layout'], $data);
	}

}
