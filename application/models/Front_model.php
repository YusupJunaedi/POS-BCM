<?php

class Front_model extends CI_Model{

    

    function getKategori()
    {
        return $this->db->get('kategori')->result_array();
    }

    function getSuplier($id)
    {
        $this->db->where('id_suplier', $id);
        return $this->db->get('suplier')->row_array();
    }

    function getProduk($id)
    {
        $this->db->where('id_kategori', $id);
        return $this->db->get('produk')->result_array();
    }

    function insertUser($data)
    {
        $this->db->insert('user', $data);
    }

    function getUser($email)
    {
        $this->db->where('email', $email);
        return $this->db->get('user')->row_array();
    }

    function cek_transaksi()
    {
        $this->db->where('user_id', $this->session->userdata('user_id'));
        $this->db->where('status','0');
        return $this->db->get('transaksi')->row_array();
    }

    function get_notransdet($id)
    {
        $this->db->join('transaksi_detail', 'transaksi.id_trans = transaksi_detail.trans_id');
        $this->db->where('produk_id',$id);
        $this->db->where('user_id', $this->session->userdata('user_id'));
        $this->db->where('status','0');
        return $this->db->get('transaksi')->row_array();
    }

    function update_transdet($id, $data)
    {
        $this->db->where('produk_id',$id);
        $this->db->where('user', $this->session->userdata('user_id'));
        $this->db->update('transaksi_detail', $data);
    }

    function update_laporan($id, $data)
    {
        $this->db->where('produk',$id);
        $this->db->where('user', $this->session->userdata('user_id'));
        $this->db->update('laporan', $data);
    }

    function insert_detail($data2)
    {
        $this->db->insert('transaksi_detail', $data2);
    }

    function insert_laporan($data2)
    {
        $this->db->insert('laporan', $data2);
    }

    function insert($data)
    {
        $this->db->insert('transaksi', $data);
    }

    public function getProdukBYId($id)
    {
        return $this->db->get_where('produk', ['id_produk' => $id])->row_array();
    }

    function get_cart_per_customer()
  {
    $this->db->join('produk', 'transaksi_detail.produk_id = produk.id_produk');
    $this->db->join('transaksi', 'transaksi_detail.trans_id = transaksi.id_trans');
    $this->db->join('user', 'transaksi_detail.user = user.id_user');
    $this->db->where('user', $this->session->userdata('user_id'));
    $this->db->where('status','0');
    return $this->db->get('transaksi_detail')->result_array();
  }

  function get_total_berat_dan_subtotal()
  {
    $this->db->select_sum('total_berat');
    $this->db->select_sum('subtotal');
    $this->db->join('transaksi', 'transaksi_detail.trans_id = transaksi.id_trans');
    $this->db->where('user', $this->session->userdata('user_id'));
    $this->db->where('status','0');
    return $this->db->get('transaksi_detail')->row_array();
  }

  function get_data_customer()
  {
    $this->db->join('transaksi', 'user.id_user = transaksi.user_id');
    $this->db->order_by('transaksi.id_trans', 'DESC');

    $this->db->limit('1');
    $this->db->where('user_id', $this->session->userdata('user_id'));
    return $this->db->get('user')->row_array();
  }

  function hitungKeranjang()
  {
    $this->db->join('transaksi', 'transaksi_detail.trans_id = transaksi.id_trans');
    $this->db->where('user', $this->session->userdata('user_id'));
    $this->db->where('status','0');
    return $this->db->get('transaksi_detail')->num_rows();
  }

  function delete($id,$id_trans)
  {
    $this->db->where('produk_id', $id);
    $this->db->where('trans_id', $id_trans);
    $this->db->delete('transaksi_detail');
  }

  function delllaporan($id,$id_trans)
  {
    $this->db->where('produk', $id);
    $this->db->where('id_trans', $id_trans);
    $this->db->delete('laporan');
  }

  function kosongkan_keranjang($id_trans)
  {
    $this->db->where('trans_id', $id_trans);
    $this->db->delete('transaksi_detail');
  }

  function checkout($id, $data)
  {
    $this->db->where('id_trans',$id);
    $this->db->where('user_id', $this->session->userdata('user_id'));
    $this->db->where('status','0');
    $this->db->update('transaksi', $data);
  }

  function cariProduk($produk)
  {
    $this->db->like('nama_produk', $produk);
    return $this->db->get('produk')->result_array();
  }

  function produkRandom()
  {
    $this->db->order_by('id_produk', 'RANDOM');
    $this->db->limit(8); 
    return $this->db->get('produk')->result_array();
  }

  function getDataUser($id)
  {
    $this->db->where('id_user', $id);
    return $this->db->get('user')->row_array();
  }

  function updateDataUser($id, $data)
  {
    $this->db->where('id_user', $id);
    $this->db->update('user', $data);
  }

  function getNamaKategori($id)
  {
    $this->db->where('id_kategori', $id);
    return $this->db->get('kategori')->row_array();
  }


}