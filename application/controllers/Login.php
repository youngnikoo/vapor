<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('Mcrud');
    $this->load->model('Mlogin');
  }
  public function index()
  {
    $this->load->view('admin/login_admin');
  }
  public function login_action()
  {
    $u = $this->input->post('username');
    $p = $this->input->post('password');
    $where = array('nama_admin' => $u);

    $cek = $this->Mlogin->login('admin', $where);
    $Pass = $cek->row();

    if ($cek->num_rows() == 1 && password_verify($p, $Pass->pass_admin) == TRUE) {
      $data_session = array(
        'userName' => $u,
        'status' => 'login'
      );
      $this->session->set_userdata($data_session);
      redirect('Adminpanel');
    } else {
      $this->session->set_flashdata('mssg', 'Username atau Password Salah');
      redirect("Login");
    }
  }
  public function logout()
  {
    $this->session->unset_userdata('userName');
    redirect('Login');
  }
}