<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Monitor extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('hrd_m');
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
        $tanggal_sekarang = date('Y-m-d');
        $cek = $this->db->select('nip')->from('tb_absen')->where("DATE_FORMAT(dibuat, '%-Y-%m-%d') = $tanggal_sekarang AND nip =", $nip);

        if($cek) {
            echo 'ada';
        } else {
            $data = [
                'nip' => $nip,
            ];
            $this->db->insert('tb_absen', $data);
            if($this->db->affected_rows() > 0) {
                echo "true";
            } else {
                echo "false";
            }
        }
    }

    public function getDataAbsenTemp()
    {
        $this->db->select("A.nip, nama, TIME_FORMAT(A.dibuat, '%H:%i:%s') as waktu");
        $this->db->from('tb_absen A');
        $this->db->join('tb_karyawan K', 'K.nip = A.nip');
        echo json_encode($this->db->get()->result_array());
    }

// TUTUP CLASS
}