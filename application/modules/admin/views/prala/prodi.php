<?php defined('BASEPATH') OR exit('No direct script access allowed');
if(is_admin() || is_root())
{
	$id = @intval($_GET['id']);
	$edit = new zea();
	$edit->init('edit');
	$edit->setId($id);
	$edit->setTable('prodi');
	$edit->addInput('title','text');
	$edit->setRequired('all');
	$edit->setFormName('prodi_edit');

	$roll = new zea();
	$roll->init('roll');
	$roll->setHeading('<a href="'.base_url('admin/prala/prodi').'"><button class="btn btn-sm btn-default"><i class="fa fa-plus-circle"></i> Program Studi</button></a>');
	$roll->setTable('prodi');
	$roll->search();
	$roll->addInput('id','plaintext');
	$roll->addInput('title','plaintext');
	$roll->setEdit(TRUE);
	$roll->setDelete(TRUE);
	$roll->setEditLink(base_url('admin/prala/prodi?id='));
	$roll->setRequired('all');
	$roll->setFormName('prodi_list');
	?>
	<div class="row">
		<div class="col-md-3">
			<?php $edit->form();?>
		</div>
		<div class="col-md-9">
			<?php $roll->form();?>
		</div>
	</div>
	<?php
}