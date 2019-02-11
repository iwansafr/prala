<?php defined('BASEPATH') OR exit('No direct script access allowed');

$form = new zea();
$form->init('roll');
$form->setTable('prala_pendidikan');
$form->search();
$form->join('prala','ON(prala.id=prala_pendidikan.prala_id)','prala.id,prala.nama,prala.kode_pelaut,prala_pendidikan.prodi_id');
$delimeter = !empty($_GET['keyword']) ? 'AND' : '';
$form->setWhere(" {$delimeter} prala_pendidikan.prodi_id != '' group by prala.id");
$form->addInput('id','plaintext');
$form->addInput('nama','plaintext');
$form->addInput('kode_pelaut','plaintext');
$form->addInput('prodi_id','dropdown');
$form->tableOptions('prodi_id','prodi','id','title');
$form->setAttribute('prodi_id','disabled');
$form->setLabel('prodi_id','Program Studi');
$form->form();
pr($form->getData());