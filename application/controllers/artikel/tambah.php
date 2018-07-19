<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class tambah extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('artikel');
		$data_index = array('nav' => 'artikel',
							'hal' => 'tambah',
							'url_tampil' => base_url().'index.php/artikel/tampil',
							'url_simpan' => base_url().'index.php/artikel/tambah/simpan');
		$this->session->set_flashdata($data_index);
	}

	function index()
	{
		$this->load->view('artikel/tambah');
	}

	function validasi()
	{
		$data = array(
					array('field' => 'judul',
						  'rules' => 'required|min_length[20]|max_length[200]',
						  'errors' => 
						  array('required' => 'Judul artikel wajib diisi.',
								'min_length' => 'Karakter judul artikel minimal 20.',
								'max_length' => 'Karakter judul artikel maksimal 200.')
						),

					array('field' => 'gambar',
						  'rules' => 'callback_ext|callback_size'),

					array('field' => 'isi',
						  'rules' => 'required|min_length[200]|max_length[65535]',
						  'errors' =>
						  array('required' => 'Isi artikel wajib diisi.',
								'min_length' => 'Karakter isi artikel minimal 200.',
								'max_length' => 'Karakter isi artikel melebihi batas format.')
						),

					array('field' => 'tag',
						  'rules' => 'required|max_length[200]|callback_tag',
						  'errors' =>
						  array('required' => 'Tag wajib diisi.',
								'max_length' => 'Karakter tag maksimal 200.')
						)
					);
        $this->form_validation->set_rules($data);
	}

    function ext()
    {
    	if(!$_FILES['gambar']['name'])
    	{
    		return true;
    	}
    	else
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
    }

    function size()
    {
    	if(!$_FILES['gambar']['name'])
    	{
    		return true;
    	}
    	else
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
    }

    function tag()
    {
    	$tag = explode(',',$this->input->post('tag'));
    	$jml_tag = 0;
    	foreach($tag as $tg)
        {
            $jml_tag++;
        }

    	if($jml_tag >= 3)
    	{
    		return true;
    	}
    	else
    	{
    		$this->form_validation->set_message('tag','Kalimat tag minimal 3.');
	    	return false;
    	}
    }

	function simpan()
	{
		$post_judul = $this->input->post('judul');
		$post_gambar = $this->input->post('gambar');
		$post_isi = $this->input->post('isi');
		$post_tag = $this->input->post('tag');
		$this->validasi();
 
		if($this->form_validation->run() == false)
		{
			$this->index();
		}
		else
		{
			if($_FILES['gambar']['name'])
			{
				$config['upload_path'] = './data/artikel/';
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
					redirect(base_url("index.php/artikel/tampil"));
				}
				else
				{
					$file = $this->upload->data();
					$data = array('judul' => strtolower($post_judul),
								  'tgl_post' => date('Y-m-d H:i:s'),
								  'gambar' => $file['file_name'],
								  'isi' => $post_isi,
								  'tag' => strtolower($post_tag));
					$tambah = $this->artikel->tambah($data);
					if($tambah)
					{
						$notif = array('id' => 'berhasil',
									   'pesan' => 'Berhasil Menyimpan Data.');
						$this->session->set_flashdata($notif);
					}
					else
					{
						unlink("./data/artikel/".$file['file_name']);
						$notif = array('id' => 'gagal',
									   'pesan' => 'Gagal Menyimpan Data.');
						$this->session->set_flashdata($notif);
					}
					redirect(base_url("index.php/artikel/tampil"));
				}
			}
			else
			{
				$data = array('judul' => strtolower($post_judul),
							  'tgl_post' => date('Y-m-d H:i:s'),
							  'gambar' => "default.png",
							  'isi' => $post_isi,
							  'tag' => strtolower($post_tag));
				$tambah = $this->artikel->tambah($data);
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
				redirect(base_url("index.php/artikel/tampil"));
			}
		}
	}
}
?>