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
            'judul'        => 'dashboard',
            'menu_pegawai' => count($this->hrd_m->getKaryawan()->result()),
            'menu_divisi'  => count($this->hrd_m->getDivisi()->result()),
        ];
        $this->template->load('template/template', 'HRD/dashboard', $data);
    }

    public function serverSide($valid_columns, $post){
        // isi valid columns

            // $valid_columns = array(
            //     0=>'id_divisi',
            //     1=>'nama_divisi',
            // );
        $order = $post["order"];
        $search= $post["search"];
        $search = $search['value'];
        $col = 0;
        $dir = "";
        if(!empty($order))
        {
            foreach($order as $o)
            {
                $col = $o['column'];
                $dir = $o['dir'];
            }
        }

        if($dir != "asc" && $dir != "desc")
        {
            $dir = "desc";
        }
       
        if(!isset($valid_columns[$col]))
        {
            $order = null;
        }
        else
        {
            $order = $valid_columns[$col];
        }
        if($order !=null)
        {
            $this->db->order_by($order, $dir);
        }
        
        if(!empty($search))
        {
            $x=0;
            foreach($valid_columns as $sterm)
            {
                if($x==0)
                {
                    $this->db->like($sterm,$search);
                }
                else
                {
                    $this->db->or_like($sterm,$search);
                }
                $x++;
            }                 
        }
    }

// CONTROLLER DIVISI =================================================================================================
    public function getDivisi()
    {
        $valid_columns = array(
            0=>'id_divisi',
            1=>'nama_divisi',
        );
        $post = $this->input->post(null, true);

        $this->serverSide($valid_columns, $post);

        $draw = intval($post["draw"]);
        $start = intval($post["start"]);
        $length = intval($post["length"]);

        $this->db->limit($length,$start);
        // nama table
        $employees = $this->db->get("tb_divisi");
        $data = array();
        $no = 1;
        foreach($employees->result() as $rows)
        {
            // render data
            
            $data[]= array(
                // $rows->id_divisi,
                $no++,
                $rows->nama_divisi,
                '<button type="button" class="btn btn-sm btn-danger mr-1" onclick="modalHapus('.$rows->id_divisi.')">Hapus</button>
                 <button type="button" class="btn btn-sm btn-warning mr-1" data-toggle="modal" data-target="#ubahDivisiModal" onclick="modalUbahDivisi('.$rows->id_divisi.')">Uah</button>'
            );     
        }

        // $total_data = $this->totalDivisi();

        $query = $this->db->select("COUNT(*) as num")->get("tb_divisi");
        $result = $query->row();
        if(isset($result)) { $total_data = $result->num; } else { $total_data = 0 ;}

        $output = array(
            "draw" => $draw,
            "recordsTotal" => $total_data,
            "recordsFiltered" => $total_data,
            "data" => $data
        );
        echo json_encode($output);
        exit();
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


    public function getKaryawan()
    {
        $valid_columns = array(
            0=>'nip',
            1=>'nama',
            2=>'jenis_kelamin',
            3=>'tempat_lahir',
            4=>'tanggal_lahir',
            5=>'email',
            6=>'nomor_telepon',

        );

        $post = $this->input->post(null, true);
        $this->serverSide($valid_columns, $post);

        $draw = intval($post["draw"]);
        $start = intval($post["start"]);
        $length = intval($post["length"]);

        $this->db->limit($length,$start);
        // nama table
        
        $idDivisi = $post['idDivisi'];
        $employees = $this->db->query("SELECT * FROM tb_karyawan WHERE id_divisi = '$idDivisi' and dihapus is null");
        // $employees = $this->hrd_m->getKaryawan($idKaryawan = null, $idDivisi);
        $data = array();
        $no = 1;
        foreach($employees->result() as $rows)
        {
            // render data
            $data[]= array(
                $no++,
                $rows->nip,
                $rows->nama,
                $rows->jenis_kelamin == 'L' ? 'Laki-Laki' : 'Perempuan',
                $rows->tempat_lahir,
                $rows->tanggal_lahir,
                $rows->email,
                $rows->nomor_telepon,
                '<button type="button" class="btn btn-sm btn-danger" onclick="modalHapusKaryawan('.$rows->id_karyawan.')">Hapus</button>
                <button type="button" class="btn btn-sm btn-warning" onclick="ubahKaryawanModal('.$rows->id_karyawan.')">Ubah</button>'
            );     
        }

        // $total_data = $this->totalDivisi();

        $query = $this->db->query("SELECT COUNT(*) as num FROM tb_karyawan where id_divisi = '$idDivisi' and dihapus is null");
        $result = $query->row();
        if(isset($result)) { $total_data = $result->num; } else { $total_data = 0 ;}

        $output = array(
            "draw" => $draw,
            "recordsTotal" => $total_data,
            "recordsFiltered" => $total_data,
            "data" => $data
        );
        echo json_encode($output);
        exit();
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

    public function karyawan($idDivisi = null) 
    {
        $data = [
            'judul'    => 'data karyawan',
            'subJudul' => $this->db->select('nama_divisi')->get_where('tb_divisi', ['id_divisi' => $idDivisi])->row()->nama_divisi,
            'idDivisi' => $idDivisi
        ];
        $this->template->load('template/template','HRD/karyawan', $data);
    }

    public function tambahKaryawan()
    {
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
                echo json_encode(['res'=>'true']);
            }
        }
    }

// UBAH DATA KARYAWAN
    public function ubahKaryawan()
    {
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
        // TAMBAH DATA KARYAWAN
            $post = $this->input->post(null, TRUE);
            $this->hrd_m->ubahKaryawan($post);
            if($this->db->affected_rows() > 0) {
                echo json_encode(['res'=>'true']);
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
        $this->hrd_m->hapusKaryawan($id);
        if($this->db->affected_rows() > 0) {
            echo "true";
        } else {
            echo "false";
        }
    }

// CONTROLLER ABSENSI =================================================================================================

    public function getAbsensi()
    {
        // $idKaryawan = $this->input->post('id_absensi', true);
        // $model = $this->hrd_m->getKaryawan($idKaryawan)->result();
        // if($this->db->affected_rows() > 0) {
        //     $data = [
        //         'res'  => 'true',
        //         'data' => $model,
        //     ];
        //     echo json_encode($data);
        // } else {
        //     echo "false";
        // }
    
    }

    public function absensi($idDivisi = null) 
    {
        $data = [
            'judul'    => 'data ',
            'subJudul' => $this->db->select('nama_divisi')->get_where('tb_divisi', ['id_divisi' => $idDivisi])->row()->nama_divisi,
            'data'     => $this->hrd_m->getKaryawan($id = null, $idDivisi),
            'idDivisi' => $idDivisi
        ];
        $this->template->load('template/template','HRD/karyawan', $data);
    }

// TUTUP CLASS
}