<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hrd_m extends CI_model {

// MODEL DIVISI ================================================================================================================

    public function getDivisi($idDivisi = null)
    {
        $this->db->select('*');
        $this->db->from('tb_divisi');
        if($idDivisi) {
            $this->db->where('id_divisi', $idDivisi);
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
        $this->db->update('tb_divisi', $data, ['id_divisi' => $post['ubahIdDivisi']]);
    }

    public function hapusDivisi($idDivisi)
    {
        $this->db->delete('tb_divisi', ['id_divisi' => $idDivisi]);
    }


// MODEL KARYAWAN ================================================================================================================

    public function getKaryawan($paramKaryawan = null, $paramDivisi = null)
    {
        if($paramKaryawan) {
            $idKaryawan = "tb_karyawan.id_karyawan = '$paramKaryawan' AND ";
        } else {
            $idKaryawan = "";
        }
        if($paramDivisi != '') {
            $idDivisi = "tb_divisi.id_divisi = '$paramDivisi' and";
        } else {
            $idDivisi = "";
        }
        return $this->db->query("SELECT * from tb_karyawan inner join tb_divisi on tb_divisi.id_divisi = tb_karyawan.id_divisi where $idKaryawan $idDivisi tb_karyawan.dihapus is null");
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
            'id_divisi'     => htmlspecialchars($post['idDivisi']),
            'dibuat'        => waktu_sekarang()
            
        ];
        $this->db->insert('tb_karyawan', $data);
    }

    public function ubahKaryawan($post)
    {
        $data = [
            'nik'           => htmlspecialchars($post['uNik']),
            'nip'           => htmlspecialchars($post['uNip']),
            'nama'          => htmlspecialchars($post['uNama']),
            'jenis_kelamin' => htmlspecialchars($post['uJenisKelamin']),
            'agama'         => htmlspecialchars($post['uAgama']),
            'tempat_lahir'  => htmlspecialchars($post['uTempatLahir']),
            'tanggal_lahir' => htmlspecialchars($post['uTanggalLahir']),
            'alamat'        => htmlspecialchars($post['uAlamat']),
            'email'         => htmlspecialchars($post['uEmail']),
            'nomor_telepon' => htmlspecialchars($post['uNomorTelepon']),
            'jabatan'       => htmlspecialchars($post['uJabatan']),
            'id_divisi'     => htmlspecialchars($post['uIdDivisi']),
            'diubah'        => waktu_sekarang()
            
        ];
        $this->db->update('tb_karyawan', $data, ['id_karyawan' => $post['uIdKaryawan']]);
    }

    public function hapusKaryawan($idKaryawan)
    {
        $this->db->set('dihapus', waktu_sekarang())->where('id_karyawan', $idKaryawan)->update('tb_karyawan');
    }

// TUTUP CLASS
}