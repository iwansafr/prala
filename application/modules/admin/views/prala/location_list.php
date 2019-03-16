<?php defined('BASEPATH') OR exit('No direct script access allowed');
$t = array('nautika'=>'1','teknika'=>'2');
$status = @$t[$_GET['t']];

if(!empty($status))
{
	$is_siswa_where = '';
	if(@$user['level'] == 5)
	{
		$is_siswa_where = ' AND no_registration = "'.$user['username'].'" ';
	}
	$status_active = array('Off','On');
	$form = new zea();
	$form->init('roll');
	$form->setTable('prala_pendidikan');
	$form->search();
	$form->join('prala','ON(prala.id=prala_pendidikan.prala_id)','prala.id,prala.no_registration AS reg_id,prala.nama,prala.kode_pelaut,prala_pendidikan.prodi_id,prala.nama_sekolah,prala.status_active');
	$delimeter = !empty($_GET['keyword']) ? 'AND' : '';
	$form->setWhere(" {$delimeter} prala_pendidikan.prodi_id != '' {$is_siswa_where} AND prala_pendidikan.status= {$status} group by prala.id");
	$form->setNumbering(TRUE);
	$form->addInput('id','hidden');
	$form->addInput('kode_pelaut','plaintext');
	$form->setLabel('kode_pelaut',' Kode Pelaut');
	$form->addInput('nama','link');
	$form->setLink('nama', base_url('admin/prala/location_detail'),'reg_id');
	$form->setExtLink('nama','&t='.@$_GET['t']);
	$form->addInput('prodi_id','dropdown');
	$form->tableOptions('prodi_id','prodi','id','title');
	$form->setAttribute('prodi_id','disabled');
	$form->setLabel('prodi_id','Program Studi');
	$form->addInput('nama_sekolah','plaintext');
	$form->setLabel('nama_sekolah','Asal Sekolah');
	$form->addInput('status_active','dropdown');
	$form->setOptions('status_active', $status_active);
	$form->setLabel('status_active','Status On/Off');
	$form->setAttribute('status_active','disabled');
	$form->form();
	// pr($form->getData());
}else{
	echo msg('your url is not valid', 'danger');
}