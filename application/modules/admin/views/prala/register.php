<?php defined('BASEPATH') OR exit('No direct script access allowed');
if(@$_GET['t']==md5('paska'))
{
	$heading_title = 'DU Paska Prala';
	$status = '2';
}else{
	$heading_title = 'DU Pra Prala';
	$status = '1';
}
$user = $this->session->userdata(base_url().'_logged_in');
if(empty($user) && ($status == 2))
{
	header('location: '.base_url('admin/login').'?redirect_to='.urlencode(base_url('home/prala/register?t=9555e0591eaf7478ef1ec0c2f4ab9ab8')));
}
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
if((($user['level'] != 5) || ($status != 1)) || ((empty($user))) || (!empty($user) && $user['level'] < 5))
{
	$id = !empty($_GET['reg_id']) ? $data['id'] : @intval($_GET['id']);
	$type = 'text';
	$gallery_attr = 'multiple';
	$text_attr = '';
	if(!empty($user) && $user['level'] == 5)
	{
		$prala = $this->prala_model->get_prala($user['username']);
		$id = $prala['id'];
		$text_attr = 'readonly';
		$gallery_attr = 'readonly';
	}
	$this->zea->init('edit');
	$this->zea->setTable('prala');
	$this->zea->setId($id);
	$this->zea->setEditStatus(FALSE);

	$this->zea->setHeading($heading_title);

	if(!empty(@intval($_GET['id'])))
	{
		$this->zea->addInput('no_registration','plaintext');
		$this->zea->setLabel('no_registration','No Registration');
	}

	$this->zea->addInput('kode_pelaut', $type);
	$this->zea->setAttribute('kode_pelaut', $text_attr);
	$this->zea->setLabel('kode_pelaut','Kode Pelaut');

	$this->zea->addInput('nama', $type);
	$this->zea->setAttribute('nama', $text_attr);
	$this->zea->setLabel('nama','Nama Lengkap');

	$this->zea->addInput('no_id_ktp', $type);
	$this->zea->setAttribute('no_id_ktp', $text_attr);
	$this->zea->setLabel('no_id_ktp','No Id KTP');

	$this->zea->addInput('tempat_lahir', $type);
	$this->zea->setAttribute('tempat_lahir', $text_attr);
	$this->zea->setLabel('tempat_lahir','Tempat Lahir');

	$this->zea->addInput('tgl_lahir', $type);
	$this->zea->setAttribute('tgl_lahir', $text_attr);
	$this->zea->setLabel('tgl_lahir','Tanggal Lahir');
	$this->zea->setType('tgl_lahir','date');

	$this->zea->addInput('kelamin','radio');
	$this->zea->setRadio('kelamin', array('Perempuan','Laki-laki'));
	$this->zea->setLabel('kelamin','Jenis Kelamin');

	$this->zea->addInput('nama_ibu', $type);
	$this->zea->setAttribute('nama_ibu', $text_attr);
	$this->zea->setLabel('nama_ibu','Nama Lengkap Ibu');

	$this->zea->addInput('kewarganegaraan', $type);
	$this->zea->setAttribute('kewarganegaraan', $text_attr);
	$this->zea->setLabel('kewarganegaraan','kewarganegaraan');

	$this->zea->addInput('hp', $type);
	$this->zea->setAttribute('hp', $text_attr);
	$this->zea->setLabel('hp','No Hp Siswa');

	$this->zea->addInput('hp_ortu', $type);
	$this->zea->setAttribute('hp_ortu', $text_attr);
	$this->zea->setLabel('hp_ortu','No Hp Orang Tua');

	$this->zea->addInput('email', $type);
	$this->zea->setAttribute('email', $text_attr);
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

	$this->zea->startCollapse('provinsi', 'Alamat Lengkap Siswa');
	$this->zea->endCollapse('alamat');
	$this->zea->setCollapse('provinsi',TRUE);

	$this->zea->addInput('nama_sekolah', $type);
	$this->zea->setAttribute('nama_sekolah', $text_attr);
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

	if(!empty($prala['id']))
	{
		$kelamin = array('Perempuan','Laki-laki');
		$this->zea->addInput('kelamin','plaintext');
		$this->zea->setValue('kelamin', $kelamin[$prala['kelamin']]);
		$this->zea->setLabel('kelamin','Jenis Kelamin');

		$this->zea->setAttribute('kecamatan','readonly');
		$this->zea->setAttribute('kabupaten','readonly');
		$this->zea->setAttribute('provinsi','readonly');
		$this->zea->setAttribute('alamat','readonly');

		$this->zea->setAttribute('kecamatan_sekolah','readonly');
		$this->zea->setAttribute('kabupaten_sekolah','readonly');
		$this->zea->setAttribute('provinsi_sekolah','readonly');
		$this->zea->setAttribute('alamat_sekolah','readonly');

		$this->zea->setAttribute('prodi_id','readonly');
	}
	$this->zea->addInput('foto_3x4','gallery');
	$this->zea->setAccept('foto_3x4', '.jpg,.jpeg,.png');
	$this->zea->setAttribute('foto_3x4', $gallery_attr);
	$this->zea->setLabel('foto_3x4','Foto 3x4');

	$this->zea->addInput('ktp','gallery');
	$this->zea->setAccept('ktp', '.jpg,.jpeg,.png');
	$this->zea->setAttribute('ktp', $gallery_attr);
	$this->zea->setLabel('ktp','KTP');

	$this->zea->addInput('akte_kelahiran','gallery');
	$this->zea->setAccept('akte_kelahiran', '.jpg,.jpeg,.png');
	$this->zea->setAttribute('akte_kelahiran', $gallery_attr);
	$this->zea->setLabel('akte_kelahiran','Akte Kelahiran');

	$this->zea->addInput('kk','gallery');
	$this->zea->setAccept('kk', '.jpg,.jpeg,.png');
	$this->zea->setAttribute('kk', $gallery_attr);
	$this->zea->setLabel('kk','Kartu Keluarga');

	$this->zea->addInput('ijasah_smk','gallery');
	$this->zea->setAccept('ijasah_smk', '.jpg,.jpeg,.png');
	$this->zea->setAttribute('ijasah_smk', $gallery_attr);
	$this->zea->setLabel('ijasah_smk','Ijasah SMK');

	$this->zea->addInput('skpl','gallery');
	$this->zea->setAccept('skpl', '.jpg,.jpeg,.png');
	$this->zea->setAttribute('skpl', $gallery_attr);
	$this->zea->setLabel('skpl','Surat Kesehatan standar Perhubungan Laut');

	$this->zea->addInput('sert_bst','gallery');
	$this->zea->setAccept('sert_bst', '.jpg,.jpeg,.png');
	$this->zea->setAttribute('sert_bst', $gallery_attr);
	$this->zea->setLabel('sert_bst','Sertifikat BST');

	$this->zea->addInput('sert_aff','gallery');
	$this->zea->setAccept('sert_aff', '.jpg,.jpeg,.png');
	$this->zea->setAttribute('sert_aff', $gallery_attr);
	$this->zea->setLabel('sert_aff','Sertifikat AFF');

	$this->zea->addInput('sert_mefa','gallery');
	$this->zea->setAccept('sert_mefa', '.jpg,.jpeg,.png');
	$this->zea->setAttribute('sert_mefa', $gallery_attr);
	$this->zea->setLabel('sert_mefa','Sertifikat Mefa');

	$this->zea->addInput('sert_simulator_nautika','gallery');
	$this->zea->setAccept('sert_simulator_nautika', '.jpg,.jpeg,.png');
	$this->zea->setAttribute('sert_simulator_nautika', $gallery_attr);
	$this->zea->setLabel('sert_simulator_nautika','Sertifikat Simulator Nautika');

	$this->zea->addInput('sert_radar','gallery');
	$this->zea->setAccept('sert_radar', '.jpg,.jpeg,.png');
	$this->zea->setAttribute('sert_radar', $gallery_attr);
	$this->zea->setLabel('sert_radar','Sertifikat Radar');

	$this->zea->addInput('sert_arpa','gallery');
	$this->zea->setAccept('sert_arpa', '.jpg,.jpeg,.png');
	$this->zea->setAttribute('sert_arpa', $gallery_attr);
	$this->zea->setLabel('sert_arpa','Sertifikat ARPA');

	$this->zea->addInput('ism_code','gallery');
	$this->zea->setAccept('ism_code', '.jpg,.jpeg,.png');
	$this->zea->setAttribute('ism_code', $gallery_attr);
	$this->zea->setLabel('ism_code','ISM CODE');

	$this->zea->addInput('asuransi','gallery');
	$this->zea->setAccept('asuransi', '.jpg,.jpeg,.png');
	$this->zea->setAttribute('asuransi', $gallery_attr);
	$this->zea->setLabel('asuransi','Asuransi');

	$this->zea->addInput('buku_pelaut','gallery');
	$this->zea->setAccept('buku_pelaut', '.jpg,.jpeg,.png');
	$this->zea->setAttribute('buku_pelaut', $gallery_attr);
	$this->zea->setLabel('buku_pelaut','Buku Pelaut');

	$this->zea->addInput('surat_orang_tua','gallery');
	$this->zea->setAccept('surat_orang_tua', '.jpg,.jpeg,.png');
	$this->zea->setAttribute('surat_orang_tua', $gallery_attr);
	$this->zea->setLabel('surat_orang_tua','Surat Pengantar Orang Tua bermaterai');

	$this->zea->addInput('surat_pengantar_sekolah','gallery');
	$this->zea->setAccept('surat_pengantar_sekolah', '.jpg,.jpeg,.png');
	$this->zea->setAttribute('surat_pengantar_sekolah', $gallery_attr);
	$this->zea->setLabel('surat_pengantar_sekolah','Surat Pengantar dari Sekolah');

	$this->zea->addInput('bukti_pembayaran','gallery');
	$this->zea->setAccept('bukti_pembayaran', '.jpg,.jpeg,.png');
	$this->zea->setAttribute('bukti_pembayaran', $gallery_attr);
	$this->zea->setLabel('bukti_pembayaran','Bukti Lunas Administrasi Pembayaran Sekolah');

	$this->zea->addInput('sib','gallery');
	$this->zea->setAccept('sib', '.jpg,.jpeg,.png');
	$this->zea->setAttribute('sib', $gallery_attr);
	$this->zea->setLabel('sib','Surat Ijin Berlayar');

	$this->zea->addInput('skl_ukp_prala','gallery');
	$this->zea->setLabel('skl_ukp_prala','Surat Keterangan Lulus UKP Pra Prala');
	$this->zea->setAccept('skl_ukp_prala', '.jpg,.jpeg,.png');
	$this->zea->setAttribute('skl_ukp_prala',$gallery_attr);

	$this->zea->addInput('sert_watchkeeping','gallery');
	$this->zea->setLabel('sert_watchkeeping','Sertifikat Wathckeeping');
	$this->zea->setAccept('sert_watchkeeping', '.jpg,.jpeg,.png');
	$this->zea->setAttribute('sert_watchkeeping',$gallery_attr);

	$this->zea->startCollapse('foto_3x4','Upload Dokumen');
	$this->zea->endCollapse('sert_watchkeeping');
	$this->zea->setCollapse('foto_3x4',TRUE);

	$this->zea->addInput('status','hidden');
	$this->zea->setValue('status',$status);
	$this->zea->setFormName('prala_register');
	if($status == 2)
	{
		$this->zea->setSave(FALSE);
	}
	$this->zea->form();

	if($status == 2)
	{
		$form = new zea();
		$form->init('edit');
		$form->setTable('prala');
		$form->setId($id);
		$form->setEditStatus(FALSE);

		$form->setHeading($heading_title);
		$form->addInput('surat_mutasi_on','gallery');
		$form->setLabel('surat_mutasi_on','Surat Mutasi ON');
		$form->setAccept('surat_mutasi_on', '.jpg,.jpeg,.png');
		$form->setAttribute('surat_mutasi_on','multiple');	

		$form->addInput('surat_mutasi_off','gallery');
		$form->setLabel('surat_mutasi_off','Surat Mutasi OFF');
		$form->setAccept('surat_mutasi_off', '.jpg,.jpeg,.png');
		$form->setAttribute('surat_mutasi_off','multiple');	

		$form->addInput('skml','gallery');
		$form->setLabel('skml','Surat Keterangan Masa Layar');
		$form->setAccept('skml', '.jpg,.jpeg,.png');
		$form->addInput('status','hidden');
		$form->setValue('status',$status);
		$form->setAttribute('skml','multiple');	
		$form->setFormName('paska_form');
		$form->form();
	}

}else{
	echo msg('anda sudah terdaftar di DU PRA PRALA, Anda hanya boleh untuk mendaftar DU PASKA PRALA', 'danger');
}
