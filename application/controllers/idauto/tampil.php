<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class tampil extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('idAuto');
		$data_index = array('nav' => 'idauto',
							'hal' => 'tampil',
							'url_tambah' => base_url().'index.php/idauto/tambah',
							'url_ubah' => base_url().'index.php/idauto/ubah/id/',
							'url_hapus' => base_url().'index.php/idauto/hapus/id/');
		$this->session->set_flashdata($data_index);
	}

	function index()
	{
		$data['auto'] = $this->idAuto->tampil();
		$this->load->view('idauto/tampil',$data);
	}
}
?>