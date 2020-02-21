<?php

class Kelas_model extends CI_Model
{
    function getAllKelas($keyword)
    {
        $this->db->order_by('id');
        if ($keyword == "") {
            return $this->db->query("SELECT * FROM kelas")->result_array();
        } else {
            return $this->db->query("SELECT * FROM kelas WHERE nama_kelas LIKE '%$keyword%' OR jumlah LIKE '%$keyword%'")->result_array();
        }
    }

    function insertKelas()
    {
        $data = [
            'id' => '',
            'nama_kelas' => htmlspecialchars($this->input->post('namaKelas', true)),
            'jumlah' => $this->input->post('jumlah', true)
        ];
        $this->db->insert('kelas', $data);
        return $this->db->affected_rows();
    }

    public function hapusKelas($id)
    {
        $this->db->delete('kelas', ['id' => $id]);
    }

    function getKelasById($id)
    {
        return $this->db->get_where('kelas', ['id' => $id])->result_array()[0];
    }

    function editKelas($id)
    {
        $data = [
            'nama_kelas' => htmlspecialchars($this->input->post('namaKelas', true)),
            'jumlah' => $this->input->post('jumlah', true)
        ];

        $this->db->update('kelas', $data, ['id' => $id]);
    }
}
