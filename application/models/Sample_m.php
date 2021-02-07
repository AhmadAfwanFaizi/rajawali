<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sample_m extends CI_model
{
    public function getData($id = null)
    {
        $this->db->select('*, S.id as id_sample')
            ->from('sample S')
            ->join('customer C', 'C.id_customer = S.id_customer')
            ->join('brand B', 'B.id = S.id_brand');
        if ($id) {
            $this->db->where("S.id", $id);
        }
        $this->db->where("S.deleted_at", NULL);
        return $this->db->get();
    }

    public function add($post)
    {
        // var_dump($post);
        // die;
        $data = [
            'quotation_no'       => $post['quotationNo'],
            'id_customer'        => $post['idCustomer'],
            'id_brand'           => $post['idBrand'],
            'quantity'           => $post['quantity'],
            'bapc_no'            => $post['bapcNo'],
            'sample_code'        => $post['sampleCode'],
            'sample_description' => $post['sampleDescription'],
            'date_received'      => $post['dateReceived'],
            'date_testing'       => $post['dateTesting'],
            'age_grading'        => $post['ageGrading'],
            'created_at'         => waktu_sekarang()
        ];
        $this->db->insert('sample', $data);
    }

    public function edit($post)
    {
        $data = [
            'quotation_no'       => $post['quotationNo'],
            'id_customer'        => $post['idCustomer'],
            'id_brand'           => $post['idBrand'],
            'quantity'           => $post['quantity'],
            'bapc_no'            => $post['bapcNo'],
            // 'sample_code'        => $post['sampleCode'],
            'sample_description' => $post['sampleDescription'],
            'date_received'      => $post['dateReceived'],
            'date_testing'       => $post['dateTesting'],
            'age_grading'        => $post['ageGrading'],
            'created_at'         => waktu_sekarang()
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
