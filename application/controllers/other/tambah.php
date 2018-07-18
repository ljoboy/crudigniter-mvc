<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class tambah extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('other');
		$data_index = array('nav' => 'other',
							'hal' => 'tambah',
							'url_tampil' => base_url().'index.php/other/tampil',
							'url_simpan' => base_url().'index.php/other/tambah/simpan');
		$this->session->set_flashdata($data_index);
	}

	function index()
	{
		$this->load->view('other/tambah');
	}

	function validasi()
    {
        $data = array(
                    array('field' => 'email',
                          'rules' => 'required|valid_email|max_length[40]',
                          'errors' => 
                          array('required' => 'Email wajib diisi.',
                          		'valid_email' => 'Masukan email sesuai format.',
                                'max_length' => 'Karakter email maksimal 40.'),
                    ),
                    array('field' => 'no_telp',
                          'rules' => 'required|numeric|max_length[12]',
                          'errors' => 
                          array('required' => 'No telepon wajib diisi.',
                          		'numeric' => 'No telepon harus berupa angka.',
                                'max_length' => 'Karakter no telepon maksimal 12.'),
                    ),
                );
        $this->form_validation->set_rules($data);
    }

	function simpan()
	{
		$post_email = $this->input->post('email');
		$post_notelp = $this->input->post('no_telp');
		$this->validasi();

		if($this->form_validation->run() == false)
		{
			$this->index();
		}
		else
		{
			$data = array('email' => strtolower($post_email),
						  'no_telp' => $post_notelp);
			$tambah = $this->other->tambah($data);
			if(!$tambah)
			{
				$notif = array('id' => 'gagal',
							   'pesan' => 'Gagal Menyimpan Data.');
				$this->session->set_flashdata($notif);
			}
			else
			{
				$notif = array('id' => 'berhasil',
							   'pesan' => 'Berhasil Menyimpan Data.');
				$this->session->set_flashdata($notif);
			}
			redirect(base_url("index.php/other/tampil"));
		}
	}
}
?>