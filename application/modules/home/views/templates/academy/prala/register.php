<?php defined('BASEPATH') OR exit('No direct script access allowed');

$this->zea->init('edit');
$this->zea->setTable('prala');
$this->zea->setId(@intval($_GET['id']));
$this->zea->setEditStatus(FALSE);
$this->zea->setHeading('Pendaftaran Ujian');

$this->zea->addInput('kode_pelaut','text');
$this->zea->setLabel('kode_pelaut','Kode Pelaut');
$this->zea->addInput('nama','text');
$this->zea->setLabel('nama','Nama Lengkap');
$this->zea->addInput('no_id_ktp','text');
$this->zea->setLabel('no_id_ktp','No Id KTP');
$this->zea->addInput('tempat_lahir','text');
$this->zea->setLabel('tempat_lahir','Tempat Lahir');
$this->zea->addInput('tgl_lahir','text');
$this->zea->setLabel('tgl_lahir','Tanggal Lahir');
$this->zea->setType('tgl_lahir','date');
$this->zea->addInput('kelamin','radio');
$this->zea->setRadio('kelamin', array('Perempuan','Laki-laki'));
$this->zea->setLabel('kelamin','Jenis Kelamin');
$this->zea->addInput('nama_ibu','text');
$this->zea->setLabel('nama_ibu','Nama Lengkap Ibu');
$this->zea->addInput('kewarganegaraan','text');
$this->zea->setLabel('kewarganegaraan','kewarganegaraan');

$this->zea->addInput('alamat','textarea');
$this->zea->setLabel('alamat','Alamat Lengkap');
$this->zea->addInput('provinsi','dropdown');
$this->zea->setOptions('provinsi', array('0'=>'None'));
$this->zea->setLabel('provinsi','Provinsi');
$this->zea->addInput('kabupaten','dropdown');
$this->zea->setOptions('kabupaten', array('0'=>'None'));
$this->zea->setLabel('kabupaten','Kabupaten');
$this->zea->addInput('kecamatan','dropdown');
$this->zea->setOptions('kecamatan', array('0'=>'None'));
$this->zea->setLabel('kecamatan','Kecamatan');
$this->zea->startCollapse('alamat', 'Alamat Lengkap');
$this->zea->endCollapse('kecamatan');
$this->zea->setCollapse('alamat',TRUE);

$this->zea->addInput('email','text');
$this->zea->setLabel('email','Email');
$this->zea->addInput('hp','text');
$this->zea->setLabel('hp','No Hp');
?>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<?php $this->zea->form();?>
		</div>
	</div>
</div>