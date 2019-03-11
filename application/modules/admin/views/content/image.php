<?php defined('BASEPATH') OR exit('No direct script access allowed');

$id = @intval($_GET['id']);
$form_edit = new zea();
$form_edit->init('edit');
$form_edit->setId($id);
$form_edit->setTable('content');

$form_edit->addInput('image','file');
$form_edit->setFormName('image_edit');

$form_list = new zea();
$form_list->init('roll');
$form_list->setTable('content');
$form_list->setWhere("image != ''");
$form_list->setEdit(TRUE);
$form_list->setEditLink(base_url('admin/content/image').'?id=');
$form_list->setDelete(TRUE);

$form_list->addInput('id','hidden');
$form_list->addInput('image','thumbnail');
$form_list->setFormName('image_list');

?>
<div class="row">
	<div class="col-md-3">
		<?php $form_edit->form();?>
	</div>
	<div class="col-md-9">
		<?php $form_list->form();?>
	</div>
</div>