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
$this->zea->setOptions('provinsi', $provinces);
$this->zea->setLabel('provinsi','Provinsi');

// $regencies = $this->db->query('SELECT id, name FROM regencies')->result_array();
// $regencies = assoc($regencies, 'id','name');
$this->zea->addInput('kabupaten','dropdown');
$this->zea->setOptions('kabupaten', array('none'));
$this->zea->setLabel('kabupaten','Kabupaten');

// $districts = $this->db->query('SELECT id, name FROM districts')->result_array();
// $districts = assoc($districts, 'id','name');
$this->zea->addInput('kecamatan','dropdown');
$this->zea->setOptions('kecamatan', array('none'));
$this->zea->setLabel('kecamatan','Kecamatan');
$this->zea->startCollapse('alamat', 'Alamat Lengkap');
$this->zea->endCollapse('kecamatan');
$this->zea->setCollapse('alamat',TRUE);

$this->zea->addInput('nama_sekolah','text');
$this->zea->setLabel('nama_sekolah','Nama Sekolah');
$this->zea->addInput('alamat_sekolah','textarea');
$this->zea->setLabel('alamat_sekolah','Alamat Sekolah');
$this->zea->addInput('provinsi_sekolah','dropdown');
$this->zea->setOptions('provinsi_sekolah', array('0'=>'None'));
$this->zea->setLabel('provinsi_sekolah','Provinsi Sekolah');
$this->zea->addInput('kabupaten_sekolah','dropdown');
$this->zea->setOptions('kabupaten_sekolah', array('0'=>'None'));
$this->zea->setLabel('kabupaten_sekolah','Kabupaten Sekolah');
$this->zea->addInput('kecamatan_sekolah','dropdown');
$this->zea->setOptions('kecamatan_sekolah', array('0'=>'None'));
$this->zea->setLabel('kecamatan_sekolah','Kecamatan Sekolah');
$this->zea->startCollapse('nama_sekolah', 'Detail Sekolah');
$this->zea->endCollapse('kecamatan_sekolah');
$this->zea->setCollapse('nama_sekolah',TRUE);

$this->zea->addInput('email','text');
$this->zea->setLabel('email','Email');
$this->zea->addInput('hp','text');
$this->zea->setLabel('hp','No Hp');

$this->zea->addInput('foto_3x4','file');
$this->zea->setLabel('foto_3x4','Foto 3x4');
$this->zea->addInput('foto_2x3','file');
$this->zea->setLabel('foto_2x3','Foto 2x3');

$this->zea->addInput('ktp','file');
$this->zea->setLabel('ktp','KTP');

$this->zea->addInput('akte_kelahiran','file');
$this->zea->setLabel('akte_kelahiran','Akte Kelahiran');

$this->zea->addInput('ijasah_smk','file');
$this->zea->setLabel('ijasah_smk','Ijasah SMK');

$this->zea->addInput('surat_keterangan_sehat','file');
$this->zea->setLabel('surat_keterangan_sehat','Surat Keterangan Sehat');
$this->zea->addInput('sert_simulator','file');
$this->zea->setLabel('sert_simulator','Sertifikat Simulator');

$this->zea->addInput('sert_bst','file');
$this->zea->setLabel('sert_bst','Sertifikat BST');
$this->zea->addInput('sert_aff','file');
$this->zea->setLabel('sert_aff','Sertifikat AFF');
$this->zea->addInput('sert_mefa','file');
$this->zea->setLabel('sert_mefa','Sertifikat Mefa');
$this->zea->addInput('sert_radar','file');
$this->zea->setLabel('sert_radar','Sertifikat Radar');
$this->zea->addInput('sert_arpa','file');
$this->zea->setLabel('sert_arpa','Sertifikat ARPA');
$this->zea->addInput('bukti_pembayaran','file');
$this->zea->setLabel('bukti_pembayaran','Bukti Lunas Pembayaran');
$this->zea->addInput('surat_orang_tua','file');
$this->zea->setLabel('surat_orang_tua','Surat Pengantar Orang Tua bermaterai');
$this->zea->addInput('surat_prala','file');
$this->zea->setLabel('surat_prala','Surat Ijin Prala');
$this->zea->addInput('sert_medical','file');
$this->zea->setLabel('sert_medical','Medical Sertifikat');
$this->zea->addInput('asuransi','file');
$this->zea->setLabel('asuransi','Asuransi');
$this->zea->addInput('ism_code','file');
$this->zea->setLabel('ism_code','ISM CODE');
$this->zea->addInput('pendaftaran_prala','file');
$this->zea->setLabel('pendaftaran_prala','Pendaftaran Prala');

?>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<?php $this->zea->form();?>
		</div>
	</div>
</div>