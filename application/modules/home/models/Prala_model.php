<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Prala_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('esg');
		$this->load->library('ZEA/zea');
		$this->load->model('esg_model');
	}
	
	public function regencies()
	{
		$data = array('status'=>FALSE,'msg'=>'error');
		$this->db->order_by('name','ASC');
		$tmp = $this->db->get('regencies')->result_array();
		if(!empty($tmp))
		{
			$p_tmp = $this->db->get('provinces')->result_array();
			if(!empty($p_tmp))
			{
				$tmp_data = array();
				foreach ($p_tmp as $key => $value)
				{
					foreach ($tmp as $tkey => $tvalue)
					{
						if($value['id'] == $tvalue['province_id'])
						{
							$tmp_data[$value['id']][] = $tvalue;
						}
					}
				}
				$data = array('status'=>TRUE,'msg'=>'success','data'=>$tmp_data);
			}
		}
		$data = json_encode($data);
		return $data;
	}

	public function districts()
	{
		$data = array('status'=>FALSE,'msg'=>'error');
		$this->db->order_by('name','ASC');
		$tmp = $this->db->get('districts')->result_array();
		if(!empty($tmp))
		{
			$p_tmp = $this->db->get('regencies')->result_array();
			if(!empty($p_tmp))
			{
				$tmp_data = array();
				foreach ($p_tmp as $key => $value)
				{
					foreach ($tmp as $tkey => $tvalue)
					{
						if($value['id'] == $tvalue['regency_id'])
						{
							$tmp_data[$value['id']][] = $tvalue;
						}
					}
				}
				$data = array('status'=>TRUE,'msg'=>'success','data'=>$tmp_data);
			}
		}
		$data = json_encode($data);
		return $data;
	}

	public function provinces()
	{
		$provinces[0][] = array('id'=>'0', 'name'=>'Pilih Provinsi');
		$provinces[] = $this->db->query('SELECT id, name FROM provinces ORDER BY name ASC')->result_array();
		$provinces = array_merge($provinces[0],$provinces[1]);
		$provinces = assoc($provinces, 'id','name');
		return $provinces;
	}

}