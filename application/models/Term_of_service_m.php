<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Term_of_service_m extends CI_model
{
    public function getData($id = null, $enable = null)
    {
        $this->db->select('TOS.*, TOS.id as id_term_of_service, U.username as created_by_tos, U2.username as updated_by_tos')
            ->from('term_of_service TOS')
            ->join('user U', 'U.id = TOS.created_by')
            ->join('user U2', 'U2.id = TOS.updated_by', 'left');
        if ($id) {
            $this->db->where("TOS.id", $id);
        }
        if ($enable) {
            $this->db->where("TOS.enable", 'Y');
        }
        return $this->db->get();
    }

    public function add($post)
    {
        $data = [
            'category'   => strtoupper($post['category']),
            'enable'     => $post['enable'],
            'created_at' => waktu_sekarang(),
            'created_by' => $this->session->userdata('id'),
        ];
        $this->db->insert('term_of_service', $data);
    }

    public function edit($post)
    {
        $data = [
            'category'   => strtoupper($post['category']),
            'enable'     => $post['enable'],
            'updated_at' => waktu_sekarang(),
            'updated_by' => $this->session->userdata('id'),
        ];
        $this->db->where('id', $post['id']);
        $this->db->update('term_of_service', $data);
    }

    public function getDataDetail($id = null, $enable = null)
    {
        $this->db->select('TOSD.*, TOSD.id as id_term_of_service_detail, TOS.category, U.username as created_by_tosd, U2.username as updated_by_tosd')
            ->from('term_of_service_detail TOSD')
            ->join('term_of_service TOS', 'TOS.id = TOSD.id_term_of_service')
            ->join('user U', 'U.id = TOSD.created_by')
            ->join('user U2', 'U2.id = TOSD.updated_by', 'left');
        if ($id) {
            $this->db->where("TOSD.id", $id);
        }
        if ($enable) {
            $this->db->where("TOS.enable", 'Y');
        }
        return $this->db->get();
    }

    public function addDetail($post)
    {
        $data = [
            'id_term_of_service' => $post['id_term_of_service'],
            'type'               => $post['type'],
            'information'        => htmlspecialchars($post['information']),
            'created_at'         => waktu_sekarang(),
            'created_by'         => $this->session->userdata('id'),
        ];
        $this->db->insert('term_of_service_detail', $data);
    }

    public function editDetail($post)
    {
        $data = [
            'id_term_of_service' => $post['id_term_of_service'],
            'type'               => $post['type'],
            'information'        => htmlspecialchars($post['information']),
            'updated_at'         => waktu_sekarang(),
            'updated_by'         => $this->session->userdata('id'),
        ];
        $this->db->where('id', $post['id']);
        $this->db->update('term_of_service_detail', $data);
    }

    // END CLASS
}
