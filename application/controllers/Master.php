<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Master extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        login();
        $this->load->model(['customer_m', 'brand_m', 'iso_m', 'term_of_service_m']);
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
        // $this->form_validation->set_rules('phoneNumber', 'Phone Number', 'required');
        // $this->form_validation->set_rules('address', 'Address', 'required');
        // $this->form_validation->set_rules('remark', 'Remark', 'required');
        // $this->form_validation->set_rules('contactPerson', 'Contact Person', 'required');
        // $this->form_validation->set_rules('email[]', 'Email', 'required');
        // $this->form_validation->set_rules('billTo', 'Bill To', 'required');
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
        // $this->form_validation->set_rules('phoneNumber', 'Phone Number', 'required');
        // $this->form_validation->set_rules('address', 'Address', 'required');
        // $this->form_validation->set_rules('remark', 'Remark', 'required');
        // $this->form_validation->set_rules('contactPerson', 'Contact Person', 'required');
        // $this->form_validation->set_rules('email[]', 'Email', 'required');
        // $this->form_validation->set_rules('billTo', 'Bill To', 'required');
        // $this->form_validation->set_rules('enable', 'Enable', 'required');
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
        // $this->form_validation->set_rules('remark', 'Remark', 'required');
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
        // $this->form_validation->set_rules('remark', 'Remark', 'required');
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

    public function iso()
    {
        $data = [
            "page" => "iso",
            "data" => $this->iso_m->getData()->result(),
        ];
        // var_dump($data);
        // die;
        $this->template->load('template/template', 'master/iso/data', $data);
    }

    public function addIso()
    {
        $this->form_validation->set_rules('iso', 'ISO', 'required');
        // $this->form_validation->set_rules('category', 'Category', 'required');
        // $this->form_validation->set_message('is_unique', '{field} Already Used');
        $this->form_validation->set_error_delimiters('<small class="text-danger pl-3">', '</small>');

        if ($this->form_validation->run() == false) {
            $data = [
                "page" => "add iso",
            ];

            $this->template->load('template/template', 'master/iso/add', $data);
        } else {
            $post = $this->input->post(null, true);
            // var_dump($post);
            // die;
            $this->iso_m->add($post);
            if ($this->db->affected_rows() > 0) {
                notif('S', 'Successfully added');
            }
            redirect('Master/addIso');
        }
    }

    public function editIso($id = null)
    {
        $this->form_validation->set_rules('iso', 'ISO', 'required');
        // $this->form_validation->set_rules('category', 'Category', 'required');
        // $this->form_validation->set_message('is_unique', '{field} Already Used');
        $this->form_validation->set_error_delimiters('<small class="text-danger pl-3">', '</small>');

        if ($this->form_validation->run() == false) {
            $data = [
                "page" => "edit iso",
                'data' => $this->iso_m->getData($id)->row(),
            ];
            // var_dump($data);
            // die;
            $this->template->load('template/template', 'master/iso/edit', $data);
        } else {
            $post = $this->input->post(null, true);
            // var_dump($post);
            // die;
            $this->iso_m->edit($post);
            if ($this->db->affected_rows() > 0) {
                notif('S', 'Successfully updated');
            }
            redirect('Master/iso');
        }
    }

    public function deleteIso($id)
    {
        $this->iso_m->delete($id);
        if ($this->db->affected_rows() > 0) {
            notif('S', 'Successfully deleted');
        }
        redirect('Master/iso');
    }

    public function termOfService()
    {
        $data = [
            "page" => "term of service",
            "data" => $this->term_of_service_m->getData()->result(),
        ];
        // var_dump($data);
        // die;
        $this->template->load('template/template', 'master/termOfService/head/data', $data);
    }

    public function addTermOfService()
    {
        $this->form_validation->set_rules('category', 'Category', 'required');
        $this->form_validation->set_error_delimiters('<small class="text-danger pl-3">', '</small>');

        if ($this->form_validation->run() == false) {
            $data = [
                "page" => "add term of service",
            ];
            $this->template->load('template/template', 'master/termOfService/head/add', $data);
        } else {
            $post = $this->input->post(null, true);
            // var_dump($post);
            // die;
            $this->term_of_service_m->add($post);
            if ($this->db->affected_rows() > 0) {
                notif('S', 'Successfully added');
            }
            redirect('Master/termOfService');
        }
    }

    public function editTermOfService($id = null)
    {
        $this->form_validation->set_rules('category', 'Category', 'required');
        $this->form_validation->set_error_delimiters('<small class="text-danger pl-3">', '</small>');

        if ($this->form_validation->run() == false) {
            $data = [
                "page" => "edit term of service",
                'data' => $this->term_of_service_m->getData($id)->row(),
            ];
            // var_dump($data);
            // die;
            $this->template->load('template/template', 'master/termOfService/head/edit', $data);
        } else {
            $post = $this->input->post(null, true);
            // var_dump($post);
            // die;
            $this->term_of_service_m->edit($post);
            if ($this->db->affected_rows() > 0) {
                notif('S', 'Successfully updated');
            }
            redirect('Master/termOfService');
        }
    }

    public function termOfServiceDetail()
    {
        $data = [
            "page" => "term of service detail",
            "data" => $this->term_of_service_m->getDataDetail(null, true)->result(),
        ];
        // var_dump($data);
        // die;
        $this->template->load('template/template', 'master/termOfService/detail/data', $data);
    }

    public function addTermOfServiceDetail()
    {
        $this->form_validation->set_rules('id_term_of_service', 'Term Of Service Category', 'required');
        $this->form_validation->set_error_delimiters('<small class="text-danger pl-3">', '</small>');

        if ($this->form_validation->run() == false) {
            $data = [
                "page"            => "add term of service",
                "term_of_service" => $this->term_of_service_m->getData(null, true)->result(),
            ];
            // var_dump($data);
            // die;
            $this->template->load('template/template', 'master/termOfService/detail/add', $data);
        } else {
            $post = $this->input->post(null, true);
            // var_dump($post);
            // die;
            $this->term_of_service_m->addDetail($post);
            if ($this->db->affected_rows() > 0) {
                notif('S', 'Successfully added');
            }
            redirect('Master/termOfServiceDetail');
        }
    }

    public function editTermOfServiceDetail($id = null)
    {
        $this->form_validation->set_rules('id_term_of_service', 'Term Of Service Category', 'required');
        $this->form_validation->set_error_delimiters('<small class="text-danger pl-3">', '</small>');

        if ($this->form_validation->run() == false) {
            $data = [
                "page"            => "edit term of service",
                'data'            => $this->term_of_service_m->getDataDetail($id)->row(),
                "term_of_service" => $this->term_of_service_m->getData(null, true)->result(),
            ];
            // var_dump($data);
            // die;
            $this->template->load('template/template', 'master/termOfService/detail/edit', $data);
        } else {
            $post = $this->input->post(null, true);
            // var_dump($post);
            // die;
            $this->term_of_service_m->editDetail($post);
            if ($this->db->affected_rows() > 0) {
                notif('S', 'Successfully updated');
            }
            redirect('Master/termOfServiceDetail');
        }
    }

    // END CLASS
}
