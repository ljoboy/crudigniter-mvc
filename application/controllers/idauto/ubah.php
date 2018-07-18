<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ubah extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('idAuto');
        $data_index = array('nav' => 'idauto',
                            'hal' => 'ubah',
                            'url_tampil' => base_url().'index.php/idauto/tampil',
                            'url_simpan' => base_url().'index.php/idauto/ubah/simpan');
        $this->session->set_flashdata($data_index);
    }

    function id($id)
    {
        if(!$id)
        {
            $notif = array('id' => 'id',
                           'pesan' => 'Pilih data yang akan diubah.');
            $this->session->set_flashdata($notif);
            redirect(base_url("index.php/idauto/tampil"));
        }
        else
        {
            $data['auto'] = $this->idAuto->pilih($id);
            $this->load->view('idauto/ubah',$data);
        }
    }

    function validasi()
    {
        $data = array(
                    array('field' => 'id',
                          'rules' => 'required|min_length[2]|max_length[7]',
                          'errors' => 
                          array('required' => 'ID wajib diisi.',
                                'min_length' => 'Karakter ID minimal 2.',
                                'max_length' => 'Karakter ID maksimal 7.'),
                    ),
                    array('field' => 'nama',
                          'rules' => 'required|min_length[2]|max_length[40]',
                          'errors' => 
                          array('required' => 'Nama wajib diisi.',
                                'min_length' => 'Karakter nama minimal 2.',
                                'max_length' => 'Karakter nama maksimal 40.'),
                    ),
                );
        $this->form_validation->set_rules($data);
    }

    function simpan()
    {
        $this->validasi();
        $post_id = $this->input->post('id');
        $post_nama = $this->input->post('nama');
 
        if($this->form_validation->run() == false)
        {
            $this->id($post_id);
        }
        else
        {
            $id = strtolower($post_id);
            $cekId = $this->idAuto->pilih($id);
            if(!$cekId)
            {
                $notif = array('id' => 'id',
                               'pesan' => 'ID tidak terdaftar.');
                $this->session->set_flashdata($notif);
            }
            else
            {
                $data = array('id' => strtolower($post_id),
                              'nama' => strtolower($post_nama));
                $ubah = $this->idAuto->ubah($id,$data);
                if(!$ubah)
                {
                    $notif = array('id' => 'gagal',
                                   'pesan' => 'Gagal Menyimpan Data.');
                    $this->session->set_flashdata($notif);
                }
                else
                {
                    $notif = array('id' => 'berhasil',
                                   'pesan' => 'Berhasil Menyimpan Data.');
                    $this->session->set_flashdata($notif);
                }
                redirect(base_url("index.php/idauto/tampil"));
            }
        }
    }
}
?>