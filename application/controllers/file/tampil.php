<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class tampil extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('file');
		$data_index = array('nav' => 'file',
							'hal' => 'tampil',
							'url_unduh' => base_url().'index.php/file/unduh/load/',
							'url_tambah' => base_url().'index.php/file/tambah',
							'url_ubah' => base_url().'index.php/file/ubah/id/',
							'url_hapus' => base_url().'index.php/file/hapus/id/');
		$this->session->set_flashdata($data_index);
	}

	function index()
	{
		$data['file'] = $this->file->tampil();
		$this->load->view('file/tampil',$data);
	}
}
?>