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
        $this->head();
    }

    public function head()
    {
        $getData   = $this->sample_m->getData()->result();
        $data      = [
            "page" => "sample",
            'data' => $getData,
            'role' => $this->session->userdata('role'),
        ];
        // var_dump($data);
        // die;
        $this->template->load('template/template', 'sample/data', $data);
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

    public function DataDetail()
    {
        $getDetail = $this->sample_m->getDetail()->result();
        $data      = [
            'page'   => 'sample detail',
            'detail' => $getDetail,
            'role'   => $this->session->userdata('role'),
        ];
        // var_dump($data);
        // die;
        $this->template->load('template/template', 'sample/dataDetail', $data);
        // echo "ok masuk";
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

    public function edit($idSample = null)
    {
        $this->form_validation->set_rules('quotationNo', 'Quotation', 'required');
        $this->form_validation->set_rules('idCustomer', 'Customer', 'required');
        $this->form_validation->set_rules('idBrand', 'Brand', 'required');

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
                "page"   => "edit detail sample",
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
        // var_dump($id);
        // die;
        $this->load->view('sample/printDetail', $data);
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

    public function export_head()
    {
        // Load plugin PHPExcel nya
        include APPPATH . 'third_party/PHPExcel/PHPExcel.php';

        // Panggil class PHPExcel nya
        $excel = new PHPExcel();

        // Settingan awal fil excel
        $excel->getProperties()->setCreator('Rajawali')
            ->setLastModifiedBy('Rajawali')
            ->setTitle("Data Sample Head")
            ->setSubject("Sample Head")
            ->setDescription("Laporan Semua Data Sample Head")
            ->setKeywords("Data Sample Head");

        // Buat sebuah variabel untuk menampung pengaturan style dari header tabel
        $style_col = array(
            'font' => array('bold' => true), // Set font nya jadi bold
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
            ),
            'borders' => array(
                'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
                'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
                'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
                'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
            )
        );

        // Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
        $style_row = array(
            'alignment' => array(
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
            ),
            'borders' => array(
                'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
                'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
                'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
                'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
            )
        );

        $excel->setActiveSheetIndex(0)->setCellValue('A1', "DATA SAMPLE HEAD"); // Set kolom A1 dengan tulisan "DATA SISWA"
        $excel->getActiveSheet()->mergeCells('A1:E1'); // Set Merge Cell pada kolom A1 sampai E1
        $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
        $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
        $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1

        // Buat header tabel nya pada baris ke 3
        $excel->setActiveSheetIndex(0)->setCellValue('A3', "NO"); // Set kolom A3 dengan tulisan "NO"
        $excel->setActiveSheetIndex(0)->setCellValue('B3', "Quotation No"); // Set kolom B3 dengan tulisan "NIS"
        $excel->setActiveSheetIndex(0)->setCellValue('C3', "Customer"); // Set kolom C3 dengan tulisan "NAMA"
        $excel->setActiveSheetIndex(0)->setCellValue('D3', "Brand"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"

        // Apply style header yang telah kita buat tadi ke masing-masing kolom header
        $excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);

        // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
        $sample_head = $this->sample_m->getData()->result();

        $no = 1; // Untuk penomoran tabel, di awal set dengan 1
        $numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
        foreach ($sample_head as $data) { // Lakukan looping pada variabel siswa
            $excel->setActiveSheetIndex(0)->setCellValue('A' . $numrow, $no);
            $excel->setActiveSheetIndex(0)->setCellValue('B' . $numrow, $data->quotation_no);
            $excel->setActiveSheetIndex(0)->setCellValue('C' . $numrow, $data->customer_name);
            $excel->setActiveSheetIndex(0)->setCellValue('D' . $numrow, $data->brand);

            // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
            $excel->getActiveSheet()->getStyle('A' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('B' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('C' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('D' . $numrow)->applyFromArray($style_row);

            $no++; // Tambah 1 setiap kali looping
            $numrow++; // Tambah 1 setiap kali looping
        }

        // Set width kolom
        $excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
        $excel->getActiveSheet()->getColumnDimension('B')->setWidth(15); // Set width kolom B
        $excel->getActiveSheet()->getColumnDimension('C')->setWidth(25); // Set width kolom C
        $excel->getActiveSheet()->getColumnDimension('D')->setWidth(20); // Set width kolom D

        // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
        $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);

        // Set orientasi kertas jadi LANDSCAPE
        $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

        // Set judul file excel nya
        $excel->getActiveSheet(0)->setTitle("Laporan Data Sample Head");
        $excel->setActiveSheetIndex(0);

        // Proses file excel
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="Data Sample Head.xlsx"'); // Set nama file excel nya
        header('Cache-Control: max-age=0');

        $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
        $write->save('php://output');
    }

    public function export_detail()
    {
        // Load plugin PHPExcel nya
        include APPPATH . 'third_party/PHPExcel/PHPExcel.php';

        // Panggil class PHPExcel nya
        $excel = new PHPExcel();

        // Settingan awal fil excel
        $excel->getProperties()->setCreator('Rajawali')
            ->setLastModifiedBy('Rajawali')
            ->setTitle("Data Sample Detail")
            ->setSubject("Sample Detail")
            ->setDescription("Laporan Semua Data Sample Detail")
            ->setKeywords("Data Sample Detail");

        // Buat sebuah variabel untuk menampung pengaturan style dari header tabel
        $style_col = array(
            'font' => array('bold' => true), // Set font nya jadi bold
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
            ),
            'borders' => array(
                'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
                'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
                'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
                'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
            )
        );

        // Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
        $style_row = array(
            'alignment' => array(
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
            ),
            'borders' => array(
                'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
                'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
                'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
                'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
            )
        );

        $excel->setActiveSheetIndex(0)->setCellValue('A1', "DATA SAMPLE DETAIL"); // Set kolom A1 dengan tulisan "DATA SISWA"
        $excel->getActiveSheet()->mergeCells('A1:K1'); // Set Merge Cell pada kolom A1 sampai E1
        $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
        $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
        $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1

        // Buat header tabel nya pada baris ke 3
        $excel->setActiveSheetIndex(0)->setCellValue('A3', "NO"); // Set kolom A3 dengan tulisan "NO"
        $excel->setActiveSheetIndex(0)->setCellValue('B3', "Quotation No"); // Set kolom B3 dengan tulisan "NIS"
        $excel->setActiveSheetIndex(0)->setCellValue('C3', "Customer"); // Set kolom C3 dengan tulisan "NAMA"
        $excel->setActiveSheetIndex(0)->setCellValue('D3', "Brand"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
        $excel->setActiveSheetIndex(0)->setCellValue('E3', "Sampel Code"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
        $excel->setActiveSheetIndex(0)->setCellValue('F3', "Sampel Description"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
        $excel->setActiveSheetIndex(0)->setCellValue('G3', "Quantity"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
        $excel->setActiveSheetIndex(0)->setCellValue('H3', "Bapc No"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
        $excel->setActiveSheetIndex(0)->setCellValue('I3', "Date Received"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
        $excel->setActiveSheetIndex(0)->setCellValue('J3', "Date Testing"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
        $excel->setActiveSheetIndex(0)->setCellValue('K3', "Age Grading"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"

        // Apply style header yang telah kita buat tadi ke masing-masing kolom header
        $excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('F3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('G3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('H3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('I3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('J3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('K3')->applyFromArray($style_col);

        // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
        $sample_detail = $this->sample_m->getDetail()->result();

        $no = 1; // Untuk penomoran tabel, di awal set dengan 1
        $numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
        foreach ($sample_detail as $data) { // Lakukan looping pada variabel siswa
            $excel->setActiveSheetIndex(0)->setCellValue('A' . $numrow, $no);
            $excel->setActiveSheetIndex(0)->setCellValue('B' . $numrow, $data->quotation_no);
            $excel->setActiveSheetIndex(0)->setCellValue('C' . $numrow, $data->customer_name);
            $excel->setActiveSheetIndex(0)->setCellValue('D' . $numrow, $data->brand);
            $excel->setActiveSheetIndex(0)->setCellValue('E' . $numrow, $data->sample_code);
            $excel->setActiveSheetIndex(0)->setCellValue('F' . $numrow, $data->sample_description);
            $excel->setActiveSheetIndex(0)->setCellValue('G' . $numrow, $data->quantity);
            $excel->setActiveSheetIndex(0)->setCellValue('H' . $numrow, $data->bapc_no);
            $excel->setActiveSheetIndex(0)->setCellValue('I' . $numrow, $data->date_received);
            $excel->setActiveSheetIndex(0)->setCellValue('J' . $numrow, $data->date_testing);
            $excel->setActiveSheetIndex(0)->setCellValue('K' . $numrow, $data->age_grading);

            // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
            $excel->getActiveSheet()->getStyle('A' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('B' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('C' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('D' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('E' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('F' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('G' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('H' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('I' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('J' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('K' . $numrow)->applyFromArray($style_row);

            $no++; // Tambah 1 setiap kali looping
            $numrow++; // Tambah 1 setiap kali looping
        }

        // Set width kolom
        $excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
        $excel->getActiveSheet()->getColumnDimension('B')->setWidth(25); // Set width kolom B
        $excel->getActiveSheet()->getColumnDimension('C')->setWidth(25); // Set width kolom C
        $excel->getActiveSheet()->getColumnDimension('D')->setWidth(25); // Set width kolom D
        $excel->getActiveSheet()->getColumnDimension('E')->setWidth(25); // Set width kolom A
        $excel->getActiveSheet()->getColumnDimension('F')->setWidth(25); // Set width kolom B
        $excel->getActiveSheet()->getColumnDimension('G')->setWidth(25); // Set width kolom C
        $excel->getActiveSheet()->getColumnDimension('H')->setWidth(25); // Set width kolom D
        $excel->getActiveSheet()->getColumnDimension('I')->setWidth(25); // Set width kolom A
        $excel->getActiveSheet()->getColumnDimension('J')->setWidth(25); // Set width kolom B
        $excel->getActiveSheet()->getColumnDimension('K')->setWidth(25); // Set width kolom C

        // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
        $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);

        // Set orientasi kertas jadi LANDSCAPE
        $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

        // Set judul file excel nya
        $excel->getActiveSheet(0)->setTitle("Laporan Data Sample Detail");
        $excel->setActiveSheetIndex(0);

        // Proses file excel
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="Data Sample Detail.xlsx"'); // Set nama file excel nya
        header('Cache-Control: max-age=0');

        $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
        $write->save('php://output');
    }
}
