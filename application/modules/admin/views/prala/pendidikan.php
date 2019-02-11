<?php defined('BASEPATH') OR exit('No direct script access allowed');

switch ($type) {
	case 'edit':
		$this->load->view('pendidikan_edit');
		break;
	case 'list':
		$this->load->view('pendidikan_list');
		break;	
	
	default:
		$this->load->view('pendidikan_list');
		break;
}