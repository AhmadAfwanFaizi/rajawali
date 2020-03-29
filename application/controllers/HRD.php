<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HRD extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('hrd_m');
    }

    public function dashboard()
    {
        $data = [
            'judul' => 'dashboard'
        ];
        $this->template->load('template/template', 'HRD/dashboard', $data);
    }

    public function getDivisi()
    {
       echo json_encode( [ 'data' => $this->hrd_m->getDivisi()->result()]);
    }

    public function divisi()
    {
        $this->form_validation->set_rules('namaDivisi', 'Nama Divisi', 'required');

        if($this->form_validation->run() == FALSE) {
            $data = [
                'judul' => 'data divisi',
            ];
            $this->template->load('template/template', 'HRD/divisi', $data);

        } else {
            $post = $this->input->post(null, TRUE);

            $this->hrd_m->tambahDivisi($post);
            if($this->db->affected_rows() > 0) {
                echo 'BERHASIL';
            }
        }
        
    }

    public function coba()
    {
        $a = ['namaDivisi'=> 'a'];
        var_dump( $this->hrd_m->tambahDivisi($a));
    }

}