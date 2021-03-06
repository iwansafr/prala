<?php defined('BASEPATH') OR exit('No direct script access allowed');

if(is_admin() || is_root())
{
	$form = new zea();
	$form->init('param');
	$form->setTable('config');
	$form->setParamName('logo');
	$form->addInput('title', 'text');
	$form->addInput('image', 'upload');
	$form->setAccept('image', 'image/jpeg,image/png');
	$form->addInput('width', 'text');
	$form->setAttribute('width',array('type'=>'number'));
	$form->addInput('height', 'text');
	$form->setAttribute('height',array('type'=>'number'));
	$form->form();
}