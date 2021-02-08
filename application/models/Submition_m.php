<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Submition_m extends CI_model
{
    public function getData($id = null)
    {
        $this->db->select('*')
            ->from('submition S');
        if ($id) {
            $this->db->where("S.id", $id);
        }
        $this->db->where("S.deleted_at", NULL);
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

    public function getIso($category)
    {
        $this->db->select('*')
            ->from('sni_iso SI');
        if ($category) {
            $this->db->where("SI.category", $category);
        }
        return $this->db->get();
    }

    public function add($post)
    {
        $this->db->where('sample_code', $post['sampleCode'])
            ->update('sample_detail', ['status_sample' => 'PROGRESS']);

        $iso_sub = 'ISO' . uniqid();
        $data = [
            'sample_code'        => $post['sampleCode'],
            'id_term_of_service' => $post['termOfService'],
            'item_no'            => $post['ItemNo'],
            'iso_submition'      => $iso_sub,
            'sni_certification'  => $post['sniCertification'],
            'do_not_show_pass'   => $post['doNotShowPass'],
            'retain_sample'      => $post['retainSample'],
            'other_method'       => $post['otherMethod'],
            'created_at'         => waktu_sekarang(),
        ];
        $this->db->insert('submition', $data);


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
            // 'sample_code'        => $post['sampleCode'],
            'id_term_of_service' => $post['termOfService'],
            'item_no'            => $post['ItemNo'],
            // 'iso_submition'      => $iso_sub,
            'sni_certification'  => $sniCertification,
            'do_not_show_pass'   => $doNotShowPass,
            'retain_sample'      => $retainSample,
            'other_method'       => $post['otherMethod'],
            'updated_at'         => waktu_sekarang(),
        ];
        $this->db->where('id', $post['idSubmition']);
        $this->db->update('submition', $data);

        $isoLama = $post['isoLama'];
        // var_dump(count($isoLama));
        // die;
        $sekarang = waktu_sekarang();
        for ($i = 0; $i < count($isoLama); $i++) {

            $this->db->where('iso_submition', $post['isoSubmition']);
            $this->db->where('id_sni_iso', $post['isoLama'][$i]);
            $this->db->update('submition_detail', ['deleted_at' => waktu_sekarang()]);
        }

        // var_dump($this->db->last_query());
        // die;


        $iso = $post['iso'];
        for ($i = 0; $i < count($iso); $i++) {
            $subData = [
                'iso_submition' => $post['isoSubmition'],
                'id_sni_iso'    => $iso[$i],
                'created_at'    => waktu_sekarang(),
            ];
            $this->db->insert('submition_detail', $subData);
        }
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->update('submition', ["deleted_at" => waktu_sekarang()]);
    }
}
