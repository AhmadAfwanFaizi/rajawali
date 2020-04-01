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

// CONTROLLER DIVISI =================================================================================================
    public function getDivisi()
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
        $this->form_validation->set_message('cek_divisi', '{field} Data ini sudah ada');

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
            return "true";
        } else {
            return "false";
        }
    }

// FUNGSI CALLBACK UNTUK NAMA DIVISI
    public function cek_divisi()
	{
		$post = $this->input->post(null, TRUE);
		$query = $this->db->query("SELECT * from tb_divisi where nama_divisi = '$post[ubahNamaDivisi]' and id_divisi != '$post[ubahIdDivisi]'");
		
		if($query->num_rows() > 0) {
			$this->form_validation->set_message('ubahNamaDivisi', '{field} Ini sudah dipakai');
			return false;
		}else{
			return true;
		}
	}

// CONTROLLER KARYAWAN =================================================================================================

    public function getKaryawan()
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
            'data'     => $this->hrd_m->getKaryawan($id = null, $idDivisi),
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

// UBAH DATA
    public function ubahKaryawan()
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


// TUTUP CLASS
}