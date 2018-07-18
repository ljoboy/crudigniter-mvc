<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class hapus extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('other');
		$data_index = array('nav' => 'other',
							'hal' => 'tampil',
							'url_tambah' => base_url().'index.php/other/tambah',
							'url_ubah' => base_url().'index.php/other/ubah/id/',
							'url_hapus' => base_url().'index.php/other/hapus/id/');
		$this->session->set_flashdata($data_index);
	}

	function id($id)
	{
		if(!$id)
		{
			$notif = array('id' => 'id',
						   'pesan' => 'Pilih data yg akan dihapus.');
			$this->session->set_flashdata($notif);
			redirect(base_url("index.php/other/tampil"));
		}
		else
		{
			$cekId = $this->other->pilih($id);
			if(!$cekId)
			{
				$notif = array('id' => 'id',
							   'pesan' => 'ID tidak terdaftar.');
				$this->session->set_flashdata($notif);
			}
			else
			{
				$hapus = $this->other->hapus($id);
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
			redirect(base_url("index.php/other/tampil"));
		}
	}
}
?>