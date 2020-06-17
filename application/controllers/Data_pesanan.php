<?php

class Data_pesanan extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        $this->load->model('back_model', 'bm');
    }


    function index()
    {
        $penjualan_data   = $this->bm->get_all();

        $data = [
            'title' => 'Data Pesanan',
            'penjualan_data'    => $penjualan_data,
        ];

        $this->load->view('back/header', $data);
        $this->load->view('back/data_pesanan');
        $this->load->view('back/footer');
    }

    function view($id)
    {
        $produk      = $this->bm->get_by_id($id);
        $invoice      = $produk['id_trans'];

        $penjualan = $this->bm->get_by_id($id);
        // ambil data keranjang
        $cart_data  = $this->bm->get_cart_per_customer_finished_back($invoice);
            // ambil total_berat_dan_subtotal
        $total_berat_dan_subtotal = $this->bm->get_total_berat_dan_subtotal_finished_back($invoice);
        $customer_data = $this->bm->get_data_customer_back($invoice);

        $data = [
            'title'         => 'Detail Pemesanan',
            'penjualan'     => $penjualan,
            'cart_data'     => $cart_data,
            'total_berat_dan_subtotal'  => $total_berat_dan_subtotal,
            'customer_data' => $customer_data,
            'nama_user' => $this->session->userdata['nama'],
        ];

        $this->load->view('back/header', $data);
        $this->load->view('back/pemesanan_detail');
        $this->load->view('back/footer');

    }

    public function laporan($id_trans)
    {
        $transaksi = $this->bm->getTransaksiDetail($id_trans);
        $cart_data  = $this->bm->get_cart_per_customer_finished_back($id_trans);

     
        $this->bm->updateLaporan($id_trans);

        $this->bm->dellPenjualan($id_trans);
        $this->bm->dellPenjualanTD($id_trans);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> Pesanan Pelanggan telah dikirim.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');
        redirect('data_pesanan');
    }

    public function dell($id)
    {
        $this->bm->dellPenjualan($id);
        $this->bm->dellPenjualanTD($id);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> Pesanan berhasil dihapus.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect('data_pesanan');
    }

}