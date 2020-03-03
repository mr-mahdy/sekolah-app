<?php

class Guru_model extends CI_Model
{
    function getAllGuru($keyword)
    {
        if ($keyword == "") {
            return $this->db->query("SELECT guru_mapel.id, guru_mapel.id_guru, guru.nuptk, guru.nama_guru, mapel.nama_mapel FROM guru_mapel JOIN guru ON guru.id = guru_mapel.id_guru JOIN mapel ON mapel.id = guru_mapel.id_mapel")->result_array();
        } else {
            return $this->db->query("SELECT guru_mapel.id, guru_mapel.id_guru, guru.nuptk, guru.nama_guru, mapel.nama_mapel FROM guru_mapel JOIN guru ON guru.id = guru_mapel.id_guru JOIN mapel ON mapel.id = guru_mapel.id_mapel WHERE guru.nama_guru LIKE '%$keyword%' OR guru.nuptk LIKE '%$keyword%' OR mapel.nama_mapel LIKE '%$keyword%'")->result_array();
        }
    }

    function getAllGuruMaster()
    {
        return $this->db->query("SELECT * FROM guru")->result_array();
    }

    function insertGuru()
    {
        $data = [
            'id' => '',
            'nuptk' => htmlspecialchars($this->input->post('nuptk', true)),
            'nama_Guru' => htmlspecialchars($this->input->post('namaGuru', true)),
        ];
        $this->db->insert('guru', $data);
        $id = $this->db->insert_id('guru', $data);

        $data1 = [
            'id' => '',
            'id_guru' => $id,
            'id_mapel' => $this->input->post('mapel1', true),
        ];
        $this->db->insert('guru_mapel', $data1);
        if ($this->input->post('mapel2')) {
            $data2 = [
                'id' => '',
                'id_guru' => $id,
                'id_mapel' => $this->input->post('mapel2', true),
            ];
            $this->db->insert('guru_mapel', $data2);
        }

        if ($this->input->post('mapel3')) {
            $data3 = [
                'id' => '',
                'id_guru' => $id,
                'id_mapel' => $this->input->post('mapel3', true),
            ];
            $this->db->insert('guru_mapel', $data3);
        }
        return $this->db->affected_rows();
    }

    public function hapusGuru($id)
    {
        $this->db->delete('guru', ['id' => $id]);
        $this->db->delete('guru_mapel', ['id_guru' => $id]);
    }

    function getGuruById($id)
    {
        return $this->db->query("SELECT guru_mapel.id, guru_mapel.id_guru, guru_mapel.id_mapel, guru.nuptk, guru.nama_guru, mapel.nama_mapel FROM guru_mapel JOIN guru ON guru.id = guru_mapel.id_guru JOIN mapel ON mapel.id = guru_mapel.id_mapel WHERE id_guru = $id")->result_array();
    }

    function getGuruMasterById($id)
    {
        return $this->db->query("SELECT * FROM guru WHERE id = $id")->row_array();
    }

    function editGuru($id)
    {
        $nuptk = htmlspecialchars($this->input->post('nuptk', true));
        $guru = htmlspecialchars($this->input->post('namaGuru', true));
        $data = $this->getGuruById($id);
        $l = 1;
        $j = 0;
        $k = 3 - count($data);
        $m = count($data);
        for ($i = 0; $i < $m; $i++) {
            $j = $data[$i]['id'];

            $mapel = $this->input->post("mapel$l", true);
            $this->db->query("UPDATE guru_mapel JOIN guru ON guru.id = guru_mapel.id_guru JOIN mapel ON mapel.id = guru_mapel.id_mapel SET guru.nuptk = '$nuptk', guru.nama_guru = '$guru', guru_mapel.id_mapel = $mapel WHERE guru_mapel.id = $j");
            $l++;
        }
        if ($k != 3) {

            for ($i = 0; $i < $k; $i++) {
                $data = [
                    'id' => '',
                    'id_guru' => $id,
                    'id_mapel' => $this->input->post("mapel$l", true),
                ];
                $this->db->insert('guru_mapel', $data);

                $l++;
            }
        }
    }
}
