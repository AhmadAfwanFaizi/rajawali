<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        login();
        ADMIN();
        $this->load->model(['user_m']);
    }

    public function index()
    {
        $data = [
            "page" => "user",
            'data' => $this->user_m->getData()->result(),
        ];
        // var_dump($data);
        // die;
        $this->template->load('template/template', 'user/data', $data);
    }

    public function add()
    {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('role', 'Role', 'required');

        // $this->form_validation->set_message('is_unique', '{field} Already Used');
        $this->form_validation->set_error_delimiters('<small class="text-danger pl-3">', '</small>');

        if ($this->form_validation->run() == false) {
            $data = [
                "page"     => "add user",
            ];
            // var_dump($data);
            // die;
            $this->template->load('template/template', 'user/add', $data);
        } else {

            $post = $this->input->post(null, true);

            // var_dump($post);
            // die;
            $this->user_m->add($post);
            if ($this->db->affected_rows() > 0) {
                notif('S', 'Successfully added');
            }
            redirect('User/add');
        }
    }

    public function editBrand($id = null)
    {
        $this->form_validation->set_rules('brand', 'Brand', 'required');
        $this->form_validation->set_rules('remark', 'Remark', 'required');
        $this->form_validation->set_rules('enable', 'Enable', 'required');
        // $this->form_validation->set_message('is_unique', '{field} Already Used');
        $this->form_validation->set_error_delimiters('<small class="text-danger pl-3">', '</small>');

        if ($this->form_validation->run() == false) {
            $data = [
                "page" => "edit brand",
                'data' => $this->brand_m->getData($id)->row(),
            ];
            // var_dump($data);
            // die;
            $this->template->load('template/template', 'master/brand/edit', $data);
        } else {
            $post = $this->input->post(null, true);
            // var_dump($post);
            // die;
            $this->brand_m->edit($post);
            if ($this->db->affected_rows() > 0) {
                notif('S', 'Successfully updated');
            }
            redirect('Master/brand');
        }
    }

    public function delete($id)
    {
        // var_dump($id);
        // die;
        $this->user_m->delete($id);
        if ($this->db->affected_rows() > 0) {
            notif('S', 'Successfully deleted');
        }
        redirect('user');
    }
}
