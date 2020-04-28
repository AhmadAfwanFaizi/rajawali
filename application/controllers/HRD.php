<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HRD extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        login();
        $this->load->model('hrd_m');
    }

    public function index()
    {
        $this->dashboard();
    }

    public function dashboard()
    {
        $tanggalSekarang = date("Y-m-d");
        $totalKaryawan   = $this->db->select("COUNT(nip) as jumlah_karyawan")
                            ->from('tb_karyawan')
                            ->where('dihapus IS NULL')
                            ->get()->row();
        $karyawanMasuk   = $this->db->select("COUNT(nip) as jumlah_karyawan_masuk")
                            ->from('tb_absen')
                            ->where("DATE_FORMAT(dibuat ,'%Y-%m-%d') = '$tanggalSekarang' AND status =", "MASUK")
                            ->get()->row();

        // RUMUS (bagian / total) x 100;
        $presentaseKaryawanMasuk = ($karyawanMasuk->jumlah_karyawan_masuk / $totalKaryawan->jumlah_karyawan) * 100;
            
        $data = [
            'judul'          => 'dashboard',
            'menu_pegawai'   => count($this->hrd_m->getKaryawan()->result()),
            'menu_divisi'    => count($this->hrd_m->getDivisi()->result()),
            'karyawan_masuk' => substr($presentaseKaryawanMasuk, 0, 4)
        ];
        $this->template->load('template/template', 'HRD/dashboard', $data);
    }

    function getDivisi()
    {
        $data = $this->db->get('tb_divisi')->result();
        echo json_encode($data);
    }

// CONTROLLER DIVISI =================================================================================================
    public function dataTableDivisi()
    {
        $list = $this->hrd_m->get_datatables_divisi();
        $data = array();
        $no = @$_POST['start'];
        foreach ($list as $item) {
            $no++;
            $row = array();
            $row[] = $no.".";
            $row[] = $item->nama_divisi;
            $row[] = '<button type="button" class="btn btn-sm btn-danger mr-1" onclick="modalHapus('.$item->id_divisi.')">Hapus</button>
            <button type="button" class="btn btn-sm btn-warning mr-1" data-toggle="modal" data-target="#ubahDivisiModal" onclick="modalUbahDivisi('.$item->id_divisi.')">Uah</button>';
            $data[] = $row;
        }
        $output = array(
                    "draw" => @$_POST['draw'],
                    "recordsTotal" => $this->hrd_m->count_all_divisi(),
                    "recordsFiltered" => $this->hrd_m->count_filtered_divisi(),
                    "data" => $data,
                );
        echo json_encode($output);
    }


    public function getDivisiById()
    {
        // var_dump($param); 
        $param = $this->input->post('id', true);
        $data = $this->hrd_m->getDivisi($param)->result();
        if($this->db->affected_rows() > 0) {
            echo json_encode($data);
        } else {
            return "false";
        }
    }

    public function divisi()
    {   
        $data = [
            'judul' => 'data divisi',
            'data'  => $this->hrd_m->getDivisi()
        ];
        $this->template->load('template/template', 'HRD/divisi', $data);
    }

    public function tambahDivisi()
    {
        $this->form_validation->set_rules('namaDivisi', 'Nama Divisi', 'required|is_unique[tb_divisi.nama_divisi]');
        $this->form_validation->set_message('required', '{field} Tidak boleh kosong');
        $this->form_validation->set_message('is_unique', '{field} Data ini sudah ada');

        if($this->form_validation->run() == FALSE) {
            echo json_encode(form_error('namaDivisi'));

        } else {
// TAMBAH DATA DIVISI
            $post = $this->input->post(null, TRUE);
            $this->hrd_m->tambahDivisi($post);
            if($this->db->affected_rows() > 0) {
                echo json_encode('true');
            }
        }
    }

    public function ubahDivisi()
    {
        $this->form_validation->set_rules('ubahNamaDivisi', 'Nama Divisi', 'required|callback_cek_divisi');
        $this->form_validation->set_message('required', '{field} Tidak boleh kosong');
        $this->form_validation->set_message('cek_divisi', '{field} ini sudah ada');

        if($this->form_validation->run() == FALSE) {
            echo json_encode(form_error('ubahNamaDivisi'));

        } else {
// UBAH DATA DIVISI
            $post = $this->input->post(null, TRUE);
            $this->hrd_m->ubahDivisi($post);
            if($this->db->affected_rows() > 0) {
                echo json_encode('true');
            }
        }
    }

// HAPUS DATA DIVISI
    public function hapusDivisi()
    {
        $idDivisi = $this->input->post("idDivisi", true);
        $this->hrd_m->hapusDivisi($idDivisi);
        if($this->db->affected_rows() > 0) {
            echo "true";
        } else {
            echo "false";
        }
    }

// FUNGSI CALLBACK UNTUK NAMA DIVISI
    public function cek_divisi()
	{
		$post = $this->input->post(null, TRUE);
		$query = $this->db->query("SELECT * from tb_divisi where nama_divisi = '$post[ubahNamaDivisi]' and id_divisi != '$post[ubahIdDivisi]'");
		
		if($query->num_rows() > 0) {
			// $this->form_validation->set_message('ubahNamaDivisi', '{field} Ini sudah dipakai');
			return false;
		}else{
			return true;
		}
	}

// CONTROLLER KARYAWAN =================================================================================================


    public function karyawan($idDivisi = null) 
    {
        $data = [
            'judul'    => 'data karyawan',
            'subJudul' => $this->db->select('nama_divisi')->get_where('tb_divisi', ['id_divisi' => $idDivisi])->row()->nama_divisi,
            'idDivisi' => $idDivisi
        ];
        $this->template->load('template/template','HRD/karyawan', $data);
    }

    public function getDatatablesKaryawan()
    {
        $idDivisi = $this->input->post('idDivisi', true);
        $data = $this->hrd_m->getDatatablesKaryawan($idDivisi);
        echo $data;
    }

    public function dataTableKaryawan()
    {
        $idDivisi = $this->input->post('idDivisi', true);
        $list = $this->hrd_m->get_datatable_karyawan($idDivisi);
        $data = array();
        $no = @$_POST['start'];
        foreach ($list as $l) {
            $no++;
            $row = array();
            $row[] = $no.".";
            $row[] = $l->nip;
            $row[] = $l->nama;
            $row[] = $l->jenis_kelamin == 'L' ? 'Laki-Laki' : 'Perempuan';
            $row[] = $l->tempat_lahir;
            $row[] = $l->tanggal_lahir;
            $row[] = $l->email;
            $row[] = $l->nomor_telepon;
            // add html for action
            $row[] = '<button type="button" class="btn btn-sm btn-danger" onclick="modalHapusKaryawan('.$l->id_karyawan.')">Hapus</button> <button type="button" class="btn btn-sm btn-warning" onclick="ubahKaryawanModal('.$l->id_karyawan.')">Ubah</button> <a href="'.base_url('HRD/kartu/'.$l->id_karyawan).'" class="btn btn-sm btn-info">Kartu</a>';
            $data[] = $row;
        }
        $output = array(
                    "draw" => @$_POST['draw'],
                    "recordsTotal" => $this->hrd_m->count_all_karyawan($idDivisi),
                    "recordsFiltered" => $this->hrd_m->count_filtered_karyawan($idDivisi),
                    "data" => $data,
                );
        // output to json format
        echo json_encode($output);
    }

    public function getKaryawanById()
    {
        $idKaryawan = $this->input->post('id_karyawan', true);
        $model = $this->hrd_m->getKaryawan($idKaryawan)->result();
        if($this->db->affected_rows() > 0) {
            $data = [
                'res'  => 'true',
                'data' => $model,
            ];
            echo json_encode($data);
        } else {
            echo "false";
        }
    }

    public function tambahKaryawan()
    {
        // echo json_encode(['res'=>'true', 'nip' => $this->input->post('nip')]);
        // $post = $this->input->post(null, TRUE);
        // var_dump($post);
        // die;
        $config = [
            [
                'field' => 'nik',
                'label' => 'NIK',
                'rules' => 'required|is_unique[tb_karyawan.nik]'
            ],
            [
                'field' => 'nip',
                'label' => 'NIP',
                'rules' => 'required|is_unique[tb_karyawan.nip]'
            ],
            [
                'field' => 'nama',
                'label' => 'Nama',
                'rules' => 'required'
            ],
            [
                'field' => 'jenisKelamin',
                'label' => 'Jenis Kelamin',
                'rules' => 'required'
            ],
            [
                'field' => 'agama',
                'label' => 'Agama',
                'rules' => 'required'
            ],
            [
                'field' => 'tempatLahir',
                'label' => 'Tempat Lahir',
                'rules' => 'required'
            ],
            [
                'field' => 'tanggalLahir',
                'label' => 'Tanggal Lahir',
                'rules' => 'required'
            ],
            [
                'field' => 'jabatan',
                'label' => 'Jabatan',
                'rules' => 'required'
            ],
            [
                'field' => 'nomorTelepon',
                'label' => 'Nomor Telepon',
                'rules' => 'required'
            ],
            [
                'field' => 'email',
                'label' => 'email',
                'rules' => 'required|valid_email'
            ],
            [
                'field' => 'alamat',
                'label' => 'Alamat',
                'rules' => 'required'
            ],
        ];
        $this->form_validation->set_rules($config);
        $this->form_validation->set_message('required', '{field} Tidak boleh kosong');
        $this->form_validation->set_message('is_unique', '{field} Ini sudah ada');
        $this->form_validation->set_message('valid_email', '{field} yang di input tidak valid');

        if($this->form_validation->run() == FALSE) {

            $data = [
                'res'          => 'false',
                'nik'          => form_error('nik'),
                'nip'          => form_error('nip'),
                'nama'         => form_error('nama'),
                'jenisKelamin' => form_error('jenisKelamin'),
                'agama'        => form_error('agama'),
                'tempatLahir'  => form_error('tempatLahir'),
                'tanggalLahir' => form_error('tanggalLahir'),
                'jabatan'      => form_error('jabatan'),
                'nomorTelepon' => form_error('nomorTelepon'),
                'email'        => form_error('email'),
                'alamat'       => form_error('alamat'),
            ];
            
            echo json_encode($data);

        } else {
// TAMBAH DATA KARYAWAN


            $post = $this->input->post(null, TRUE);
            $this->hrd_m->tambahKaryawan($post);
            if($this->db->affected_rows() > 0) {
                echo json_encode(['res'=>'true', 'nip' => $post['nip']]);
            }
        }
    }

// UBAH DATA KARYAWAN
    public function ubahKaryawan()
    {
        // var_dump($_POST);
        // echo json_encode(['res'=>'true', 'uNip' => $_POST['uNip']]);
        // die;

        $config = [
            [
                'field' => 'uNik',
                'label' => 'NIK',
                'rules' => 'required|callback_cek_nik'
            ],
            [
                'field' => 'uNip',
                'label' => 'NIP',
                'rules' => 'required|callback_cek_nip'
            ],
            [
                'field' => 'uNama',
                'label' => 'Nama',
                'rules' => 'required'
            ],
            [
                'field' => 'uJenisKelamin',
                'label' => 'Jenis Kelamin',
                'rules' => 'required'
            ],
            [
                'field' => 'uAgama',
                'label' => 'Agama',
                'rules' => 'required'
            ],
            [
                'field' => 'uTempatLahir',
                'label' => 'Tempat Lahir',
                'rules' => 'required'
            ],
            [
                'field' => 'uTanggalLahir',
                'label' => 'Tanggal Lahir',
                'rules' => 'required'
            ],
            [
                'field' => 'uJabatan',
                'label' => 'Jabatan',
                'rules' => 'required'
            ],
            [
                'field' => 'uNomorTelepon',
                'label' => 'Nomor Telepon',
                'rules' => 'required'
            ],
            [
                'field' => 'uEmail',
                'label' => 'email',
                'rules' => 'required|valid_email'
            ],
            [
                'field' => 'uAlamat',
                'label' => 'Alamat',
                'rules' => 'required'
            ],
        ];
        $this->form_validation->set_rules($config);
        $this->form_validation->set_message('required', '{field} Tidak boleh kosong');
        $this->form_validation->set_message('is_unique', '{field} Ini sudah ada');
        $this->form_validation->set_message('valid_email', '{field} yang di input tidak valid');
        $this->form_validation->set_message('cek_nik', '{field} ini sudah ada');
        $this->form_validation->set_message('cek_nip', '{field} ini sudah ada');

        if($this->form_validation->run() == FALSE) {

            $data = [
                'res'          => 'false',
                'nik'          => form_error('uNik'),
                'nip'          => form_error('uNip'),
                'nama'         => form_error('uNama'),
                'jenisKelamin' => form_error('uJenisKelamin'),
                'agama'        => form_error('uAgama'),
                'tempatLahir'  => form_error('uTempatLahir'),
                'tanggalLahir' => form_error('uTanggalLahir'),
                'jabatan'      => form_error('uJabatan'),
                'nomorTelepon' => form_error('uNomorTelepon'),
                'email'        => form_error('uEmail'),
                'alamat'       => form_error('uAlamat'),
            ];
            
            echo json_encode($data);

        } else {
        // UBAH DATA KARYAWAN
            $post = $this->input->post(null, TRUE);
        
            if($post['gambarLama'] != "Default.jpg") {
                unlink("./assets/img/".$post['gambarLama']);
            }
            $this->hrd_m->ubahKaryawan($post);
            if($this->db->affected_rows() > 0) {
                echo json_encode(['res'=>'true', 'uNip' => $post['uNip']]);
            }
        }
    }

// CEK NIK
    public function cek_nik()
    {
        $post = $this->input->post(null, TRUE);
        $query = $this->db->query("SELECT * from tb_karyawan where nik = '$post[uNik]' and id_karyawan != '$post[uIdKaryawan]'");
        
        if($query->num_rows() > 0) {
            // $this->form_validation->set_message('uNik', '{field} Ini sudah dipakai');
            return false;
        }else{
            return true;
        }
    }

//CEK NIP

    public function cek_nip()
    {
        $post = $this->input->post(null, TRUE);
        $query = $this->db->query("SELECT * from tb_karyawan where nip = '$post[uNip]' and id_karyawan != '$post[uIdKaryawan]'");
        
        if($query->num_rows() > 0) {
            // $this->form_validation->set_message('uNip', '{field} Ini sudah dipakai');
            return false;
        }else{
            return true;
        }
    }

// HAPUS DATA
    public function hapusKaryawan()
    {
        $id = $this->input->post("id_karyawan", true);

        $file = $this->db->select('gambar')
                        ->from('tb_karyawan')
                        ->where('id_karyawan', $id)
                        ->get()->row();
        
        if($file->gambar != "Default.jpg") {
            unlink("./assets/img/".$file->gambar);
        }
            

        $this->hrd_m->hapusKaryawan($id);
        if($this->db->affected_rows() > 0) {
            echo "true";
        } else {
            echo "false";
        }
    }

    function uploadGambar()
    {
        // var_dump($_FILES['gambarBaru']);
        // die;
        $config['upload_path']   = "./assets/img"; 
        $config['allowed_types'] = 'gif|jpg|png';  
        $config['max_size']      = '1024';
        $config['file_name']     = $this->input->post('namaGambar', true);
         
        $this->load->library('upload',$config); 

        if ( ! $this->upload->do_upload('gambar')){
            $error = array('error' => $this->upload->display_errors());
            echo json_encode(['res' => 'false', 'msg' => $error]);
        } else {
            $data = array('upload_data' => $this->upload->data());
            echo json_encode(['res' => 'true', 'msg' => $data]);
        }
    }

    function ubahGambar()
    {
        // var_dump($_FILES['gambarBaru']);
        // die;
        $config['upload_path']   = "./assets/img"; 
        $config['allowed_types'] = 'gif|jpg|png';  
        $config['max_size']      = '1024';
        $config['file_name']     = $this->input->post('namaGambar', true);
         
        $this->load->library('upload',$config); 

        if ( ! $this->upload->do_upload('gambarBaru')){
            $error = array('error' => $this->upload->display_errors());
            echo json_encode(['res' => 'false', 'msg' => $error]);
        } else {
            $data = array('upload_data' => $this->upload->data());
            echo json_encode(['res' => 'true', 'msg' => $data]);
        }
    }

// CONTROLLER ABSENSI =================================================================================================

    public function absen()
    {
        $data = [
            'judul'    => 'Absen',
        ];
        $this->template->load('template/template', 'HRD/absen', $data);
    }

    public function getAbsen()
    {
        $list = $this->hrd_m->get_datatables_absen();
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
                    "recordsTotal" => $this->hrd_m->count_all_absen(),
                    "recordsFiltered" => $this->hrd_m->count_filtered_absen(),
                    "data" => $data,
                );
        // output to json format
        echo json_encode($output);
    }

    public function dataAbsen() 
    {
        $data = [
            'judul'  => 'data absensi',
            'divisi' => $this->db->get('tb_divisi'),
        ];
        $this->template->load('template/template','HRD/data_absen', $data);
        
    }

    public function getDataAbsen()
    {
            $post = $this->input->post(null, true);
            $param = [
                'tanggalMulai'    => $post['tanggalMulai'],
                'tanggalBerakhir' => $post['tanggalBerakhir'],
                'idDivisi'        => $post['idDivisi'],
            ];

            $list = $this->hrd_m->get_datatables_data_absen($param);
            $data = array();
            $no   = @$_POST['start'];
            foreach ($list as $item) {
                $no++;
                $row = array();
                $row[] = $no.".";
                $row[] = $item->absenNip;
                $row[] = $item->nama;
                $row[] = $this->db->select("COUNT(nip) as masuk")
                                    ->from('tb_absen A')
                                    ->where("A.status = 'MASUK' AND nip =", $item->absenNip)
                                    ->get()->result()[0]->masuk;

                $row[] = $this->db->select("COUNT(nip) as izin")
                                    ->from('tb_absen A')
                                    ->where("A.status = 'IZIN' AND nip=", $item->absenNip)
                                    ->get()->result()[0]->izin;

                $row[] = $this->db->select("COUNT(nip) as alpa")
                                    ->from('tb_absen A')
                                    ->where("A.status = 'ALPA' AND nip=", $item->absenNip)
                                    ->get()->result()[0]->alpa;

                // $row[] = '<button class="btn btn-sm btn-info">Rincian</button>';

                $data[] = $row;
            }
            $output = array(
                        "draw" => @$_POST['draw'],
                        "recordsTotal" => $this->hrd_m->count_all_data_absen($param),
                        "recordsFiltered" => $this->hrd_m->count_filtered_data_absen($param),
                        "data" => $data,
                    );
            echo json_encode($output);
    }

    public function dataAbsenBiasa()
    {   
        $post            = $this->input->post(null, true);
        $idDivisi        = $post['idDivisi'];
        $tanggalMulai    = $post['tanggalMulai'];
        $tanggalBerakhir = $post['tanggalBerakhir'];
        
        $data = $this->db->select('*')
                    ->from('tb_absen A')
                    ->join('tb_karyawan K', 'K.nip = A.nip')
                    ->where("DATE_FORMAT(A.dibuat, '%Y-%m-%d') BETWEEN  '$tanggalMulai' AND '$tanggalBerakhir' AND K.id_divisi =", "$idDivisi")
                    ->get()->result();

        // var_dump($data);
    }

    public function kartu($idKaryawan = null)
    {
        $dataKaryawan = $this->hrd_m->getKaryawan($idKaryawan, $param = null)->row();
        $data = [
            'judul'   => 'kartu',
            'data'    => $dataKaryawan,
            'barcode' => barcode($dataKaryawan->nip),
            'gambar'  => $dataKaryawan->gambar,
        ];


        // $this->load->view('HRD/cetak_kartu', $data);

        $html = $this->load->view('HRD/cetak_kartu', $data, true);
        $file = 'ceetak kartu '.$dataKaryawan->nip;
        pdfGenerator($html, $file, 'A4','landscape');
    }


// TUTUP CLASS
}