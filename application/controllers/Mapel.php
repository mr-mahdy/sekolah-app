<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mapel extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Mapel_model');
    }

    public function index()
    {
        if ($this->session->userdata('role_id') == 1) {
            $keyword = "";
            if ($this->input->get('keyword')) {
                $keyword = $this->input->get('keyword');
            }
            $data['judul'] = 'Sekolah App | Daftar Mata Pelajaran';
            $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('user')])->row_array();
            $data['allMapel'] = $this->Mapel_model->getAllMapel($keyword);
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('mapel/index', $data);
            $this->load->view('templates/footer');
        } else {
            redirect('auth');
        }
    }

    public function createMapel()
    {
        if ($this->session->userdata('role_id') == 1) {
            $this->form_validation->set_rules('kodeMapel', 'Kode Mapel', 'required|trim|is_unique[mapel.kode_mapel]', [
                'required' => 'field kode mapel harus diisi',
                'is_unique' => 'kode mapel sudah ada'
            ]);
            $this->form_validation->set_rules('namaMapel', 'Nama Mapel', 'required|trim', [
                'required' => 'field nama mapel harus diisi'
            ]);
            $this->form_validation->set_rules('kkm', 'KKM', 'required|trim|numeric|max_length[3]', [
                'required' => 'field kkm harus diisi',
                'numeric' => 'field kkm harus angka',
                'max_length' => 'field kkm maksimal 3 digit angka'
            ]);

            if ($this->form_validation->run() == false) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Data mapel gagal <strong>ditambahkan</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');
                $this->session->set_flashdata('kodeMapel', form_error('kodeMapel', ' <small class="text-danger">', '    </small>'));
                $this->session->set_flashdata('namaMapel', form_error('namaMapel', ' <small class="text-danger">', '    </small>'));
                $this->session->set_flashdata('kkm', form_error('kkm', ' <small class="text-danger">', '    </small>'));
                redirect('mapel/index');
            } else {
                if ($this->Mapel_model->insertMapel() > 0) {
                    $this->session->set_flashdata('messageBerhasil', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data mapel berhasil <strong>ditambahkan</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>');
                    redirect('mapel');
                }
            }
        } else {
            redirect('auth');
        }
    }

    public function hapusMapel($id)
    {
        if ($this->session->userdata('role_id') == 1) {
            $this->Mapel_model->hapusMapel($id);
            $this->session->set_flashdata('messageBerhasil', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data mapel berhasil <strong>dihapus</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>');
            redirect('mapel');
        } else {
            redirect('auth');
        }
    }

    public function ubahMapel($id)
    {
        if ($this->session->userdata('role_id') == 1) {
            $data['judul'] = 'Sekolah App | Ubah Mata Pelajaran';
            $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('user')])->row_array();
            $data['mapel'] = $this->Mapel_model->getMapelById($id);
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('mapel/ubah', $data);
            $this->load->view('templates/footer');
        } else {
            redirect('auth');
        }
    }

    public function editMapel()
    {
        if ($this->session->userdata('role_id') == 1) {
            $this->form_validation->set_rules('kodeMapel', 'Kode Mapel', 'required', [
                'required' => 'field kode mapel harus diisi'
            ]);
            $this->form_validation->set_rules('namaMapel', 'Nama Mapel', 'required', [
                'required' => 'field nama mapel harus diisi'
            ]);
            $this->form_validation->set_rules('kkm', 'KKM', 'required|numeric|max_length[3]', [
                'required' => 'field kkm harus diisi',
                'numeric' => 'field kkm harus angka',
                'max_length' => 'field kkm maksimal 3 digit angka'
            ]);

            $id = $this->input->post('id');
            if ($this->form_validation->run() == false) {
                $this->session->set_flashdata('kodeMapel', form_error('kodeMapel', ' <small class="text-danger">', '    </small>'));
                $this->session->set_flashdata('namaMapel', form_error('namaMapel', ' <small class="text-danger">', '    </small>'));
                $this->session->set_flashdata('kkm', form_error('kkm', ' <small class="text-danger">', '    </small>'));
                redirect('mapel/ubahMapel/' . $id);
            } else {
                $this->Mapel_model->editMapel($id);
                $this->session->set_flashdata('messageBerhasil', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data mapel berhasil <strong>diubah</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>');
                redirect('mapel');
            }
        } else {
            redirect('auth');
        }
    }
}
