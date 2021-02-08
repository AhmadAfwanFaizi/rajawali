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

    public function getSampleCode($id = null)
    {
        $this->db->select('sample_code')
            ->from('sample_detail SD');
        if ($id) {
            $this->db->where("SD.id", $id);
        }
        $this->db->where("SD.deleted_at", NULL);
        return $this->db->get();
    }

    public function getIso($category)
    {
        $this->db->select('*')
            ->from('sni_iso SI');
        if ($category) {
            $this->db->where("SI.category", $category);
        }
        // $this->db->where("SI.deleted_at", NULL);
        return $this->db->get();
    }
}
