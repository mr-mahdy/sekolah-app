<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Walikelas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Guru_model');
        $this->load->model('Kelas_model');
        $this->load->model('Walikelas_model');
    }

    public function index()
    {
        if ($this->session->userdata('role_id') == 1) {
            $keyword = "";
            if ($this->input->get('keyword')) {
                $keyword = $this->input->get('keyword');
            }
            $data['judul'] = 'Sekolah App | Daftar Wali Kelas';
            $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('user')])->row_array();
            $data['allWalikelas'] = $this->Walikelas_model->getAllWalikelas($keyword);
            $data['allKelas'] = $this->Kelas_model->getAllKelas($keyword);
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('walikelas/index', $data);
            $this->load->view('templates/footer');
        } else {
            redirect('auth');
        }
    }

    public function createWalikelas()
    {
        if ($this->session->userdata('role_id') == 1) {
            $allGuru = $this->Guru_model->getAllGuruMaster();
            $list = "";
            $i = 1;
            foreach ($allGuru as $guru) {
                if ($i == count($allGuru)) {
                    $list .= $guru['nuptk'];
                } else {
                    $list .= $guru['nuptk'] . ",";
                }
                $i++;
            }
            $this->form_validation->set_rules('guru', 'guru', "required|is_unique[walikelas.nuptk_guru]|in_list[$list]", [
                'required' => 'field guru harus diisi',
                'is_unique' => 'nuptk guru sudah terdaftar menjadi wali kelas',
                'in_list' => 'nuptk guru tidak ada'
            ]);
            $this->form_validation->set_rules('kelas', 'kelas', 'required|trim', [
                'required' => 'field kelas harus diisi'
            ]);

            if ($this->form_validation->run() == false) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Data wali kelas gagal <strong>ditambahkan</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');
                $this->session->set_flashdata('guru', form_error('guru', ' <small class="text-danger">', '    </small>'));
                $this->session->set_flashdata('kelas', form_error('kelas', ' <small class="text-danger">', '    </small>'));
                redirect('walikelas/index');
            } else {
                if ($this->Walikelas_model->insertWalikelas() > 0) {
                    $this->session->set_flashdata('messageBerhasil', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data wali kelas berhasil <strong>ditambahkan</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>');
                    redirect('walikelas');
                }
            }
        } else {
            redirect('auth');
        }
    }

    public function hapusWalikelas($id)
    {
        if ($this->session->userdata('role_id') == 1) {
            $this->Walikelas_model->hapusWalikelas($id);
            $this->session->set_flashdata('messageBerhasil', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data wali kelas berhasil <strong>dihapus</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>');
            redirect('walikelas');
        } else {
            redirect('auth');
        }
    }

    public function ubahWalikelas($id)
    {
        if ($this->session->userdata('role_id') == 1) {
            $keyword = "";
            $data['judul'] = 'Sekolah App | Ubah Wali Kelas';
            $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('user')])->row_array();
            $data['walikelas'] = $this->Walikelas_model->getWalikelasById($id);
            $data['allKelas'] = $this->Kelas_model->getAllKelas($keyword);
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('walikelas/ubah', $data);
            $this->load->view('templates/footer');
        } else {
            redirect('auth');
        }
    }

    public function editWalikelas()
    {
        if ($this->session->userdata('role_id') == 1) {
            $allGuru = $this->Guru_model->getAllGuruMaster();
            $list = "";
            $i = 1;
            foreach ($allGuru as $guru) {
                if ($i == count($allGuru)) {
                    $list .= $guru['nuptk'];
                } else {
                    $list .= $guru['nuptk'] . ",";
                }
                $i++;
            }
            $this->form_validation->set_rules('nuptk', 'nuptk', "required|in_list[$list]", [
                'required' => 'field nuptk guru harus diisi',
                'in_list' => 'nuptk guru tidak ada'
            ]);
            $this->form_validation->set_rules('kelas', 'kelas', 'required|trim', [
                'required' => 'field kelas harus diisi'
            ]);

            $id = $this->input->post('id');
            if ($this->form_validation->run() == false) {
                $this->session->set_flashdata('nuptk', form_error('nuptk', ' <small class="text-danger">', '    </small>'));
                $this->session->set_flashdata('kelas', form_error('kelas', ' <small class="text-danger">', '    </small>'));
                redirect('walikelas/ubahWalikelas/' . $id);
            } else {
                $this->Walikelas_model->editWalikelas($id);
                $this->session->set_flashdata('messageBerhasil', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data wali kelas berhasil <strong>diubah</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>');
                redirect('walikelas');
            }
        } else {
            redirect('auth');
        }
    }
}
