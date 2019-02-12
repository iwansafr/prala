<?php defined('BASEPATH') OR exit('No direct script access allowed');

$form = new zea();
$form->init('param');
$form->setHeading('tambah posisi bulan '.@intval($_GET['bulan']));
$form->setTable('prala_location_bulan');
$form->setParamName('location_'.@intval($_GET['id']).'_'.@intval($_GET['bulan']));
$form->addInput('latitude','text');
$form->addInput('longitude','text');
$form->addInput('tanggal','text');
$form->setType('tanggal','date');
$form->form();