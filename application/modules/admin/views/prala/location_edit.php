<?php defined('BASEPATH') OR exit('No direct script access allowed');

$form = new zea();
$form->init('param');
$form->setHeading('<a class="btn btn-warning bnt-sm" href="'.base_url('admin/prala/location_detail/?reg_id=').$_GET['r_id'].'"><i class="fa fa-arrow-left"></i></a> tambah posisi bulan '.@intval($_GET['bulan']).'');
$form->setTable('prala_location_bulan');
$form->setParamName('location_'.@intval($_GET['id']).'_'.@intval($_GET['bulan']));
$form->addInput('latitude','text');
$form->addInput('longitude','text');
$form->addInput('tanggal','text');
$form->setType('tanggal','date');
$form->form();