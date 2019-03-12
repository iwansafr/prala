<?php defined('BASEPATH') OR exit('No direct script access allowed');
$this->esg->check_login();
$template = $this->esg->get_esg('templates')['admin_template'];
$data = array();
if(@$_SERVER['SERVER_NAME'] == 'localhost')
{
	$data['link_template'] = base_url().'templates/'.$template;
}else{
	$data['link_template'] = 'https://templates.esoftgreat.com/'.$template;
}
$data['public_template'] = $this->esg->get_esg('templates')['public_template'];
$data['admin_template'] = $template;
$this->load->view('templates'.DIRECTORY_SEPARATOR.$this->esg->get_esg('templates')['admin_template'].DIRECTORY_SEPARATOR.'index', $data);