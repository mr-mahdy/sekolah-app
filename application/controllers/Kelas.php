<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kelas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Kelas_model');
    }

    public function index()
    {
        if ($this->session->userdata('role_id') == 1) {
            $keyword = "";
            if ($this->input->get('keyword')) {
                $keyword = $this->input->get('keyword');
            }
            $data['judul'] = 'Sekolah App | Daftar Kelas';
            $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('user')])->row_array();
            $data['allKelas'] = $this->Kelas_model->getAllKelas($keyword);
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('kelas/index', $data);
            $this->load->view('templates/footer');
        } else {
            redirect('auth');
        }
    }

    public function createKelas()
    {
        if ($this->session->userdata('role_id') == 1) {
            $this->form_validation->set_rules('namaKelas', 'Nama Kelas', 'required|trim|is_unique[kelas.nama_kelas]', [
                'required' => 'field nama kelas harus diisi',
                'is_unique' => 'nama kelas sudah ada'
            ]);
            $this->form_validation->set_rules('jumlah', 'Jumlah', 'required|trim|numeric|max_length[2]', [
                'required' => 'field jumlah harus diisi',
                'numeric' => 'field jumlah harus angka',
                'max_length' => 'field jumlah maksimal 2 digit angka'
            ]);

            if ($this->form_validation->run() == false) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Data kelas gagal <strong>ditambahkan</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');
                $this->session->set_flashdata('namaKelas', form_error('namaKelas', ' <small class="text-danger">', '    </small>'));
                $this->session->set_flashdata('jumlah', form_error('jumlah', ' <small class="text-danger">', '    </small>'));
                redirect('kelas/index');
            } else {
                if ($this->Kelas_model->insertKelas() > 0) {
                    $this->session->set_flashdata('messageBerhasil', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data kelas berhasil <strong>ditambahkan</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>');
                    redirect('kelas');
                }
            }
        } else {
            redirect('auth');
        }
    }

    public function hapusKelas($id)
    {
        if ($this->session->userdata('role_id') == 1) {
            $this->Kelas_model->hapusKelas($id);
            $this->session->set_flashdata('messageBerhasil', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data kelas berhasil <strong>dihapus</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>');
            redirect('kelas');
        } else {
            redirect('auth');
        }
    }

    public function ubahKelas($id)
    {
        if ($this->session->userdata('role_id') == 1) {
            $data['judul'] = 'Sekolah App | Ubah Kelas';
            $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('user')])->row_array();
            $data['kelas'] = $this->Kelas_model->getKelasById($id);
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('kelas/ubah', $data);
            $this->load->view('templates/footer');
        } else {
            redirect('auth');
        }
    }

    public function editKelas()
    {
        if ($this->session->userdata('role_id') == 1) {
            $this->form_validation->set_rules('namaKelas', 'Nama Kelas', 'required', [
                'required' => 'field nama kelas harus diisi'
            ]);
            $this->form_validation->set_rules('jumlah', 'Jumlah', 'required|numeric|max_length[2]', [
                'required' => 'field jumlah harus diisi',
                'numeric' => 'field jumlah harus angka',
                'max_length' => 'field jumlah maksimal 2 digit angka'
            ]);

            $id = $this->input->post('id');
            if ($this->form_validation->run() == false) {
                $this->session->set_flashdata('namaKelas', form_error('namaKelas', ' <small class="text-danger">', '    </small>'));
                $this->session->set_flashdata('jumlah', form_error('jumlah', ' <small class="text-danger">', '    </small>'));
                redirect('kelas/ubahKelas/' . $id);
            } else {
                $this->Kelas_model->editKelas($id);
                $this->session->set_flashdata('messageBerhasil', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data kelas berhasil <strong>diubah</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>');
                redirect('kelas');
            }
        } else {
            redirect('auth');
        }
    }
}
