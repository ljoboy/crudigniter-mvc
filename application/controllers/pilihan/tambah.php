<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class tambah extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('pilihan');
		$data_index = array('nav' => 'pilihan',
							'hal' => 'tambah',
							'url_tampil' => base_url().'index.php/pilihan/tampil',
							'url_simpan' => base_url().'index.php/pilihan/tambah/simpan');
		$this->session->set_flashdata($data_index);
	}

	function index()
	{
		$this->load->view('pilihan/tambah');
	}

	function validasi()
	{
		$data = array(
					array('field' => 'jenis_kelamin',
						  'rules' => 'required|max_length[10]',
						  'errors' => 
						  array('required' => 'Jenis kelamin wajib dipilih.',
								'max_length' => 'Karakter jenis kelamin maksimal 10.')
						),
					array('field' => 'hobi[]',
						  'rules' => 'required|max_length[40]',
						  'errors' =>
						  array('required' => 'Hobi wajib dipilih.',
								'max_length' => 'Karakter hobi maksimal 40.')
						)
					);
        $this->form_validation->set_rules($data);
	}

	function simpan()
	{
		$post_jk = $this->input->post('jenis_kelamin');
		$post_hobi = $this->input->post('hobi');
		$this->validasi();
 
		if($this->form_validation->run() == false)
		{
			$this->index();
		}
		else
		{
			$data = array('jenis_kelamin' => $post_jk,
						  'hobi' => implode(",",$post_hobi));
			$tambah = $this->pilihan->tambah($data);
			if($tambah)
			{
				$notif = array('id' => 'berhasil',
							   'pesan' => 'Berhasil Menyimpan Data.');
				$this->session->set_flashdata($notif);
			}
			else
			{
				$notif = array('id' => 'gagal',
							   'pesan' => 'Gagal Menyimpan Data.');
				$this->session->set_flashdata($notif);
			}
			redirect(base_url("index.php/pilihan/tampil"));
		}
	}
}
?>