<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ubah extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('gambar');
		$data_index = array('nav' => 'gambar',
							'hal' => 'tambah',
							'url_tampil' => base_url().'index.php/gambar/tampil',
							'url_simpan' => base_url().'index.php/gambar/ubah/simpan');
		$this->session->set_flashdata($data_index);
	}

	function id($id)
	{
        $data['img'] = $this->gambar->pilih($id);
		$this->load->view('gambar/ubah',$data);
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
                    array('field' => 'gambar',
                          'rules' => 'callback_req|callback_ext|callback_size'
                    ),
                );
        $this->form_validation->set_rules($data);
    }

    function req()
    {
		if($_FILES['gambar']['name'])
		{
			return true;
		}
		else
		{
			$this->form_validation->set_message('req','Gambar wajib diisi.');
			return false;
		}
    }

    function ext()
    {
    	$allowed = array('image/jpg','image/jpeg','image/png');
    	$extensi = get_mime_by_extension($_FILES['gambar']['name']);

    	if(in_array($extensi, $allowed))
    	{
    		return true;
    	}
    	else
    	{
    		$this->form_validation->set_message('ext','Pilih gambar sesuai format.');
			return false;
    	}
    }

    function size()
    {
    	$size = $_FILES['gambar']['size'];

    	if($size < 2097152) // 1 MB = 1048576 byte
    	{
    		return true;
    	}
    	else
    	{
    		$this->form_validation->set_message('size','Ukuran gambar harus kurang dari 2mb.');
    		return false;
    	}
    }

	function simpan()
	{
		$post_id = $this->input->post('id');
		$post_src = $this->input->post('source');
		$post_nama = $this->input->post('nama');
		$post_gambar = $this->input->post('gambar');
		$this->validasi();

		if($this->form_validation->run() == false)
		{
			$this->id($post_id);
		}
		else
		{
			$config['upload_path'] = './data/gambar/src/';
			$config['allowed_types'] = 'jpg|jpeg|png';
			$config['max_size'] = '2100';
			$config['remove_space'] = TRUE;
			$config['encrypt_name'] = TRUE;
			$this->load->library('upload',$config);
			
			if(!$this->upload->do_upload('gambar'))
			{
				$notif = array('id' => 'gagal',
							   'pesan' => 'Gagal Mengunggah Gambar.');
				$this->session->set_flashdata($notif);
				redirect(base_url("index.php/gambar/tampil"));
			}
			else
			{
				$file = $this->upload->data();
				$resize['image_library'] = 'gd2';
				$resize['source_image'] = './data/gambar/src/'.$file['file_name'];
				$resize['maintain_ratio'] = TRUE;
				$resize['new_image'] = './data/gambar/thumb/thumb-'.$file['file_name'];
				$this->load->library('image_lib',$resize);

				if(!$this->image_lib->resize())
				{
					unlink("./data/gambar/src/".$file['file_name']);
					$notif = array('id' => 'gagal',
							   'pesan' => 'Gagal Mengunggah Gambar.');
					$this->session->set_flashdata($notif);
					redirect(base_url("index.php/gambar/tampil"));
				}
				else
				{
					$data = array('nama' => strtolower($post_nama),
								  'source' => $file['file_name'],
								  'ukuran' => $file['file_size'],
								  'tipe' => $file['file_type']);
					$ubah = $this->gambar->ubah($post_id,$data);
					if($ubah)
					{
						unlink("./data/gambar/src/".$post_src);
						unlink("./data/gambar/thumb/thumb-".$post_src);
						$notif = array('id' => 'berhasil',
									   'pesan' => 'Berhasil Mengunggah Gambar.');
						$this->session->set_flashdata($notif);
					}
					else
					{
						unlink("./data/gambar/src/".$file['file_name']);
						unlink("./data/gambar/thumb/thumb-".$file['file_name']);
						$notif = array('id' => 'gagal',
									   'pesan' => 'Gagal Mengunggah Gambar.');
						$this->session->set_flashdata($notif);
					}
					redirect(base_url("index.php/gambar/tampil"));
				}
			}
		}
	}
}
?>