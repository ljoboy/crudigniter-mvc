<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class tambah extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('idAuto');
		$data_index = array('nav' => 'idauto',
							'hal' => 'tambah',
							'url_tampil' => base_url().'index.php/idauto/tampil',
							'url_simpan' => base_url().'index.php/idauto/tambah/simpan');
		$this->session->set_flashdata($data_index);
	}

	function index()
	{
		$data['id'] = $this->idAuto->autoinc();
		$this->load->view('idauto/tambah',$data);
	}

	function validasi()
    {
        $data = array(
                    array('field' => 'id',
                          'rules' => 'required|min_length[2]|max_length[7]',
                          'errors' => 
                          array('required' => 'ID wajib diisi.',
                                'min_length' => 'Karakter ID minimal 2.',
                                'max_length' => 'Karakter ID maksimal 7.'),
                    ),
                    array('field' => 'nama',
                          'rules' => 'required|min_length[2]|max_length[40]',
                          'errors' => 
                          array('required' => 'Nama wajib diisi.',
                                'min_length' => 'Karakter nama minimal 2.',
                                'max_length' => 'Karakter nama maksimal 40.'),
                    ),
                );
        $this->form_validation->set_rules($data);
    }

	function simpan()
	{
		$post_id = $this->input->post('id');
		$post_nama = $this->input->post('nama');
		$this->validasi();

		if($this->form_validation->run() == false)
		{
			$this->index();
		}
		else
		{
			$id = strtolower($post_id);
			$cekId = $this->idAuto->pilih($id);
			if($cekId)
			{
				$notif = array('id' => 'id',
							   'pesan' => 'ID tidak boleh sama.');
				$this->session->set_flashdata($notif);
			}
			else
			{
				$data = array('id' => strtolower($post_id),
							  'nama' => strtolower($post_nama));
				$tambah = $this->idAuto->tambah($data);
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
				redirect(base_url("index.php/idauto/tampil"));
			}
		}
	}
}
?>