<?php defined('BASEPATH') OR exit('No direct script access allowed');
$id_month = @intval($_GET['id']).'_'.@intval($_GET['bulan']);
$this->db->select('value');
$is_exist = $this->db->get_where('prala_location_bulan',"name = 'location_{$id_month}'")->row_array();
if(is_admin() || is_root() || is_editor() || ((@$_GET['r_id'] == $user['username']) && empty($is_exist)))
{
	$form = new zea();
	$form->init('param');
	$form->setHeading('<a class="btn btn-warning bnt-sm" href="'.base_url('admin/prala/location_detail/?reg_id=').$_GET['r_id'].'"><i class="fa fa-arrow-left"></i></a> tambah posisi bulan '.@intval($_GET['bulan']).'');
	$form->setTable('prala_location_bulan');
	$form->setParamName('location_'.@intval($_GET['id']).'_'.@intval($_GET['bulan']));
	$form->addInput('title','hidden');
	$form->setValue('title','location_'.@intval($_GET['id']).'_'.@intval($_GET['bulan']));

	$form->addInput('latitude','text');
	$form->setLabel('latitude','Lintang');

	$form->addInput('longitude','text');
	$form->setLabel('longitude','Bujur');

	$form->addInput('tanggal','text');
	$form->setType('tanggal','date');

	$form->addInput('foto_kegiatan_1_image','file');
	$form->setAccept('foto_kegiatan_1_image', '.jpg,.jpeg,.png');
	$form->setLabel('foto_kegiatan_1_image', 'Foto Kegiatan 1');

	$form->addInput('foto_kegiatan_2_image','file');
	$form->setAccept('foto_kegiatan_2_image', '.jpg,.jpeg,.png');
	$form->setLabel('foto_kegiatan_2_image', 'Foto Kegiatan 2');

	$form->addInput('foto_kegiatan_3_image','file');
	$form->setAccept('foto_kegiatan_3_image', '.jpg,.jpeg,.png');
	$form->setLabel('foto_kegiatan_3_image', 'Foto Kegiatan 3');

	$form->addInput('kegiatan_harian_image','file');
	$form->setAccept('kegiatan_harian_image', '.doc,.docx');
	$form->setLabel('kegiatan_harian_image', 'Kegiatan Harian');

	$form->addInput('lampiran_kegiatan_harian_image','file');
	$form->setAccept('lampiran_kegiatan_harian_image', '.doc,.docx');
	$form->setLabel('lampiran_kegiatan_harian_image', 'Lampiran Kegiatan Harian');

	$form->form();
}else{
	echo msg('you dont have permission to access this site', 'danger');
}