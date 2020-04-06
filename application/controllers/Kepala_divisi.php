<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kepala_divisi extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('kepala_divisi_m');
    }

    public function index()
    {
        $data = [
            'judul'    => 'data absensi',
            // 'subJudul' => $this->db->select('nama_divisi')->get_where('tb_divisi', ['id_divisi' => $idDivisi])->row()->nama_divisi,
            // 'idDivisi' => $idDivisi,
        ];
        $this->template->load('template/template', 'kepala_divisi/index', $data);
    }

    public function getAbsen()
    {
        $list = $this->kepala_divisi_m->get_datatables();
        $data = array();
        $no = @$_POST['start'];
        foreach ($list as $item) {
            $no++;
            $row = array();
            $row[] = $no.".";
            $row[] = $item->nip;
            $row[] = $item->nama;
            $row[] = '<a href="'.'" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Update</a>
                   <a href="'.'" onclick="return confirm(\'Yakin hapus data?\')"  class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</a>';
            $data[] = $row;
        }
        $output = array(
                    "draw" => @$_POST['draw'],
                    "recordsTotal" => $this->kepala_divisi_m->count_all(),
                    "recordsFiltered" => $this->kepala_divisi_m->count_filtered(),
                    "data" => $data,
                );
        // output to json format
        echo json_encode($output);
    }


}