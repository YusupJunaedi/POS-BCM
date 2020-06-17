<?php

class Home extends CI_controller{

    function __construct()
    {
        parent::__construct();
        $this->load->model('front_model', 'fm');
    }


    function index()
    {
        $kategori = $this->fm->getKategori();
        $produk   = $this->fm->produkRandom();

        $data = [
            'title'     => 'Home',
            'kategori'  => $kategori,
            'produk'    => $produk
        ];

        $this->load->view('front/header', $data);
        $this->load->view('front/home');
        $this->load->view('front/footer');
    }




}