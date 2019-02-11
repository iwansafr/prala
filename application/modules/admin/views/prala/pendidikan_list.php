<?php defined('BASEPATH') OR exit('No direct script access allowed');

$form = new zea();
$form->init('roll');
$form->setTable('prala_pendidikan');
$form->search();
$form->join('prala','ON(prala.id=prala_pendidikan.prala_id)','prala_pendidikan.id,prala.nama,prala_pendidikan.nama_kapal');
// $form->group_by('prala.id');
$form->addInput('id','plaintext');
$form->addInput('nama','plaintext');
$form->addInput('nama_kapal','plaintext');
$form->form();
pr($form->getData());