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

    public function sampleCode()
    {
        $queryMaxCode = $this->db->select("MAX(sample_code) as max_code")
            ->from("sample_detail")->get()->row();
        $year = date('Y');
        // $year = '2022';
        $queryThisYear = $this->db->select("created_at")
            ->from("sample_detail")
            ->like('created_at', $year, 'after')
            ->get()->row();

        if (!$queryThisYear) {
            $maxCode = '0000';
        } else {
            $maxCode = $queryMaxCode->max_code;
        }

        $int = (int) substr($maxCode, -4);
        $int++;
        $date = date('m/y/');
        // $date = ('03/22/');

        $code =  'RTL-SMPL-' . $date . sprintf("%04s", $int);
        // echo $code;
        return $code;
    }

    public function index()
    {
        $this->head();
    }

    public function head()
    {
        $post = $this->input->post(null, true);
        // var_dump($post);
        $data      = [
            "page" => "sample",
            'role' => $this->session->userdata('role'),
            'brand' => $this->brand_m->getData()->result(),
        ];
        if ($post) {
            $data['start_date'] = $post['start_date'];
            $data['end_date']   = $post['end_date'];
            $data['keyword']    = $post['keyword'];
            $data['data']       = $this->sample_m->getData(null, $post['start_date'], $post['end_date'], null, $post['keyword'])->result();
        } else {
            $data['start_date'] = null;
            $data['end_date']   = null;
            $data['keyword']    = null;
            $data['data']       = $this->sample_m->getData()->result();
        }
        // var_dump($data); 
        // die;
        $this->template->load('template/template', 'sample/data', $data);
    }

    public function add()
    {
        $this->form_validation->set_rules('quotationNo', 'Quotation', 'required');
        // $this->form_validation->set_rules('idCustomer', 'Customer', 'required');
        // $this->form_validation->set_rules('idBrand', 'Brand', 'required');

        // $this->form_validation->set_message('is_unique', '{field} Already Used');
        $this->form_validation->set_error_delimiters('<small class="text-danger pl-3">', '</small>');

        if ($this->form_validation->run() == false) {
            $data = [
                "page"     => "add sample",
                'customer' => $this->customer_m->getData(null, true)->result(),
                'brand'    => $this->brand_m->getData(null, true)->result(),
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

    public function edit($idSample = null)
    {
        $this->form_validation->set_rules('quotationNo', 'Quotation', 'required');
        // $this->form_validation->set_rules('idCustomer', 'Customer', 'required');
        // $this->form_validation->set_rules('idBrand', 'Brand', 'required');

        // $this->form_validation->set_message('is_unique', '{field} Already Used');
        $this->form_validation->set_error_delimiters('<small class="text-danger pl-3">', '</small>');

        if ($this->form_validation->run() == false) {
            $data = [
                "page"     => "edit sample",
                'data'     => $this->sample_m->getData($idSample)->row(),
                'customer' => $this->customer_m->getData()->result(),
                'brand'    => $this->brand_m->getData()->result(),
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
            redirect('Sample/head');
        }
    }

    public function delete($idCustomer)
    {
        // var_dump($idCustomer);
        // die;
        $this->sample_m->delete($idCustomer);
        if ($this->db->affected_rows() > 0) {
            notif('S', 'Successfully Deleted');
        }
        redirect('Sample/head');
    }

    public function DataDetail()
    {
        $post = $this->input->post(null, true);
        $data      = [
            'page'   => 'sample detail',
            'role' => $this->session->userdata('role'),
        ];
        if ($post) {
            $data['start_date'] = $post['start_date'];
            $data['end_date']   = $post['end_date'];
            $data['keyword']    = $post['keyword'];
            $data['detail']     = $this->sample_m->getDetail(null, null, $post['start_date'], $post['end_date'], $post['keyword'])->result();
        } else {
            $data['start_date'] = null;
            $data['end_date']   = null;
            $data['keyword']    = null;
            $data['detail']     = $this->sample_m->getDetail()->result();
        }

        // var_dump($data);
        // die;
        $this->template->load('template/template', 'sample/dataDetail', $data);
        // echo "ok masuk";
    }

    public function addDetail($idSample = null)
    {
        $this->form_validation->set_rules('idSample', 'ID Sample', 'required');
        // $this->form_validation->set_rules('quantity', 'Quantity', 'required');
        // $this->form_validation->set_rules('bapcNo', 'BAPC', 'required');
        // $this->form_validation->set_rules('sampleCode', 'Sample Code', 'required');
        // $this->form_validation->set_rules('sampleDescription', 'Sample Description', 'required');
        // $this->form_validation->set_rules('dateTesting', 'Date Testing', 'required');
        // $this->form_validation->set_rules('dateReceived', 'Date Received', 'required');
        // $this->form_validation->set_rules('ageGrading', 'Age Grading', 'required');
        // $this->form_validation->set_message('is_unique', '{field} Already Used');
        $this->form_validation->set_error_delimiters('<small class="text-danger pl-3">', '</small>');

        if ($this->form_validation->run() == false) {
            $data = [
                "page"        => "add detail sample",
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

    public function editDetail($id = null)
    {
        $this->form_validation->set_rules('idSample', 'ID Sample', 'required');
        // $this->form_validation->set_rules('quantity', 'Quantity', 'required');
        // $this->form_validation->set_rules('bapcNo', 'BAPC', 'required');
        // $this->form_validation->set_rules('sampleCode', 'Sample Code', 'required');
        // $this->form_validation->set_rules('sampleDescription', 'Sample Description', 'required');
        // $this->form_validation->set_rules('dateTesting', 'Date Testing', 'required');
        // $this->form_validation->set_rules('dateReceived', 'Date Received', 'required');
        // $this->form_validation->set_rules('ageGrading', 'Age Grading', 'required');
        // $this->form_validation->set_message('is_unique', '{field} Already Used');
        $this->form_validation->set_error_delimiters('<small class="text-danger pl-3">', '</small>');

        if ($this->form_validation->run() == false) {

            $getDetail = $this->sample_m->getDetail(null, $id)->row();
            $getData   = $this->sample_m->getData($getDetail->id_sample)->row();
            $data      = [
                "page"     => "edit detail sample",
                'detail'   => $getDetail,
                'data'     => $getData,
                'customer' => $this->customer_m->getData()->result(),
                'brand'    => $this->brand_m->getData()->result(),
            ];
            // var_dump($data);
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
        // var_dump($id);
        // die;
        $this->load->view('sample/printDetail', $data);
    }

    public function deleteDetail($id)
    {
        // var_dump($id, $idSample);
        // die;
        $this->sample_m->deleteDetail($id);
        if ($this->db->affected_rows() > 0) {
            notif('S', 'Successfully Deleted');
        }
        redirect('Sample/dataDetail/');
    }

    public function export_head($startDate = null, $endDate = null)
    {
        if ($startDate && $endDate) {
            $data['data'] =  $this->sample_m->getData(null, $startDate, $endDate)->result();
        } else {
            $data['data'] =  $this->sample_m->getData()->result();
        }
        // var_dump($data);
        // die;
        $this->load->view('sample/exportExcelHead', $data);
    }

    public function export_detail($startDate = null, $endDate = null)
    {
        if ($startDate && $endDate) {
            $data['detail'] =  $this->sample_m->getDetail(null, null, $startDate, $endDate)->result();
        } else {
            $data['detail'] =  $this->sample_m->getDetail()->result();
        }
        // var_dump($data);
        // die;
        $this->load->view('sample/exportExcelDetail', $data);
    }
    // END CLASS
}
