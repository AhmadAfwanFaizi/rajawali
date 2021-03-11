<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sample_m extends CI_model
{
    public function getData($idSample = null, $startDate = null, $endDate = null, $idBrand = null, $keyword = null)
    {
        $this->db->select('S.*, C.customer_name, B.brand, 
        S.created_at as created_at_sample, 
        S.updated_at as updated_at_sample, 
        U.username as created_by_sample, 
        U2.username as updated_by_sample')
            ->from('sample S')
            ->join('customer C', 'C.id_customer = S.id_customer')
            ->join('brand B', 'B.id = S.id_brand')
            ->join('user U', 'U.id = S.created_by')
            ->join('user U2', 'U2.id = S.updated_by', 'left');
        if ($idSample) {
            $this->db->where("S.id_sample", $idSample);
        }
        if ($startDate && $endDate) {
            $this->db->where("DATE(S.created_at) BETWEEN '$startDate' AND '$endDate'");
        }
        if ($idBrand) {
            $this->db->where("S.id_brand", $idBrand);
        }
        if ($keyword) {
            $this->db->like("S.quotation_no", $keyword)
                ->or_like("C.customer_name", $keyword)
                ->or_like("B.brand", $keyword);
        }
        $this->db->where("S.deleted_at", NULL);
        // $this->db->get();
        // var_dump($this->db->last_query());
        return $this->db->get();
    }

    public function getDetail($idSample = null, $id = null, $startDate = null, $endDate = null, $keyword = null)
    {
        $this->db->select('SD.*, SD.id as id_detail, S.quotation_no, C.customer_name, B.brand, 
        SD.created_at as created_at_sd,
        SD.updated_at as updated_at_sd,
        U.username as created_by_sd, 
        U2.username as updated_by_sd')
            ->from('sample_detail SD')
            ->join('sample S', 'S.id_sample = SD.id_sample')
            ->join('customer C', 'C.id_customer = S.id_customer')
            ->join('brand B', 'B.id = S.id_brand')
            ->join('user U', 'U.id = SD.created_by')
            ->join('user U2', 'U2.id = SD.updated_by', 'left');
        if ($idSample) {
            $this->db->where("SD.id_sample", $idSample);
        }
        if ($id) {
            $this->db->where("SD.id", $id);
        }
        if ($startDate && $endDate) {
            $this->db->where("DATE(SD.created_at) BETWEEN '$startDate' AND '$endDate'");
        }
        if ($keyword) {
            $this->db->like("S.quotation_no", $keyword)
                ->or_like("C.customer_name", $keyword)
                ->or_like("B.brand", $keyword);
        }
        $this->db->where("SD.deleted_at", NULL);
        $this->db->where("S.deleted_at", NULL);
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
            'enable'       => $post['enable'],
            'created_at'   => waktu_sekarang(),
            'created_by'   => $this->session->userdata('id'),
        ];
        $this->db->insert('sample', $data);
    }

    public function edit($post)
    {
        // var_dump($post);
        // die;
        $data = [
            'quotation_no' => $post['quotationNo'],
            'id_customer'  => $post['idCustomer'],
            'id_brand'     => $post['idBrand'],
            'enable'       => $post['enable'],
            'updated_at'   => waktu_sekarang(),
            'updated_by'   => $this->session->userdata('id'),
        ];
        $this->db->where('id_sample', $post['idSample']);
        $this->db->update('sample', $data);
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
            'remark'             => $post['remark'],
            'enable'             => $post['enable'],
            'status_sample'      => 'PENDING',
            'created_at'         => waktu_sekarang(),
            'created_by'         => $this->session->userdata('id'),
        ];
        $this->db->insert('sample_detail', $data);
    }

    public function editDetail($post)
    {
        // var_dump($post);
        // die;
        $data = [
            'quantity'           => $post['quantity'],
            'bapc_no'            => $post['bapcNo'],
            'sample_description' => $post['sampleDescription'],
            'date_received'      => $post['dateReceived'],
            'date_testing'       => $post['dateTesting'],
            'age_grading'        => $post['ageGrading'],
            'remark'             => $post['remark'],
            'enable'             => $post['enable'],
            'updated_at'         => waktu_sekarang(),
            'updated_by'         => $this->session->userdata('id'),
        ];
        $this->db->where('id', $post['idDetail']);
        $this->db->update('sample_detail', $data);
    }

    public function delete($id)
    {
        // var_dump($id);
        // die;
        $this->db->where('id_sample', $id);
        $this->db->update('sample', ["deleted_at" => waktu_sekarang()]);
    }

    public function deleteDetail($id)
    {
        // var_dump($id);
        // die;
        $this->db->where('id', $id);
        $this->db->update('sample_detail', ["deleted_at" => waktu_sekarang()]);
    }
}
