<?php

class Produk extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        $this->load->model('back_model', 'bm');
    }


    function index()
    {
        $produk = $this->bm->getProduk();

        $data = [
            'title' => 'Data Produk',
            'produk' => $produk
        ];

        $this->load->view('back/header', $data);
        $this->load->view('back/produk');
        $this->load->view('back/footer');
    }

    function tambah()
    {
        $kategori  = $this->bm->getKategori();

        $data = [
            'title'     => 'Tambah Produk',
            'kategori'  => $kategori
        ];

        $this->load->view('back/header', $data);
        $this->load->view('back/form_produk');
        $this->load->view('back/footer');
    }

    function getSuplier()
    {
        $id = $this->input->post('id');

        $suplier = $this->bm->getSuplier($id);

        $data = json_encode($suplier);

        echo $data;
    }

    function simpan()
    {
        $id_kategori    = $this->input->post('kategori');
        $nama_produk    = $this->input->post('nama');
        $harga          = $this->input->post('harga');
        $berat          = $this->input->post('berat');
        $stok           = $this->input->post('stok');

            $config['upload_path']          = './assets/img/';
            $config['allowed_types']        = 'jpeg|jpg|png';
            $config['max_size']             = 2048;
            $config['max_width']            = '';
            $config['max_height']           = '';
            $config['overwrite']            = false;
            $config['remove_spaces']        = 'true';

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('img'))
            {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Gagal!</strong> Ukuran gambar terlalu besar, Max 2Mb atau gambar bukan bertipe JPG,JPEG,PNG.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect("produk/tambah");
            }
            else
            {
                $gambar = $this->upload->data('file_name');
            }


        $data = [
            'id_kategori'   => $id_kategori,
            'nama_produk'   => $nama_produk,
            'harga'         => $harga,
            'berat'         => $berat,
            'stok'          => $stok,
            'img'           => $gambar
        ];

        $this->bm->simpanProduk($data);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Berhasil!</strong> Produk berhasil disimpan.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect("produk");
    }

    function ubah($id)
    {
        $kategori  = $this->bm->getKategori();
        $produk    = $this->bm->getProdukByID($id);

        $data = [
            'title'     => 'Ubah Produk',
            'kategori'  => $kategori,
            'produk'    => $produk,
        ];

        $this->load->view('back/header', $data);
        $this->load->view('back/form_produk_ubah');
        $this->load->view('back/footer');
    }

    function update()
    {
        $id          = $this->input->post('id');
        $id_kategori    = $this->input->post('kategori');
        $nama_produk    = $this->input->post('nama');
        $harga          = $this->input->post('harga');
        $berat          = $this->input->post('berat');
        $stok           = $this->input->post('stok');

        if( $_FILES['img']['name'] != '' ){

            $config['upload_path']          = 'assets/img/';
            $config['allowed_types']        = 'jpeg|jpg|png';
            $config['max_size']             = 2048;
            $config['max_width']            = '';
            $config['max_height']           = '';
            $config['overwrite']            = false;
            $config['remove_spaces']        = 'true';

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if ( ! $this->upload->do_upload('img'))
            {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Gagal!</strong> Ukuran gambar terlalu besar, Max 2Mb atau gambar bukan bertipe JPG,JPEG,PNG.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect("produk/ubah");
            }
            else
            {
                $gambar = $this->upload->data('file_name');
            }

            $data = [
                'id_kategori'   => $id_kategori,
                'nama_produk'   => $nama_produk,
                'harga'         => $harga,
                'berat'         => $berat,
                'stok'          => $stok,
                'img'           => $gambar
            ];

            $this->db->where('id_produk', $id);
            $query = $this->db->get('produk')->row();
            unlink("./assets/img/$query->img");

           $this->bm->ubahProduk($id, $data);

           $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Produk berhasil di ubah.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('produk');
        }else{
            $data = [
                'id_kategori'   => $id_kategori,
                'nama_produk'   => $nama_produk,
                'harga'         => $harga,
                'berat'         => $berat,
                'stok'          => $stok,
            ];

            $this->bm->ubahProduk($id, $data);

            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Produk berhasil di ubah.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('produk');
        }
    }

    function hapus()
    {
        $id = $this->input->post('id');

        $this->bm->hapusProduk($id);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Produk berhasil dihapus.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('produk');
    }


}