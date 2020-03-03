<?php

class Siswa_model extends CI_Model
{
    function getAllSiswa($keyword)
    {
        $this->db->order_by('id');
        if ($keyword == "") {
            return $this->db->query("SELECT siswa_kelas.id, siswa_kelas.id_siswa, nisn, nama_siswa, nama_kelas, thn_masuk FROM siswa_kelas JOIN siswa ON siswa_kelas.id_siswa = siswa.id JOIN kelas ON kelas.id = siswa_kelas.id_kelas")->result_array();
        } else {
            return $this->db->query("SELECT siswa_kelas.id, siswa_kelas.id_siswa, nisn, nama_siswa, nama_kelas, thn_masuk FROM siswa_kelas JOIN siswa ON siswa_kelas.id_siswa = siswa.id JOIN kelas ON kelas.id = siswa_kelas.id_kelas WHERE nama_kelas LIKE '%$keyword%' OR nisn LIKE '%$keyword%' OR nama_siswa LIKE '%$keyword%'")->result_array();
        }
    }

    function insertSiswa()
    {
        $data = [
            'id' => '',
            'nisn' => htmlspecialchars($this->input->post('nisn', true)),
            'nama_siswa' => htmlspecialchars($this->input->post('siswa', true)),
            'thn_masuk' => $this->input->post('thnMasuk', true)
        ];
        $this->db->insert('siswa', $data);
        $id = $this->db->insert_id('siswa', $data);
        $data1 = [
            'id' => '',
            'id_siswa' => $id,
            'id_kelas' => htmlspecialchars($this->input->post('kelas', true)),
        ];
        $this->db->insert('siswa_kelas', $data1);
        return $this->db->affected_rows();
    }

    public function hapusSiswa($id)
    {
        $this->db->delete('siswa', ['id' => $id]);
        $this->db->delete('siswa_kelas', ['id_siswa' => $id]);
    }

    function getSiswaById($id)
    {
        return $this->db->query("SELECT siswa_kelas.id, siswa_kelas.id_siswa, siswa_kelas.id_kelas, nisn, nama_siswa, nama_kelas, thn_masuk FROM siswa_kelas JOIN siswa ON siswa_kelas.id_siswa = siswa.id JOIN kelas ON kelas.id = siswa_kelas.id_kelas WHERE siswa_kelas.id = $id")->row_array();
    }

    function editSiswa($id)
    {
        $data = [
            'nisn' => htmlspecialchars($this->input->post('nisn', true)),
            'nama_siswa' => htmlspecialchars($this->input->post('siswa', true)),
            'thn_masuk' => $this->input->post('thnMasuk', true)
        ];
        $this->db->update('siswa', $data, ['id' => $id]);
        $data1 = [
            'id_kelas' => htmlspecialchars($this->input->post('kelas', true)),
        ];
        $this->db->update('siswa_kelas', $data1, ['id_siswa' => $id]);
    }
}
