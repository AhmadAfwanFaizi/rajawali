<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Monitor_m extends CI_model {

    public function getDataAbsenTemp()
    {
        $tanggal_sekarang = date('Y-m-d');
        $this->db->select("A.nip, nama, TIME_FORMAT(A.dibuat, '%H:%i:%s') as waktu");
        $this->db->from('tb_absen A');
        $this->db->join('tb_karyawan K', 'K.nip = A.nip');
        $this->db->where("A.status IS NULL AND DATE_FORMAT(A.dibuat, '%Y-%m-%d') =", $tanggal_sekarang);
        $this->db->order_by("A.dibuat", "desc");
        return $this->db->get();
    }

    public function cekPraInputAbsen($nip)
    {
        $tanggal_sekarang = date('Y-m-d');
        $this->db->select('nip');
        $this->db->from('tb_absen');
        $this->db->where("DATE_FORMAT(dibuat, '%Y-%m-%d') = '$tanggal_sekarang' AND nip =", $nip);
        return $this->db->get();
    }


// TUTUP CLASS
}