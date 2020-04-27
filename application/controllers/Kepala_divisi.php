<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kepala_divisi extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('kepala_divisi_m');
    }
// ABSEN
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
        $list = $this->kepala_divisi_m->get_datatables_absen();
        $data = array();
        $no = @$_POST['start'];
        foreach ($list as $item) {
            $no++;
            $row = array();
            $row[] = $no.".";
            $row[] = $item->nip;
            $row[] = $item->nama;
            $row[] = substr($item->dibuat, 0, 10);
            $row[] = substr($item->dibuat, 11, 19);
            $row[] = '<button type="button" class="btn btn-sm btn-primary" onclick="absenMasuk('.$item->id_absen.')">Masuk</button> 
            <button class="btn btn-sm btn-danger" onclick="opsiModal('.$item->id_absen.')">Opsi</button>'; /*absenOpsi*/
            $data[] = $row;
        }
        $output = array(
                    "draw" => @$_POST['draw'],
                    "recordsTotal" => $this->kepala_divisi_m->count_all_absen(),
                    "recordsFiltered" => $this->kepala_divisi_m->count_filtered_absen(),
                    "data" => $data,
                );
        // output to json format
        echo json_encode($output);
    }

    public function koreksiAbsen()
    {
        $this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
        $this->form_validation->set_message('required', '{field} Tidak boleh kosong');
        if($this->form_validation->run() == false) {
            $data  =[
                'res'        => 'false',
                'status'     => form_error('status'),
                'keterangan' => form_error('keterangan'),
            ];
            echo json_encode($data);
        } else {
            $post = $this->input->post(null, true);
            $this->kepala_divisi_m->koreksiAbsen($post);
            if($this->db->affected_rows() > 0) {
                echo json_encode(['res' => 'true']);
            }
        }
    }

// DATA ABSEN

    public function dataAbsen()
    {
        $divisi = $this->db->select('id_divisi')
                            ->from('tb_karyawan')
                            ->where('nip', "$_SESSION[nip]")
                            ->get()->row();
        $data = [
            'judul' => 'data absen',
            'idDivisi' => $divisi->id_divisi,
        ];
        $this->template->load('template/template', 'kepala_divisi/data_absen', $data);
    }

    public function getDataAbsen()
    {
        $post = $this->input->post(null, true);
        $param = [
            'tanggalMulai'    => $post['tanggalMulai'],
            'tanggalBerakhir' => $post['tanggalBerakhir'],
            'idDivisi'        => $post['idDivisi'],
        ];

        // var_dump($param);
        // die;

        $list = $this->kepala_divisi_m->get_datatables_data_absen($param);
        $data = array();
        $no = @$_POST['start'];
        foreach ($list as $item) {
            $no++;
            $row = array();
            $row[] = $no.".";
            $row[] = $item->nip;
            $row[] = $item->nama;
            $row[] = substr($item->dibuat, 0, 10);
            $row[] = substr($item->dibuat, 11, 19);
            $data[] = $row;
        }
        $output = array(
                    "draw" => @$_POST['draw'],
                    "recordsTotal" => $this->kepala_divisi_m->count_all_data_absen($param),
                    "recordsFiltered" => $this->kepala_divisi_m->count_filtered_data_absen($param),
                    "data" => $data,
                );
        echo json_encode($output);
    }

}