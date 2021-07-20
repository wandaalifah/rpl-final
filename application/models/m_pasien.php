<?php

class M_pasien extends CI_Model
{
    function tampil_data($limit, $start, $keyword = null)
    {
        if ($keyword) {
            $this->db->like('nm_pasien', $keyword);
        }
        return $this->db->get('pasien', $limit, $start)->result_array();
    }

    function hitung_data()
    {
        return $this->db->get('pasien')->num_rows();
    }

    function insert_data($data)
    {
        return $this->db->insert('pasien', $data);
    }

    function edit_data($where)
    {
        return $this->db->get_where('pasien', $where);
    }

    function update_data($data, $where)
    {
        $this->db->where($where);
        $this->db->update('pasien', $data);
    }

    function hapus_data($where)
    {
        $this->db->where($where);
        $this->db->delete('pasien');
    }
}
