<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Prala extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
		$this->load->model('home/prala_model');
		$this->load->library('esg');
		$this->load->library('ZEA/Zea');
		$this->esg_model->init();
	}

	public function register()
	{
		$data['provinces'] = $this->prala_model->provinces();
		$data['is_prala'] = (@$_GET['t'] == md5('prala')) ? TRUE : FALSE;
		$this->esg->set_esg('extra_js', base_url('templates/AdminLTE/assets/dist/js/modules/prala/script.js'));
		$this->load->view('index', $data);
		$this->prala_model->prala_save();
	}

	public function index()
	{
		$this->load->view('index');
	}

	public function list()
	{
		$data['is_prala'] = (@$_GET['t'] == md5('prala')) ? TRUE : FALSE;
		$this->load->view('index', $data);
	}
	public function e()
	{
		$this->load->view('error');
	}

	public function regencies()
	{
		echo $this->prala_model->regencies();
	}
	public function districts()
	{
		echo $this->prala_model->districts();
	}
}