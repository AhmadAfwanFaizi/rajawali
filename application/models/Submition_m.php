<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Submition_m extends CI_model
{
    public function getData($id = null, $startDate = null, $endDate = null)
    {
        $this->db->select('S.*, S.id as id_submition, customer_name, brand,
        S.created_at as created_at_submition,
        S.updated_at as updated_at_submition,
        U.username as created_by_submition, 
        U2.username as updated_by_submition')
            ->from('submition S')
            // ->join('term_of_service_detail TOSD', 'TOSD.id = S.id_term_of_service_detail')
            // ->join('term_of_service TOS', 'TOS.id = TOSD.id_term_of_service')
            ->join('sample_detail SD', 'SD.sample_code = S.sample_code')
            ->join('sample', 'sample.id_sample = SD.id_sample')
            ->join('customer C', 'C.id_customer = sample.id_customer')
            ->join('brand B', 'B.id = sample.id_brand')
            ->join('user U', 'U.id = S.created_by')
            ->join('user U2', 'U2.id = S.updated_by', 'left');
        if ($id) {
            $this->db->where("S.id", $id);
        }

        if ($startDate && $endDate) {
            $this->db->where("DATE(S.created_at) BETWEEN '$startDate' AND '$endDate'");
        }
        $this->db->where("S.deleted_at", NULL);
        $this->db->where("sample.deleted_at", NULL);
        return $this->db->get();
    }

    public function getDetailData($isoSub = null)
    {
        $this->db->select('*')
            ->from('submition_detail SD');
        if ($isoSub) {
            $this->db->where("SD.iso_submition", $isoSub);
        }
        $this->db->where("SD.deleted_at", NULL);
        return $this->db->get();
    }

    public function getSubmitionTos($idSubmitionTos = null)
    {
        $this->db->select('TOSD.id, TOS.category')
            ->from('submition_tos ST')
            ->join('term_of_service_detail TOSD', 'TOSD.id = ST.id_term_of_service_detail')
            ->join('term_of_service TOS', 'TOS.id = TOSD.id_term_of_service');
        if ($idSubmitionTos) {
            $this->db->where("ST.id_submition_tos", $idSubmitionTos);
        }
        $this->db->where("ST.deleted_at", NULL);
        return $this->db->get();
    }

    public function getSampleCode($id = null)
    {
        $this->db->select('sample_code')
            ->from('sample_detail SD');
        if ($id) {
            $this->db->where("SD.id", $id);
        }
        $this->db->where("SD.deleted_at", NULL);
        $this->db->where("SD.status_sample", "PENDING");
        return $this->db->get();
    }

    public function selectTermOfService($id = null)
    {
        $this->db->select('*')
            ->from('term_of_service TOS')
            ->join('term_of_service_detail TOSD', 'TOSD.id_term_of_service = TOS.id');
        if ($id) {
            $this->db->where("TOS.id", $id);
        }
        $this->db->order_by('TOSD.id_term_of_service', 'ASC');
        return $this->db->get();
    }

    public function getDataPrint($sampleCode = null)
    {
        $this->db->select('*')
            ->from('sample_detail SD')
            ->join('sample S', 'S.id_sample = SD.id_sample')
            ->join('customer C', 'C.id_customer = S.id_customer')
            ->join('brand B', 'B.id = S.id_brand');
        if ($sampleCode) {
            $this->db->where("SD.sample_code", $sampleCode);
        }
        return $this->db->get();
    }

    public function getIso($category = null, $enable = null)
    {
        $this->db->select('*')
            ->from('iso I');
        if ($category) {
            $this->db->where("I.category", $category);
        }

        if ($enable) {
            $this->db->where("I.enable", 'Y');
        }
        $this->db->where("I.deleted_at", NULL);

        return $this->db->get();
    }

    public function add($post)
    {
        $this->db->where('sample_code', $post['sampleCode'])
            ->update('sample_detail', ['status_sample' => 'PROGRESS']);

        $iso_sub        = 'ISO' . uniqid();
        $idSubmitionTos = 'STOS' . uniqid();
        $data           = [
            'sample_code'               => $post['sampleCode'],
            'id_submition_tos'          => $idSubmitionTos,
            'item_no'                   => $post['ItemNo'],
            'iso_submition'             => $iso_sub,
            'sni_certification'         => $post['sniCertification'],
            'do_not_show_pass'          => $post['doNotShowPass'],
            'retain_sample'             => $post['retainSample'],
            'other_method'              => $post['otherMethod'],
            'family_product'            => $post['familyProduct'],
            'product_end_use'           => $post['productEndUse'],
            'age_group'                 => $post['ageGroup'],
            'country'                   => $post['country'],
            'lab_subcont'               => $post['labSubcont'],
            'created_at'                => waktu_sekarang(),
            'created_by'                => $this->session->userdata('id'),
        ];
        $this->db->insert('submition', $data);

        $idTermOfService = $post['idTermOfService'];
        for ($i = 0; $i < count($idTermOfService); $i++) {
            $subData = [
                'id_submition_tos'          => $idSubmitionTos,
                'id_term_of_service_detail' => $idTermOfService[$i],
                'created_at'                => waktu_sekarang(),
            ];
            $this->db->insert('submition_tos', $subData);
        }

        $iso = $post['iso'];
        for ($i = 0; $i < count($iso); $i++) {
            $subData = [
                'iso_submition' => $iso_sub,
                'id_sni_iso'    => $iso[$i],
                'created_at'    => waktu_sekarang(),
            ];
            $this->db->insert('submition_detail', $subData);
        }
    }

    public function edit($post)
    {
        if (isset($post['sniCertification'])) {
            $sniCertification = $post['sniCertification'];
        } else {
            $sniCertification = null;
        }
        if (isset($post['doNotShowPass'])) {
            $doNotShowPass = $post['doNotShowPass'];
        } else {
            $doNotShowPass = null;
        }
        if (isset($post['retainSample'])) {
            $retainSample = $post['retainSample'];
        } else {
            $retainSample = null;
        }

        // var_dump($post);
        // die;
        $data = [
            'item_no'                   => $post['ItemNo'],
            'sni_certification'         => $sniCertification,
            'do_not_show_pass'          => $doNotShowPass,
            'retain_sample'             => $retainSample,
            'other_method'              => $post['otherMethod'],
            'family_product'            => $post['familyProduct'],
            'product_end_use'           => $post['productEndUse'],
            'age_group'                 => $post['ageGroup'],
            'country'                   => $post['country'],
            'lab_subcont'               => $post['labSubcont'],
            'updated_at'                => waktu_sekarang(),
            'updated_by'                => $this->session->userdata('id'),
        ];
        $this->db->where('id', $post['idSubmition']);
        $this->db->update('submition', $data);

        // submition detail
        $isoLama        = $post['isoLama'];
        for ($i = 0; $i < count($isoLama); $i++) {

            $this->db->where('iso_submition', $post['isoSubmition']);
            $this->db->where('id_sni_iso', $post['isoLama'][$i]);
            $this->db->update('submition_detail', ['deleted_at' => waktu_sekarang()]);
        }
        $iso = $post['iso'];
        for ($i = 0; $i < count($iso); $i++) {
            $subData = [
                'iso_submition' => $post['isoSubmition'],
                'id_sni_iso'    => $iso[$i],
                'created_at'    => waktu_sekarang(),
            ];
            $this->db->insert('submition_detail', $subData);
        }

        // susbmition_tos
        $tosLama         = $post['tosLama'];
        $idSubmitionTos  = $post['idSubmitionTos'];
        $idTermOfService = $post['idTermOfService'];
        for ($i = 0; $i < count($tosLama); $i++) {

            $this->db->where('id_submition_tos', $idSubmitionTos);
            $this->db->where('id_term_of_service_detail', $tosLama[$i]);
            $this->db->update('submition_tos', ['deleted_at' => waktu_sekarang()]);
        }
        if ($idTermOfService) {
            for ($i = 0; $i < count($idTermOfService); $i++) {
                $subData = [
                    'id_submition_tos'          => $idSubmitionTos,
                    'id_term_of_service_detail' => $idTermOfService[$i],
                    'created_at'                => waktu_sekarang(),
                ];
                $this->db->insert('submition_tos', $subData);
            }
        }
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->update('submition', ["deleted_at" => waktu_sekarang()]);
    }
}
