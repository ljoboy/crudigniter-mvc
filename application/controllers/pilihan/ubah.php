<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ubah extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('pilihan');
		$data_index = array('nav' => 'pilihan',
							'hal' => 'tambah',
							'url_tampil' => base_url().'index.php/pilihan/tampil',
							'url_simpan' => base_url().'index.php/pilihan/ubah/simpan');
		$this->session->set_flashdata($data_index);
	}

	function id($id)
	{
		if(!$id)
        {
            $notif = array('id' => 'id',
                           'pesan' => 'Pilih data yang akan diubah.');
            $this->session->set_flashdata($notif);
            redirect(base_url("index.php/pilihan/tampil"));
        }
        else
        {
	        $data['plh'] = $this->pilihan->pilih($id);
			$this->load->view('pilihan/ubah',$data);
		}
	}

	function validasi()
	{
		$data = array(
					array('field' => 'id',
						  'rules' => 'required|max_length[4]',
						  'errors' => 
						  array('required' => 'ID wajib diisi.',
								'max_length' => 'Karakter id maksimal 4.')
						),
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
		$post_id = $this->input->post('id');
		$post_jk = $this->input->post('jenis_kelamin');
		$post_hobi = $this->input->post('hobi');
		$this->validasi();
 
		if($this->form_validation->run() == false)
		{
			$this->id($poat_id);
		}
		else
		{
			$data = array('jenis_kelamin' => $post_jk,
						  'hobi' => implode(",",$post_hobi));
			$ubah = $this->pilihan->ubah($post_id,$data);
			if($ubah)
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