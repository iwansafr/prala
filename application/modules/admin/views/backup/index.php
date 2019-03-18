<?php 
if(is_root() || is_admin())
{
	?>
	<div class="panel panel-default">
		<div class="panel-heading">
			<h5>backup</h5>
		</div>
		<div class="panel-body">
			<form action="<?php echo base_url('admin/backup/create') ?>" method="post">
				<input type="hidden" name="esg" value="<?php echo encrypt('esoftgreat') ?>">
				<button type="submit" class="btn btn-sm btn-default"><i class="fa fa-download"></i> Create Backup</button>
			</form>
			<div class="table-responsive">
				<table class="table">
					<tr>
						<td>back up data</td>
						<td>action</td>
					</tr>
					<?php 
					foreach (glob(FCPATH.'images/modules/backup/*.zip') AS $value) 
					{
						$name = explode('/',$value);
						$name = end($name);
						$name = str_replace('.zip', '', $name);
						echo '<tr><td>'.$name.'</td>';
						echo '<td><a href="'.base_url('admin/backup/delete/'.$name).'" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> hapus</a></td></tr>';
					}
					?>
				</table>
			</div>
		</div>
		<div class="panel-footer">
			esoftgreat
		</div>
	</div>
	<?php
}else{
	msg('you dont have permision to access this site','danger');
}