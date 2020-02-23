<?php

class Guru_model extends CI_Model
{
    function getAllGuru($keyword)
    {
        $this->db->order_by('id');
        if ($keyword == "") {
            return $this->db->query("SELECT guru.id, guru.nuptk, guru.nama_guru, mapel.nama_mapel FROM guru, mapel WHERE guru.id_mapel = mapel.id")->result_array();
        } else {
            return $this->db->query("SELECT guru.id, guru.nuptk, guru.nama_guru, mapel.nama_mapel FROM guru, mapel WHERE nama_guru LIKE '%$keyword%' OR nuptk LIKE '%$keyword%' OR nama_mapel LIKE '%$keyword%' OR guru.id_mapel = mapel.id")->result_array();
        }
    }

    function insertGuru()
    {
        $data = [
            'id' => '',
            'nuptk' => htmlspecialchars($this->input->post('nuptk', true)),
            'nama_Guru' => htmlspecialchars($this->input->post('namaGuru', true)),
            'id_mapel' => $this->input->post('mapel', true)
        ];
        $this->db->insert('guru', $data);
        return $this->db->affected_rows();
    }

    public function hapusGuru($id)
    {
        $this->db->delete('guru', ['id' => $id]);
    }

    function getGuruById($id)
    {
        return $this->db->get_where('guru', ['id' => $id])->result_array()[0];
    }

    function editGuru($id)
    {
        $data = [
            'nuptk' => htmlspecialchars($this->input->post('nuptk', true)),
            'nama_guru' => htmlspecialchars($this->input->post('namaGuru', true)),
            'id_mapel' => $this->input->post('mapel', true)
        ];

        $this->db->update('guru', $data, ['id' => $id]);
    }
}
