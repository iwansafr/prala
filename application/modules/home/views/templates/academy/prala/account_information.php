<?php defined('BASEPATH') OR exit('No direct script access allowed');

$username = urldecode($this->input->get('u'));
$password = urldecode($this->input->get('p'));
if(!empty($username) && !empty($password))
{
	?>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<?php msg('<h1>Selamat Pendaftaran Anda berhasil</h1>','success');?>
				<div class="panel panel-default">
					<div class="panel-heading">
						<h5>silahkan catat username dan password anda di bawah ini</h5>
					</div>
					<div class="panel-body">
						<div class="table-responsive">
							<table class="table">
								<tr>
									<td>username</td>
									<td>:</td>
									<td><?php echo $username ?></td>
								</tr>
								<tr>
									<td>password</td>
									<td>:</td>
									<td><?php echo $password ?></td>
								</tr>
							</table>
						</div>
					</div>
					<div class="panel-footer"></div>
				</div>
			</div>
		</div>
	</div>
	<?php
}else{
	msg('pembuatan akun anda gagal, silahkan hubungi admin', 'danger');
}