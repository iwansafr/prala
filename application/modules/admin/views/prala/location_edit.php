<?php defined('BASEPATH') OR exit('No direct script access allowed');

$form = new zea();
$form->init('param');
$form->setHeading('<a class="btn btn-warning bnt-sm" href="'.base_url('admin/prala/location_detail/?reg_id=').$_GET['r_id'].'"><i class="fa fa-arrow-left"></i></a> tambah posisi bulan '.@intval($_GET['bulan']).'');
$form->setTable('prala_location_bulan');
$form->setParamName('location_'.@intval($_GET['id']).'_'.@intval($_GET['bulan']));
$form->addInput('title','hidden');
$form->setValue('title','location_'.@intval($_GET['id']).'_'.@intval($_GET['bulan']));
$form->addInput('latitude','text');
$form->addInput('longitude','text');
$form->addInput('tanggal','text');
$form->setType('tanggal','date');
$form->addInput('foto_kegiatan_1','file');
$form->setAccept('foto_kegiatan_1', '.jpg,.jpeg,.png');
$form->addInput('foto_kegiatan_2','file');
$form->setAccept('foto_kegiatan_2', '.jpg,.jpeg,.png');
$form->addInput('foto_kegiatan_3','file');
$form->setAccept('foto_kegiatan_3', '.jpg,.jpeg,.png');
$form->addInput('kegiatan_harian','file');
$form->setAccept('kegiatan_harian', '.doc,.docx');
// $form->setAttribute('kegiatan_harian','multiple');
$form->addInput('lampiran_kegiatan_harian','file');
// $form->setAttribute('lampiran_kegiatan_harian','multiple');
$form->setAccept('lampiran_kegiatan_harian', '.doc,.docx');
$form->form();