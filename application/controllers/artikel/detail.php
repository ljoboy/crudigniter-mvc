<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class detail extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('artikel');
		$data_index = array('nav' => 'artikel',
							'hal' => 'detail',
							'url_tampil' => base_url().'index.php/artikel/tampil',
							'url_ubah' => base_url().'index.php/artikel/ubah/id/',
							'url_hapus' => base_url().'index.php/artikel/hapus/id/');
		$this->session->set_flashdata($data_index);
	}

	function id($id)
	{
		$data['news'] = $this->artikel->pilih($id);
		$this->load->view('artikel/detail',$data);
	}
}
?>