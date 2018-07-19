<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class tampil extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('tanggal');
		$data_index = array('nav' => 'tanggal',
							'hal' => 'tampil',
							'url_tambah' => base_url().'index.php/tanggal/tambah',
							'url_ubah' => base_url().'index.php/tanggal/ubah/id/',
							'url_hapus' => base_url().'index.php/tanggal/hapus/id/');
		$this->session->set_flashdata($data_index);
	}

	function index()
	{
		$data['tgl'] = $this->tanggal->tampil();
		$this->load->view('tanggal/tampil',$data);
	}
}
?>