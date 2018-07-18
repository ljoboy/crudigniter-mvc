<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ubah extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('other');
        $data_index = array('nav' => 'other',
                            'hal' => 'ubah',
                            'url_tampil' => base_url().'index.php/other/tampil',
                            'url_simpan' => base_url().'index.php/other/ubah/simpan');
        $this->session->set_flashdata($data_index);
    }

    function id($id)
    {
        $data['other'] = $this->other->pilih($id);
        $this->load->view('other/ubah',$data);
    }

    function validasi()
    {
        $data = array(
                    array('field' => 'id',
                          'rules' => 'required|max_length[4]',
                          'errors' => 
                          array('required' => 'ID wajib diisi.',
                                'max_length' => 'Karakter ID maksimal 4.'),
                    ),
                    array('field' => 'email',
                          'rules' => 'required|valid_email|max_length[40]',
                          'errors' => 
                          array('required' => 'Email wajib diisi.',
                                'valid_email' => 'Masukan email sesuai format.',
                                'max_length' => 'Karakter email maksimal 40.'),
                    ),
                    array('field' => 'no_telp',
                          'rules' => 'required|numeric|max_length[12]',
                          'errors' => 
                          array('required' => 'No telepon wajib diisi.',
                                'numeric' => 'No telepon harus berupa angka.',
                                'max_length' => 'Karakter no telepon maksimal 12.'),
                    ),
                );
        $this->form_validation->set_rules($data);
    }

    function simpan()
    {
        $post_id = $this->input->post('id');
        $post_email = $this->input->post('email');
        $post_notelp = $this->input->post('no_telp');
        $this->validasi();
 
        if($this->form_validation->run() == false)
        {
            $this->id($post_id);
        }
        else
        {
            $data = array('email' => strtolower($post_email),
                          'no_telp' => $post_notelp);
            $ubah = $this->other->ubah($post_id,$data);
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
            redirect(base_url("index.php/other/tampil"));
        }
    }
}
?>