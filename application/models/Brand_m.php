<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Brand_m extends CI_model
{
    public function getData($id = null)
    {
        $this->db->select('*')->from('brand');
        if ($id) {
            $this->db->where("id", $id);
        }
        $this->db->where("deleted_at", NULL);
        return $this->db->get();
    }

    public function add($post)
    {
        $data = [
            'brand'      => $post['brand'],
            'remark'     => $post['remark'],
            'enable'     => $post['enable'],
            'created_at' => waktu_sekarang()
        ];
        $this->db->insert('brand', $data);
    }

    public function edit($post)
    {
        $data = [
            'brand'      => $post['brand'],
            'remark'     => $post['remark'],
            'enable'     => $post['enable'],
            'updated_at' => waktu_sekarang()
        ];
        $this->db->where('id', $post['id']);
        $this->db->update('brand', $data);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->update('brand', ["deleted_at" => waktu_sekarang()]);
    }
}
