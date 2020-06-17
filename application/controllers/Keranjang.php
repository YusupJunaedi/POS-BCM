<?php

class Keranjang extends CI_controller{

    function __construct()
    {
        parent::__construct();
        $this->load->model('front_model', 'fm');
    }

    public function index()
    {
        $kategori = $this->fm->getKategori();
        $cart_data  = $this->fm->get_cart_per_customer();
        $total_berat_dan_subtotal = $this->fm->get_total_berat_dan_subtotal();
        $customer_data = $this->fm->get_data_customer();

       
      
        $data = [
            'title'     => 'Keranjang',
            'kategori'  => $kategori,
            'cart_data' => $cart_data,
            'total_berat_dan_subtotal'  => $total_berat_dan_subtotal,
            'customer_data' => $customer_data,
            'hitungKeranjang' => $this->fm->hitungKeranjang()
        ];

        $this->load->view('front/header', $data);
        $this->load->view('front/keranjang');
        $this->load->view('front/footer');

    }

    function beli($id)
    {
        $produk = $this->fm->getProdukBYId($id);

        if( !$this->session->userdata['email'])
       {
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Silahkan Login / Register terlebih dahulu!</strong> untuk membeli Produk.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('auth/login');
       }else{
            
            $cek_transaksi  = $this->fm->cek_transaksi();
            $id_trans 		= $cek_transaksi['id_trans'];
            $notransdet 		= $this->fm->get_notransdet($id);

            if($cek_transaksi)
            {
                // jika barang yang dibeli sudah ada di cart == update
                if($notransdet)
                {
                     $jmllama            = $notransdet['total_qty'];
                     $qty_new            = $jmllama + 1;
                     $subtotaltambah     = $qty_new * $produk['harga'];
 
                     $jmlberatlama       = $produk['berat'];
                     $jmlberattambah     = $jmlberatlama * $qty_new;
 
                     $data = array(
                         'total_qty'  	=> $qty_new,
                         'total_berat'   => $jmlberattambah,
                         'subtotal'  	=> $subtotaltambah,
                     );

                     $data3 = [
                        'qty'           =>  $qty_new,
                        'harga_total'         => $subtotaltambah
                     ];
 
                     // update transaksi
                     $this->fm->update_transdet($id,$data);
                     $this->fm->update_laporan($id,$data3);
                     
                     $this->session->set_flashdata('pesan', '<div class="alert alert-success alert">Barang berhasil ditambahkan</div>');
                     redirect('keranjang');
                }else{ // jika barang yang dibeli belum ada di cart == tambahkan
                     $data2 = array(
                         'trans_id'  	=> $id_trans,
                         'user'  		=> $this->session->userdata('user_id'),
                         'produk_id' 	=> $id,
                         'harga'  		=> $produk['harga'],
                         'berat'  		=> $produk['berat'],
                         'total_qty'  	=> '1',
                         'total_berat'   => $produk['berat'],
                         'subtotal'  	=> $produk['harga']
                     );
                     

                     $data3 = [
                        'id_trans'      => $id_trans,
                        'produk'        => $id,
                        'user'  		=> $this->session->userdata('user_id'),
                        'qty'           => '1',
                        'tgl'           => date('Y-m-d'),
                        'status'        => '1',
                        'harga_total'         => $produk['harga']
                     ];
 
                     $this->fm->insert_detail($data2);
                     $this->fm->insert_laporan($data3);
 
                     // set pesan data berhasil dibuat
                     $this->session->set_flashdata('pesan', '<div class="alert alert-success alert">Barang berhasil ditambahkan</div>');
                     redirect('keranjang');
                }
            }else{ // jika belum ada transaksi
                 $data = array(
                     'user_id'  => $this->session->userdata('user_id'),
                 );
 
                 // eksekusi query INSERT
                 $this->fm->insert($data);
 
                 $cek_transaksi 	= $this->fm->cek_transaksi();
 
                 $data2 = array(
                     'trans_id'  	=> $cek_transaksi['id_trans'],
                     'user'  		=> $this->session->userdata('user_id'),
                     'produk_id' 	=> $id,
                     'harga'  		=> $produk['harga'],
                     'berat'  		=> $produk['berat'],
                     'total_qty'  	=> '1',
                     'total_berat'   => $produk['berat'],
                     'subtotal'  	=> $produk['harga'],
                 );


                 $data3 = [
                    'id_trans'      => $cek_transaksi['id_trans'],
                    'produk'        => $id,
                    'user'  		=> $this->session->userdata('user_id'),
                    'qty'           => '1',
                    'tgl'           => date('Y-m-d'),
                    'status'        => '1',
                    'harga_total'         => $produk['harga']
                 ];
 
                 $this->fm->insert_detail($data2);
                 $this->fm->insert_laporan($data3);
 
                 // set pesan data berhasil dibuat
                 $this->session->set_flashdata('pesan', '<div class="alert alert-success alert">Barang berhasil ditambahkan</div>');
                 redirect('keranjang');
            }
       }
    }

    function update()
    {
        $id_produk = $this->input->post('produk');
        $produk = $this->fm->getProdukBYId($id_produk);

            $qty_new          = $this->input->post('qty');
			$subtotaltambah   = $qty_new * $produk['harga'];

			$jmlberatlama     = $produk['berat'];
            $jmlberattambah   = $jmlberatlama * $qty_new;

			$data = array(
				'total_qty'  	=> $this->input->post('qty'),
				'total_berat'   => $jmlberattambah,
				'subtotal'  	=> $subtotaltambah,
            );
            
            $data3 = [
                'qty'           =>  $qty_new,
                'harga_total'         => $subtotaltambah
             ];

            $this->fm->update_transdet($id_produk,$data);
            $this->fm->update_laporan($id_produk,$data3);

            $cart_data  = $this->fm->get_cart_per_customer();

            $data = json_encode($cart_data);

            echo $data;
        
    }

    function hapus()
    {
        $id_produk = $this->input->post('produk_id');
        $cek_transaksi 	= $this->fm->cek_transaksi();
        
        $id_trans 		= $cek_transaksi['id_trans'];
        
        $this->fm->delete($id_produk,$id_trans);
        $this->fm->delllaporan($id_produk,$id_trans);
        redirect('keranjang');
    }

    public function empty_cart($id_trans)
	{
		$id_trans = $this->uri->segment(3);

		$this->fm->kosongkan_keranjang($id_trans);

		$this->session->set_flashdata('pesan', '<div class="alert alert-block alert-success"><i class="ace-icon fa fa-bullhorn green"></i> Keranjang Anda telah dikosongkan</div>');

		redirect('keranjang');
    }

    public function checkout($id_trans)
	{

		$data = array(
			'status'		=> '1',
		);

		$this->fm->checkout($id_trans,$data);

		$this->session->set_flashdata('pesan', '
		<div class="col-lg-12">
			<div class="alert alert-block alert-success"><i class="ace-icon fa fa-bullhorn green"></i> Transaksi Selesai, pesanan telah dikirim ke admin</div>
		</div>');

        redirect('keranjang');
    }


}