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


   

    var $column_order = array(null, 'nip', 'nama', 'jenis_kelamin', 'tempat_lahir', 'tanggal_lahir', 'email', 'nomor_telepon'); //set column field database for datatable orderable
    var $column_search = array('nip', 'nama'); //set column field database for datatable searchable
    var $order = array('nip' => 'asc'); // default order
 
    private function _get_datatables_query() {
        $this->db->select('*');
        $this->db->from('tb_karyawan');
        // $this->db->join('p_category', 'p_item.category_id = p_category.category_id');
        // $this->db->join('p_unit', 'p_item.unit_id = p_unit.unit_id');
        // $this->db->query("SELECT * from tb_karyawan where dihapus is not null");
        $i = 0;
        foreach ($this->column_search as $item) { // loop column
            if(@$_POST['search']['value']) { // if datatable send POST for search
                if($i===0) { // first loop
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->getDatatablesKaryawan();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
         
        if(isset($_POST['order'])) { // here order processing
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }  else if(isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
    function getDataTableKaryawan() {
        $this->_get_datatables_query();
        if(@$_POST['length'] != -1)
        $this->db->limit(@$_POST['length'], @$_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
    function count_filtered() {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
    function count_all() {
        $this->db->from('tb_karyawan');
        return $this->db->count_all_results();
    }
    // end datatables

    public function getDatatablesKaryawan($idDivisi = null)
    {
        $this->datatables->select("id_karyawan, nip, nama, jenis_kelamin, tempat_lahir, tanggal_lahir, email, nomor_telepon, dibuat")->from('tb_karyawan');
        $this->datatables->where("dihapus IS NULL AND id_divisi = ", $idDivisi);
        return $this->datatables->generate();
    }

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