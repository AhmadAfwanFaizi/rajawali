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
                "page"        => "add submition",
                'sample_code' => $this->submition_m->getSampleCode()->result(),
                'include'     => $this->submition_m->getIso('include', true)->result(),
                'baby_wear'   => $this->submition_m->getIso('baby_wear', true)->result(),
                'bicycle'     => $this->submition_m->getIso('bicycle', true)->result(),
                'others'      => $this->submition_m->getIso('others', true)->result(),
                'based'       => $this->submition_m->getIso('based', true)->result(),
                'other'       => $this->submition_m->getIso('other', true)->result(),
            ];
            // var_dump($data['data']);
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
        // Load plugin PHPExcel nya
        include APPPATH . 'third_party/PHPExcel/PHPExcel.php';

        // Panggil class PHPExcel nya
        $excel = new PHPExcel();

        // Settingan awal fil excel
        $excel->getProperties()->setCreator('Rajawali')
            ->setLastModifiedBy('Rajawali')
            ->setTitle("Data Submission")
            ->setSubject("Submission")
            ->setDescription("Laporan Semua Data Submission")
            ->setKeywords("Data Submission");

        // Buat sebuah variabel untuk menampung pengaturan style dari header tabel
        $style_col = array(
            'font'      => array('bold' => true),   // Set font nya jadi bold
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,   // Set text jadi ditengah secara horizontal (center)
                'vertical'   => PHPExcel_Style_Alignment::VERTICAL_CENTER      // Set text jadi di tengah secara vertical (middle)
            ),
            'borders' => array(
                'top'    => array('style'  => PHPExcel_Style_Border::BORDER_THIN),   // Set border top dengan garis tipis
                'right'  => array('style'  => PHPExcel_Style_Border::BORDER_THIN),   // Set border right dengan garis tipis
                'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),   // Set border bottom dengan garis tipis
                'left'   => array('style'  => PHPExcel_Style_Border::BORDER_THIN)    // Set border left dengan garis tipis
            )
        );

        // Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
        $style_row = array(
            'alignment' => array(
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER  // Set text jadi di tengah secara vertical (middle)
            ),
            'borders' => array(
                'top'    => array('style'  => PHPExcel_Style_Border::BORDER_THIN),   // Set border top dengan garis tipis
                'right'  => array('style'  => PHPExcel_Style_Border::BORDER_THIN),   // Set border right dengan garis tipis
                'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),   // Set border bottom dengan garis tipis
                'left'   => array('style'  => PHPExcel_Style_Border::BORDER_THIN)    // Set border left dengan garis tipis
            )
        );

        $excel->setActiveSheetIndex(0)->setCellValue('A1', "DATA SUBMISSION"); // Set kolom A1 dengan tulisan "DATA SISWA"
        $excel->getActiveSheet()->mergeCells('A1:K1'); // Set Merge Cell pada kolom A1 sampai E1
        $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
        $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
        $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1

        // Buat header tabel nya pada baris ke 3
        $excel->setActiveSheetIndex(0)->setCellValue('A3', "NO"); // Set kolom A3 dengan tulisan "NO"
        $excel->setActiveSheetIndex(0)->setCellValue('B3', "Sample Code"); // Set kolom B3 dengan tulisan "NIS"
        $excel->setActiveSheetIndex(0)->setCellValue('C3', "Type"); // Set kolom C3 dengan tulisan "NAMA"
        $excel->setActiveSheetIndex(0)->setCellValue('D3', "Item No"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
        $excel->setActiveSheetIndex(0)->setCellValue('E3', "SNI Sertification"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
        $excel->setActiveSheetIndex(0)->setCellValue('F3', "Do Not Show Pass"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
        $excel->setActiveSheetIndex(0)->setCellValue('G3', "Retain Sample"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
        $excel->setActiveSheetIndex(0)->setCellValue('H3', "Other Method"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
        $excel->setActiveSheetIndex(0)->setCellValue('I3', "Family Product"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
        $excel->setActiveSheetIndex(0)->setCellValue('J3', "Product End Use"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
        $excel->setActiveSheetIndex(0)->setCellValue('K3', "Age Group"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
        $excel->setActiveSheetIndex(0)->setCellValue('L3', "Country"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
        $excel->setActiveSheetIndex(0)->setCellValue('M3', "Lab Subcount"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"

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
        $excel->getActiveSheet()->getStyle('L3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('M3')->applyFromArray($style_col);

        // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
        $submition = $this->submition_m->getData()->result();

        $no = 1; // Untuk penomoran tabel, di awal set dengan 1
        $numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
        foreach ($submition as $data) { // Lakukan looping pada variabel siswa
            $excel->setActiveSheetIndex(0)->setCellValue('A' . $numrow, $no);
            $excel->setActiveSheetIndex(0)->setCellValue('B' . $numrow, $data->sample_code);
            $excel->setActiveSheetIndex(0)->setCellValue('C' . $numrow, $data->type);
            $excel->setActiveSheetIndex(0)->setCellValue('D' . $numrow, $data->item_no);
            $excel->setActiveSheetIndex(0)->setCellValue('E' . $numrow, $data->sni_certification);
            $excel->setActiveSheetIndex(0)->setCellValue('F' . $numrow, $data->do_not_show_pass);
            $excel->setActiveSheetIndex(0)->setCellValue('G' . $numrow, $data->retain_sample);
            $excel->setActiveSheetIndex(0)->setCellValue('H' . $numrow, $data->other_method);
            $excel->setActiveSheetIndex(0)->setCellValue('I' . $numrow, $data->family_product);
            $excel->setActiveSheetIndex(0)->setCellValue('J' . $numrow, $data->product_end_use);
            $excel->setActiveSheetIndex(0)->setCellValue('K' . $numrow, $data->age_group);
            $excel->setActiveSheetIndex(0)->setCellValue('L' . $numrow, $data->country);
            $excel->setActiveSheetIndex(0)->setCellValue('M' . $numrow, $data->lab_subcont);

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
            $excel->getActiveSheet()->getStyle('L' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('M' . $numrow)->applyFromArray($style_row);

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
        $excel->getActiveSheet()->getColumnDimension('L')->setWidth(25); // Set width kolom C
        $excel->getActiveSheet()->getColumnDimension('M')->setWidth(25); // Set width kolom C

        // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
        $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);

        // Set orientasi kertas jadi LANDSCAPE
        $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

        // Set judul file excel nya
        $excel->getActiveSheet(0)->setTitle("Laporan Data Submition");
        $excel->setActiveSheetIndex(0);

        // Proses file excel
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="Data Submition.xlsx"'); // Set nama file excel nya
        header('Cache-Control: max-age=0');

        $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
        $write->save('php://output');
    }
}
