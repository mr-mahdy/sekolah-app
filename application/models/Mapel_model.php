<?php

class Mapel_model extends CI_Model
{
    function getAllMapel($keyword)
    {
        $this->db->order_by('id');
        if ($keyword == "") {
            return $this->db->query("SELECT * FROM mapel")->result_array();
        } else {
            return $this->db->query("SELECT * FROM mapel WHERE kode_mapel LIKE '%$keyword%' OR nama_mapel LIKE '%$keyword%' OR kkm LIKE '%$keyword%'")->result_array();
        }
    }

    function insertMapel()
    {
        $data = [
            'id' => '',
            'kode_mapel' => htmlspecialchars($this->input->post('kodeMapel', true)),
            'nama_mapel' => htmlspecialchars($this->input->post('namaMapel', true)),
            'kkm' => $this->input->post('kkm', true)
        ];
        $this->db->insert('mapel', $data);
        return $this->db->affected_rows();
    }

    public function hapusMapel($id)
    {
        $this->db->delete('mapel', ['id' => $id]);
    }

    function getMapelById($id)
    {
        return $this->db->get_where('mapel', ['id' => $id])->result_array()[0];
    }

    function editMapel($id)
    {
        $data = [
            'kode_mapel' => htmlspecialchars($this->input->post('kodeMapel', true)),
            'nama_mapel' => htmlspecialchars($this->input->post('namaMapel', true)),
            'kkm' => $this->input->post('kkm', true)
        ];

        $this->db->update('mapel', $data, ['id' => $id]);
    }
}
