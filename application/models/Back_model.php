<?php

class Back_model extends CI_Model{

    function getProduk()
    {
        $this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori');
        return $this->db->get('produk')->result_array();
    }

    function getKategori()
    {
        return $this->db->get('kategori')->result_array();
    }

    function getSuplier($id)
    {
        $this->db->where('id_kategori', $id);
        return $this->db->get('suplier')->result_array();
    }

    function simpanProduk($data)
    {
        $this->db->insert('produk', $data);
    }

    function getProdukByID($id)
    {
        $this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori');
        $this->db->where('id_produk', $id);
        return $this->db->get('produk')->row_array();
    }

    function ubahProduk($id, $data)
    {
        $this->db->where('id_produk', $id);
        $this->db->update('produk', $data);
    }

    function hapusProduk($id)
    {
        $this->db->where('id_produk', $id);
        $this->db->delete('produk');
    }

    function insertKategori($data)
    {
        $this->db->insert('kategori', $data);
    }

    function getKategoriById($id)
    {
        $this->db->where('id_kategori', $id);
        return $this->db->get('kategori')->row_array();
    }

    function updateKategori($id, $data)
    {
        $this->db->where('id_kategori', $id);
        $this->db->update('kategori', $data);
    }

    function hapusKategori($id)
    {
        $this->db->where('id_kategori', $id);
        $this->db->delete('kategori');
    }

    function get_all()
    {
      $this->db->join('user', 'transaksi.user_id = user.id_user');
      $this->db->where('status', '1');
      return $this->db->get('transaksi')->result_array();
    }

    function get_by_id($id)
    {
      $this->db->where('id_trans', $id);
      return $this->db->get('transaksi')->row_array();
    }

    function get_cart_per_customer_finished_back($invoice)
  {
    $this->db->join('produk', 'transaksi_detail.produk_id = produk.id_produk');
    $this->db->join('transaksi', 'transaksi_detail.trans_id = transaksi.id_trans');
    $this->db->join('user', 'transaksi_detail.user = user.id_user');
    $this->db->where('transaksi.id_trans', $invoice);
    return $this->db->get('transaksi_detail')->result_array();
  }

  function get_total_berat_dan_subtotal_finished_back($invoice)
  {
    $this->db->select_sum('total_berat');
    $this->db->select_sum('subtotal');
    $this->db->join('transaksi', 'transaksi_detail.trans_id = transaksi.id_trans');
    $this->db->where('transaksi.id_trans', $invoice);
    return $this->db->get('transaksi_detail')->row_array();
  }

  function get_data_customer_back($invoice)
  {
    $this->db->join('transaksi', 'user.id_user = transaksi.user_id');
    $this->db->where('transaksi.id_trans', $invoice);
    return $this->db->get('user')->row_array();
  }

  function getTransaksiDetail($id)
    {
        $this->db->where('trans_id', $id);
        return $this->db->get('transaksi_detail')->result_array();
    }

    function updateLaporan($id)
    {
        $this->db->query("UPDATE laporan SET status='2' WHERE id_trans='$id'");
    }

    function dellPenjualan($id)
    {
        $this->db->where('id_trans', $id);
        $this->db->delete('transaksi');
    }

    function dellPenjualanTD($id)
    {
        $this->db->where('trans_id', $id);
        $this->db->delete('transaksi_detail');
    }

    function hitungPesanan()
    {
        return $this->db->get('transaksi')->num_rows();
    }

    function getLaporan()
    {
        $this->db->join('user', 'user.id_user=laporan.user');
        $this->db->join('produk', 'produk.id_produk=laporan.produk');
        $this->db->where('status', '2');
        $this->db->order_by('id_laporan', 'DESC');
        return $this->db->get('laporan')->result_array();
    }


}