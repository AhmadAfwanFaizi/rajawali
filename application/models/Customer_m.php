<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customer_m extends CI_model
{
    public function getData($idCustomer = null)
    {
        $this->db->select('*')
            ->from('customer C')
            ->join('customer_detail CD', 'CD.id_customer = C.id_customer');
        if ($idCustomer) {
            $this->db->where("C.id_customer", $idCustomer);
        }
        $this->db->where("C.deleted_at", NULL);
        return $this->db->get();
    }

    public function add($post)
    {
        $id_customer = uniqid();
        $data = [
            'id_customer'    => $id_customer,
            'customer_name'  => $post['customerName'],
            'contact_person' => $post['contactPerson'],
            'phone_number'   => $post['phoneNumber'],
            'address'        => $post['address'],
            'bill_to'        => $post['billTo'],
            'remark'         => $post['remark'],
            'enable'         => $post['enable'],
            'created_at'     => waktu_sekarang()
        ];
        $this->db->insert('customer', $data);

        $detail = [
            'id_customer' => $id_customer,
            'email'       => $post['email'],
        ];
        $this->db->insert('customer_detail', $detail);
    }

    public function edit($post)
    {
        $data = [
            'customer_name'  => $post['customerName'],
            'contact_person' => $post['contactPerson'],
            'phone_number'   => $post['phoneNumber'],
            'address'        => $post['address'],
            'bill_to'        => $post['billTo'],
            'remark'         => $post['remark'],
            'enable'         => $post['enable'],
            'updated_at'     => waktu_sekarang()
        ];
        $this->db->where('id_customer', $post['id_customer']);
        $this->db->update('customer', $data);

        $detail = [
            'email'       => $post['email'],
        ];
        $this->db->where('id_customer', $post['id_customer']);
        $this->db->update('customer_detail', $detail);
    }

    public function delete($idCustomer)
    {
        $this->db->where('id_customer', $idCustomer);
        $this->db->update('customer', ["deleted_at" => waktu_sekarang()]);
    }
}
