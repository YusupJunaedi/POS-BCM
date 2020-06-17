<?php

class Profile extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        $this->load->model('front_model', 'fm');
    }


    function user($id)
    {
        $kategori = $this->fm->getKategori();
        $user = $this->fm->getDataUser($id);

        $data = [
            'title' => 'Profile',
            'kategori'  => $kategori,
            'user'      => $user
        ];

        $this->load->view('front/header', $data);
        $this->load->view('front/data_profile');
        $this->load->view('front/footer');
    }

    function edit($id)
    {
        $kategori = $this->fm->getKategori();
        $user = $this->fm->getDataUser($id);

        $data = [
            'title' => 'Ubah Data Profile',
            'kategori'  => $kategori,
            'user'      => $user
        ];

        $this->load->view('front/header', $data);
        $this->load->view('front/edit_profile');
        $this->load->view('front/footer');
    }

    function ubah()
    {
        $id_user     = $this->input->post('id');
        $nik         = $this->input->post('nik');
        $nama        = $this->input->post('nama');
        $email       = $this->input->post('email');
        $toko        = $this->input->post('toko');
        $password    = $this->input->post('password');
        $tlp         = $this->input->post('tlp');
        $alamat      = $this->input->post('alamat');

        if($password == '')
        {
            $data = [
                'nik'       => $nik,
                'nama'      => $nama,
                'email'     => $email,
                'no_tlp'    => $tlp,
                'nama_toko' => $toko,
                'alamat'    => $alamat,
                'role_id'    => 1
            ];
        }else{
            $data = [
                'nik'       => $nik,
                'nama'      => $nama,
                'email'     => $email,
                'no_tlp'    => $tlp,
                'nama_toko' => $toko,
                'alamat'    => $alamat,
                'password'  => password_hash($password, PASSWORD_DEFAULT),
                'role_id'    => 1
            ];
        }

        $this->fm->updateDataUser($id_user, $data);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Berhasil!</strong> Profile berhasil diubah.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('profile/user/'.$id_user);
    }

}