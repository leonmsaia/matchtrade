<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload extends CI_Controller {

	public function uploadMainPic()
	{
		if ($this->ion_auth->logged_in()) {
			// Config Upload
			$advise_code = $_POST['advise_code'];
			$ext = '.' . pathinfo($_FILES['userfile']['name'], PATHINFO_EXTENSION);
			$file = 'userfile';
			$name = 'main_picture';
			$path = 'pictures';
			$type = 'advises';
			$deletable = true;

			// Get Advise ID
			$advise_id = getAdviseNfoByCode($advise_code)['advise_id'];

			// Create Path for DB
			$main_pic = $type . '/' . $advise_code . '/' . $path . '/' . $name .  $ext;

			// Upload DB
			$dataBasic = array(
			   'main_pic' => $main_pic
			);

			// Update DB
			$this->db->where('advise_id', $advise_id);
			$this->db->update('list_advise_img_support', $dataBasic);

			// Do Upload File
			uploadFile($advise_code, $file, $name, $path, $type, $ext, $deletable);
		}
	}

	public function uploadSecondaryPic()
	{
		if ($this->ion_auth->logged_in()) {
			// Config Upload
			$advise_code = $_POST['advise_code'];
			// $ext = '.png';
			$ext = '.' . pathinfo($_FILES['userfile_two']['name'], PATHINFO_EXTENSION);
			$file = 'userfile_two';
			$name = 'secondary_pic';
			$path = 'pictures';
			$type = 'advises';
			$deletable = true;

			// Get Advise ID
			$advise_id = getAdviseNfoByCode($advise_code)['advise_id'];

			// Create Path for DB
			$main_pic = $type . '/' . $advise_code . '/' . $path . '/' . $name .  $ext;
			// $main_pic = 'test';

			// Upload DB
			$dataBasic = array(
			   'second_pic' => $main_pic
			);

			// Update DB
			$this->db->where('advise_id', $advise_id);
			$this->db->update('list_advise_img_support', $dataBasic);

			// Do Upload File
			uploadFile($advise_code, $file, $name, $path, $type, $ext, $deletable);
		}
	}

	public function uploadSlidePic()
	{
		if ($this->ion_auth->logged_in()) {
			// Config Upload
			$advise_code = $_POST['advise_code'];
			$advise_order = $_POST['slide_order'];

			// $ext = '.png';
			$ext = '.' . pathinfo($_FILES['slide_pic']['name'], PATHINFO_EXTENSION);
			$file = 'slide_pic';
			$name = 'slide' . $advise_order;
			$path = 'pictures';
			$type = 'advises';
			$deletable = true;

			// Get Advise ID
			$advise_id = getAdviseNfoByCode($advise_code)['advise_id'];

			// Create Path for DB
			$main_pic = $type . '/' . $advise_code . '/' . $path . '/' . $name .  $ext;
			// $main_pic = 'test';

			// Upload DB

			$dataBasic = array(
				'advise_id' => $advise_id,
				'img_path' => $main_pic,
				'img_order' => $advise_order
			);

			// Update OR Insert DB
			$checkStatusOfSlidePosition = checkIfSlidePicExist($advise_id, $advise_order);
			if ($checkStatusOfSlidePosition == true) {
				$this->db->where('advise_id', $advise_id);
				$this->db->update('list_advise_img_support', $dataBasic);
			}else{
				$this->db->where('advise_id', $advise_id);
				$this->db->insert('list_advise_img_slide_support', $dataBasic);
			}

			// Do Upload File
			uploadFile($advise_code, $file, $name, $path, $type, $ext, $deletable);
		}
	}
}
