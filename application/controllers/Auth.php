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
		$role = $this->session->userdata('role');
		if ($role) {
			$this->location($role);
		}

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
			->where([
				"username"   => $username,
				"password"   => $password,
				"status"     => 'Y',
				"deleted_at" => NULL
			])
			->get()->row();

		if ($login) {
			$data = [
				'id'       => $login->id,
				'username' => $login->username,
				'role'     => $login->role,
				'img'      => $login->image,
			];
			$this->session->set_userdata($data);

			$this->location($data['role']);
		} else {
			// echo "salah";
			// var_dump($this->session);
			notif("W", "Wrong username or password");
			redirect('auth');
		}
	}

	public function location($role)
	{
		if ($role == 'ADMIN') {
			redirect('Dashboard');
		} else if ($role == 'USER') {
			redirect('Dashboard');
		} else {
			redirect('auth');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata(['username', 'role', 'img']);
		redirect('auth');
	}

	public function blocked()
	{
		$this->load->view('auth/blocked');
	}
}
