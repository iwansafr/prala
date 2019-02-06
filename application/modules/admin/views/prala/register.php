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
$this->zea->setLabel('alamat','Alamat Lengkap');

$this->zea->startCollapse('provinsi', 'Alamat Lengkap');
$this->zea->endCollapse('alamat');
$this->zea->setCollapse('provinsi',TRUE);

$this->zea->addInput('nama_sekolah','text');
$this->zea->setLabel('nama_sekolah','Nama Sekolah');
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
$this->zea->startCollapse('nama_sekolah', 'Detail Sekolah');
$this->zea->endCollapse('alamat_sekolah');
$this->zea->setCollapse('nama_sekolah',TRUE);

$this->zea->addInput('email','text');
$this->zea->setLabel('email','Email');
$this->zea->addInput('hp','text');
$this->zea->setLabel('hp','No Hp');

$this->zea->addInput('foto_3x4','file');
$this->zea->setAccept('foto_3x4', '.jpg,.jpeg,.png');
$this->zea->setAttribute('foto_3x4','multiple');
$this->zea->setLabel('foto_3x4','Foto 3x4');
$this->zea->addInput('foto_2x3','file');
$this->zea->setAccept('foto_2x3', '.jpg,.jpeg,.png');
$this->zea->setAttribute('foto_2x3','multiple');
$this->zea->setLabel('foto_2x3','Foto 2x3');

$this->zea->addInput('ktp','file');
$this->zea->setAccept('ktp', '.jpg,.jpeg,.png');
$this->zea->setAttribute('ktp','multiple');
$this->zea->setLabel('ktp','KTP');

$this->zea->addInput('akte_kelahiran','file');
$this->zea->setAccept('akte_kelahiran', '.jpg,.jpeg,.png');
$this->zea->setAttribute('akte_kelahiran','multiple');
$this->zea->setLabel('akte_kelahiran','Akte Kelahiran');

$this->zea->addInput('ijasah_smk','file');
$this->zea->setAccept('ijasah_smk', '.jpg,.jpeg,.png');
$this->zea->setAttribute('ijasah_smk','multiple');
$this->zea->setLabel('ijasah_smk','Ijasah SMK');

$this->zea->addInput('surat_keterangan_sehat','file');
$this->zea->setAccept('surat_keterangan_sehat', '.jpg,.jpeg,.png');
$this->zea->setAttribute('surat_keterangan_sehat','multiple');
$this->zea->setLabel('surat_keterangan_sehat','Surat Keterangan Sehat');
$this->zea->addInput('sert_simulator','file');
$this->zea->setAccept('sert_simulator', '.jpg,.jpeg,.png');
$this->zea->setAttribute('sert_simulator','multiple');
$this->zea->setLabel('sert_simulator','Sertifikat Simulator');

$this->zea->addInput('sert_bst','file');
$this->zea->setAccept('sert_bst', '.jpg,.jpeg,.png');
$this->zea->setAttribute('sert_bst','multiple');
$this->zea->setLabel('sert_bst','Sertifikat BST');
$this->zea->addInput('sert_aff','file');
$this->zea->setAccept('sert_aff', '.jpg,.jpeg,.png');
$this->zea->setAttribute('sert_aff','multiple');
$this->zea->setLabel('sert_aff','Sertifikat AFF');
$this->zea->addInput('sert_mefa','file');
$this->zea->setAccept('sert_mefa', '.jpg,.jpeg,.png');
$this->zea->setAttribute('sert_mefa','multiple');
$this->zea->setLabel('sert_mefa','Sertifikat Mefa');
$this->zea->addInput('sert_radar','file');
$this->zea->setAccept('sert_radar', '.jpg,.jpeg,.png');
$this->zea->setAttribute('sert_radar','multiple');
$this->zea->setLabel('sert_radar','Sertifikat Radar');
$this->zea->addInput('sert_arpa','file');
$this->zea->setAccept('sert_arpa', '.jpg,.jpeg,.png');
$this->zea->setAttribute('sert_arpa','multiple');
$this->zea->setLabel('sert_arpa','Sertifikat ARPA');
$this->zea->addInput('bukti_pembayaran','file');
$this->zea->setAccept('bukti_pembayaran', '.jpg,.jpeg,.png');
$this->zea->setAttribute('bukti_pembayaran','multiple');
$this->zea->setLabel('bukti_pembayaran','Bukti Lunas Pembayaran');
$this->zea->addInput('surat_orang_tua','file');
$this->zea->setAccept('surat_orang_tua', '.jpg,.jpeg,.png');
$this->zea->setAttribute('surat_orang_tua','multiple');
$this->zea->setLabel('surat_orang_tua','Surat Pengantar Orang Tua bermaterai');
$this->zea->addInput('surat_prala','file');
$this->zea->setAccept('surat_prala', '.jpg,.jpeg,.png');
$this->zea->setAttribute('surat_prala','multiple');
$this->zea->setLabel('surat_prala','Surat Ijin Prala');
$this->zea->addInput('sert_medical','file');
$this->zea->setAccept('sert_medical', '.jpg,.jpeg,.png');
$this->zea->setAttribute('sert_medical','multiple');
$this->zea->setLabel('sert_medical','Medical Sertifikat');
$this->zea->addInput('asuransi','file');
$this->zea->setAccept('asuransi', '.jpg,.jpeg,.png');
$this->zea->setAttribute('asuransi','multiple');
$this->zea->setLabel('asuransi','Asuransi');
$this->zea->addInput('ism_code','file');
$this->zea->setAccept('ism_code', '.jpg,.jpeg,.png');
$this->zea->setAttribute('ism_code','multiple');
$this->zea->setLabel('ism_code','ISM CODE');
$this->zea->addInput('pendaftaran_prala','file');
$this->zea->setAccept('pendaftaran_prala', '.jpg,.jpeg,.png');
$this->zea->setAttribute('pendaftaran_prala','multiple');
$this->zea->setLabel('pendaftaran_prala','Pendaftaran Prala');

$this->zea->form();