<?php defined('BASEPATH') OR exit('No direct script access allowed');
$foto = json_decode($data['foto_3x4'],true);
$foto = $foto[0];
$kelamin = array('Perempuan','Laki-laki');
$pendidikan = $this->prala_model->get_pendidikan($data['id']);
$prodi = $this->prala_model->get_prodi($pendidikan['prodi_id']);
$prala_location = $this->prala_model->get_prala_location($pendidikan['id']);
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
						<a href="<?php echo base_url('admin/prala/location_edit/?id='.$prala_location['location']['id'].'&bulan='.$i) ?>"><i class="fa fa-plus-circle"></i></a>
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