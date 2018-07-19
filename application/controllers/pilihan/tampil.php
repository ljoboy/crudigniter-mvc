<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class tampil extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('pilihan');
		$data_index = array('nav' => 'pilihan',
							'hal' => 'tampil',
							'url_tambah' => base_url().'index.php/pilihan/tambah',
							'url_ubah' => base_url().'index.php/pilihan/ubah/id/',
							'url_hapus' => base_url().'index.php/pilihan/hapus/id/');
		$this->session->set_flashdata($data_index);
	}

	function index()
	{
		$data['plh'] = $this->pilihan->tampil();
		$this->load->view('pilihan/tampil',$data);
	}
}
?>