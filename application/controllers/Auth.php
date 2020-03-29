<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function login()
    {
        $this->load->view('auth/login');
    }

    public function page404()
    {
        $this->load->view('auth/404.php');
    }

}