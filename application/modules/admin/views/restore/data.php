<?php defined('BASEPATH') OR exit('No direct script access allowed');

if(!empty($title))
{
	foreach (glob(FCPATH.'images/modules/backup/*') as $value) 
	{
		$is_file = explode('/',$value);
		$is_file = end($is_file);
		if($title.'.zip' == $is_file)
		{
			$zip = new ZipArchive;
			if($zip->open($value) === TRUE)
			{
				// $table = array('config','comment','content','content_cat','content_tag','menu','menu_position','message','prala','prala_location','prala_location_bulan','prala_pendidikan','prala_user','prodi','user','user_login','user_role');
				// foreach ($table as $tbkey => $tbvalue) 
				// {
				// 	$dir = FCPATH.'images/modules/'.$tbvalue;
				// 	if(is_dir($dir))
				// 	{
				// 		recursive_rmdir($dir);
				// 		// unlink($dir);
				// 	}
				// }
				// $zip->extractTo(FCPATH.'images/modules/');
				// $zip->close();
				$esg_data = read_file(FCPATH.'images/modules/data.esg');
				if(!empty($esg_data))
				{
					$esg_data = json_decode($esg_data, TRUE);
					$data_message = array();
					foreach ($esg_data as $esdkey => $esdvalue) 
					{
						$data_insert = array();
						foreach ($esdvalue as $esdvkey => $esdvvalue) 
						{
							$data_insert[] = html_escape($esdvvalue);
						}
						
						$this->db->empty_table($esdkey);
						$this->db->insert_batch($esdkey, $data_insert);
						pr($this->db->last_query());
						// if($this->db->insert_batch($esdkey, $data_insert))
						// {
						// 	$data_message = 'insert to '.$esdkey.' Success';
						// }
					}
					foreach ($data_message as $dmkey => $dmvalue) 
					{
						msg($dmvalue,'success');
					}
					msg('success gan', 'success');
				}
			}
		}
	}
}else{
	msg('permission denied','danger');
}