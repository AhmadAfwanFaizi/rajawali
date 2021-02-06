<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Label extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        login();
        // $this->load->model('label_m');
    }

    public function index()
    {
        $this->template->load('template/template', 'label/data');
        // echo "ok masuk";
    }
}
