<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Iso_m extends CI_model
{
    public function getData($id = null)
    {
        $this->db->select('*')->from('iso');
        if ($id) {
            $this->db->where("id", $id);
        }
        $this->db->where("deleted_at", NULL);
        $this->db->where_not_in("category", ['BASED', 'OTHER']);
        return $this->db->get();
    }

    public function add($post)
    {
        $data = [
            'iso'        => $post['iso'],
            'category'   => $post['category'],
            'enable'     => $post['enable'],
            'created_at' => waktu_sekarang()
        ];
        $this->db->insert('iso', $data);
    }

    public function edit($post)
    {
        $data = [
            'iso'        => $post['iso'],
            'category'   => $post['category'],
            'enable'     => $post['enable'],
            'updated_at' => waktu_sekarang()
        ];
        $this->db->where('id', $post['id']);
        $this->db->update('iso', $data);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->update('iso', ["deleted_at" => waktu_sekarang()]);
    }
}
