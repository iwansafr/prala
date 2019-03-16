<div class="col-12 h-100">
	<div class="header-content h-100 d-flex align-items-center justify-content-between">
		<div class="academy-logo">
			<div class="form-inline">
				<a href="<?php echo base_url()?>"><img src="<?php echo image_module('config/logo', @$logo['image']) ?>" alt="" width="<?php echo @$logo['width'] ?>" height="<?php echo @$logo['height'] ?>"></a>
				<div class="header d-none d-md-block d-lg-block d-xl-block">
					<h4><?php echo @$meta['contact']['name'] ?></h4>
					Alamat : <?php echo @$meta['contact']['address'] ?>
					Telepon : <?php echo @$meta['contact']['phone'] ?>
				</div>
			</div>
		</div>
		<div class="login-content">
			<?php 
			if(!empty($this->session->userdata(base_url().'_logged_in')))
			{
				echo '<i class="fa fa-user"></i> '.$this->session->userdata(base_url().'_logged_in')['username'].' || <a href="'.base_url('admin').'"><i class="fa fa-sign-in"></i> To Dashboard</a>';
			}else{
				?>
				<!-- <a href="<?php echo base_url('admin/login')?>">Register / Login</a> -->
				<?php
			}
			?>
		</div>
	</div>
</div>