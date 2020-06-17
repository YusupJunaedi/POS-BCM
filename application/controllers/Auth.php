<?php

class Auth extends CI_controller{

    function __construct()
    {
        parent::__construct();
        $this->load->model('front_model', 'fm');
    }

    function index()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $user = $this->fm->getUser($email);

        if(password_verify($password, $user['password'])){
            $data = [
                'user_id' => $user['id_user'],
                'nama'  => $user['nama'],
                'email' => $user['email'],
                'role_id' => $user['role_id']
            ];

            if($user['role_id'] == 1){
                $this->session->set_userdata($data);
                redirect('home');
            }else{
                $this->session->set_userdata($data);
                redirect('dashboard');
            }

        }else{
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>GAgal!</strong> email dan password Salah !.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('auth/login');
        }
    }

    function login()
    {
        $kategori = $this->fm->getKategori();
      
        $data = [
            'title'     => 'Login',
            'kategori'  => $kategori,
        ];

        $this->load->view('front/header', $data);
        $this->load->view('front/login');
        $this->load->view('front/footer');
    }

    function daftar()
    {
        $kategori = $this->fm->getKategori();
      
        $data = [
            'title'     => 'Register',
            'kategori'  => $kategori,
        ];

        $this->load->view('front/header', $data);
        $this->load->view('front/register');
        $this->load->view('front/footer');
    }

    function register()
    {
        $nik         = $this->input->post('nik');
        $nama        = $this->input->post('nama');
        $email       = $this->input->post('email');
        $toko        = $this->input->post('toko');
        $password    = $this->input->post('password');
        $tlp         = $this->input->post('tlp');
        $alamat      = $this->input->post('alamat');

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


        $this->fm->insertUser($data);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> anda telah terdaftar, silahkan login.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
        redirect('auth/login');
    }

    function logout()
    {
        $this->session->sess_destroy();
        redirect('auth/login');
    }


}