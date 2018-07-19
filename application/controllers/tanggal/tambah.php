<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class tambah extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('tanggal');
		$data_index = array('nav' => 'tanggal',
							'hal' => 'tambah',
							'url_tampil' => base_url().'index.php/tanggal/tampil',
							'url_simpan' => base_url().'index.php/tanggal/tambah/simpan');
		$this->session->set_flashdata($data_index);
	}

	function index()
	{
		$this->load->view('tanggal/tambah');
	}

    function tgl_indo($tanggal, $cetak_hari = false)
    {
        $hari = array(1=>'Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu');
        $bulan = array(1=>'Januari','Februari','Maret','April','Mei','Juni','Juli',
                          'Agustus','September','Oktober','November','Desember');
        $split = explode('-', $tanggal);
        $tgl_indo = $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
        
        if($cetak_hari)
        {
            $num = date('N', strtotime($tanggal));
            return $hari[$num] . ', ' . $tgl_indo;
        }
        return $tgl_indo;
    }

	function validasi()
    {
        $data = array(
                    array('field' => 'tgl_lahir',
                          'rules' => 'callback_req_tgl|callback_leng_tgl|callback_min_tgl|callback_max_tgl'),
                    array('field' => 'umur',
                          'rules' => 'callback_req_umur|callback_min_umur|callback_max_umur')
                	);
        $this->form_validation->set_rules($data);
    }

    function req_tgl($post_tgl)
    {
    	if($post_tgl == '')
    	{
    		$this->form_validation->set_message('req_tgl','Tanggal lahir wajib diisi.');
    		return false;
    	}
    	else
    	{
    		return true;
    	}
    }

    function leng_tgl($post_tgl)
    {
    	if(strlen($post_tgl) != 10)
    	{
    		$this->form_validation->set_message('leng_tgl','Masukan tanggal lahir sesuai format.');
    		return false;
    	}
    	else
    	{
    		return true;
    	}
    }

    function min_tgl($post_tgl)
    {
    	$tgl = date('d');
		$bln = date('m');
		$thn = date('Y');
		$min = ($thn - 65);
		$fix_min = $tgl."-".$bln."-".$min;
		$view_min = date('Y-m-d',strtotime($fix_min));

    	if(strtotime($post_tgl) < strtotime($fix_min))
    	{
    		$this->form_validation->set_message('min_tgl','Tanggal lahir harus sesudah '.$this->tgl_indo($view_min, false).'.');
    		return false;
    	}
    	else
    	{
    		return true;
    	}
    }

    function max_tgl($post_tgl)
    {
    	$tgl = date('d');
		$bln = date('m');
		$thn = date('Y');
		$max = ($thn - 6);
		$fix_max = $tgl."-".$bln."-".$max;
		$view_max = date('Y-m-d',strtotime($fix_max));

    	if(strtotime($post_tgl) > strtotime($fix_max))
    	{
    		$this->form_validation->set_message('max_tgl','Tanggal lahir harus sebelum '.$this->tgl_indo($view_max, false).'.');
    		return false;
    	}
    	else
    	{
    		return true;
    	}
    }

    function req_umur($post_umur)
    {
    	if($post_umur == '')
    	{
    		$this->form_validation->set_message('req_umur','Umur wajib diisi.');
    		return false;
    	}
    	else
    	{
    		return true;
    	}
    }

    function min_umur($post_umur)
    {
    	if($post_umur < 6)
    	{
    		$this->form_validation->set_message('min_umur','Umur harus lebih dari 6 Tahun.');
    		return false;
    	}
    	else
    	{
    		return true;
    	}
    }

    function max_umur($post_umur)
    {
    	if($post_umur > 65)
    	{
    		$this->form_validation->set_message('max_umur','Umur harus kurang dari 65 Tahun.');
    		return false;
    	}
    	else
    	{
    		return true;
    	}
    }

	function simpan()
	{
		$post_lahir = $this->input->post('tgl_lahir');
		$post_umur = $this->input->post('umur');
		$this->validasi();
 
		if($this->form_validation->run() == false)
		{
			$this->index();
		}
		else
		{
			$umur = substr($post_umur,0,-5);
			$data = array('tgl_lahir' => $post_lahir,
						  'umur' => $umur);
			$tambah = $this->tanggal->tambah($data);
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
			redirect(base_url("index.php/tanggal/tampil"));
		}
	}
}
?>