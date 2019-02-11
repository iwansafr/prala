<div class="container">
	<div class="row">
		<div class="col-md-3">
			<form action="" method="get">
				<div class="form-group">
					<label for="">Cari Peserta</label>
					<div class="form-inline">
						<input type="text" name="reg_id" class="form-control" placeholder="no registration">
						<input type="submit" class="btn btn-default" value="cari">
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<?php defined('BASEPATH') OR exit('No direct script access allowed');

if(!empty($_GET['reg_id']))
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
			$show = array('nama','tempat_lahir','tgl_lahir');
			foreach ($data as $key => $value) 
			{
				if(in_array($key, $show))
				{
					?>
					<div class="form-group ">
						<label for="<?php echo $key ?>"><?php echo $key ?></label>
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
	$form->setId(@intval($_GET['id']));
	$form->addInput('prodi_id','dropdown');
	$form->tableOptions('prodi_id','prodi','id','title');
	$form->form();
}