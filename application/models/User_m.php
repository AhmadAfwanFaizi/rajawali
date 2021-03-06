<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_m extends CI_model
{
    public function getData($id = null)
    {
        $this->db->select('*, U.id as id_user')
            ->from('user U')
            ->join('privilege_user PU', 'PU.id_user = U.id');
        if ($id) {
            $this->db->where("U.id", $id);
        }
        $this->db->where("U.deleted_at", NULL);
        return $this->db->get();
    }

    public function add($post)
    {
        $id_user = 'USR' . uniqid();
        $dataUser = [
            'id'         => $id_user,
            'username'   => htmlspecialchars($post['username']),
            'password'   => htmlspecialchars($post['password']),
            'role'       => 'USER',
            'status'     => htmlspecialchars($post['status']),
            'image'      => $post['image'],
            'created_at' => waktu_sekarang()
        ];
        $this->db->insert('user', $dataUser);

        $dataPrivilege = [
            'id_user'          => $id_user,
            'master_menu'      => htmlspecialchars($post['master']),
            'sample_menu'    => htmlspecialchars($post['sample']),
            'submition_menu' => htmlspecialchars($post['submition']),
            'add_privilege'    => htmlspecialchars($post['add']),
            'edit_privilege'   => htmlspecialchars($post['edit']),
            'print_privilege'  => htmlspecialchars($post['print']),
            'created_at'       => waktu_sekarang()
        ];
        $this->db->insert('privilege_user', $dataPrivilege);
    }

    public function edit($post)
    {
        $dataUser = [
            'username'   => htmlspecialchars($post['username']),
            'password'   => htmlspecialchars($post['password']),
            'status'     => htmlspecialchars($post['status']),
            'image'      => $post['image'],
            'updated_at' => waktu_sekarang()
        ];
        $this->db->where('id', $post['idUser']);
        $user = $this->db->update('user', $dataUser);

        $dataPrivilege = [
            'master_menu'      => htmlspecialchars($post['master']),
            'sample_menu'    => htmlspecialchars($post['sample']),
            'submition_menu' => htmlspecialchars($post['submition']),
            'add_privilege'    => htmlspecialchars($post['add']),
            'edit_privilege'   => htmlspecialchars($post['edit']),
            'print_privilege'  => htmlspecialchars($post['print']),
            'updated_at'       => waktu_sekarang()
        ];
        $this->db->where('id_user', $post['idUser']);
        $privilege = $this->db->update('privilege_user', $dataPrivilege);

        if ($user || $privilege) return true;
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->update('user', ["deleted_at" => waktu_sekarang()]);
    }
}
