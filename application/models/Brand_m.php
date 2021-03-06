<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Brand_m extends CI_model
{
    public function getData($id = null, $enable = null)
    {
        $this->db->select('B.*, 
        B.created_at as created_at_brand, 
        B.updated_at as updated_at_brand, 
        U.username as created_by_brand, 
        U2.username as updated_by_brand')
            ->from('brand B')
            ->join('user U', 'U.id = B.created_by')
            ->join('user U2', 'U2.id = B.updated_by', 'left');
        if ($id) {
            $this->db->where("B.id", $id);
        }

        if ($enable) {
            $this->db->where("B.enable", "Y");
        }
        $this->db->where("B.deleted_at", NULL);
        return $this->db->get();
    }

    public function add($post)
    {
        $data = [
            'brand'      => $post['brand'],
            'remark'     => $post['remark'],
            'enable'     => $post['enable'],
            'created_at' => waktu_sekarang(),
            'created_by' => $this->session->userdata('id'),
        ];
        $this->db->insert('brand', $data);
    }

    public function edit($post)
    {
        $data = [
            'brand'      => $post['brand'],
            'remark'     => $post['remark'],
            'enable'     => $post['enable'],
            'updated_at' => waktu_sekarang(),
            'updated_by' => $this->session->userdata('id'),
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
