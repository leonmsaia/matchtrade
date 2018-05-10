<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Internal extends CI_Controller {

	public function about() {

		// Template Information
		$data['layout'] = 'basic';
		$data['page'] = 'about/about';

		// Page Information
		$data['title'] = 'Match and Trade | Sobre Nosotros';
		$data['description'] = 'Consegui contactos comerciales de calidad hoy';
		$data['keywords'] = 'contactos; ventas, vendedores, bla';
		$data['author'] = 'Match Trade SRL';

		$this->load->view('layout/' . $data['layout'], $data);
	}

	public function contact() {

		// Template Information
		$data['layout'] = 'basic';
		$data['page'] = 'contact/contact';

		// Page Information
		$data['title'] = 'Match and Trade | Contacto';
		$data['description'] = 'Consegui contactos comerciales de calidad hoy';
		$data['keywords'] = 'contactos; ventas, vendedores, bla';
		$data['author'] = 'Match Trade SRL';

		$this->load->view('layout/' . $data['layout'], $data);
	}

	public function terms() {

		// Template Information
		$data['layout'] = 'basic';
		$data['page'] = 'legal/terms';

		// Page Information
		$data['title'] = 'Match and Trade | Terminos y Condiciones';
		$data['description'] = 'Consegui contactos comerciales de calidad hoy';
		$data['keywords'] = 'contactos; ventas, vendedores, bla';
		$data['author'] = 'Match Trade SRL';

		$this->load->view('layout/' . $data['layout'], $data);
	}

	public function privacity() {

		// Template Information
		$data['layout'] = 'basic';
		$data['page'] = 'legal/terms';

		// Page Information
		$data['title'] = 'Match and Trade | Terminos y Condiciones';
		$data['description'] = 'Consegui contactos comerciales de calidad hoy';
		$data['keywords'] = 'contactos; ventas, vendedores, bla';
		$data['author'] = 'Match Trade SRL';

		$this->load->view('layout/' . $data['layout'], $data);
	}

}
