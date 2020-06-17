<?php

class Barang extends CI_controller{

    function __construct()
    {
        parent::__construct();
        $this->load->model('front_model', 'fm');
    }


    function produk($id)
    {
        $produk  = $this->fm->getProduk($id);
        $kategori = $this->fm->getKategori();
        $suplier = $this->fm->getSuplier($id);
        $namaKategori = $this->fm->getNamaKategori($id);
      
        $data = [
            'title'     => $suplier['nama_suplier'],
            'kategori'  => $kategori,
            'suplier'   => $suplier,
            'produk'    => $produk,
            'namaKategori' => $namaKategori
        ];

        $this->load->view('front/header', $data);
        $this->load->view('front/barang');
        $this->load->view('front/footer');
    }

    function cari()
    {
        $namaProduk = $this->input->post('produk');
        $hasil = $this->fm->cariProduk($namaProduk);
        $kategori = $this->fm->getKategori();
      
        $data = [
            'title'     => $namaProduk,
            'kategori'  => $kategori,
            'produk'    => $hasil,
            'namaProduk'=> $namaProduk
        ];

        $this->load->view('front/header', $data);
        $this->load->view('front/cari_barang');
        $this->load->view('front/footer');

    }




}