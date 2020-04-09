<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kepala_divisi_m extends CI_model {

// ABSEN

    // start datatables
    var $column_order_absen = array(null, 'A.nip', 'nama', 'tanggal_absen', 'waktu_absen'); //set column field database for datatable orderable
    var $column_search_absen = array('A.nip','nama', 'A.dibuat'); //set column field database for datatable searchable
    var $order_absen = array('A.nip' => 'asc'); // default order
 
    private function _get_datatables_query_absen() {
        $this->db->select("A.*, K.nama, DATE_FORMAT(A.dibuat,'%Y-%m-%d') as tanggal_absen, TIME_FORMAT(A.dibuat, '%H:%i:%s') as waktu_absen");
        $this->db->from('tb_absen A');
        $this->db->join('tb_karyawan K', 'K.nip = A.nip');
        $i = 0;
        foreach ($this->column_search_absen as $item) { // loop column
            if(@$_POST['search']['value']) { // if datatable send POST for search
                if($i===0) { // first loop
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
                if(count($this->column_search_absen) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
         
        if(isset($_POST['order'])) { // here order processing
            $this->db->order_by($this->column_order_absen[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }  else if(isset($this->order_absen)) {
            $order_absen = $this->order_absen;
            $this->db->order_by(key($order_absen), $order_absen[key($order_absen)]);
        }
    }
    function get_datatables_absen() {
        $this->_get_datatables_query_absen();
        if(@$_POST['length'] != -1)
        $this->db->limit(@$_POST['length'], @$_POST['start']);
        // where
        $this->db->where('status IS NULL');
        $this->db->order_by('A.dibuat', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }
    function count_filtered_absen() {
        $this->_get_datatables_query_absen();
        $this->db->where('status IS NULL');
        $query = $this->db->get();
        return $query->num_rows();
    }
    function count_all_absen() {
        $this->db->from('tb_absen');
        $this->db->where('status IS NULL');
        return $this->db->count_all_results();
    }
    // end datatables

    // KOREKSI
    public function koreksiAbsen($post)
    {
        $data = [
            'status' => $post['res']
        ];
        $this->db->update('tb_absen', $data, ['id_absen' => $post['id']]);
    }

// DATA ABSEN

    var $column_order_data_absen  = array(null, 'A.nip', 'nama', 'tanggal_absen', 'waktu_absen');
    var $column_search_data_absen = array('A.nip','nama', 'A.dibuat');
    var $order_data_absen         = array('A.nip' => 'asc');
    var $where_data_absen         = "status IS NOT NULL";

    private function _get_datatables_query_data_absen() {
    $this->db->select("A.*, K.nama, DATE_FORMAT(A.dibuat, '%Y-%m-%d') as tanggal_absen, TIME_FORMAT(A.dibuat, '%H:%i:%s') as waktu_absen");
    $this->db->from('tb_absen A');
    $this->db->join('tb_karyawan K', 'K.nip = A.nip');
    $i = 0;
    foreach ($this->column_search_data_absen as $item) {
        if(@$_POST['search']['value']) {
            if($i===0) {
                $this->db->group_start();
                $this->db->like($item, $_POST['search']['value']);
            } else {
                $this->db->or_like($item, $_POST['search']['value']);
            }
            if(count($this->column_search_data_absen) - 1 == $i)
                $this->db->group_end();
        }
        $i++;
    }
     
        if(isset($_POST['order'])) {
            $this->db->order_by($this->column_order_data_absen[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }  else if(isset($this->order_data_absen)) {
            $order_data_absen = $this->order_data_absen;
            $this->db->order_by(key($order_data_absen), $order_data_absen[key($order_data_absen)]);
        }
    }
    function get_datatables_data_absen() {
        $this->_get_datatables_query_data_absen();
        if(@$_POST['length'] != -1)
        $this->db->limit(@$_POST['length'], @$_POST['start']);
        // where
        $this->db->where($this->where_data_absen);
        $query = $this->db->get();
        return $query->result();
    }
    function count_filtered_data_absen() {
        $this->_get_datatables_query_data_absen();
        $this->db->where($this->where_data_absen);
        $query = $this->db->get();
        return $query->num_rows();
    }
    function count_all_data_absen() {
        $this->db->from('tb_absen');
        $this->db->where($this->where_data_absen);
        return $this->db->count_all_results();
    }


//  TUTUP CLASS
}