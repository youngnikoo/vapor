<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CTransaksi extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Mcrud');
        $this->load->library('template');
    }

    public function index()
    {
        $data['usrName'] = $this->session->userdata('usrName'); 
        $data['transaksi'] = $this->Mcrud->transaksi()->result();

        $this->template->load('layout_admin', 'transaksi', $data);
    }
}