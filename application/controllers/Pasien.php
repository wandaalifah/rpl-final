<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pasien extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->load->model('m_pasien');
    }

    public function index()
    {
        $data['title'] = "Manajemen Data Pasien";

        if ($this->input->post('submit')) {
            $data['keyword'] = $this->input->post('keyword');
        } else {
            $data['keyword'] = null;
        }

        //Pagination
        $this->load->library('pagination');
        $config['total_rows'] = $this->m_pasien->hitung_data();
        $config['per_page'] = 5;
        $this->pagination->initialize($config);

        $data['start'] = $this->uri->segment(3);
        $data['pasien'] = $this->m_pasien->tampil_data($config['per_page'], $data['start'], $data['keyword']);

        $this->load->view('v_header', $data);
        $this->load->view('pasien/v_data', $data);
        $this->load->view('v_footer');
    }

    function tambah()
    {
        $data['title'] = "Daftarkan Pasien Baru";

        $this->load->view('v_header', $data);
        $this->load->view('pasien/v_data_tambah');
        $this->load->view('v_footer');
    }

    function insert()
    {
        $id_pasien = $this->input->post('id_pasien');
        $nama = $this->input->post('nm_pasien');
        $ttl = $this->input->post('ttl');
        $alamat = $this->input->post('alamat');

        $data = array(
            'id_pasien' => $id_pasien,
            'nm_pasien' => $nama,
            'ttl' => $ttl,
            'alamat' => $alamat
        );

        $this->m_pasien->insert_data($data);

        redirect('pasien');
    }

    function edit($id_pasien)
    {
        $data['title'] = "Edit Data Pasien";

        $where = array('id_pasien' => $id_pasien);
        $data['r'] = $this->m_pasien->edit_data($where)->row_array();

        $this->load->view('v_header', $data);
        $this->load->view('pasien/v_data_edit', $data);
        $this->load->view('v_footer');
    }

    function update()
    {
        $id_pasien = $this->input->post('id_pasien');
        $nama = $this->input->post('nm_pasien');
        $ttl = $this->input->post('ttl');
        $alamat = $this->input->post('alamat');

        $data = array(
            'id_pasien' => $id_pasien,
            'nm_pasien' => $nama,
            'ttl' => $ttl,
            'alamat' => $alamat
        );

        $where = array('id_pasien' => $id_pasien);
        $this->m_pasien->update_data($data, $where);

        redirect('pasien');
    }

    function hapus($id_pasien)
    {
        $where = array('id_pasien' => $id_pasien);
        $this->m_pasien->hapus_data($where);
        redirect('pasien');
    }
}
