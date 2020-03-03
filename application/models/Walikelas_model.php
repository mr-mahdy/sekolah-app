<?php

class Walikelas_model extends CI_Model
{
    function getAllWalikelas($keyword)
    {
        if ($keyword == "") {
            return $this->db->query("SELECT walikelas.id, walikelas.id_guru, walikelas.nuptk_guru, guru.nama_guru, kelas.nama_kelas FROM walikelas JOIN guru ON guru.id = walikelas.id_guru JOIN kelas ON kelas.id = walikelas.id_kelas")->result_array();
        } else {
            return $this->db->query("SELECT walikelas.id, walikelas.id_guru, walikelas.nuptk_guru, guru.nama_guru, kelas.nama_kelas FROM walikelas JOIN guru ON guru.id = walikelas.id_guru JOIN kelas ON kelas.id = walikelas.id_kelas WHERE nama_guru LIKE '%$keyword%' OR nuptk LIKE '%$keyword%' OR nama_kelas LIKE '%$keyword%'")->result_array();
        }
    }

    function insertWalikelas()
    {

        $guru = $this->db->get_where('guru', ['nuptk' => htmlspecialchars($this->input->post('guru', true))])->row_array();
        $data = [
            'id' => '',
            'id_guru' => $guru['id'],
            'nuptk_guru' => htmlspecialchars($this->input->post('guru', true)),
            'id_kelas' => htmlspecialchars($this->input->post('kelas', true))
        ];
        $this->db->insert('walikelas', $data);
        return $this->db->affected_rows();
    }

    public function hapusWalikelas($id)
    {
        $this->db->delete('walikelas', ['id' => $id]);
    }

    function getWalikelasById($id)
    {
        return $this->db->get_where('walikelas', ['id' => $id])->row_array();
    }

    function editWalikelas($id)
    {
        $guru = $this->db->get_where('guru', ['nuptk' => htmlspecialchars($this->input->post('nuptk', true))])->row_array();
        $data = [
            'id_guru' => $guru['id'],
            'nuptk_guru' => htmlspecialchars($this->input->post('nuptk', true)),
            'id_kelas' => htmlspecialchars($this->input->post('kelas', true))
        ];

        $this->db->update('walikelas', $data, ['id' => $id]);
    }
}
