<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dokter extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        // if(empty($this->session->userdata('login'))){
        //     redirect ('auth');
        // }

        $this->load->model('m_dokter');
    }

    public function index()
    {
        $data['title'] = "Manajemen Data Dokter";

        $data['dokter'] = $this->m_dokter->tampil_data()->result_array();

        $this->load->view('v_header', $data);
        $this->load->view('dokter/v_data', $data);
        $this->load->view('v_footer');
    }

    function tambah()
    {
        $data['title'] = "Tambah Data Dokter";

        $this->load->view('v_header', $data);
        $this->load->view('dokter/v_data_tambah');
        $this->load->view('v_footer');
    }

    function insert()
    {
        $id_dokter = $this->input->post('id_dokter');
        $nama = $this->input->post('nm_dokter');
        $spesialis = $this->input->post('spesialis');

        $data = array(
            'id_dokter' => $id_dokter,
            'nm_dokter' => $nama,
            'spesialis' => $spesialis
        );

        $this->m_dokter->insert_data($data);

        redirect('dokter');
    }

    function edit($id)
    {
        $data['title'] = "Edit Data Dokter";

        $where = array('id_dokter' => $id);
        $data['r'] = $this->m_dokter->edit_data($where)->row_array();

        $this->load->view('v_header', $data);
        $this->load->view('dokter/v_data_edit', $data);
        $this->load->view('v_footer');
    }

    function update()
    {
        $id_dokter = $this->input->post('id_dokter');
        $nama = $this->input->post('nm_dokter');
        $spesialis = $this->input->post('spesialis');

        $data = array(
            'id_dokter' => $id_dokter,
            'nm_dokter' => $nama,
            'spesialis' => $spesialis
        );

        $where = array('id_dokter' => $id_dokter);
        $this->m_dokter->update_data($data, $where);

        redirect('dokter');
    }

    function hapus($id_dokter)
    {
        $where = array('id_dokter' => $id_dokter);
        $this->m_dokter->hapus_data($where);
        redirect('dokter');
    }
}
