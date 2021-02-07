<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sample_m extends CI_model
{
    public function getData($idSample = null)
    {
        $this->db->select('*')
            ->from('sample S')
            ->join('customer C', 'C.id_customer = S.id_customer')
            ->join('brand B', 'B.id = S.id_brand');
        if ($idSample) {
            $this->db->where("S.id_sample", $idSample);
        }
        $this->db->where("S.deleted_at", NULL);
        return $this->db->get();
    }

    public function getDetail($idSample = null, $id = null)
    {
        $this->db->select('*')
            ->from('sample_detail SD');
        if ($idSample) {
            $this->db->where("SD.id_sample", $idSample);
        }
        if ($id) {
            $this->db->where("SD.id", $id);
        }
        $this->db->where("SD.deleted_at", NULL);
        return $this->db->get();
    }

    public function add($post)
    {
        // var_dump($post);
        // die;
        $data = [
            'id_sample'    => $post['idSample'],
            'quotation_no' => $post['quotationNo'],
            'id_customer'  => $post['idCustomer'],
            'id_brand'     => $post['idBrand'],
            'created_at'         => waktu_sekarang()
        ];
        $this->db->insert('sample_detail', $data);
    }

    public function addDetail($post)
    {
        // var_dump($post);
        // die;
        $data = [
            'id_sample'          => $post['idSample'],
            'quantity'           => $post['quantity'],
            'bapc_no'            => $post['bapcNo'],
            'sample_code'        => $post['sampleCode'],
            'sample_description' => $post['sampleDescription'],
            'date_received'      => $post['dateReceived'],
            'date_testing'       => $post['dateTesting'],
            'age_grading'        => $post['ageGrading'],
            'created_at'         => waktu_sekarang()
        ];
        $this->db->insert('sample_detail', $data);
    }

    public function edit($post)
    {
        // var_dump($post);
        // die;
        $data = [
            'quotation_no' => $post['quotationNo'],
            'id_customer'  => $post['idCustomer'],
            'id_brand'     => $post['idBrand'],
            'updated_at'   => waktu_sekarang()
        ];
        $this->db->where('id_sample', $post['idSample']);
        $this->db->update('sample', $data);
    }

    public function editDetail($post)
    {
        // var_dump($post);
        // die;
        $data = [
            'quantity'           => $post['quantity'],
            'bapc_no'            => $post['bapcNo'],
            'sample_code'        => $post['sampleCode'],
            'sample_description' => $post['sampleDescription'],
            'date_received'      => $post['dateReceived'],
            'date_testing'       => $post['dateTesting'],
            'age_grading'        => $post['ageGrading'],
            'updated_at'         => waktu_sekarang()
        ];
        $this->db->where('id', $post['idDetail']);
        $this->db->update('sample_detail', $data);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->update('brand', ["deleted_at" => waktu_sekarang()]);
    }

    public function deleteDetail($id)
    {
        $this->db->where('id', $id);
        $this->db->update('sample_detail', ["deleted_at" => waktu_sekarang()]);
    }
}
