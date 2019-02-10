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

	public function prala_save()
	{
		$last_id = $this->zea->get_insert_id();
		$id = $this->input->get('id');
		if(!empty($last_id) || !empty($id))
		{
		  $last_id = !empty($id) ? $id : $last_id;
		  if(!empty($_POST))
		  {
		    $post = array();
		    
		    $str   = 'RPR-'.date('Y').'-';
				$zero  = 3;
				$l_id  = strlen($last_id);
				$zero  = $zero - $l_id;
				for($i = 0;$i<$zero;$i++)
				{
					$str .= '0';
				}
				$str .= $last_id;
		    $post['no_registration'] = $str;
		    if(!empty($post))
		    {
		      $this->zea->set_data('prala', $last_id, $post);
		    }
		  }
		}
	}
}