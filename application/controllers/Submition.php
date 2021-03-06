<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Submition extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        login();
        $this->load->model(['submition_m', 'customer_m', 'term_of_service_m']);
    }

    public function index()
    {
        $data = [
            "page" => "submition",
            'data' => $this->submition_m->getData()->result(),
            'role'   => $this->session->userdata('role'),
        ];
        // var_dump($data);
        // die;
        $this->template->load('template/template', 'submition/data', $data);
    }

    public function add()
    {
        $this->form_validation->set_rules('sampleCode', 'Sample Code', 'required');
        // $this->form_validation->set_message('is_unique', '{field} Already Used');
        $this->form_validation->set_error_delimiters('<small class="text-danger pl-3">', '</small>');

        if ($this->form_validation->run() == false) {
            $data = [
                "page"                   => "add submition",
                'sample_code'            => $this->submition_m->getSampleCode()->result(),
                'term_of_service'        => $this->submition_m->selectTermOfService()->result(),
                'include'                => $this->submition_m->getIso('include', true)->result(),
                'baby_wear'              => $this->submition_m->getIso('baby_wear', true)->result(),
                'bicycle'                => $this->submition_m->getIso('bicycle', true)->result(),
                'others'                 => $this->submition_m->getIso('others', true)->result(),
                'based'                  => $this->submition_m->getIso('based', true)->result(),
                'other'                  => $this->submition_m->getIso('other', true)->result(),
            ];
            // var_dump($data['term_of_service']);
            // die;
            $this->template->load('template/template', 'submition/add', $data);
        } else {
            $post = $this->input->post(null, true);
            // var_dump($post);
            // die;
            $this->submition_m->add($post);
            if ($this->db->affected_rows() > 0) {
                notif('S', 'Successfully added');
            }
            redirect('Submition');
        }
    }

    public function edit($idSubmition = null)
    {
        $this->form_validation->set_rules('sampleCode', 'Sample Code', 'required');
        // $this->form_validation->set_rules('termOfService', 'Term Of Service', 'required');
        // $this->form_validation->set_message('is_unique', '{field} Already Used');
        $this->form_validation->set_error_delimiters('<small class="text-danger pl-3">', '</small>');

        if ($this->form_validation->run() == false) {

            $getData   = $this->submition_m->getData($idSubmition)->row();
            $getDetail = $this->submition_m->getDetailData($getData->iso_submition)->result();
            // var_dump($getDetail);
            // die;

            $data = [
                "page"      => "edit submition",
                'data'      => $getData,
                'detail'    => $getDetail,
                'include'   => $this->submition_m->getIso('include')->result(),
                'baby_wear' => $this->submition_m->getIso('baby_wear')->result(),
                'bicycle'   => $this->submition_m->getIso('bicycle')->result(),
                'others'    => $this->submition_m->getIso('others')->result(),
                'based'     => $this->submition_m->getIso('based')->result(),
                'other'     => $this->submition_m->getIso('other')->result(),
            ];

            // var_dump($getData);
            // die;
            $this->template->load('template/template', 'submition/edit', $data);
        } else {
            $post = $this->input->post(null, true);
            // var_dump($post);
            // die;
            $this->submition_m->edit($post);
            if ($this->db->affected_rows() > 0) {
                notif('S', 'Successfully updated');
            }
            redirect('Submition');
        }
    }

    public function delete($id)
    {
        // var_dump($id);
        // die;
        $this->submition_m->delete($id);
        if ($this->db->affected_rows() > 0) {
            notif('S', 'Successfully deleted');
        }
        redirect('Submition');
    }

    public function print($id)
    {
        $getData                = $this->submition_m->getData($id)->row();
        $getDetail              = $this->submition_m->getDetailData($getData->iso_submition)->result();
        $getDataPrint           = $this->submition_m->getDataPrint($getData->sample_code)->row();
        $getEmail               = $this->customer_m->getDataDetail($getDataPrint->id_customer)->result();
        $getTermOfService       = $this->term_of_service_m->getData(null, null, true)->result();
        $getTermOfServiceDetail = $this->term_of_service_m->getDataDetail(null, null, true)->result();

        $data = [
            // 'sample_code' => $this->submition_m->getSampleCode()->result(),
            'data'                   => $getData,
            'detail'                 => $getDetail,
            'dataPrint'              => $getDataPrint,
            'email'                  => $getEmail,
            'term_of_service'        => $getTermOfService,
            'term_of_service_detail' => $getTermOfServiceDetail,
            'include'                => $this->submition_m->getIso('include')->result(),
            'baby_wear'              => $this->submition_m->getIso('baby_wear')->result(),
            'bicycle'                => $this->submition_m->getIso('bicycle')->result(),
            'others'                 => $this->submition_m->getIso('others')->result(),
            'based'                  => $this->submition_m->getIso('based')->result(),
            'other'                  => $this->submition_m->getIso('other')->result(),
        ];
        // var_dump($getTermOfService);
        // die;
        $this->load->view('submition/print', $data);
    }

    public function export()
    {
        $data = [
            'data' => $this->submition_m->getData()->result(),
        ];
        $this->load->view('submition/exportExcel', $data);
    }
}
