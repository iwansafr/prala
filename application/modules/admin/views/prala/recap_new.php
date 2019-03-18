<?php defined('BASEPATH') OR exit('No direct script access allowed');
if(@$_GET['t']==md5('paska'))
{
	$heading_title = 'DU Paska Prala';
	$status = '2';
}else{
	$heading_title = 'DU Pra Prala';
	$status = '1';
}
$foto = json_decode($recap['foto_3x4'],true);
$foto = $foto[0];
$kelamin = array('Perempuan','Laki-laki');
$pendidikan = $this->prala_model->get_pendidikan($recap['id']);
$prodi = $this->prala_model->get_prodi($pendidikan['prodi_id']);
$prala_location = $this->prala_model->get_prala_location($pendidikan['id']);
if(!empty(@$_GET['t']=='pdf'))
{
	// header("Content-type:application/pdf; charset=utf-8");
	// header("Content-Disposition:attachment;filename='calon peserta.pdf'");
}else if(@$_GET['t']=='excel'){
	header("Content-Type: application/vnd.ms-excel; charset=utf-8");
	header("Content-type: application/x-msexcel; charset=utf-8");
	header("Content-Disposition: attachment; filename=location detail.xls");
	header("Expires: 0");
	header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
	header("Cache-Control: private",false);
}
?>
<a href="<?php echo base_url('admin/prala/recap_detail?reg_id='.@($user['username']).'&t=excel')?>" class="btn btn-default btn-sm"><i class="fa fa-file-excel-o"></i></a><a href="<?php echo base_url('admin/prala/recap_detail?reg_id='.@($user['username']).'&t=pdf')?>" target="_blank" class="btn btn-default btn-sm"><i class="fa fa-print"></i> / <i class="fa fa-file-pdf-o"></i></a>
<?php
$this->zea->init('edit');
$this->zea->setTable('prala');
$this->zea->setId($recap['id']);
$this->zea->setEditStatus(FALSE);

$this->zea->setHeading($heading_title);

$this->zea->addInput('no_registration','plaintext');
$this->zea->setLabel('no_registration','No Registration');

$this->zea->addInput('kode_pelaut','plaintext');
$this->zea->setLabel('kode_pelaut','Kode Pelaut');

$this->zea->addInput('nama','plaintext');
$this->zea->setLabel('nama','Nama Lengkap');

$this->zea->addInput('no_id_ktp','plaintext');
$this->zea->setLabel('no_id_ktp','No Id KTP');

$this->zea->addInput('tempat_lahir','plaintext');
$this->zea->setLabel('tempat_lahir','Tempat Lahir');

$this->zea->addInput('tgl_lahir','plaintext');
$this->zea->setLabel('tgl_lahir','Tanggal Lahir');
$this->zea->setType('tgl_lahir','date');

$this->zea->addInput('kelamin','radio');
$this->zea->setRadio('kelamin', array('Perempuan','Laki-laki'));
$this->zea->setLabel('kelamin','Jenis Kelamin');

$this->zea->addInput('nama_ibu','plaintext');
$this->zea->setLabel('nama_ibu','Nama Lengkap Ibu');

$this->zea->addInput('kewarganegaraan','plaintext');
$this->zea->setLabel('kewarganegaraan','kewarganegaraan');

$this->zea->addInput('hp','plaintext');
$this->zea->setLabel('hp','No Hp Siswa');

$this->zea->addInput('hp_ortu','plaintext');
$this->zea->setLabel('hp_ortu','No Hp Orang Tua');

$this->zea->addInput('email','plaintext');
$this->zea->setLabel('email','Email Siswa');

$this->zea->addInput('provinsi','dropdown');
$this->zea->setAttribute('provinsi','disabled="disabled"');
$this->zea->setOptions('provinsi', $provinces);
$this->zea->setLabel('provinsi','Provinsi');

$this->zea->addInput('kabupaten','dropdown');
$this->zea->setAttribute('kabupaten','disabled="disabled"');
$this->zea->setOptions('kabupaten', array('Pilih Kabupaten'));
$this->zea->setLabel('kabupaten','Kabupaten');

$this->zea->addInput('kecamatan','dropdown');
$this->zea->setAttribute('kecamatan','disabled="disabled"');
$this->zea->setOptions('kecamatan', array('Pilih Kecamatan'));
$this->zea->setLabel('kecamatan','Kecamatan');

$this->zea->addInput('alamat','plaintext');
$this->zea->setLabel('alamat','Alamat Lengkap Siswa');

$this->zea->startCollapse('provinsi', 'Alamat Lengkap Siswa');
$this->zea->endCollapse('alamat');
$this->zea->setCollapse('provinsi',TRUE);

$this->zea->addInput('nama_sekolah','plaintext');
$this->zea->setLabel('nama_sekolah','Asal Sekolah');

$this->zea->addInput('provinsi_sekolah','dropdown');
$this->zea->setAttribute('provinsi_sekolah','disabled="disabled"');
$this->zea->setOptions('provinsi_sekolah', $provinces);
$this->zea->setLabel('provinsi_sekolah','Provinsi Sekolah');

$this->zea->addInput('kabupaten_sekolah','dropdown');
$this->zea->setAttribute('kabupaten_sekolah','disabled="disabled"');
$this->zea->setOptions('kabupaten_sekolah', array('Pilih Kabupaten'));
$this->zea->setLabel('kabupaten_sekolah','Kabupaten Sekolah');

$this->zea->addInput('kecamatan_sekolah','dropdown');
$this->zea->setAttribute('kecamatan_sekolah','disabled="disabled"');
$this->zea->setOptions('kecamatan_sekolah', array('Pilih Kecamatan'));
$this->zea->setLabel('kecamatan_sekolah','Kecamatan Sekolah');

$this->zea->addInput('alamat_sekolah','plaintext');
$this->zea->setLabel('alamat_sekolah','Alamat Sekolah');

$this->zea->addInput('prodi_id','dropdown');
$this->zea->setAttribute('prodi_id','disabled="disabled"');
$this->zea->tableOptions('prodi_id','prodi','id','title');
$this->zea->setLabel('prodi_id','Program Studi');

$this->zea->startCollapse('nama_sekolah', 'Detail Sekolah');
$this->zea->endCollapse('prodi_id');
$this->zea->setCollapse('nama_sekolah',TRUE);

$this->zea->addInput('foto_3x4','gallery');
$this->zea->setAccept('foto_3x4', '.jpg,.jpeg,.png');
$this->zea->setAttribute('foto_3x4','multiple');
$this->zea->setLabel('foto_3x4','Foto 3x4');

$this->zea->addInput('ktp','gallery');
$this->zea->setAccept('ktp', '.jpg,.jpeg,.png');
$this->zea->setAttribute('ktp','multiple');
$this->zea->setLabel('ktp','KTP');

$this->zea->addInput('akte_kelahiran','gallery');
$this->zea->setAccept('akte_kelahiran', '.jpg,.jpeg,.png');
$this->zea->setAttribute('akte_kelahiran','multiple');
$this->zea->setLabel('akte_kelahiran','Akte Kelahiran');

$this->zea->addInput('kk','gallery');
$this->zea->setAccept('kk', '.jpg,.jpeg,.png');
$this->zea->setAttribute('kk','multiple');
$this->zea->setLabel('kk','Kartu Keluarga');

$this->zea->addInput('ijasah_smk','gallery');
$this->zea->setAccept('ijasah_smk', '.jpg,.jpeg,.png');
$this->zea->setAttribute('ijasah_smk','multiple');
$this->zea->setLabel('ijasah_smk','Ijasah SMK');

$this->zea->addInput('skpl','gallery');
$this->zea->setAccept('skpl', '.jpg,.jpeg,.png');
$this->zea->setAttribute('skpl','multiple');
$this->zea->setLabel('skpl','Surat Kesehatan standar Perhubungan Laut');

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

$this->zea->addInput('sert_simulator_nautika','gallery');
$this->zea->setAccept('sert_simulator_nautika', '.jpg,.jpeg,.png');
$this->zea->setAttribute('sert_simulator_nautika','multiple');
$this->zea->setLabel('sert_simulator_nautika','Sertifikat Simulator Nautika');

$this->zea->addInput('sert_radar','gallery');
$this->zea->setAccept('sert_radar', '.jpg,.jpeg,.png');
$this->zea->setAttribute('sert_radar','multiple');
$this->zea->setLabel('sert_radar','Sertifikat Radar');

$this->zea->addInput('sert_arpa','gallery');
$this->zea->setAccept('sert_arpa', '.jpg,.jpeg,.png');
$this->zea->setAttribute('sert_arpa','multiple');
$this->zea->setLabel('sert_arpa','Sertifikat ARPA');

$this->zea->addInput('ism_code','gallery');
$this->zea->setAccept('ism_code', '.jpg,.jpeg,.png');
$this->zea->setAttribute('ism_code','multiple');
$this->zea->setLabel('ism_code','ISM CODE');

$this->zea->addInput('asuransi','gallery');
$this->zea->setAccept('asuransi', '.jpg,.jpeg,.png');
$this->zea->setAttribute('asuransi','multiple');
$this->zea->setLabel('asuransi','Asuransi');

$this->zea->addInput('buku_pelaut','gallery');
$this->zea->setAccept('buku_pelaut', '.jpg,.jpeg,.png');
$this->zea->setAttribute('buku_pelaut','multiple');
$this->zea->setLabel('buku_pelaut','Buku Pelaut');

$this->zea->addInput('surat_orang_tua','gallery');
$this->zea->setAccept('surat_orang_tua', '.jpg,.jpeg,.png');
$this->zea->setAttribute('surat_orang_tua','multiple');
$this->zea->setLabel('surat_orang_tua','Surat Pengantar Orang Tua bermaterai');

$this->zea->addInput('surat_pengantar_sekolah','gallery');
$this->zea->setAccept('surat_pengantar_sekolah', '.jpg,.jpeg,.png');
$this->zea->setAttribute('surat_pengantar_sekolah','multiple');
$this->zea->setLabel('surat_pengantar_sekolah','Surat Pengantar dari Sekolah');

$this->zea->addInput('bukti_pembayaran','gallery');
$this->zea->setAccept('bukti_pembayaran', '.jpg,.jpeg,.png');
$this->zea->setAttribute('bukti_pembayaran','multiple');
$this->zea->setLabel('bukti_pembayaran','Bukti Lunas Administrasi Pembayaran Sekolah');

$this->zea->addInput('sib','gallery');
$this->zea->setAccept('sib', '.jpg,.jpeg,.png');
$this->zea->setAttribute('sib','multiple');
$this->zea->setLabel('sib','Surat Ijin Berlayar');

$this->zea->addInput('skl_ukp_prala','gallery');
$this->zea->setLabel('skl_ukp_prala','Surat Keterangan Lulus UKP Pra Prala');
$this->zea->setAccept('skl_ukp_prala', '.jpg,.jpeg,.png');
$this->zea->setAttribute('skl_ukp_prala','multiple');

if($status == 2)
{
	$this->zea->addInput('surat_mutasi_on','gallery');
	$this->zea->setLabel('surat_mutasi_on','Surat Mutasi ON');
	$this->zea->setAccept('surat_mutasi_on', '.jpg,.jpeg,.png');
	$this->zea->setAttribute('surat_mutasi_on','multiple');	

	$this->zea->addInput('surat_mutasi_off','gallery');
	$this->zea->setLabel('surat_mutasi_off','Surat Mutasi OFF');
	$this->zea->setAccept('surat_mutasi_off', '.jpg,.jpeg,.png');
	$this->zea->setAttribute('surat_mutasi_off','multiple');	

	$this->zea->addInput('skml','gallery');
	$this->zea->setLabel('skml','Surat Keterangan Masa Layar');
	$this->zea->setAccept('skml', '.jpg,.jpeg,.png');
	$this->zea->setAttribute('skml','multiple');	
}

$this->zea->addInput('sert_watchkeeping','gallery');
$this->zea->setLabel('sert_watchkeeping','Sertifikat Wathckeeping');
$this->zea->setAccept('sert_watchkeeping', '.jpg,.jpeg,.png');
$this->zea->setAttribute('sert_watchkeeping','multiple');



$this->zea->startCollapse('foto_3x4','Upload Dokumen');
$this->zea->endCollapse('sert_watchkeeping');
$this->zea->setCollapse('foto_3x4',TRUE);

$this->zea->addInput('status','hidden');
$this->zea->setValue('status',$status);
$this->zea->setFormName('prala_register');
$this->zea->setSave(false);
$this->zea->form();