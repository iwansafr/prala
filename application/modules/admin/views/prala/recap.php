<?php defined('BASEPATH') OR exit('No direct script access allowed');
if(!empty($recap))
{
	$foto = json_decode($recap['foto_3x4'],true);
	$foto = $foto[0];
	$kelamin = array('Perempuan','Laki-laki');
	$pendidikan = $this->prala_model->get_pendidikan($recap['id']);
	$prodi = $this->prala_model->get_prodi($pendidikan['prodi_id']);
	$prala_location = $this->prala_model->get_prala_location($pendidikan['id']);
	if(is_root() || is_admin() || is_editor())
	{
		$index = $recap['id'];
	}else{
		$index = @$user['username'];
	}
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

	<div class="panel panel-default">
		<div class="panel-heading">
			profile
			<a href="<?php echo base_url('admin/prala/recap_detail?reg_id='.@($index).'&t=excel')?>" class="btn btn-default btn-sm"><i class="fa fa-file-excel-o"></i></a><a href="<?php echo base_url('admin/prala/recap_detail?reg_id='.@($index).'&t=pdf')?>" target="_blank" class="btn btn-default btn-sm"><i class="fa fa-print"></i> / <i class="fa fa-file-pdf-o"></i></a>
			<?php if (!empty($_GET['t'])): ?>
				<?php echo ' '.$recap['nama'] ?>
			<?php endif ?>
		</div>
		<div class="panel-body">
			<div class="col-md-2">
				<img src="<?php echo image_module('prala','gallery/'.$recap['id'].'/'.$foto) ?>" alt="" style="object-fit: cover; width: 150px;height: 200px;" class="img-responsive">
			</div>
			<div class="col-md-10">
				<div class="box-body table-responsive no-padding">
					<table class="table table-bordered table-hover table-stripped">
						<tbody>
							<tr>
								<td>Kode Pelaut</td>
								<td><?php echo $recap['kode_pelaut'] ?></td>
							</tr>
							<tr>
								<td>No ID KTP</td>
								<td><?php echo $recap['no_id_ktp'] ?></td>
							</tr>
							<tr>
								<td>No Registration</td>
								<td><?php echo $recap['no_registration'] ?></td>
							</tr>
							<tr>
								<td>Nama Lengkap</td>
								<td><?php echo $recap['nama'] ?></td>
							</tr>
							<tr>
								<td>Tempat Lahir</td>
								<td><?php echo $recap['tempat_lahir'] ?></td>
							</tr>
							<tr>
								<td>Tanggal Lahir</td>
								<td><?php echo $recap['tgl_lahir'] ?></td>
							</tr>
							<tr>
							<tr>
								<td>Nama Ibu</td>
								<td><?php echo $recap['nama_ibu'] ?></td>
							</tr>
							<tr>
								<td>Kewaraganegaraan</td>
								<td><?php echo $recap['kewarganegaraan'] ?></td>
							</tr>
							<tr>
								<td>alamat</td>
								<td><?php echo $recap['alamat'] ?></td>
							</tr>
							<tr>
								<td>kecamatan</td>
								<td><?php echo $recap['kecamatan'] ?></td>
							</tr>
							<tr>
								<td>kabupaten</td>
								<td><?php echo $recap['kabupaten'] ?></td>
							</tr>
							<tr>
								<td>provinsi</td>
								<td><?php echo $recap['provinsi'] ?></td>
							</tr>
							<tr>
								<td>email</td>
								<td><?php echo $recap['email'] ?></td>
							</tr>
							<tr>
								<td>hp</td>
								<td><?php echo $recap['hp'] ?></td>
							</tr>
							<tr>
								<td>hp Orang Tua</td>
								<td><?php echo $recap['hp_ortu'] ?></td>
							</tr>
							<tr>
								<td>nama_sekolah</td>
								<td><?php echo $recap['nama_sekolah'] ?></td>
							</tr>
							<tr>
								<td>alamat_sekolah</td>
								<td><?php echo $recap['alamat_sekolah'] ?></td>
							</tr>
							<tr>
								<td>kecamatan_sekolah</td>
								<td><?php echo $recap['kecamatan_sekolah'] ?></td>
							</tr>
							<tr>
								<td>kabupaten_sekolah</td>
								<td><?php echo $recap['kabupaten_sekolah'] ?></td>
							</tr>
							<tr>
								<td>provinsi_sekolah</td>
								<td><?php echo $recap['provinsi_sekolah'] ?></td>
							</tr>
							<tr>
								<td>Program Studi</td>
								<td><?php echo @$prodi['title'] ?></td>
							</tr>
							<tr>
								<td>Jenis Kelamin</td>
								<td><?php echo $kelamin[$recap['kelamin']] ?></td>
							</tr>
							<tr>
								<td>Nama Kapal</td>
								<td><?php echo $pendidikan['nama_kapal'] ?></td>
							</tr>
							<tr>
								<td>Nama Perusahaan</td>
								<td><?php echo $pendidikan['nama_perusahaan'] ?></td>
							</tr>
							<?php 
							$doc = array('kk','ktp','ijasah_smk','akte_kelahiran','skpl','sert_bst','sert_aff','sert_mefa','sert_simulator_nautika','sert_radar','sert_arpa','bukti_pembayaran','surat_orang_tua','surat_pengantar_sekolah','sib','sert_watchkeeping','asuransi','buku_pelaut','ism_code','skl_ukp_prala');
							foreach ($doc as $key => $value) 
							{
								$imgs = json_decode($recap[$value], TRUE);
								$img = $imgs[0];
								$link = image_module('prala','gallery/'.$recap['id'].'/'.$img);
								?>
								<tr>
									<td><?php echo str_replace('_', ' ', $value); ?></td>
									<td>
										<?php if (!empty($img)): ?>
											<a href="<?php echo $link ?>"><?php echo $link ?></a>
										<?php else: ?>
											-
										<?php endif ?>
									</td>
								</tr>
								<?php
							}
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div class="panel-footer">
			
		</div>
	</div>
	<?php
}else{
	msg('you tried to access wrong url, please contact admin','danger');
}