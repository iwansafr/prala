<?php defined('BASEPATH') OR exit('No direct script access allowed');
$t = array('nautika'=>'1','teknika'=>'2');
$status = @$t[$_GET['t']];

if(!empty($status))
{
	$link = (is_admin() || is_root()) ? 'admin' : 'home';
	$form = new zea();
	$form->init('roll');
	$form->setTable('prala_pendidikan');
	$form->search();
	$form->join('prala','ON(prala.id=prala_pendidikan.prala_id)','prala.id,prala.no_registration AS reg_id,prala.nama,prala.kode_pelaut,prala_pendidikan.angkatan,prala_pendidikan.nis,prala_pendidikan.prodi_id,prala.nama_sekolah');
	$delimeter = !empty($_GET['keyword']) ? 'AND' : '';
	$form->setWhere(" {$delimeter} prala_pendidikan.prodi_id != '' AND prala_pendidikan.status = {$status} group by prala.id");
	$form->setNumbering(TRUE);
	// $form->addInput('id','hidden');
	$form->addInput('angkatan','plaintext');
	$form->addInput('nis','plaintext');
	$form->addInput('kode_pelaut','plaintext');
	$form->setLabel('kode_pelaut',' Kode Pelaut');
	$form->addInput('nama','link');
	$form->setLink('nama', base_url($link.'/prala/pendidikan/detail'),'reg_id');
	$form->setExtLink('nama','&t='.$_GET['t']);
	$form->addInput('nama_sekolah','plaintext');
	$form->setLabel('nama_sekolah','Asal Sekolah');
	// $form->setExtLink('nama','&id=');
	$form->addInput('prodi_id','dropdown');
	$form->tableOptions('prodi_id','prodi','id','title');
	$form->setAttribute('prodi_id','disabled');
	$form->setLabel('prodi_id','Program Studi');
	$form->form();
	// pr($form->getData());
}else{
	echo msg('URL that you request is not valid', 'danger');
}