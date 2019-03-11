<?php defined('BASEPATH') OR exit('No direct script access allowed');
$t = array('nautika'=>'1','teknika'=>'2');
?>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-3">
			<form action="" method="get">
				<div class="form-group">
				  <div class="input-group">
				    <input type="text" name="reg_id" class="form-control" placeholder="No Registration" value="<?php echo @$_GET['reg_id'] ?>">
				        <span class="input-group-btn">
				          <button type="submit" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
				          </button>
				        </span>
				    <input type="hidden" name="t" value="<?php echo @$_GET['t'] ?>">
				  </div>
				</div>
			</form>
		</div>
	</div>
</div>
<?php
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
			<div class="form-group">
				<label>Foto Siswa</label>
				<img src="<?php echo image_module('prala', 'gallery/'.$data['id'].'/'.$data['foto_3x4']) ?>" class="img-responsive" width="120" height="160">
			</div>
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
	$status = @intval($t[$_GET['t']]);
			
	if(is_admin() || is_root())
	{
		if(!empty($status))
		{
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

			$form->addInput('masuk','text');
			$form->setType('masuk','date');
			$form->setLabel('masuk','DU Pra Prala');

			$form->addInput('sib','text');
			$form->setType('sib','date');
			$form->setLabel('sib','Surat Ijin Berlayar');

			$form->addInput('sign_on','text');
			$form->setType('sign_on','date');
			$form->setLabel('sign_on','Sign On');

			$form->addInput('nama_kapal','text');
			$form->setLabel('nama_kapal','Nama Kapal');

			$form->addInput('nama_perusahaan','text');
			$form->setLabel('nama_perusahaan','Nama Perusahaan');

			$form->addInput('sign_off','text');
			$form->setType('sign_off','date');
			$form->setLabel('sign_off','Sign Off');

			$form->addInput('du_paska','text');
			$form->setType('du_paska','date');
			$form->setLabel('du_paska','DU Paska Prala');

			$form->addInput('keterangan','textarea');
			$form->setLabel('keterangan',' Keterangan');

			$form->addInput('prala_id','hidden');
			$form->setValue('prala_id',$data['id']);

			$form->addInput('status','hidden');
			$form->setValue('status', $status);

			$form->form();
		}else{
			echo msg('Link that you are accessing is not valid','danger');
		}
	}
}