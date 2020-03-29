<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HRD_m extends CI_model {

    public function getDivisi()
    {
        $this->db->select('*');
        $this->db->from('tb_divisi');
        return $this->db->get();
    }

    public function tambahDivisi($post)
    {
        $data = [
            'nama_divisi' => htmlspecialchars($post['namaDivisi']),
            'dibuat'      => waktu_sekarang()
        ];
        $this->db->insert('tb_divisi', $data);
    }

}