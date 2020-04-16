<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		// if($this->session->userdata('user_role') == 'ADMIN' || $this->session->userdata('user_role') == 'ROOT') {
		// 	redirect('admin/dashboard');
		// } elseif ($this->session->userdata('user_role') == 'SISWA') {
		// 	redirect('user/dashboard');
		// }

        $this->load->view('auth/login');
    }
    
    public function login()
    {
        $this->form_validation->set_rules('nip', 'NIP', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        // $this->form_validation->set_message('required', 'nip & password tidak boleh kosong');

		if($this->form_validation->run() == FALSE) {

			$data = [
				'res'  => 'false',
				'nip'  => form_error('nip'),
				'pass' => form_error('password'),
				'msg' => 'nip & password tidak boleh kosong',
			];
			
            echo json_encode($data);
		} else {
			// validasi success
			$this->_login();
		}
    }


	private function _login()
	{
		$post  = $this->input->post(null, TRUE);
		$nip   = $post['nip'];
		$pass  = $post['password'];
		$login = $this->db->select('*')
                        ->from('tb_user')
                        ->where("nip = '$nip' AND password =", "$pass")
						->get()->row();
		
		if($login) {
            echo json_encode(['res' => 'masuk']);
            die;
            $data = [
                'nip'  => $nip,
                'role' => $login->role,
            ];
			$this->session->set_userdata($data);
        } else {
            echo json_encode([
                'res' => 'false',
                'msg' => 'NIP atau password salah',
            ]);
        }
    }

	public function logout()
	{
		$this->session->unset_userdata('user_id');
		$this->session->unset_userdata('user_role');
		notif('S', 'Kamu berhasil keluar');
		redirect('auth');
	}

	public function blocked()
	{
		$this->load->view('auth/blocked');
	}


}
