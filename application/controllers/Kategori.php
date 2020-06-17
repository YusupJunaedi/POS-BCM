<?php

class Kategori extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        $this->load->model('back_model', 'bm');
    }


    function index()
    {
        $kategori  = $this->bm->getKategori();

        $data = [
            'title'     => 'Kategori',
            'kategori'  => $kategori
        ];

        $this->load->view('back/header', $data);
        $this->load->view('back/kategori');
        $this->load->view('back/footer');
    }

    function tambah()
    {
        $data = [
            'title'     => 'Tambah Kategori',
        ];

        $this->load->view('back/header', $data);
        $this->load->view('back/form_kategori');
        $this->load->view('back/footer');
    }

    function simpan()
    {
        $namaKategori = $this->input->post('nama');

        $data = [
            'nama_kategori' => $namaKategori
        ];
        
        $this->bm->insertKategori($data);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Berhasil!</strong> Kategori berhasil ditambahkan.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect("kategori");
    }

    function ubah($id)
    {
        $kategori = $this->bm->getKategoriById($id);

        $data = [
            'title'     => 'Ubah Kategori',
            'kategori'  => $kategori
        ];

        $this->load->view('back/header', $data);
        $this->load->view('back/form_kategori_ubah');
        $this->load->view('back/footer');
    }

    function update()
    {
        $id = $this->input->post('id');
        $kategori = $this->input->post('nama');

        $data = [
            'nama_kategori' => $kategori
        ];

        $this->bm->updateKategori($id, $data);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Berhasil!</strong> Kategori berhasil diubah.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect("kategori");
    }

    function hapus()
    {
        $id = $this->input->post('id');
        $this->bm->hapusKategori($id);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Berhasil!</strong> Kategori berhasil dihapus.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect("kategori");
    }

}