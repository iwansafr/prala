<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Restore_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('esg_model');
		$this->load->library('esg');
		$this->load->library('ZEA/zea');
		// $this->load->dbforge();
	}

	public function restore($title = '')
	{
		if(!empty($title))
		{

		}
	}
}
