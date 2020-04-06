<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kepala_divisi_m extends CI_model {

    // start datatables
    var $column_order = array(null, 'A.nip', 'nama'); //set column field database for datatable orderable
    var $column_search = array('A.nip','nama'); //set column field database for datatable searchable
    var $order = array('A.nip' => 'asc'); // default order
 
    private function _get_datatables_query() {
        $this->db->select("A.*, K.nama");
        $this->db->from('tb_absen A');
        $this->db->join('tb_karyawan K', 'K.nip = A.nip');
        $i = 0;
        foreach ($this->column_search as $item) { // loop column
            if(@$_POST['search']['value']) { // if datatable send POST for search
                if($i===0) { // first loop
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
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
    function get_datatables() {
        $this->_get_datatables_query();
        if(@$_POST['length'] != -1)
        $this->db->limit(@$_POST['length'], @$_POST['start']);
        // where
        // $this->db->where('A.nip', 111);
        $query = $this->db->get();
        return $query->result();
    }
    function count_filtered() {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
    function count_all() {
        $this->db->from('tb_absen');
        return $this->db->count_all_results();
    }
    // end datatables

}