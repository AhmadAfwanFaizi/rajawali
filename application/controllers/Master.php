<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Master extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        login();
        Admin();
        $this->load->model(['customer_m', 'brand_m', 'request_m']);
    }

    public function customer()
    {
        $data = [
            "page" => "customer",
            "data" => $this->customer_m->getData()->result(),
        ];
        $this->template->load('template/template', 'master/customer/data', $data);
    }

    public function addCustomer()
    {
        $this->form_validation->set_rules('customerName', 'Customer Name', 'required');
        $this->form_validation->set_rules('phoneNumber', 'Phone Number', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('remark', 'Remark', 'required');
        $this->form_validation->set_rules('contactPerson', 'Contact Person', 'required');
        $this->form_validation->set_rules('email[]', 'Email', 'required');
        $this->form_validation->set_rules('billTo', 'Bill To', 'required');
        $this->form_validation->set_rules('enable', 'Enable', 'required');
        // $this->form_validation->set_message('is_unique', '{field} Already Used');
        $this->form_validation->set_error_delimiters('<small class="text-danger pl-3">', '</small>');

        if ($this->form_validation->run() == false) {
            $data = [
                "page" => "add customer",
            ];
            $this->template->load('template/template', 'master/customer/add', $data);
        } else {
            $post = $this->input->post(null, true);
            // var_dump($post);
            // die;
            $this->customer_m->add($post);
            if ($this->db->affected_rows() > 0) {
                notif('S', 'Successfully added');
            }
            redirect('Master/addCustomer');
        }
    }

    public function editCustomer($idCustomer = null)
    {
        $this->form_validation->set_rules('customerName', 'Customer Name', 'required');
        $this->form_validation->set_rules('phoneNumber', 'Phone Number', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('remark', 'Remark', 'required');
        $this->form_validation->set_rules('contactPerson', 'Contact Person', 'required');
        // $this->form_validation->set_rules('email[]', 'Email', 'required');
        $this->form_validation->set_rules('billTo', 'Bill To', 'required');
        $this->form_validation->set_rules('enable', 'Enable', 'required');
        // $this->form_validation->set_message('is_unique', '{field} Already Used');
        $this->form_validation->set_error_delimiters('<small class="text-danger pl-3">', '</small>');

        // var_dump($_POST);
        // die;
        if ($this->form_validation->run() == false) {
            $data = [
                "page" => "edit customer",
                'data' => $this->customer_m->getData($idCustomer)->row(),
            ];
            $this->template->load('template/template', 'master/customer/edit', $data);
        } else {
            $post = $this->input->post(null, true);
            // var_dump($_POST);
            // die;
            $this->customer_m->edit($post);
            if ($this->db->affected_rows() > 0) {
                notif('S', 'Successfully updated');
            }
            redirect('Master/customer');
        }
    }
    public function deleteCustomer($idCustomer)
    {
        $this->customer_m->delete($idCustomer);
        if ($this->db->affected_rows() > 0) {
            notif('S', 'Successfully updated');
        }
        redirect('Master/customer');
    }

    public function brand()
    {
        $data = [
            "page" => "brand",
            "data" => $this->brand_m->getData()->result(),
        ];
        // var_dump($data);
        // die;
        $this->template->load('template/template', 'master/brand/data', $data);
    }

    public function addBrand()
    {
        $this->form_validation->set_rules('brand', 'Brand', 'required');
        $this->form_validation->set_rules('remark', 'Remark', 'required');
        $this->form_validation->set_rules('enable', 'Enable', 'required');
        // $this->form_validation->set_message('is_unique', '{field} Already Used');
        $this->form_validation->set_error_delimiters('<small class="text-danger pl-3">', '</small>');

        if ($this->form_validation->run() == false) {
            $data = [
                "page" => "add brand",
            ];
            $this->template->load('template/template', 'master/brand/add', $data);
        } else {
            $post = $this->input->post(null, true);
            // var_dump($post);
            // die;
            $this->brand_m->add($post);
            if ($this->db->affected_rows() > 0) {
                notif('S', 'Successfully added');
            }
            redirect('Master/addBrand');
        }
    }

    public function editBrand($id = null)
    {
        $this->form_validation->set_rules('brand', 'Brand', 'required');
        $this->form_validation->set_rules('remark', 'Remark', 'required');
        $this->form_validation->set_rules('enable', 'Enable', 'required');
        // $this->form_validation->set_message('is_unique', '{field} Already Used');
        $this->form_validation->set_error_delimiters('<small class="text-danger pl-3">', '</small>');

        if ($this->form_validation->run() == false) {
            $data = [
                "page" => "edit brand",
                'data' => $this->brand_m->getData($id)->row(),
            ];
            // var_dump($data);
            // die;
            $this->template->load('template/template', 'master/brand/edit', $data);
        } else {
            $post = $this->input->post(null, true);
            // var_dump($post);
            // die;
            $this->brand_m->edit($post);
            if ($this->db->affected_rows() > 0) {
                notif('S', 'Successfully updated');
            }
            redirect('Master/brand');
        }
    }

    public function deleteBrand($id)
    {
        $this->brand_m->delete($id);
        if ($this->db->affected_rows() > 0) {
            notif('S', 'Successfully deleted');
        }
        redirect('Master/brand');
    }

    public function Request()
    {
        $data = [
            "page" => "request",
            "data" => $this->request_m->getData()->result(),
        ];
        // var_dump($data);
        // die;
        $this->template->load('template/template', 'master/request/data', $data);
    }

    public function addRequest()
    {
        $this->form_validation->set_rules('item', 'Item', 'required');
        $this->form_validation->set_rules('category', 'Category', 'required');
        $this->form_validation->set_rules('remark', 'Remark', 'required');
        $this->form_validation->set_rules('enable', 'Enable', 'required');
        // $this->form_validation->set_message('is_unique', '{field} Already Used');
        $this->form_validation->set_error_delimiters('<small class="text-danger pl-3">', '</small>');

        if ($this->form_validation->run() == false) {
            $data = [
                "page" => "add request",
            ];

            $this->template->load('template/template', 'master/request/add', $data);
        } else {
            $post = $this->input->post(null, true);
            // var_dump($post);
            // die;
            $this->request_m->add($post);
            if ($this->db->affected_rows() > 0) {
                notif('S', 'Successfully added');
            }
            redirect('Master/addBrand');
        }
    }

    public function editRequest($id = null)
    {
        $this->form_validation->set_rules('item', 'Item', 'required');
        $this->form_validation->set_rules('category', 'Category', 'required');
        $this->form_validation->set_rules('remark', 'Remark', 'required');
        $this->form_validation->set_rules('enable', 'Enable', 'required');
        // $this->form_validation->set_message('is_unique', '{field} Already Used');
        $this->form_validation->set_error_delimiters('<small class="text-danger pl-3">', '</small>');

        if ($this->form_validation->run() == false) {
            $data = [
                "page" => "edit request",
                'data' => $this->request_m->getData($id)->row(),
            ];
            // var_dump($data);
            // die;
            $this->template->load('template/template', 'master/request/edit', $data);
        } else {
            $post = $this->input->post(null, true);
            // var_dump($post);
            // die;
            $this->request_m->edit($post);
            if ($this->db->affected_rows() > 0) {
                notif('S', 'Successfully updated');
            }
            redirect('Master/request');
        }
    }

    public function deleteRequest($id)
    {
        $this->request_m->delete($id);
        if ($this->db->affected_rows() > 0) {
            notif('S', 'Successfully deleted');
        }
        redirect('Master/request');
    }
}
