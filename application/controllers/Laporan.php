<?php

class Laporan extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        $this->load->model('back_model', 'bm');
    }


    function index()
    {

        $pesanan    = $this->bm->hitungPesanan();
        $laporan    = $this->bm->getLaporan();

        $data = [
            'title'         => 'Laporan Penjualan',
            'pesanan'       => $pesanan,
            'laporan'       => $laporan
        ];

        $this->load->view('back/header', $data);
        $this->load->view('back/laporan_penjualan');
        $this->load->view('back/footer');
    }

    function penjualanPDF()
    {
        $this->load->library('dompdf_gen');

        $data['laporan'] = $this->bm->getLaporan();
        $this->load->view('back/penjualanPDF', $data);

        $paper_size = 'A4';
        $orientation = 'potrait';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("laporan_penjualan.pdf", array('Attachment' =>0));
    }

}