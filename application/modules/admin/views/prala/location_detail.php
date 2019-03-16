<?php defined('BASEPATH') OR exit('No direct script access allowed');
$user = $this->session->userdata(base_url().'_logged_in');
if(is_root() || is_admin() || (@$_GET['reg_id'] == $user['username']))
{
	$foto = json_decode($data['foto_3x4'],true);
	$foto = $foto[0];
	$kelamin = array('Perempuan','Laki-laki');
	$pendidikan = $this->prala_model->get_pendidikan($data['id']);
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
	<div class="panel panel-default">
		<div class="panel-heading">
			profile
			<a href="<?php echo base_url('admin/prala/location_detail_report?reg_id='.@($_GET['reg_id']).'&t=excel')?>" class="btn btn-default btn-sm"><i class="fa fa-file-excel-o"></i></a><a href="<?php echo base_url('admin/prala/location_detail_report?reg_id='.@($_GET['reg_id']).'&t=pdf')?>" target="_blank" class="btn btn-default btn-sm"><i class="fa fa-print"></i> / <i class="fa fa-file-pdf-o"></i></a>
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
								<td>Program Studi</td>
								<td><?php echo $prodi['title'] ?></td>
							</tr>
							<tr>
								<td>Jenis Kelamin</td>
								<td><?php echo $kelamin[$data['kelamin']] ?></td>
							</tr>
							<tr>
								<td>Nama Kapal</td>
								<td><?php echo $pendidikan['nama_kapal'] ?></td>
							</tr>
							<tr>
								<td>Nama Perusahaan</td>
								<td><?php echo $pendidikan['nama_perusahaan'] ?></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div class="panel-footer">
			
		</div>
	</div>
	<div class="container-fluid">
		<div class="row">
			<?php 
			for($i=1;$i<13;$i++){
				$data = @$prala_location['bulan']['location_'.@intval($prala_location['location']['id']).'_'.$i];
				if(!empty($data))
				{
					$data = json_decode($data['value'], TRUE);
				}
				echo ($i%3 == 1) ? '<div class="col-md-12">' :'';
				?>
				<div class="col-md-4">
					<div class="box">
						<div class="box-header">
							<?php if (empty($data)): ?>
								<a href="<?php echo base_url('admin/prala/location_edit/?id=').$prala_location['location']['id'].'&bulan='.$i.'&r_id='.$_GET['reg_id'];?>" class="btn btn-default btn-sm btn-warning"><i class="fa fa-pencil-alt"></i></a>
							<?php endif ?>
						</div>
						<div class="box-body table-responsive no-padding">
						    <table class="table table-bordered table-hover table-striped" table_name="prala_location">
						        <tbody>
						            <tr>
						                <th colspan="3"style="text-align: center;">
						                    Bulan <?php echo $i ?>
						                </th>
						            </tr>
						            <tr>
						                <td><?php echo strtoupper('latitude')?></td>
						                <td><?php echo strtoupper('longitude')?></td>
						                <td><?php echo strtoupper('tanggal')?></td>
						            </tr>
						             <tr>
						                <td><?php echo !empty($data['latitude']) ? @$data['latitude'] : '-'; ?></td>
						                <td><?php echo !empty($data['longitude']) ? @$data['longitude'] : '-'; ?></td>
						                <td><?php echo !empty($data['tanggal']) ? @$data['tanggal'] : '-'; ?></td>
						            </tr>
						            <tr>
						                <th colspan="3"style="text-align: center;">
						                    Foto Kegiatan
						                </th>
						            </tr>
						            <tr>
						                <td><?php echo strtoupper('Foto Kegiatan 1')?></td>
						                <td><?php echo strtoupper('Foto Kegiatan 2')?></td>
						                <td><?php echo strtoupper('Foto Kegiatan 3')?></td>
						            </tr>
						             <tr>
					             		<?php 
					             		for($j=1;$j<=3;$j++)
					             		{
					             			if(!empty($data['foto_kegiatan_'.$j.'_image']))
					             			{
							             		?>
							                <td>
							                	<div class="image">
																	<a href="#img_<?php echo $prala_location['location']['id'].'_'.$i;?>">
																		<img src="<?php echo image_module('prala_location_bulan', 'location_'.@intval($prala_location['location']['id']).'_'.$i.'/'.$data['foto_kegiatan_'.$j.'_image']) ?>" class="img-responsive image-thumbnail image" style="object-fit: cover;width: 150px;height: 150px;" data-toggle="modal" data-target="#img_<?php echo $prala_location['location']['id'].'_'.$i?>">
																	</a>
																</div>
																<?php if (empty(@$_GET['t'])): ?>
																	<div class="modal fade" id="img_<?php echo $prala_location['location']['id'].'_'.$i;?>" tabindex="-1" role="dialog" aria-labelledby="img_<?php echo $prala_location['location']['id'].'_'.$i;?>">
																	  <div class="modal-dialog" role="document">
																	    <div class="modal-content">
																	      <div class="modal-header">
																	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																	        <h4 class="modal-title" id="img_title_<?php echo $prala_location['location']['id'].'_'.$i?>"><?php echo $prala_location['location']['id'].'_'.$i;?></h4>
																	      </div>
																	      <div class="modal-body" style="text-align: center;">
																	        <img src="<?php echo image_module('prala_location_bulan', 'location_'.@intval($prala_location['location']['id']).'_'.$i.'/'.@$data['foto_kegiatan_'.$j].'_image'); ?>" class="img-thumbnail img-responsive">
																	      </div>
																	      <div class="modal-footer">
																	      </div>
																	    </div>
																	  </div>
																	</div>
																<?php endif ?>
							                </td>
						             			<?php
					             			}
					             		}?>
						            </tr>
						            <tr>
						                <th colspan="3"style="text-align: center;">
						                    Detail Kegiatan Prala
						                </th>
						            </tr>
						            <tr>
						            	<td colspan="3" style="text-align:center;">
						            		<i class="fa fa-file-alt"></i><br>
						            		<?php if (!empty($data['kegiatan_harian_image'])): ?>
						            			<?php 
						            			$doc_link = image_module('prala_location_bulan', 'location_'.@intval($prala_location['location']['id']).'_'.$i.'/'.$data['kegiatan_harian_image']);
						            			if(empty(@$_GET['t']))
						            			{
						            				$doc_title = 'Download Kegiatan Harian';
						            			}else{
						            				$doc_title = $doc_link;
						            			}
						            			?>
						            			<a href="<?php echo $doc_link; ?>"><?php echo $doc_title ?></a>
						            		<?php endif ?>
						            	</td>
						            </tr>
						            <tr>
						            	<td colspan="3" style="text-align:center;">
						            		<i class="fa fa-file-alt"></i><br>
						            		<?php if (!empty($data['lampiran_kegiatan_harian_image'])): ?>
						            			<?php 
						            			$doc_link = image_module('prala_location_bulan', 'location_'.@intval($prala_location['location']['id']).'_'.$i.'/'.$data['lampiran_kegiatan_harian_image']);
						            			if(empty(@$_GET['t']))
						            			{
						            				$doc_title = 'Download Lampiran Kegiatan Harian';
						            			}else{
						            				$doc_title = $doc_link;
						            			}
						            			?>
						            			<a href="<?php echo $doc_link ?>"><?php echo $doc_title ?></a>
						            		<?php endif ?>
						            	</td>
						            </tr>
						        </tbody>
						    </table>
						</div>
					</div>
				</div>
				<?php
				echo ($i%3 == 0) ? '</div>' :'';
			}
			?>
		</div>
	</div>
	<?php
}else{
	echo msg('you dont have permission to access this site', 'danger');
}
