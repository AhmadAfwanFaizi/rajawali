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
            $post['image'] = $this->_uploadImage();
            if (isset($post['status'])) $post['status'] = $post['status'];
            else  $post['status'] = 'N';
            // var_dump($post);
            // die;
            $this->user_m->add($post);
            if ($this->db->affected_rows() > 0) {
                notif('S', 'Successfully added');
            }
            redirect('User/add');
        }
    }

    public function edit($id = null)
    {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('role', 'Role', 'required');

        $this->form_validation->set_message('is_unique', '{field} Already Used');
        // $this->form_validation->set_error_delimiters('<small class="text-danger pl-3">', '</small>');

        if ($this->form_validation->run() == false) {
            if (form_error('username')) notif("W", form_error('username'));
            $data = [
                "page" => "edit user",
                'data' => $this->user_m->getData($id)->row(),
            ];
            // var_dump($data);
            // die;
            $this->template->load('template/template', 'user/edit', $data);
        } else {
            $post = $this->input->post(null, true);
            $user = $this->user_m->getData($post['id'])->row();
            (isset($post['status'])) ? $post['status'] = $post['status'] : $post['status'] = $user->status;
            (isset($post['password'])) ? $post['password'] = $post['password'] : $post['password'] = $user->password;

            if ($_FILES['image']['error'] == 0) {
                $post['image'] = $this->_uploadImage();
            } else {
                $post['image'] = $post['oldImage'];
            }

            // var_dump($post);
            // die;
            $this->user_m->edit($post);
            if ($this->db->affected_rows() > 0) {
                notif('S', 'Successfully updated');
            }
            redirect('User');
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

    private function _uploadImage()
    {
        $config['upload_path']          = './assets/img/user/';
        $config['allowed_types']        = 'gif|jpg|jpeg|png';
        $config['file_name']            = uniqid();
        $config['overwrite']            = true;
        $config['max_size']             = 1024; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('image')) {
            return $this->upload->data("file_name");
        }

        return "user_default.png";
    }
}
