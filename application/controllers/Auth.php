<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		// $this->form_validation->set_message('required', '{field} Tidak Boleh Kosong');
		$this->form_validation->set_error_delimiters('<small class="text-danger pl-3">', '</small>');

		if ($this->form_validation->run() == false) {
			$this->load->view('auth/login');
		} else {
			// valid
			$this->_login();
		}
	}

	private function _login()
	{
		$post     = $this->input->post(null, TRUE);
		$username = $post['username'];
		$password = $post['password'];
		$login    = $this->db->select('*')
			->from('user')
			->where(["username" => $username, "password" => $password])
			->get()->row();

		if ($login) {
			$data = [
				'username' => $login->username,
				'role'     => $login->role,
			];
			$this->session->set_userdata($data);

			if ($data['role'] == 'ADMIN') {
				redirect('Label');
			} else if ($data['role'] == 'A') {
				redirect('Label');
			} else if ($data['role'] == 'B') {
				$red = 'Kepala_divisi';
			} else if ($data['role'] == 'C') {
				$red = 'Kepala_divisi';
			} else {
				redirect('auth');
			}
		} else {
			// echo "salah";
			// var_dump($this->session);
			notif("W", "Wrong username or password");
			redirect('auth');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata(['username', 'role']);
		redirect('auth');
	}

	public function blocked()
	{
		$this->load->view('auth/blocked');
	}
}
