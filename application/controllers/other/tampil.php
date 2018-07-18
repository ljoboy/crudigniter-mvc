<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class tampil extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('other');
		$data_index = array('nav' => 'other',
							'hal' => 'tampil',
							'url_tambah' => base_url().'index.php/other/tambah',
							'url_ubah' => base_url().'index.php/other/ubah/id/',
							'url_hapus' => base_url().'index.php/other/hapus/id/');
		$this->session->set_flashdata($data_index);
	}

	function index()
	{
		$data['other'] = $this->other->tampil();
		$this->load->view('other/tampil',$data);
	}
}
?>