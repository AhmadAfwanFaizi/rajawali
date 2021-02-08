<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Submition extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        login();
        $this->load->model(['submition_m']);
    }

    public function index()
    {
        $data = [
            // 'title' => 'Tambah data guru',
            'data'      => $this->submition_m->getData()->result(),
        ];
        // var_dump($data['detail']);
        // die;
        $this->template->load('template/template', 'submition/data', $data);
    }

    public function add()
    {
        $this->form_validation->set_rules('brand', 'Brand', 'required');
        $this->form_validation->set_rules('remark', 'Remark', 'required');
        $this->form_validation->set_rules('enable', 'Enable', 'required');
        // $this->form_validation->set_message('is_unique', '{field} Already Used');
        $this->form_validation->set_error_delimiters('<small class="text-danger pl-3">', '</small>');

        if ($this->form_validation->run() == false) {
            $data = [
                'sample_code' => $this->submition_m->getSampleCode()->result(),
                'include'     => $this->submition_m->getIso('include')->result(),
                'baby_wear'   => $this->submition_m->getIso('baby_wear')->result(),
                'others'      => $this->submition_m->getIso('others')->result(),
            ];
            // var_dump($data);
            // die;
            $this->template->load('template/template', 'submition/add', $data);
        } else {
            $post = $this->input->post(null, true);
            // var_dump($post);
            // die;
            $this->submition_m->add($post);
            if ($this->db->affected_rows() > 0) {
                notif('S', 'Successfully added');
            }
            redirect('Submition');
        }
    }
}
