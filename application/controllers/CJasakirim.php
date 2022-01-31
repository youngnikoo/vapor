<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CJasakirim extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Mcrud');
        $this->load->library('Template');
    }

    public function index(){
        $data['kurir']=$this->Mcrud->get_all_data('kurir')->result();
        $this->template->load('layout_admin', 'jasakirim/kurir', $data);
    }

    public function addbarang()
    {
        $data['usrName'] = $this->session->userdata('userName');
        $this->template->load('layout_admin', 'jasakirim/form_add', $data);
    }

    public function savebarang(){
        $nama_kurir = $this->input->post('nama_kurir');
    

    $data = array(
        'nama_kurir' => $nama_kurir,

    );
    $this->session->set_flashdata('mssg', '<div class="alert alert-success alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Success!</strong><br> Data Berhasil Ditambah
    </div>');
    $this->Mcrud->insert('kurir', $data);
    redirect('CJasaKirim');
    }

    public function getid($id){
        $dataWhere = array('id_kurir' => $id);
        $data['kurir'] = $this->Mcrud->get_by_id('kurir', $dataWhere)->row_object();
        $data['usrName'] = $this->session->userdata('userName');

        $this->template->load('layout_admin', 'jasakirim/form_edit', $data);
    }

    public function edit(){
        $id_kurir = $this->input->post('id_kurir');
        $nama_kurir = $this->input->post('nama_kurir');

        $dataUpdate = array(
            'nama_kurir' => $nama_kurir,
        );
        $this->session->set_flashdata('mssg', '<div class="alert alert-success alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Success!</strong><br> Data Berhasil Diubah
        </div>');
        $this->Mcrud->update('kurir', $dataUpdate, 'id_kurir', $id_kurir);
        redirect('CJasaKirim');
    }

    public function del($id_kurir){
        $where = array('id_kurir' => $id_kurir);

        $this->session->set_flashdata('mssg', '<div class="alert alert-success alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Success!</strong><br> Data Berhasil Dihapus
        </div>');
        $this->Mcrud->del_data('kurir', $where);
        redirect('CJasaKirim');
    }
}
