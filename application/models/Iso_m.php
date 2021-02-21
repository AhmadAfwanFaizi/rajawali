<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Iso_m extends CI_model
{
    public function getData($id = null)
    {
        $this->db->select('I.*, U.username as created_by, U2.username as updated_by')
            ->from('iso I')
            ->join('user U', 'U.id = I.created_by')
            ->join('user U2', 'U2.id = I.updated_by', 'left');
        if ($id) {
            $this->db->where("I.id", $id);
        }
        $this->db->where("I.deleted_at", NULL);
        $this->db->where_not_in("I.category", ['BASED', 'OTHER']);
        return $this->db->get();
    }

    public function add($post)
    {
        $data = [
            'iso'        => $post['iso'],
            'category'   => $post['category'],
            'enable'     => $post['enable'],
            'created_at' => waktu_sekarang(),
            'created_by' => $this->session->userdata('id'),
        ];
        $this->db->insert('iso', $data);
    }

    public function edit($post)
    {
        $data = [
            'iso'        => $post['iso'],
            'category'   => $post['category'],
            'enable'     => $post['enable'],
            'updated_at' => waktu_sekarang(),
            'updated_at' => $this->session->userdata('id'),
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
