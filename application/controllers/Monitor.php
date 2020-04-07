<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Monitor extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('hrd_m');
    }

    public function index()
    {
        $this->template->load('template/template', 'monitor/index');
    }


}