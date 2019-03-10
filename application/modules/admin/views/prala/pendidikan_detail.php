<?php defined('BASEPATH') OR exit('No direct script access allowed');
if(!empty($data))
{
	$foto = json_decode($data['foto_3x4'],true);
	$foto = $foto[0];
	$kelamin = array('Perempuan','Laki-laki');
	$pendidikan = $this->prala_model->get_pendidikan($data['id']);
	$prodi = $this->prala_model->get_prodi($pendidikan['prodi_id']);
	?>
	<div class="panel panel-default">
		<div class="panel-heading">
			profile
		</div>
		<div class="panel-body">
			<div class="col-md-2">
				<img src="<?php echo image_module('prala','gallery/'.$data['id'].'/'.$foto) ?>" alt="" style="object-fit: cover; width: 150px;height: 200px;" class="img-responsive">
			</div>
			<div class="col-md-4">
				<div class="box-body table-responsive no-padding">
					<table class="table table-bordered table-hover table-stripped">
						<tbody>
							<tr>
								<td>Kode Pelaut</td>
								<td><?php echo $data['kode_pelaut'] ?></td>
							</tr>
							<tr>
								<td>Nama Lengkap</td>
								<td><?php echo $data['nama'] ?></td>
							</tr>
							<tr>
								<td>Tempat Lahir</td>
								<td><?php echo $data['tempat_lahir'] ?></td>
							</tr>
							<tr>
								<td>Tanggal Lahir</td>
								<td><?php echo $data['tgl_lahir'] ?></td>
							</tr>
							<tr>
								<td>Asal Sekolah</td>
								<td><?php echo $data['nama_sekolah'] ?></td>
							</tr>
							<tr>
								<td>Program Studi</td>
								<td><?php echo $prodi['title'] ?></td>
							</tr>
							<tr>
								<td>Jenis Kelamin</td>
								<td><?php echo $kelamin[$data['kelamin']] ?></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div class="panel-footer">
			
		</div>
	</div>
	<?php
	$t = array('nautika'=>'1','teknika'=>'2');
	$status = @$t[$_GET['t']];
	if(!empty($status))
	{
		$form = new zea();
		$form->init('roll');
		$form->setTable('prala_pendidikan');
		$form->setNumbering(true);
		$form->join('prala','ON(prala.id=prala_pendidikan.prala_id)','prala_pendidikan.id,prala.no_registration AS reg_id,prala_pendidikan.masuk,prala_pendidikan.nama_kapal,prala_pendidikan.nama_perusahaan,prala_pendidikan.sign_off,prala_pendidikan.sign_on,prala_pendidikan.sib,prala_pendidikan.du_paska,prala_pendidikan.keterangan');
		$delimeter = !empty($_GET['keyword']) ? 'AND' : '';
		$form->setWhere(' '.$delimeter.' prala_id = '.@intval($data['id']).' AND prala_pendidikan.status= '.@intval($status));
		$form->search();
		$form->addInput('id','hidden');

		$form->addInput('masuk','plaintext');
		$form->setLabel('masuk','DU Pra Prala');

		$form->addInput('sib','plaintext');
		$form->setLabel('sib','Surat Ijin Berlayar');

		$form->addInput('sign_on','plaintext');
		$form->setLabel('sign_on', 'Sign On');

		$form->addInput('nama_kapal','plaintext');
		$form->setLabel('nama_kapal', 'Nama Kapal');

		$form->addInput('nama_perusahaan','plaintext');
		$form->setLabel('nama_perusahaan', 'Nama Perusahaan');

		$form->addInput('sign_off','plaintext');
		$form->setLabel('sign_off', 'Sign Off');

		$form->addInput('du_paska','plaintext');
		$form->setLabel('du_paska', 'DU Paska Prala');
		
		$form->addInput('keterangan','plaintext');
		$form->setLabel('keterangan', 'Keterangan');
		$form->setDelete(TRUE);
		$form->setEdit(TRUE);
		$form->setEditLink(base_url('admin/prala/pendidikan/edit?reg_id='.$data['no_registration'].'&t='.@$_GET['t'].'&id='));
		$form->form();
	}else{
		echo msg('link that youre requesting is invalid', 'danger');
	}
}else{
	echo msg('Invalid Request','danger');
}