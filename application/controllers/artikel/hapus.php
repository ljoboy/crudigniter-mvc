<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class hapus extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('artikel');
		$data_index = array('nav' => 'artikel',
							'hal' => 'tampil',
							'url_tambah' => base_url().'index.php/artikel/tambah',
							'url_ubah' => base_url().'index.php/artikel/ubah/id/',
							'url_hapus' => base_url().'index.php/artikel/hapus/id/');
		$this->session->set_flashdata($data_index);
	}

	function id($id,$src)
	{
		if(!$id)
		{
			$notif = array('id' => 'id',
						   'pesan' => 'Pilih data yg akan dihapus.');
			$this->session->set_flashdata($notif);
			redirect(base_url("index.php/artikel/tampil"));
		}
		else
		{
			$cekId = $this->artikel->pilih($id);
			if(!$cekId)
			{
				$notif = array('id' => 'id',
							   'pesan' => 'ID tidak terdaftar.');
				$this->session->set_flashdata($notif);
			}
			else
			{
				$hapus = $this->artikel->hapus($id);
				if($hapus)
				{
					if($src == 'default.jpg')
					{
						$notif = array('id' => 'berhasil',
									   'pesan' => 'Berhasil Menghapus Data.');
						$this->session->set_flashdata($notif);
					}
					else
					{
						unlink("./data/artikel/".$src);
						$notif = array('id' => 'berhasil',
									   'pesan' => 'Berhasil Menghapus Data.');
						$this->session->set_flashdata($notif);
					}
				}
				else
				{
					$notif = array('id' => 'gagal',
								   'pesan' => 'Gagal Menghapus Data.');
					$this->session->set_flashdata($notif);
				}
			}
			redirect(base_url("index.php/artikel/tampil"));
		}
	}
}
?>