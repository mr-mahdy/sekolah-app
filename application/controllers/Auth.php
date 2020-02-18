<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        if ($this->session->userdata('role_id') == 1) {
            redirect('admin');
        } elseif ($this->session->userdata('role_id') == 2) {
        } elseif ($this->session->userdata('role_id') == 3) {
        } elseif ($this->session->userdata('role_id') == 4) {
        } elseif ($this->session->userdata('role_id') == 5) {
        } else {
            $this->load->view('auth/login');
        }
    }

    public function login()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|trim', [
            'required' => 'field username harus diisi'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim', [
            'required' => 'field password harus diisi'
        ]);

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Login gagal</div>');
            $this->session->set_flashdata('username', form_error('username', ' <small class="text-danger pl-3">', '    </small>'));
            $this->session->set_flashdata('password', form_error('password', ' <small class="text-danger pl-3">', '    </small>'));
            redirect('auth');
        } else {
            //validasi sukses
            $this->_login();
        }
    }

    private function _login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['username' => $username])->row_array();

        //user ada
        if ($user) {

            //cek password 
            // if (password_verify($password, $user['password'])) {
            if ($password == $user['password']) {
                $data = [
                    'user' => $user['username'],
                    'role_id' => $user['role_id']
                ];
                $this->session->set_userdata($data);
                if ($user['role_id'] == 1) {
                    redirect('admin');
                } elseif ($user['role_id'] == 2) {
                    redirect('guru');
                } elseif ($user['role_id'] == 3) {
                    redirect('walikelas');
                } elseif ($user['role_id'] == 4) {
                    redirect('siswa');
                } elseif ($user['role_id'] == 5) {
                    redirect('pembina');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password salah</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">username belum terdaftar</div>');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('user');
        $this->session->unset_userdata('role_id');

        redirect('auth');
    }
}
