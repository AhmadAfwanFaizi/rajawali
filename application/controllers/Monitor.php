<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Monitor extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('monitor_m');
    }

    public function index()
    {
        $data = [
            'judul' => 'monitor',
            'data' => $this->db->get('tb_karyawan'),
        ];
        $this->template->load('template/template', 'monitor/index', $data);
    }

    public function getDataKaryawan()
    {
        $nip = $this->input->post('nip', true);
        $res = $this->db->get_where('tb_karyawan', ['nip' => $nip])->result();

        if($res) {
            echo json_encode($res);
        } else {
            echo 'false';
        }
    }

    public function inputAbsen()
    {
        $nip = $this->input->post('nip', true);
        $cek = $this->monitor_m->cekPraInputAbsen($nip)->row();
        if($cek != null) {
            echo json_encode(['res' => 'ada']);
        } else {
            $data = [
                        'nip' => $nip,
                    ];
            $this->db->insert('tb_absen', $data);
            if($this->db->affected_rows() > 0) {
                $namaKaryawan = $this->db->select('nama')->from('tb_karyawan')->where('nip', $nip)->get()->row();
                echo json_encode(['res' => 'true', 'data' => $namaKaryawan]);
            } else {
                echo json_encode(['res' => 'false']);
            }
        }

    }

    public function getDataAbsenTemp()
    {
        $data = $this->monitor_m->getDataAbsenTemp()->result();
        echo json_encode($data);
    }

// TUTUP CLASS
}