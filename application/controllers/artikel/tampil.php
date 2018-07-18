<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class tampil extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('artikel');
		$data_index = array('nav' => 'artikel',
							'hal' => 'tampil',
							'url_tambah' => base_url().'index.php/artikel/tambah',
							'url_detail' => base_url().'index.php/artikel/detail/id/',
							'url_ubah' => base_url().'index.php/artikel/ubah/id/',
							'url_hapus' => base_url().'index.php/artikel/hapus/id/');
		$this->session->set_flashdata($data_index);
	}

	function index()
	{
		$data['news'] = $this->artikel->tampil();
		$this->load->view('artikel/tampil',$data);
	}
}
?>