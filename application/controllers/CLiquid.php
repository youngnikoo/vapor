<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CLiquid extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Mcrud');
        $this->load->library('Template');
    }

    public function index(){
        $data['liquid']=$this->Mcrud->get_by_ktgr('liquid')->result();
        $this->template->load('layout_admin', 'liquid/liquid', $data);
    }

    public function addbarang()
    {
        $data['usrName'] = $this->session->userdata('userName');
        $this->template->load('layout_admin', 'liquid/form_add', $data);
    }

    public function savebarang(){
        $jenis_produk = $this->input->post('jenis_produk');
        $harga_produk = $this->input->post('harga_produk');
        $desc_produk = $this->input->post('desc_produk');
        $stok = $this->input->post('stok');

        if ($_FILES['img_produk']['name'] == null) {
            $img_produk = ' ';
          } else {
            $config['upload_path']   = './assets_frontend/images';
            $config['allowed_types'] = 'jpg|png|gif';
            $config['max_size']      = 10000000;
      
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('img_produk')) {
      
              $this->session->set_flashdata('mssg', '<div class="alert alert-danger alert-dismissible">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Warning!</strong><br> Image Gagal Diupload
              </div>');
              redirect('CLiquid');
            } else {
              $img_produk = $this->upload->data('file_name');
            }
          }

        $data = array(
            'jenis_produk' => $jenis_produk,
            'harga_produk' => $harga_produk,
            'desc_produk' => $desc_produk,
            'kategori' => 'liquid',
            'stok' => $stok,
            'img_produk' => $img_produk
        );
        $this->session->set_flashdata('mssg', '<div class="alert alert-success alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Success!</strong><br> Data Berhasil Ditambah
        </div>');
        $this->Mcrud->insert('produk', $data);
            redirect('CLiquid');
    }

    public function getid($id){
        $dataWhere = array('id_produk' => $id);
        $data['liquid'] = $this->Mcrud->get_by_id('produk', $dataWhere)->row_object();
        $data['usrName'] = $this->session->userdata('userName');

        $this->template->load('layout_admin', 'liquid/form_edit', $data);
    }

    public function edit(){
        $id_produk = $this->input->post('id_produk');
        $jenis_produk = $this->input->post('jenis_produk');
        $harga_produk = $this->input->post('harga_produk');
        $desc_produk = $this->input->post('desc_produk');
        $stok = $this->input->post('stok');

        if ($_FILES['img_produk']['name'] == null) {
            $img_produk = ' ';
          } else {
            $config['upload_path']   = './assets_frontend/images';
            $config['allowed_types'] = 'jpg|png|gif';
            $config['max_size']      = 10000000;
      
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('img_produk')) {
      
              $this->session->set_flashdata('mssg', '<div class="alert alert-danger alert-dismissible">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Warning!</strong><br> Image Gagal Diupload
              </div>');
              redirect('CLiquid');
            } else {
              $img_produk = $this->upload->data('file_name');
            }
          }

        $dataUpdate = array(
            'jenis_produk' => $jenis_produk,
            'harga_produk' => $harga_produk,
            'desc_produk' => $desc_produk,
            'kategori' => 'liquid',
            'stok' => $stok,
            'img_produk' => $img_produk
        );
        $this->session->set_flashdata('mssg', '<div class="alert alert-success alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Success!</strong><br> Data Berhasil Diubah
        </div>');
        $this->Mcrud->update('produk', $dataUpdate, 'id_produk', $id_produk);
        redirect('CLiquid');
    }

    public function del($id_produk){
        $where = array('id_produk' => $id_produk);

        $this->session->set_flashdata('mssg', '<div class="alert alert-success alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Success!</strong><br> Data Berhasil Dihapus
        </div>');
        $this->Mcrud->del_data('produk', $where);
        redirect('CLiquid');
    }
}