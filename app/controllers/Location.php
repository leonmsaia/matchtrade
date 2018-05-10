<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Location extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Location_model');
	}

	public function getAllPaises()
	{
		$list_crude = $this->Location_model->getPais();
		$list = array();
		foreach ($list_crude->result() as $bs_list) {
			$dataBasic = array(
			   'id' => $bs_list->id,
				 'nombre' => $bs_list->nombre
			);
			array_push($list, $dataBasic);
		}
		echo json_encode($list);
	}

	public function getProvinceByCountryID($countryID)
	{
		$list_crude = $this->Location_model->getProvinciaByPais($countryID);
		$list = array();
		foreach ($list_crude->result() as $bs_list) {
			$dataBasic = array(
			   'id' => $bs_list->id,
				 'nombre' => $bs_list->nombre
			);
			array_push($list, $dataBasic);
		}
		echo json_encode($list);
	}

	public function getPartyByProvinceID($provinceID)
	{
		$list_crude = $this->Location_model->getPartidoByProvincia($provinceID);
		$list = array();
		foreach ($list_crude->result() as $bs_list) {
			$dataBasic = array(
			   'id' => $bs_list->id,
				 'nombre' => $bs_list->nombre
			);
			array_push($list, $dataBasic);
		}
		echo json_encode($list);
	}

	public function getLocaliltyByPartyID($partyID)
	{
		$list_crude = $this->Location_model->getLocalidadByPartido($partyID);
		$list = array();
		foreach ($list_crude->result() as $bs_list) {
			$dataBasic = array(
			   'id' => $bs_list->id,
				 'nombre' => $bs_list->nombre
			);
			array_push($list, $dataBasic);
		}
		echo json_encode($list);
	}

	public function getSuburbByLocalityID($localityID)
	{
		$list_crude = $this->Location_model->getBarrioByLocalidad($localityID);
		$list = array();
		foreach ($list_crude->result() as $bs_list) {
			$dataBasic = array(
			   'id' => $bs_list->id,
				 'nombre' => $bs_list->nombre
			);
			array_push($list, $dataBasic);
		}
		echo json_encode($list);
	}

	public function getSubSuburbByLocalityID($suburb)
	{
		$list_crude = $this->Location_model->getSubBarrioByBarrio($suburb);
		$list = array();
		foreach ($list_crude->result() as $bs_list) {
			$dataBasic = array(
			   'id' => $bs_list->id,
				 'nombre' => $bs_list->nombre
			);
			array_push($list, $dataBasic);
		}
		echo json_encode($list);
	}

}
