<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hrd_m extends CI_model {

// MODEL DIVISI ================================================================================================================

    public function getDivisi($param = null)
    {
        $this->db->select('*');
        $this->db->from('tb_divisi');
        if($param) {
            $this->db->where('id', $param);
        }
        return $this->db->get();
    }

    public function tambahDivisi($post)
    {
        $data = [
            'nama_divisi' => htmlspecialchars(strtoupper($post['namaDivisi'])),
            'dibuat'      => waktu_sekarang()
        ];
        $this->db->insert('tb_divisi', $data);
    }

    public function ubahDivisi($post)
    {
        $data = [
            'nama_divisi' => htmlspecialchars(strtoupper($post['ubahNamaDivisi'])),
            'diubah'      => waktu_sekarang()
        ];
        $this->db->update('tb_divisi', $data, ['id' => $post['ubahIdDivisi']]);
    }

    public function hapusDivisi($idDivisi)
    {
        $this->db->delete('tb_divisi', ['id' => $idDivisi]);
    }


// MODEL KARYAWAN ================================================================================================================

    public function getKaryawan($idDivisi = null)
    {
        $this->db->select('*');
        $this->db->from('tb_karyawan');
        $this->db->where("dihapus is null or dihapus =", '');
        if($idDivisi) {
            $this->db->where('id', $idDivisi);
        }
        return $this->db->get();
    }

    public function tambahKaryawan($post)
    {
        $data = [
            'nik'           => htmlspecialchars($post['nik']),
            'nip'           => htmlspecialchars($post['nip']),
            'nama'          => htmlspecialchars($post['nama']),
            'jenis_kelamin' => htmlspecialchars($post['jenisKelamin']),
            'agama'         => htmlspecialchars($post['agama']),
            'tempat_lahir'  => htmlspecialchars($post['tempatLahir']),
            'tanggal_lahir' => htmlspecialchars($post['tanggalLahir']),
            'alamat'        => htmlspecialchars($post['alamat']),
            'email'         => htmlspecialchars($post['email']),
            'nomor_telepon' => htmlspecialchars($post['nomorTelepon']),
            'jabatan'       => htmlspecialchars($post['jabatan']),
            'divisi'        => htmlspecialchars($post['divisi']),
            'dibuat'        => waktu_sekarang()
            
        ];
        $this->db->insert('tb_karyawan', $data);
    }

    public function hapusKaryawan($id)
    {
        $this->db->set('dihapus', waktu_sekarang())->where('id', $id)->update('tb_karyawan');
    }

// TUTUP CLASS
}