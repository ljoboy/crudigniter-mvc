<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class hapus extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('gambar');
		$data_index = array('nav' => 'gambar',
							'hal' => 'tampil',
							'url_unduh' => base_url().'index.php/gambar/unduh/id/',
							'url_tambah' => base_url().'index.php/gambar/tambah',
							'url_ubah' => base_url().'index.php/gambar/ubah/id/',
							'url_hapus' => base_url().'index.php/gambar/hapus/id/');
		$this->session->set_flashdata($data_index);
	}

	function id($id,$src)
	{
		if(!$id)
		{
			$notif = array('id' => 'id',
						   'pesan' => 'Pilih data yg akan dihapus.');
			$this->session->set_flashdata($notif);
			redirect(base_url("index.php/gambar/tampil"));
		}
		else
		{
			$cekId = $this->gambar->pilih($id);
			if(!$cekId)
			{
				$notif = array('id' => 'id',
							   'pesan' => 'ID tidak terdaftar.');
				$this->session->set_flashdata($notif);
			}
			else
			{
				$hapus = $this->gambar->hapus($id);
				if($hapus)
				{
					unlink("./data/gambar/src/".$src);
					unlink("./data/gambar/thumb/thumb-".$src);
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
			redirect(base_url("index.php/gambar/tampil"));
		}
	}
}
?>