<?php defined('BASEPATH') OR exit('No direct script access allowed');

$this->zea->init('roll');
$this->zea->setTable('prala');
$this->zea->search();
$this->zea->setEditStatus(FALSE);
$this->zea->setHeading('Daftar Pendaftar Ujian <a href="'.base_url('admin/prala/list_report?t=excel').'" class="btn btn-default btn-sm"><i class="fa fa-file-excel-o"></i></a><a href="'.base_url('admin/prala/list_report?t=pdf').'" target="_blank" class="btn btn-default btn-sm"><i class="fa fa-print"></i> / <i class="fa fa-file-pdf-o"></i></a>');

$this->zea->addInput('id','plaintext');
$this->zea->addInput('kode_pelaut','plaintext');
$this->zea->setLabel('kode_pelaut','Kode Pelaut');
$this->zea->addInput('nama','plaintext');
$this->zea->setLabel('nama','Nama Lengkap');
$this->zea->addInput('kewarganegaraan','plaintext');
$this->zea->setLabel('kewarganegaraan','kewarganegaraan');
	
if(is_admin() || is_root())
{
	$this->zea->setDelete(TRUE);
	$this->zea->setEdit(TRUE);
}
if(!empty($is_paska)){
	$this->zea->setWhere('status = 2');
	$this->zea->setEditLink(base_url('admin/prala/register?t='.@$_GET['t'].'&id='));
}else{
	$this->zea->setWhere('status = 1');
}

$this->zea->form();
