<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        if ($this->session->userdata('role_id') == 1) {
            $data['judul'] = 'Sekolah App | Dashboard Admin';
            $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('user')])->row_array();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('admin/index');
            $this->load->view('templates/footer');
        } else {
            redirect('auth');
        }
    }

    public function loadKelas()
    {
        if ($this->session->userdata('role_id') == 1) {
            $data['judul'] = 'Sekolah App | Daftar Kelas';
            $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('user')])->row_array();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('kelas/index');
            $this->load->view('templates/footer');
        } else {
            redirect('auth');
        }
    }

    public function loadSiswa()
    {
        if ($this->session->userdata('role_id') == 1) {
            $data['judul'] = 'Sekolah App | Daftar Siswa';
            $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('user')])->row_array();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('siswa/daftarsiswa');
            $this->load->view('templates/footer');
        } else {
            redirect('auth');
        }
    }
}
