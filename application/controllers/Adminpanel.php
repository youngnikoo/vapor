<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminpanel extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Mcrud');
        $this->load->model('Mlogin');
        $this->load->library('Template');
    }

    public function index(){
        $this->template->load('layout_admin', 'dashboard');
    }
}