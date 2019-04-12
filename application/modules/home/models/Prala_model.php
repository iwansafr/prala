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
	
	public function delete_prala($data = array())
	{
		if(!empty($data))
		{
			foreach ($data as $key => $id)
      {
      	$username = $this->db->get_where('prala_user', ['prala_id'=>$id])->row_array();
      	$username = @$username['username'];
      	if(!empty($username))
      	{
	        $this->db->delete('user', array('username'=>$username));
      	}
        $this->db->delete('prala_user', array('prala_id'=>$id));
      }
		}
	}


	public function get_prodi($id)
	{
		$data = array();
		if(!empty($id))
		{
			$data = $this->db->query('SELECT * FROM prodi WHERE id = ? LIMIT 1', $id)->row_array();
		}
		return $data;	
	}

	public function get_pendidikan($prala_id = 0)
	{
		$data = array();
		if(!empty($prala_id))
		{
			$data = $this->db->query('SELECT * FROM prala_pendidikan WHERE prala_id = ? ORDER BY id DESC LIMIT 1', $prala_id)->row_array();
		}
		return $data;
	}

	public function get_prala_location($pendidikan_id = 0)
	{
		$data = array();
		if(!empty($pendidikan_id))
		{
			$data['location'] = $this->db->query('SELECT * FROM prala_location WHERE prala_pendidikan_id = ? ORDER BY id DESC LIMIT 1', $pendidikan_id)->row_array();
			if(empty($data['location']))
			{
				$insert = array(
					'prala_pendidikan_id' => $pendidikan_id
				);
				// for($i=1;$i<13;$i++){
				// 	$insert['bulan_'.$i] = json_encode(array('latitude'=>'','longitude'=>'','tanggal'=>''));
				// }
				$this->db->insert('prala_location', $insert);
			}
			$tmp = $this->db->query('SELECT * FROM prala_location_bulan WHERE name LIKE ? ', array('location_'.$data['location']['id'].'_%'))->result_array();
			foreach($tmp AS $key => $value){
				$data['bulan'][$value['name']] = $value;
			}
		}
		return $data;
	}

	public function get_prala($reg_id)
	{
		$data = array();
		if(!empty($reg_id))
		{
			$data = $this->db->query('SELECT * FROM prala WHERE no_registration = ? OR id = ? LIMIT 1', array($reg_id,$reg_id))->row_array();
		}
		return $data;
	}

	public function get_recap($id = 0)
	{
		if(!empty($id))
		{
			$data = $this->db->get_where('prala', ['id'=>$id])->row_array();
			$navigation = $this->esg->get_esg('navigation');
			$length_nav = count($navigation['array'])-1;
			$navigation['array'][$length_nav] = $data['no_registration'];
			$this->esg->set_esg('navigation', $navigation);
		}else{
			$user = $this->session->userdata(base_url().'_logged_in');
			$data = array();
			if(!empty($user))
			{
				$data = $this->db->get_where('prala', "no_registration = '{$user['username']}'")->row_array();
			}
		}
		if(!empty($data))
		{
			foreach ($data as $key => $value) 
			{
				switch ($key) {
					case 'kecamatan':
						$tmp_key = $this->db->query('SELECT name FROM districts WHERE id = ? LIMIT 1',$value)->row_array();
						$data[$key] = $tmp_key['name'];
						break;
					case 'kabupaten':
						$tmp_key = $this->db->query('SELECT name FROM regencies WHERE id = ? LIMIT 1',$value)->row_array();
						$data[$key] = $tmp_key['name'];
						break;
					case 'provinsi':
						$tmp_key = $this->db->query('SELECT name FROM provinces WHERE id = ? LIMIT 1',$value)->row_array();
						$data[$key] = $tmp_key['name'];
						break;	
					case 'kecamatan_sekolah':
						$tmp_key = $this->db->query('SELECT name FROM districts WHERE id = ? LIMIT 1',$value)->row_array();
						$data[$key] = $tmp_key['name'];
						break;
					case 'kabupaten_sekolah':
						$tmp_key = $this->db->query('SELECT name FROM regencies WHERE id = ? LIMIT 1',$value)->row_array();
						$data[$key] = $tmp_key['name'];
						break;
					case 'provinsi_sekolah':
						$tmp_key = $this->db->query('SELECT name FROM provinces WHERE id = ? LIMIT 1',$value)->row_array();
						$data[$key] = $tmp_key['name'];
						break;		
					
					default:
						
						break;
				}
			}
		}
		return $data;
	}

	public function get_all_prala()
	{
		return $this->db->get_where('prala','status = 2')->result_array();
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
		    	if((@intval($_POST['status']) == 1) && (!empty($last_id)) && (empty($id)))
		    	{
		    		$this->db->order_by('id','DESC');
		    		$this->db->select('id');
		    		$siswa_role_id = $this->db->get_where('user_role','level = 5')->row_array();

		    		if(!empty($siswa_role_id))
		    		{
			    		$pwd = substr(md5(time()),0,6);
			    		$prala_user = array(
			    			'prala_id' => $last_id,
			    			'username' => $str,
			    			'password' => $pwd,
			    		);

			    		$siswa_user = array(
			    			'username'     => $str,
			    			'password'     => encrypt($pwd),
			    			'email'        => $str.'@esoftgreat.com',
			    			'user_role_id' => $siswa_role_id['id'],
			    			'active'       => '1',
			    		);

			    		$this->zea->set_data('prala_user', 0, $prala_user);
			    		$this->zea->set_data('user', 0, $siswa_user);
			    		// header('location : '.base_url('home/prala/account_information/?u='.$str.'&p='.$pwd));
			    		redirect('home/prala/account_information/?u='.urlencode($str).'&p='.urlencode($pwd));
		    		}else{
			    		redirect('home/prala/account_information');
		    		}
		    	}
		    }
		  }
		}
	}
}