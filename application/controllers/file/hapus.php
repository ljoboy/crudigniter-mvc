<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class hapus extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('file');
		$data_index = array('nav' => 'file',
							'hal' => 'tampil',
							'url_unduh' => base_url().'index.php/file/unduh/id/',
							'url_tambah' => base_url().'index.php/file/tambah',
							'url_ubah' => base_url().'index.php/file/ubah/id/',
							'url_hapus' => base_url().'index.php/file/hapus/id/');
		$this->session->set_flashdata($data_index);
	}

	function id($id,$src)
	{
		if(!$id)
		{
			$notif = array('id' => 'id',
						   'pesan' => 'Pilih data yg akan dihapus.');
			$this->session->set_flashdata($notif);
			redirect(base_url("index.php/file/tampil"));
		}
		else
		{
			$cekId = $this->file->pilih($id);
			if(!$cekId)
			{
				$notif = array('id' => 'id',
							   'pesan' => 'ID tidak terdaftar.');
				$this->session->set_flashdata($notif);
			}
			else
			{
				$hapus = $this->file->hapus($id);
				if($hapus)
				{
					unlink("./data/file/".$src);
					$notif = array('id' => 'berhasil',
								   'pesan' => 'Berhasil Menghapus Data.');
					$this->session->set_flashdata($notif);
				}
				else
				{
					$notif = array('id' => 'gagal',
								   'pesan' => 'Gagal Menghapus Data.');
					$this->session->set_flashdata($notif);
				}
			}
			redirect(base_url("index.php/file/tampil"));
		}
	}
}
?>