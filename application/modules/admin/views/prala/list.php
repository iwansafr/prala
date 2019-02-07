<?php defined('BASEPATH') OR exit('No direct script access allowed');

$this->zea->init('roll');
$this->zea->setTable('prala');
$this->zea->search();
$this->zea->setEditStatus(FALSE);
$this->zea->setHeading('Daftar Pendaftar Ujian');

$this->zea->addInput('id','plaintext');
$this->zea->addInput('kode_pelaut','plaintext');
$this->zea->setLabel('kode_pelaut','Kode Pelaut');
$this->zea->addInput('nama','plaintext');
$this->zea->setLabel('nama','Nama Lengkap');
$this->zea->addInput('kewarganegaraan','plaintext');
$this->zea->setLabel('kewarganegaraan','kewarganegaraan');

$this->zea->setDelete(TRUE);
$this->zea->setEdit(TRUE);
if((is_admin() || is_root()) && !empty($is_prala)){
	$this->zea->setEditLink(base_url('admin/prala/register?t='.@$_GET['t'].'&id='));
}

$this->zea->form();
