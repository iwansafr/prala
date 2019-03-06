<?php defined('BASEPATH') OR exit('No direct script access allowed');
if($is_prala || !empty($_GET['reg_id'])){
	?>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-3">
				<form action="" method="get">
					<div class="form-group">
						<label for="">Cari Peserta</label>
						<div class="form-inline">
							<input type="text" name="reg_id" class="form-control" value="<?php echo @$_GET['reg_id'] ?>" placeholder="no registration">
							<button class="btn btn-default"><i class="fa fa-search"></i></button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<?php
	$data = $this->prala_model->get_prala(@$_GET['reg_id']);
}
$id = !empty($_GET['reg_id']) ? $data['id'] : @intval($_GET['id']);
$this->zea->init('edit');
$this->zea->setTable('prala');
$this->zea->setId($id);
$this->zea->setEditStatus(FALSE);
$this->zea->setHeading('Pendaftaran Ujian');

if(!empty(@intval($_GET['id'])))
{
	$this->zea->addInput('no_registration','plaintext');
	$this->zea->setLabel('no_registration','No Registration');
}

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

$this->zea->addInput('hp','text');
$this->zea->setLabel('hp','No Hp Siswa');

$this->zea->addInput('hp_ortu','text');
$this->zea->setLabel('hp_ortu','No Hp Orang Tua');

$this->zea->addInput('email','text');
$this->zea->setLabel('email','Email Siswa');

$this->zea->addInput('provinsi','dropdown');
$this->zea->setOptions('provinsi', $provinces);
$this->zea->setLabel('provinsi','Provinsi');

$this->zea->addInput('kabupaten','dropdown');
$this->zea->setOptions('kabupaten', array('Pilih Kabupaten'));
$this->zea->setLabel('kabupaten','Kabupaten');

$this->zea->addInput('kecamatan','dropdown');
$this->zea->setOptions('kecamatan', array('Pilih Kecamatan'));
$this->zea->setLabel('kecamatan','Kecamatan');

$this->zea->addInput('alamat','textarea');
$this->zea->setLabel('alamat','Alamat Lengkap Siswa');

$this->zea->startCollapse('provinsi', 'Alamat Lengkap');
$this->zea->endCollapse('alamat');
$this->zea->setCollapse('provinsi',TRUE);

$this->zea->addInput('nama_sekolah','text');
$this->zea->setLabel('nama_sekolah','Asal Sekolah');
$this->zea->addInput('provinsi_sekolah','dropdown');
$this->zea->setOptions('provinsi_sekolah', $provinces);
$this->zea->setLabel('provinsi_sekolah','Provinsi Sekolah');
$this->zea->addInput('kabupaten_sekolah','dropdown');
$this->zea->setOptions('kabupaten_sekolah', array('Pilih Kabupaten'));
$this->zea->setLabel('kabupaten_sekolah','Kabupaten Sekolah');
$this->zea->addInput('kecamatan_sekolah','dropdown');
$this->zea->setOptions('kecamatan_sekolah', array('Pilih Kecamatan'));
$this->zea->setLabel('kecamatan_sekolah','Kecamatan Sekolah');
$this->zea->addInput('alamat_sekolah','textarea');
$this->zea->setLabel('alamat_sekolah','Alamat Sekolah');
$this->zea->addInput('prodi_id','dropdown');
$this->zea->tableOptions('prodi_id','prodi','id','title');
$this->zea->setLabel('prodi_id','Program Studi');
$this->zea->startCollapse('nama_sekolah', 'Detail Sekolah');
$this->zea->endCollapse('prodi_id');
$this->zea->setCollapse('nama_sekolah',TRUE);


$this->zea->addInput('foto_3x4','gallery');
$this->zea->setAccept('foto_3x4', '.jpg,.jpeg,.png');
$this->zea->setAttribute('foto_3x4','multiple');
$this->zea->setLabel('foto_3x4','Foto 3x4');
// $this->zea->addInput('foto_2x3','gallery');
// $this->zea->setAccept('foto_2x3', '.jpg,.jpeg,.png');
// $this->zea->setAttribute('foto_2x3','multiple');
// $this->zea->setLabel('foto_2x3','Foto 2x3');

$this->zea->addInput('ktp','gallery');
$this->zea->setAccept('ktp', '.jpg,.jpeg,.png');
$this->zea->setAttribute('ktp','multiple');
$this->zea->setLabel('ktp','KTP');

$this->zea->addInput('akte_kelahiran','gallery');
$this->zea->setAccept('akte_kelahiran', '.jpg,.jpeg,.png');
$this->zea->setAttribute('akte_kelahiran','multiple');
$this->zea->setLabel('akte_kelahiran','Akte Kelahiran');

$this->zea->addInput('ijasah_smk','gallery');
$this->zea->setAccept('ijasah_smk', '.jpg,.jpeg,.png');
$this->zea->setAttribute('ijasah_smk','multiple');
$this->zea->setLabel('ijasah_smk','Ijasah SMK');

$this->zea->addInput('surat_keterangan_sehat','gallery');
$this->zea->setAccept('surat_keterangan_sehat', '.jpg,.jpeg,.png');
$this->zea->setAttribute('surat_keterangan_sehat','multiple');
$this->zea->setLabel('surat_keterangan_sehat','Surat Keterangan Sehat');
$this->zea->addInput('sert_simulator','gallery');
$this->zea->setAccept('sert_simulator', '.jpg,.jpeg,.png');
$this->zea->setAttribute('sert_simulator','multiple');
$this->zea->setLabel('sert_simulator','Sertifikat Simulator');

$this->zea->addInput('sert_bst','gallery');
$this->zea->setAccept('sert_bst', '.jpg,.jpeg,.png');
$this->zea->setAttribute('sert_bst','multiple');
$this->zea->setLabel('sert_bst','Sertifikat BST');
$this->zea->addInput('sert_aff','gallery');
$this->zea->setAccept('sert_aff', '.jpg,.jpeg,.png');
$this->zea->setAttribute('sert_aff','multiple');
$this->zea->setLabel('sert_aff','Sertifikat AFF');
$this->zea->addInput('sert_mefa','gallery');
$this->zea->setAccept('sert_mefa', '.jpg,.jpeg,.png');
$this->zea->setAttribute('sert_mefa','multiple');
$this->zea->setLabel('sert_mefa','Sertifikat Mefa');
$this->zea->addInput('sert_radar','gallery');
$this->zea->setAccept('sert_radar', '.jpg,.jpeg,.png');
$this->zea->setAttribute('sert_radar','multiple');
$this->zea->setLabel('sert_radar','Sertifikat Radar');
$this->zea->addInput('sert_arpa','gallery');
$this->zea->setAccept('sert_arpa', '.jpg,.jpeg,.png');
$this->zea->setAttribute('sert_arpa','multiple');
$this->zea->setLabel('sert_arpa','Sertifikat ARPA');

$this->zea->addInput('bukti_pembayaran','gallery');
$this->zea->setAccept('bukti_pembayaran', '.jpg,.jpeg,.png');
$this->zea->setAttribute('bukti_pembayaran','multiple');
$this->zea->setLabel('bukti_pembayaran','Bukti Lunas Pembayaran');

// if(($is_prala && (is_admin() || is_root())) || !empty($_GET['reg_id']))
// {
	$this->zea->addInput('surat_orang_tua','gallery');
	$this->zea->setAccept('surat_orang_tua', '.jpg,.jpeg,.png');
	$this->zea->setAttribute('surat_orang_tua','multiple');
	$this->zea->setLabel('surat_orang_tua','Surat Pengantar Orang Tua bermaterai');
	$this->zea->addInput('surat_prala','gallery');
	$this->zea->setAccept('surat_prala', '.jpg,.jpeg,.png');
	$this->zea->setAttribute('surat_prala','multiple');
	$this->zea->setLabel('surat_prala','Surat Ijin Prala');
	$this->zea->addInput('sert_medical','gallery');
	$this->zea->setAccept('sert_medical', '.jpg,.jpeg,.png');
	$this->zea->setAttribute('sert_medical','multiple');
	$this->zea->setLabel('sert_medical','Medical Sertifikat');
	$this->zea->addInput('asuransi','gallery');
	$this->zea->setAccept('asuransi', '.jpg,.jpeg,.png');
	$this->zea->setAttribute('asuransi','multiple');
	$this->zea->setLabel('asuransi','Asuransi');
	$this->zea->addInput('ism_code','gallery');
	$this->zea->setAccept('ism_code', '.jpg,.jpeg,.png');
	$this->zea->setAttribute('ism_code','multiple');
	$this->zea->setLabel('ism_code','ISM CODE');
	$this->zea->addInput('pendaftaran_prala','gallery');
	$this->zea->setAccept('pendaftaran_prala', '.jpg,.jpeg,.png');
	$this->zea->setAttribute('pendaftaran_prala','multiple');
	$this->zea->setLabel('pendaftaran_prala','Pendaftaran Prala');
	$this->zea->addInput('status','hidden');
	$this->zea->setValue('status','2');
// }

$this->zea->startCollapse('foto_3x4','Upload Dokumen');
$this->zea->endCollapse('pendaftaran_prala');
$this->zea->setCollapse('foto_3x4',TRUE);

$this->zea->form();