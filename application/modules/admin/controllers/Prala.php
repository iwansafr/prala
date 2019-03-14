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

	public function location_list()
	{
		$this->load->view('index');
	}
	
	public function location_detail()
	{
		$data = array();
		if(!empty($_GET['reg_id']))
		{
			$data = $this->prala_model->get_prala(@$_GET['reg_id']);
		}
		$this->load->view('index', array('data'=>$data));
	}
	public function location_detail_report()
	{
		$data = array();
		if(!empty($_GET['reg_id']))
		{
			$data = $this->prala_model->get_prala(@$_GET['reg_id']);
		}
		$this->load->view('prala/location_detail', array('data'=>$data));
		if(@$_GET['t'] == 'pdf')
		{
			?>
			<script type="text/javascript">
				window.print();
			</script>
			<?php
		}
	}
	public function location_edit()
	{
		$data = array();
		if(!empty($_GET['reg_id']))
		{
			$data = $this->prala_model->get_prala(@$_GET['reg_id']);
		}
		$this->load->view('index', array('data'=>$data));
	}

	public function register()
	{
		$data['provinces'] = $this->prala_model->provinces();
		$data['is_prala'] = (@$_GET['t'] == md5('prala')) ? TRUE : FALSE;
		$this->esg->set_esg('extra_js', base_url('templates/AdminLTE/assets/dist/js/modules/prala/script.js'));
		$this->load->view('index', $data);
		$this->prala_model->prala_save();
	}

	public function prodi()
	{
		$this->load->view('index');
	}

	public function index()
	{
		$this->load->view('index');
	}

	public function list()
	{
		$data['is_paska'] = (@$_GET['t'] == md5('paska')) ? TRUE : FALSE;
		$this->load->view('index', $data);
	}
	public function list_report()
	{
		$data['is_prala'] = (@$_GET['t'] == md5('prala') && @$_GET['f'] == 'pdf') ? TRUE : FALSE;
		$data['data'] = $this->prala_model->get_all_prala();
		$this->esg->set_esg('extra_css', base_url('templates/AdminLTE/assets/bootstrap/css/bootstrap.min.css'));
		$this->load->view('prala/list_report', $data);
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