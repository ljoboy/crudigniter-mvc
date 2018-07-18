<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class hapus extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('pilihan');
		$data_index = array('nav' => 'pilihan',
							'hal' => 'tampil',
							'url_tambah' => base_url().'index.php/tanggal/tambah',
							'url_ubah' => base_url().'index.php/tanggal/ubah/id/',
							'url_hapus' => base_url().'index.php/tanggal/hapus/id/');
		$this->session->set_flashdata($data_index);
	}

	function id($id)
	{
		if(!$id)
		{
			$notif = array('id' => 'id',
						   'pesan' => 'Pilih data yg akan dihapus.');
			$this->session->set_flashdata($notif);
			redirect(base_url("index.php/pilihan/tampil"));
		}
		else
		{
			$cekId = $this->pilihan->pilih($id);
			if(!$cekId)
			{
				$notif = array('id' => 'id',
							   'pesan' => 'ID tidak terdaftar.');
				$this->session->set_flashdata($notif);
			}
			else
			{
				$hapus = $this->pilihan->hapus($id);
				if($hapus)
				{
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
			redirect(base_url("index.php/pilihan/tampil"));
		}
	}
}
?>