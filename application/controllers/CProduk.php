<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CProduk extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Mcrud');
    }

    public function index(){
        $data['produk']=$this->Mcrud->get_by_ktgr('vape')->result();
        $data['liquid']=$this->Mcrud->get_by_ktgr('liquid')->result();
        $data['aksesoris']=$this->Mcrud->get_by_ktgr('aksesoris')->result();
        $data['kurir']=$this->Mcrud->get_all_data('kurir')->result();
        $this->load->view('produk', $data);
    }

    public function pesanan(){
        $nama= $this->input->post('nama');
        $id= $this->input->post('id');
        $alamat= $this->input->post('alamat');
        $kota= $this->input->post('kota');
        $kode_pos= $this->input->post('kode_pos');
        $no_hp= $this->input->post('no_hp');
        $jumlah= $this->input->post('jumlah');
        $harga_produk= $this->input->post('harga_produk');
        $kurir= $this->input->post('kurir');
        
        $cekpelanggan= $this->Mcrud->get_by_id('pelanggan', array('no_hp' => $no_hp));

        if ($cekpelanggan->num_rows() < 1){
            $datainsert= array(
                'nama' => $nama,
                'alamat' => $alamat,
                'kota' => $kota,
                'kode_pos' => $kode_pos,
                'no_hp' => $no_hp
            );
            
            $this->Mcrud->insert('pelanggan', $datainsert);

            $pelanggan = $this->db->insert_id();
        } else {
            $id_pelanggan = $cekpelanggan->row_object();
            $pelanggan = $id_pelanggan->id_pelanggan;
        }

        $ks= $this->Mcrud->get_all_data('produk')->row_object();
        $dataupdate= $ks->stok - $jumlah;
        if ($dataupdate < 0){
            $this->session->set_flashdata('mssg', '<div class="alert alert-danger alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Transaksi Gagal!</strong><br> Stok Tidak Mencukupi
            </div>');
        }else{
            $datainsert1= array(
                'id_kurir' => $kurir,
                'id_pelanggan' => $pelanggan,
                'id_produk' => $id,
                'jumlah' => $jumlah,
                'subtotal' => $jumlah * $harga_produk
            );

            $this->Mcrud->insert('detail_transaksi', $datainsert1);
            $this->Mcrud->update('produk', array('stok' => $dataupdate),'id_produk', $id);
        }
        // print_r($ks->stok);
        // exit();
        redirect('CHalaman');
    }
}