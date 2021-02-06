<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Request_m extends CI_model
{
    public function getData($id = null)
    {
        $this->db->select('*')->from('request');
        if ($id) {
            $this->db->where("id", $id);
        }
        $this->db->where("deleted_at", NULL);
        return $this->db->get();
    }

    public function add($post)
    {
        $data = [
            'item'       => $post['item'],
            'category'   => $post['category'],
            'remark'     => $post['remark'],
            'enable'     => $post['enable'],
            'created_at' => waktu_sekarang()
        ];
        $this->db->insert('request', $data);
    }

    public function edit($post)
    {
        // var_dump($post);
        // die;
        $data = [
            'item'       => $post['item'],
            'category'   => $post['category'],
            'remark'     => $post['remark'],
            'enable'     => $post['enable'],
            'updated_at' => waktu_sekarang()
        ];
        $this->db->where('id', $post['id']);
        $this->db->update('request', $data);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->update('request', ["deleted_at" => waktu_sekarang()]);
    }
}
