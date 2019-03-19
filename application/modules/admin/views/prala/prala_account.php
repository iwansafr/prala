<?php defined('BASEPATH') OR exit('No direct script access allowed');

$form = new zea();
$form->init('roll');
$form->setTable('prala_user');

$form->search();
$form->join('prala','ON(prala.id=prala_user.prala_id)','prala.id,prala.nama,prala.kode_pelaut,prala.nama_sekolah,prala_user.username, prala_user.password');
$form->setNumbering(TRUE);

$form->addInput('nama','plaintext');
$form->addInput('kode_pelaut','plaintext');
$form->addInput('nama_sekolah','plaintext');
$form->addInput('username','plaintext');
$form->addInput('password','plaintext');
$form->form();