<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Guru extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Guru_model');
        $this->load->model('Mapel_model');
    }

    public function index()
    {
        if ($this->session->userdata('role_id') == 1) {
            $keyword = "";
            if ($this->input->get('keyword')) {
                $keyword = $this->input->get('keyword');
            }
            $data['judul'] = 'Sekolah App | Daftar Guru';
            $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('user')])->row_array();
            $data['allGuru'] = $this->Guru_model->getAllGuru($keyword);
            $data['allMapel'] = $this->Mapel_model->getAllMapel($keyword);
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('guru/index', $data);
            $this->load->view('templates/footer');
        } else {
            redirect('auth');
        }
    }

    public function createGuru()
    {
        if ($this->session->userdata('role_id') == 1) {
            $this->form_validation->set_rules('nuptk', 'NUPTK', 'required|trim', [
                'required' => 'field nuptk harus diisi'
            ]);
            $this->form_validation->set_rules('namaGuru', 'Nama Guru', 'required|trim', [
                'required' => 'field nama guru harus diisi'
            ]);
            $this->form_validation->set_rules('mapel', 'Mata Pelajaran', 'required|trim', [
                'required' => 'field mata pelajaran harus diisi'

            ]);

            if ($this->form_validation->run() == false) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Data kelas gagal <strong>ditambahkan</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');
                $this->session->set_flashdata('nuptk', form_error('nuptk', ' <small class="text-danger">', '    </small>'));
                $this->session->set_flashdata('namaGuru', form_error('namaGuru', ' <small class="text-danger">', '    </small>'));
                $this->session->set_flashdata('mapel', form_error('mapel', ' <small class="text-danger">', '    </small>'));
                redirect('guru/index');
            } else {
                if ($this->Guru_model->insertGuru() > 0) {
                    $this->session->set_flashdata('messageBerhasil', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data guru berhasil <strong>ditambahkan</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>');
                    redirect('guru');
                }
            }
        } else {
            redirect('auth');
        }
    }

    public function hapusGuru($id)
    {
        if ($this->session->userdata('role_id') == 1) {
            $this->Guru_model->hapusGuru($id);
            $this->session->set_flashdata('messageBerhasil', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data guru berhasil <strong>dihapus</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>');
            redirect('guru');
        } else {
            redirect('auth');
        }
    }

    public function ubahGuru($id)
    {
        if ($this->session->userdata('role_id') == 1) {
            $keyword = "";
            $data['judul'] = 'Sekolah App | Ubah Guru';
            $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('user')])->row_array();
            $data['guru'] = $this->Guru_model->getGuruById($id);
            $data['allMapel'] = $this->Mapel_model->getAllMapel($keyword);
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('guru/ubah', $data);
            $this->load->view('templates/footer');
        } else {
            redirect('auth');
        }
    }

    public function editGuru()
    {
        if ($this->session->userdata('role_id') == 1) {
            $this->form_validation->set_rules('nuptk', 'NUPTK', 'required', [
                'required' => 'field nuptk harus diisi'
            ]);
            $this->form_validation->set_rules('namaGuru', 'Nama Guru', 'required', [
                'required' => 'field nama guru harus diisi'
            ]);
            $this->form_validation->set_rules('mapel', 'Mata Pelajaran', 'required', [
                'required' => 'field mata pelajaran harus diisi'
            ]);

            $id = $this->input->post('id');
            if ($this->form_validation->run() == false) {
                $this->session->set_flashdata('nuptk', form_error('nuptk', ' <small class="text-danger">', '    </small>'));
                $this->session->set_flashdata('nama_guru', form_error('nama_guru', ' <small class="text-danger">', '    </small>'));
                $this->session->set_flashdata('mapel', form_error('mapel', ' <small class="text-danger">', '    </small>'));
                redirect('guru/ubahGuru/' . $id);
            } else {
                $this->Guru_model->editGuru($id);
                $this->session->set_flashdata('messageBerhasil', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data guru berhasil <strong>diubah</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>');
                redirect('guru');
            }
        } else {
            redirect('auth');
        }
    }
}
