<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('esg_model');
		$this->load->library('esg');
		// $this->load->library('ZEA/zea');
		if(is_admin() || is_root())
		{
			$this->sidebar_menu();
		}else if(is_editor())
		{
			$this->editor_menu();
		}else{
			$this->siswa_menu();
		}
		$this->site();
	}

	public function visitor()
	{
		$data = array();
		// $data['browser']['chrome'] = $this->db->query("SELECT id FROM visitor WHERE browser LIKE '%Chrome%'")->num_rows();
		// $data['browser']['firefox'] = $this->db->query("SELECT id FROM visitor WHERE browser LIKE '%Firefox%'")->num_rows();
		$city = $this->db->query('SELECT city FROM visitor WHERE 1 GROUP BY city')->result_array();
		$region = $this->db->query('SELECT region FROM visitor WHERE 1 GROUP BY region')->result_array();
		$country = $this->db->query('SELECT country FROM visitor WHERE 1 GROUP BY country')->result_array();
		$browser = $this->db->query('SELECT browser FROM visitor WHERE 1 GROUP BY browser')->result_array();
		if(!empty($city))
		{
			foreach ($city as $key => $value) 
			{
				if(!empty($value['city']))
				{
					$data['city'][$value['city']] = $this->db->query('SELECT id FROM visitor WHERE city = ?', $value['city'])->num_rows();
				}
			}
		}
		if(!empty($region))
		{
			foreach ($region as $key => $value) 
			{
				if(!empty($value['region']))
				{
					$data['region'][$value['region']] = $this->db->query('SELECT id FROM visitor WHERE region = ?', $value['region'])->num_rows();
				}
			}
		}
		if(!empty($country))
		{
			foreach ($country as $key => $value) 
			{
				if(!empty($value['country']))
				{
					$data['country'][$value['country']] = $this->db->query('SELECT id FROM visitor WHERE country = ?', $value['country'])->num_rows();
				}
			}
		}
		if(!empty($browser))
		{
			foreach ($browser as $key => $value) 
			{
				if(!empty($value['browser']))
				{
					$data['browser'][$value['browser']] = $this->db->query('SELECT id FROM visitor WHERE browser = ?', $value['browser'])->num_rows();
				}
			}
		}
		if(!empty($data))
		{
			$this->esg->set_esg('visitor', $data);
		}
	}

	public function sidebar_menu()
	{
		$data = array();
		$menu = array(
		  array(
		    'title' => 'Dashboard',
		    'icon' => 'fa-tachometer-alt',
		    'link' => base_url('admin')
		  ),
		  array(
		    'title' => 'Menu',
		    'icon' => 'fa-list',
		    'link' => base_url('admin/menu/list'),
		    'list' => array(
		    	array(
		        'title' => 'Add Menu',
		        'icon' => 'fa-pencil-alt',
		        'link' => base_url('admin/menu/edit')
		      ),
		      array(
		        'title' => 'Menu List',
		        'icon' => 'fa-list',
		        'link' => base_url('admin/menu/list')
		      ),
		      array(
		        'title' => 'Menu Position',
		        'icon' => 'fa-list',
		        'link' => base_url('admin/menu/position')
		      ),
		    )
		  ),
		  array(
		    'title' => 'Content',
		    'icon' => 'fa-file-alt',
		    'link' => base_url('admin/content/'),
		    'list' => array(
		    	array(
		        'title' => 'Category',
		        'icon' => 'fa-list',
		        'link' => base_url('admin/content/category')
		      ),
		      array(
		        'title' => 'Add Content',
		        'icon' => 'fa-pencil-alt',
		        'link' => base_url('admin/content/edit')
		      ),
		      array(
		        'title' => 'Content List',
		        'icon' => 'fa-list',
		        'link' => base_url('admin/content/list')
		      ),
		      array(
		        'title' => 'Tag',
		        'icon' => 'fa-list',
		        'link' => base_url('admin/content/tag')
		      ),
		      array(
		        'title' => 'Image',
		        'icon' => 'fa-list',
		        'link' => base_url('admin/content/image')
		      ),
		    )
		  ),
		  array(
		    'title' => 'Status Prala Nautika',
		    'icon' => 'fa-file-alt',
		    'link' => base_url('admin/content/'),
		    'list' => array(
		      array(
		        'title' => 'Tambah Status Prala Nautika',
		        'icon' => 'fa-pencil-alt',
		        'link' => base_url('admin/prala/pendidikan/edit?t=nautika')
		      ),
		      array(
		        'title' => 'Data Status Prala Nautika',
		        'icon' => 'fa-list',
		        'link' => base_url('admin/prala/pendidikan/list?t=nautika')
		      ),
		      array(
		        'title' => 'Program Studi',
		        'icon' => 'fa-list',
		        'link' => base_url('admin/prala/prodi')
		      ),
		    )
		  ),
		  array(
		    'title' => 'Status Prala Teknika',
		    'icon' => 'fa-file-alt',
		    'link' => base_url('admin/content/'),
		    'list' => array(
		      array(
		        'title' => 'Tambah Status Prala Teknika',
		        'icon' => 'fa-pencil-alt',
		        'link' => base_url('admin/prala/pendidikan/edit?t=teknika')
		      ),
		      array(
		        'title' => 'Data Status Prala Teknika',
		        'icon' => 'fa-list',
		        'link' => base_url('admin/prala/pendidikan/list?t=teknika')
		      ),
		      array(
		        'title' => 'Program Studi',
		        'icon' => 'fa-list',
		        'link' => base_url('admin/prala/prodi')
		      ),
		    )
		  ),
		  array(
		    'title' => 'Daftar Ulang Pra Prala',
		    'icon' => 'fa-file-alt',
		    'link' => base_url('admin/content/'),
		    'list' => array(
		      array(
		        'title' => 'Tambah DU Pra Prala',
		        'icon' => 'fa-pencil-alt',
		        'link' => base_url('admin/prala/register')
		      ),
		      array(
		        'title' => 'Data DU Pra Prala',
		        'icon' => 'fa-list',
		        'link' => base_url('admin/prala/list')
		      ),
		      array(
		        'title' => 'DU Prala Account',
		        'icon' => 'fa-user-secret',
		        'link' => base_url('admin/prala/prala_account')
		      ),
		    )
		  ),
		  array(
		    'title' => 'Daftar Ulang Paska Prala',
		    'icon' => 'fa-file-alt',
		    'link' => base_url('admin/content/'),
		    'list' => array(
		      array(
		        'title' => 'Tambah DU Paska Prala',
		        'icon' => 'fa-pencil-alt',
		        'link' => base_url('admin/prala/register?t='.md5('paska'))
		      ),
		      array(
		        'title' => 'Data DU Paska Prala',
		        'icon' => 'fa-list',
		        'link' => base_url('admin/prala/list?t='.md5('paska'))
		      ),
		    )
		  ),
		  array(
		    'title' => 'Laporan Prala Nautika',
		    'icon' => 'fa-file-alt',
		    'link' => base_url('admin/prala/'),
		    'list' => array(
		      array(
		        'title' => 'Data Laporan Location',
		        'icon' => 'fa-list',
		        'link' => base_url('admin/prala/location_list?t=nautika')
		      ),
		    )
		  ),
		  array(
		    'title' => 'Laporan Prala Teknika',
		    'icon' => 'fa-file-alt',
		    'link' => base_url('admin/prala/'),
		    'list' => array(
		      array(
		        'title' => 'Data Laporan Location',
		        'icon' => 'fa-list',
		        'link' => base_url('admin/prala/location_list?t=teknika')
		      ),
		    )
		  ),
		  array(
		    'title' => 'User',
		    'icon' => 'fa-user',
		    'link' => base_url('admin/user/list'),
		    'list' => array(
		      array(
		        'title' => 'User List',
		        'icon' => 'fa-dot-circle',
		        'link' => base_url('admin/user/list')
		      ),
		      array(
		        'title' => 'User Add',
		        'icon' => 'fa-dot-circle',
		        'link' => base_url('admin/user/edit')
		      ),
		      array(
		        'title' => 'User Role',
		        'icon' => 'fa-dot-circle',
		        'link' => base_url('admin/user/role'),
		      ),
		    )
		  ),
		  array(
		    'title' => 'data',
		    'icon' => 'fa-database',
		    'link' => base_url('admin/visitor'),
		    'list' => array(
		    	array(
		        'title' => 'Visitor',
		        'icon' => 'fa-chart-bar',
		        'link' => base_url('admin/visitor')
		      )
		    )
		  ),
		  array(
		    'title' => 'Configuration',
		    'icon' => 'fa-cog',
		    'link' => base_url('admin/config/'),
		    'list' => array(
		      array(
		        'title' => 'logo',
		        'icon' => 'fa-cog',
		        'link' => base_url('admin/config/logo')
		      ),
		      array(
		        'title' => 'site',
		        'icon' => 'fa-cog',
		        'link' => base_url('admin/config/site')
		      ),
		      array(
		        'title' => 'templates',
		        'icon' => 'fa-cog',
		        'link' => base_url('admin/config/templates')
		      ),
		      array(
		        'title' => 'contact',
		        'icon' => 'fa-cog',
		        'link' => base_url('admin/config/contact')
		      ),
		      array(
		        'title' => 'style',
		        'icon' => 'fa-cog',
		        'link' => base_url('admin/config/style')
		      ),
		      array(
		        'title' => 'script',
		        'icon' => 'fa-cog',
		        'link' => base_url('admin/config/script')
		      ),
		      array(
		        'title' => 'backup',
		        'icon' => 'fa-download',
		        'link' => base_url('admin/backup')
		      ),
		      array(
		        'title' => 'restore',
		        'icon' => 'fa-upload',
		        'link' => base_url('admin/restore')
		      ),
		    )
		  ),
		);
		$data['menu'] = $menu;
		$this->esg->set_esg('sidebar_menu', $data['menu']);
	}

	public function editor_menu()
	{
		$data = array();
		$menu = array(
		  array(
		    'title' => 'Dashboard',
		    'icon' => 'fa-tachometer-alt',
		    'link' => base_url('admin')
		  ),
		  array(
		    'title' => 'Status Prala Nautika',
		    'icon' => 'fa-file-alt',
		    'link' => base_url('admin/content/'),
		    'list' => array(
		      array(
		        'title' => 'Data Status Prala Nautika',
		        'icon' => 'fa-list',
		        'link' => base_url('admin/prala/pendidikan/list?t=nautika')
		      )
		    )
		  ),
		  array(
		    'title' => 'Status Prala Teknika',
		    'icon' => 'fa-file-alt',
		    'link' => base_url('admin/content/'),
		    'list' => array(
		      array(
		        'title' => 'Data Status Prala Teknika',
		        'icon' => 'fa-list',
		        'link' => base_url('admin/prala/pendidikan/list?t=teknika')
		      )
		    )
		  ),
		  array(
		    'title' => 'Laporan Prala Nautika',
		    'icon' => 'fa-file-alt',
		    'link' => base_url('admin/prala/'),
		    'list' => array(
		      array(
		        'title' => 'Data Laporan Location',
		        'icon' => 'fa-list',
		        'link' => base_url('admin/prala/location_list?t=nautika')
		      ),
		    )
		  ),
		  array(
		    'title' => 'Laporan Prala Teknika',
		    'icon' => 'fa-file-alt',
		    'link' => base_url('admin/prala/'),
		    'list' => array(
		      array(
		        'title' => 'Data Laporan Location',
		        'icon' => 'fa-list',
		        'link' => base_url('admin/prala/location_list?t=teknika')
		      ),
		    )
		  ),
		);
		$data['menu'] = $menu;
		$this->esg->set_esg('sidebar_menu', $data['menu']);
	}

	public function siswa_menu()
	{
		$data = array();
		$menu = array(
		  array(
		    'title' => 'Dashboard',
		    'icon' => 'fa-tachometer-alt',
		    'link' => base_url('admin')
		  ),
		  array(
		    'title' => 'Daftar Ulang Pra Prala',
		    'icon' => 'fa-file-alt',
		    'link' => base_url('admin/content/'),
		    'list' => array(
		      array(
		        'title' => 'Recap Data DU Pra Prala',
		        'icon' => 'fa-list',
		        'link' => base_url('admin/prala/recap')
		      ),
		    )
		  ),
		  array(
		    'title' => 'Daftar Ulang Paska Prala',
		    'icon' => 'fa-file-alt',
		    'link' => base_url('admin/content/'),
		    'list' => array(
		      array(
		        'title' => 'Tambah DU Paska Prala',
		        'icon' => 'fa-pencil-alt',
		        'link' => base_url('admin/prala/register?t='.md5('paska'))
		      ),
		      array(
		        'title' => 'Recap Data DU Paska Prala',
		        'icon' => 'fa-list',
		        'link' => base_url('admin/prala/recap?t='.md5('paska'))
		      ),
		    )
		  ),
		  array(
		    'title' => 'Laporan Prala Nautika',
		    'icon' => 'fa-file-alt',
		    'link' => base_url('admin/prala/'),
		    'list' => array(
		      array(
		        'title' => 'Data Laporan Location',
		        'icon' => 'fa-list',
		        'link' => base_url('admin/prala/location_list?t=nautika')
		      ),
		    )
		  ),
		  array(
		    'title' => 'Laporan Prala Teknika',
		    'icon' => 'fa-file-alt',
		    'link' => base_url('admin/prala/'),
		    'list' => array(
		      array(
		        'title' => 'Data Laporan Location',
		        'icon' => 'fa-list',
		        'link' => base_url('admin/prala/location_list?t=teknika')
		      ),
		    )
		  ),
		);
		$data['menu'] = $menu;
		$this->esg->set_esg('sidebar_menu', $data['menu']);
	}

	public function site()
	{
		$data = array();
		$data['logo'] = $this->esg->get_config('logo');
		$data['site'] = $this->esg->get_config('site');
		$this->esg->set_esg('site', $data);
	}

	public function home()
	{
		$data = array();
		$data['content'] = $this->db->query('SELECT id FROM content')->num_rows();
		$data['category'] = $this->db->query('SELECT id FROM content_cat')->num_rows();
		$data['tag'] = $this->db->query('SELECT id FROM content_tag')->num_rows();
		$data['menu'] = $this->db->query('SELECT id FROM menu')->num_rows();
		$data['menu_position'] = $this->db->query('SELECT id FROM menu_position')->num_rows();
		$data['user'] = $this->db->query('SELECT id FROM user')->num_rows();
		$data['user_role'] = $this->db->query('SELECT id FROM user_role')->num_rows();
		$data['message'] = $this->db->query('SELECT id FROM message WHERE status = 1')->num_rows();
		$this->esg->set_esg('home', $data);
	}

}