<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sample extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        login();
        $this->load->model(['sample_m', 'customer_m', 'brand_m']);
    }

    public function index()
    {
        $getData   = $this->sample_m->getData()->result();
        $getDetail = $this->sample_m->getDetail()->result();
        $data      = [
            'data'   => $getData,
            // 'detail' => $getDetail
        ];
        $this->template->load('template/template', 'sample/data', $data);
        // echo "ok masuk";
    }

    public function sampleCode()
    {
        $query = $this->db->select("MAX(sample_code) as max_code")
            ->from("sample_detail")->get()->row();

        $int = (int) substr($query->max_code, -4);
        $int++;

        $date = date('m/y/');
        $code =  'RTL-SMPL-' . $date . sprintf("%04s", $int);
        return $code;
    }

    public function add()
    {
        $this->form_validation->set_rules('quotationNo', 'Quotation', 'required');
        $this->form_validation->set_rules('idCustomer', 'Customer', 'required');
        $this->form_validation->set_rules('idBrand', 'Brand', 'required');

        // $this->form_validation->set_message('is_unique', '{field} Already Used');
        $this->form_validation->set_error_delimiters('<small class="text-danger pl-3">', '</small>');

        if ($this->form_validation->run() == false) {
            $data = [
                // 'title' => 'Tambah data guru',
                'customer'    => $this->customer_m->getData()->result(),
                'brand'       => $this->brand_m->getData()->result(),
            ];
            // var_dump($data);
            // die;
            $this->template->load('template/template', 'sample/add', $data);
        } else {
            $post = $this->input->post(null, true);

            $post['idSample'] = 'SMPL-H-' . uniqid();
            // var_dump($post);
            // die;
            $this->sample_m->add($post);
            if ($this->db->affected_rows() > 0) {
                notif('S', 'Successfully added');
            }
            redirect('Sample/addDetail/' . $post['idSample']);
        }
    }

    public function addDetail($idSample = null)
    {
        $this->form_validation->set_rules('idSample', 'ID Sample', 'required');
        $this->form_validation->set_rules('quantity', 'Quantity', 'required');
        $this->form_validation->set_rules('bapcNo', 'BAPC', 'required');
        $this->form_validation->set_rules('sampleCode', 'Sample Code', 'required');
        $this->form_validation->set_rules('sampleDescription', 'Sample Description', 'required');
        $this->form_validation->set_rules('dateTesting', 'Date Testing', 'required');
        $this->form_validation->set_rules('dateReceived', 'Date Received', 'required');
        $this->form_validation->set_rules('ageGrading', 'Age Grading', 'required');
        // $this->form_validation->set_message('is_unique', '{field} Already Used');
        $this->form_validation->set_error_delimiters('<small class="text-danger pl-3">', '</small>');

        if ($this->form_validation->run() == false) {
            $data = [
                // 'title' => 'Tambah data guru',
                'customer'    => $this->customer_m->getData()->result(),
                'brand'       => $this->brand_m->getData()->result(),
                'sample_code' => $this->sampleCode(),
                'data'        => $this->sample_m->getData($idSample)->row(),
                'detail'      => $this->sample_m->getDetail($idSample)->result(),
            ];
            // var_dump($data['detail']);
            // die;
            $this->template->load('template/template', 'sample/addDetail', $data);
        } else {
            $post = $this->input->post(null, true);
            // var_dump($post);
            // die;
            $this->sample_m->addDetail($post);
            if ($this->db->affected_rows() > 0) {
                notif('S', 'Successfully added');
            }
            redirect('Sample/addDetail/' . $post['idSample']);
        }
    }

    public function edit($idSample = null)
    {
        $this->form_validation->set_rules('quotationNo', 'Quotation', 'required');
        $this->form_validation->set_rules('idCustomer', 'Customer', 'required');
        $this->form_validation->set_rules('idBrand', 'Brand', 'required');

        // $this->form_validation->set_message('is_unique', '{field} Already Used');
        $this->form_validation->set_error_delimiters('<small class="text-danger pl-3">', '</small>');

        if ($this->form_validation->run() == false) {
            $data = [
                'data' => $this->sample_m->getData($idSample)->row(),
                'customer'    => $this->customer_m->getData()->result(),
                'brand'       => $this->brand_m->getData()->result(),
            ];
            // var_dump($data);
            // die;
            $this->template->load('template/template', 'sample/edit', $data);
        } else {
            $post = $this->input->post(null, true);
            // var_dump($_POST);
            // die;
            $this->sample_m->edit($post);
            if ($this->db->affected_rows() > 0) {
                notif('S', 'Successfully updated');
            }
            redirect('Sample');
        }
    }

    public function editDetail($id = null)
    {
        $this->form_validation->set_rules('idSample', 'ID Sample', 'required');
        $this->form_validation->set_rules('quantity', 'Quantity', 'required');
        $this->form_validation->set_rules('bapcNo', 'BAPC', 'required');
        $this->form_validation->set_rules('sampleCode', 'Sample Code', 'required');
        $this->form_validation->set_rules('sampleDescription', 'Sample Description', 'required');
        $this->form_validation->set_rules('dateTesting', 'Date Testing', 'required');
        $this->form_validation->set_rules('dateReceived', 'Date Received', 'required');
        $this->form_validation->set_rules('ageGrading', 'Age Grading', 'required');
        // $this->form_validation->set_message('is_unique', '{field} Already Used');
        $this->form_validation->set_error_delimiters('<small class="text-danger pl-3">', '</small>');

        if ($this->form_validation->run() == false) {
            $data = [
                // 'title' => 'Tambah data guru',
                'detail' => $this->sample_m->getDetail(null, $id)->row(),
            ];
            // var_dump($data['detail']);
            // die;
            $this->template->load('template/template', 'sample/editDetail', $data);
        } else {
            $post = $this->input->post(null, true);
            // var_dump($post);
            // die;
            $this->sample_m->editDetail($post);
            if ($this->db->affected_rows() > 0) {
                notif('S', 'Successfully updated');
            }
            redirect('Sample/addDetail/' . $post['idSample']);
        }
    }

    public function printDetail($id)
    {
        $data = $this->sample_m->getDetail(null, $id)->row();
        // var_dump($data);
        // die;
        $this->load->view('sample/printDetail', $data);
    }

    public function delete($idCustomer)
    {
        $this->sample_m->delete($idCustomer);
        if ($this->db->affected_rows() > 0) {
            notif('S', 'Successfully Deleted');
        }
        redirect('Master/customer');
    }

    public function deleteDetail($id, $idSample)
    {
        $this->sample_m->deleteDetail($id);
        if ($this->db->affected_rows() > 0) {
            notif('S', 'Successfully Deleted');
        }
        redirect('Sample/addDetail/' . $idSample);
    }
}
