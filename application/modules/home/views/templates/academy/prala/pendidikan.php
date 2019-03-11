<div class="container">
	<div class="row">
		<div class="col-md-12">
			<?php defined('BASEPATH') OR exit('No direct script access allowed');

			switch ($type) {
				case 'edit':
					$this->load->view('pendidikan_edit');
					break;
				case 'list':
					$this->load->view('pendidikan_list');
					break;	
				case 'detail':
					$this->load->view('pendidikan_detail');
					break;		
				
				default:
					$this->load->view('pendidikan_list');
					break;
			}
			?>
		</div>
	</div>
</div>