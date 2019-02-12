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
<?php defined('BASEPATH') OR exit('No direct script access allowed');

if(!empty($_GET['reg_id']) || !empty($_GET['id']))
{
	?>
	<div class="panel panel-default">
		<div class="panel panel-heading">
			<h4 class="panel-title">
				Detail
			</h4>
		</div>
		<div class="panel panel-body">
			<?php 
			$show = array('kode_pelaut','nama','tempat_lahir','tgl_lahir','kelamin');
			foreach ($data as $key => $value) 
			{
				if(in_array($key, $show))
				{
					if($key == 'kelamin'){
						$kelamin = array('Perempuan','Laki-laki');
						$value = $kelamin[$value];
					}
					?>
					<div class="form-group ">
						<label for="<?php echo str_replace('_',' ',$key) ?>"><?php echo str_replace('_',' ',$key) ?></label>
						<input type="text" value="<?php echo $value ?>" class="form-control" readonly>
					</div>
					<?php
				}
			}
			?>
		</div>
		<div class="panel panel-footer">
		</div>
	</div>
	<?php
	$form = new zea();
	$form->init('edit');
	$form->setTable('prala_pendidikan');
	$title = empty($_GET['id']) ? 'Tambah' : 'Edit';
	$form->setHeading($title.' Status Pendidikan');
	$form->setEditStatus(FALSE);
	$form->setId(@intval($_GET['id']));
	$form->addInput('prodi_id','dropdown');
	$form->setLabel('prodi_id','Program Studi');
	$form->tableOptions('prodi_id','prodi','id','title');

	$form->addInput('nama_kapal','text');
	$form->setLabel('nama_kapal','Nama Kapal');
	$form->addInput('nama_perusahaan','text');
	$form->setLabel('nama_perusahaan','Nama Perusahaan');
	$form->addInput('prala_id','hidden');
	$form->setValue('prala_id',$data['id']);
	$form_tgl = array('masuk','ujian_nasional','ujian_pra_prala','sign_on','sign_off','ujian_trb','ujian_paska','wisudha');

	foreach ($form_tgl as $key => $value) 
	{
		$form->addInput($value,'text');
		$form->setType($value,'date');
		$form->setLabel($value, str_replace('_', ' ', $value));
	}


	$form->form();
}