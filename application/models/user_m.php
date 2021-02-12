<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_m extends CI_model
{
    public function getData($id = null)
    {
        $this->db->select('*')
            ->from('user U');
        if ($id) {
            $this->db->where("U.id", $id);
        }
        $this->db->where("U.deleted_at", NULL);
        return $this->db->get();
    }

    public function add($post)
    {
        $data = [
            'username'   => $post['username'],
            'password'   => $post['password'],
            'role'       => $post['role'],
            'image'      => $this->_uploadImage(),
            'created_at' => waktu_sekarang()
        ];
        $this->db->insert('user', $data);
    }

    public function edit($post)
    {
        $data = [
            'username'   => $post['username'],
            'role'       => $post['role'],
            'updated_at' => waktu_sekarang()
        ];
        if ($post['password']) {
            $data['password'] = $post['password'];
        }
        if (!empty($_FILES["image"]["name"])) {
            $data['image'] = $this->_uploadImage();
        } else {
            $data['image'] = $post["old_image"];
        }
        $this->db->where('id', $post['id']);
        $this->db->update('user', $data);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->update('user', ["deleted_at" => waktu_sekarang()]);
    }

    private function _uploadImage()
    {
        $config['upload_path']          = './assets/product/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = uniqid();
        $config['overwrite']            = true;
        $config['max_size']             = 1024; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('image')) {
            return $this->upload->data("image");
        }

        return "default.jpg";
    }
}
