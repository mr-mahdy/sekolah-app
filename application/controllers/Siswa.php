<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Kelas_model');
        $this->load->model('Siswa_model');
    }

    public function index()
    {
        if ($this->session->userdata('role_id') == 1) {
            $keyword = "";
            if ($this->input->get('keyword')) {
                $keyword = $this->input->get('keyword');
            }
            $data['judul'] = 'Sekolah App | Daftar Siswa';
            $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('user')])->row_array();
            $data['allSiswa'] = $this->Siswa_model->getAllSiswa($keyword);
            $data['allKelas'] = $this->Kelas_model->getAllKelas($keyword);
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('siswa/index', $data);
            $this->load->view('templates/footer');
        } else {
            redirect('auth');
        }
    }

    public function createSiswa()
    {
        if ($this->session->userdata('role_id') == 1) {
            $this->form_validation->set_rules('nisn', 'nisn', "required|is_unique[siswa.nisn]", [
                'required' => 'field nisn harus diisi',
                'is_unique' => 'nisn sudah terdaftar'
            ]);
            $this->form_validation->set_rules('siswa', 'siswa', 'required|trim|is_unique[siswa.nama_siswa]', [
                'required' => 'field nama siswa harus diisi',
                'is_unique' => 'nama siswa sudah terdaftar'
            ]);
            $this->form_validation->set_rules('thnMasuk', 'thnMasuk', 'required|trim|numeric', [
                'required' => 'field tahun masuk harus diisi',
                'numeric' => 'tahun masuk harus angka'
            ]);

            if ($this->form_validation->run() == false) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Data siswa gagal <strong>ditambahkan</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');
                $this->session->set_flashdata('nisn', form_error('nisn', ' <small class="text-danger">', '    </small>'));
                $this->session->set_flashdata('siswa', form_error('siswa', ' <small class="text-danger">', '    </small>'));
                $this->session->set_flashdata('thnMasuk', form_error('thnMasuk', ' <small class="text-danger">', '    </small>'));
                redirect('siswa/index');
            } else {
                if ($this->Siswa_model->insertSiswa() > 0) {
                    $this->session->set_flashdata('messageBerhasil', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data siswa berhasil <strong>ditambahkan</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>');
                    redirect('siswa');
                }
            }
        } else {
            redirect('auth');
        }
    }

    public function hapusSiswa($id)
    {
        if ($this->session->userdata('role_id') == 1) {
            $this->Siswa_model->hapusSiswa($id);
            $this->session->set_flashdata('messageBerhasil', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data Siswa berhasil <strong>dihapus</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>');
            redirect('siswa');
        } else {
            redirect('auth');
        }
    }

    public function ubahSiswa($id)
    {
        if ($this->session->userdata('role_id') == 1) {
            $keyword = "";
            $data['judul'] = 'Sekolah App | Ubah Siswa';
            $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('user')])->row_array();
            $data['siswa'] = $this->Siswa_model->getSiswaById($id);
            $data['allKelas'] = $this->Kelas_model->getAllKelas($keyword);
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('siswa/ubah', $data);
            $this->load->view('templates/footer');
        } else {
            redirect('auth');
        }
    }

    public function editSiswa()
    {
        if ($this->session->userdata('role_id') == 1) {
            $this->form_validation->set_rules('nisn', 'nisn', "required", [
                'required' => 'field nisn harus diisi'
            ]);
            $this->form_validation->set_rules('siswa', 'siswa', 'required', [
                'required' => 'field siswa harus diisi'
            ]);
            $this->form_validation->set_rules('thnMasuk', 'thnMasuk', 'required', [
                'required' => 'field tahun masuk harus diisi'
            ]);

            $id = $this->input->post('id');
            if ($this->form_validation->run() == false) {
                $this->session->set_flashdata('nisn', form_error('nisn', ' <small class="text-danger">', '    </small>'));
                $this->session->set_flashdata('siswa', form_error('siswa', ' <small class="text-danger">', '    </small>'));
                $this->session->set_flashdata('thnMasuk', form_error('thnMasuk', ' <small class="text-danger">', '    </small>'));
                redirect('siswa/ubahSiswa/' . $id);
            } else {
                $idSiswa = $this->input->post('idSiswa');
                $this->Siswa_model->editSiswa($idSiswa);
                $this->session->set_flashdata('messageBerhasil', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data siswa berhasil <strong>diubah</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>');
                redirect('siswa');
            }
        } else {
            redirect('auth');
        }
    }
}
