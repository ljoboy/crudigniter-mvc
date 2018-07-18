<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class tambah extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('file');
		$data_index = array('nav' => 'file',
							'hal' => 'tambah',
							'url_tampil' => base_url().'index.php/file/tampil',
							'url_simpan' => base_url().'index.php/file/tambah/simpan');
		$this->session->set_flashdata($data_index);
	}

	function index()
	{
		$this->load->view('file/tambah');
	}

	function validasi()
    {
        $data = array(
                    array('field' => 'nama',
                          'rules' => 'required|max_length[40]',
                          'errors' => 
                          array('required' => 'Nama wajib diisi.',
                                'max_length' => 'Karakter nama maksimal 40.'),
                    ),
                    array('field' => 'file',
                          'rules' => 'callback_req|callback_ext|callback_size'
                    ),
                );
        $this->form_validation->set_rules($data);
    }

    function req()
    {
		if($_FILES['file']['name'])
		{
			return true;
		}
		else
		{
			$this->form_validation->set_message('req','File wajib diisi.');
			return false;
		}
    }

    function ext()
    {
    	$not_allowed = array('image/jpg','image/jpeg','image/png');
    	$extensi = get_mime_by_extension($_FILES['file']['name']);

    	if(!in_array($extensi, $not_allowed))
    	{
    		return true;
    	}
    	else
    	{
    		$this->form_validation->set_message('ext','Pilih file sesuai format.');
			return false;
    	}
    }

    function size()
    {
    	$size = $_FILES['file']['size'];

    	if($size < 104857600) // 1 MB = 1048576 byte
    	{
    		return true;
    	}
    	else
    	{
    		$this->form_validation->set_message('size','Ukuran file harus kurang dari 100mb.');
    		return false;
    	}
    }

	function simpan()
	{
		$post_nama = $this->input->post('nama');
		$post_file = $this->input->post('file');
		$this->validasi();

		if($this->form_validation->run() == false)
		{
			$this->index();
		}
		else
		{
			$config['upload_path'] = './data/file/';
			$config['allowed_types'] = '*';
			$config['remove_space'] = TRUE;
			$config['encrypt_name'] = TRUE;
			$this->load->library('upload',$config);

			if(!$this->upload->do_upload('file'))
			{
				$notif = array('id' => 'gagal',
							   'pesan' => 'Gagal Mengunggah File.');
				$this->session->set_flashdata($notif);
				redirect(base_url("index.php/file/tampil"));
			}
			else
			{
				$file = $this->upload->data();
				$data = array('nama' => strtolower($post_nama),
							  'source' => $file['file_name'],
							  'ukuran' => $file['file_size'],
							  'tipe' => $file['file_type']);
				$tambah = $this->file->tambah($data);
				if($tambah)
				{
					$notif = array('id' => 'berhasil',
								   'pesan' => 'Berhasil Mengunggah File.');
					$this->session->set_flashdata($notif);
				}
				else
				{
					unlink("./data/file/".$file['file_name']);
					$notif = array('id' => 'gagal',
								   'pesan' => 'Gagal Mengunggah File.');
					$this->session->set_flashdata($notif);
				}
				redirect(base_url("index.php/file/tampil"));
			}
		}
	}
}
?>