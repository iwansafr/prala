<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Prala extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('home_model');
		$this->load->model('prala_model');
		$this->load->helper('content');
		$this->load->library('esg');
		$this->load->library('ZEA/Zea');
	}

	public function register()
	{
		$this->home_model->home();
		$data['provinces'] = $this->prala_model->provinces();
		$data['is_prala'] = (@$_GET['t'] == md5('prala')) ? TRUE : FALSE;
		$this->esg->set_esg('extra_js', base_url('templates/AdminLTE/assets/dist/js/modules/prala/script.js'));
		$this->load->view('index', $data);
	}

	public function pendidikan($view)
	{
		$data = array();
		if(!empty($_GET['reg_id']))
		{
			$data = $this->prala_model->get_prala(@$_GET['reg_id']);
		}
		// else if(!empty($_GET['id']))
		// {
		// 	$data = $this->prala_model->get_prala(@$_GET['id']);
		// }
		$this->load->view('index', array('type'=>$view,'data'=>$data));
	}

	public function index()
	{
		$this->home_model->home();
		$this->load->view('index');
	}

	public function list()
	{
		$this->load->view('index');
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