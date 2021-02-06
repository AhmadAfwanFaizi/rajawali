<?php

function login()
{
    $ci = &get_instance();

    if (!$ci->session->userdata('role')) {
        redirect('auth');
    }
}

function waktu_sekarang()
{
    return date('Y-m-d H:i:s');
}

function barcode($param)
{
    $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
    return $generator->getBarcode($param, $generator::TYPE_CODE_128);
}

function menu($param, $param2)
{
    $ci = &get_instance();
    if ($ci->uri->segment(1) == $param && $ci->uri->segment(2) == $param2) {
        return 'class="active"';
    } else {
        return null;
    }
}

function pdfGenerator($html, $fileName, $paper, $orientation)
{
    // reference the Dompdf namespace
    // use Dompdf\Dompdf;

    // instantiate and use the dompdf class
    $dompdf = new Dompdf\Dompdf();
    $dompdf->loadHtml($html);

    // (Optional) Setup the paper size and orientation
    $dompdf->setPaper($paper, $orientation);

    // Render the HTML as PDF
    $dompdf->render();

    // Output the generated PDF to Browser
    $dompdf->stream($fileName, ['Attachment' => 0]);
}

function notif($alert = null, $text = null)
{
    $ci = get_instance();

    switch ($alert) {
        case "D":
            $alert = "danger";
            break;
        case "I":
            $alert = "info";
            break;
        case "S":
            $alert = "success";
            break;
        case "W":
            $alert = "warning";
            break;
        default:
            $alert = "danger";
            break;
    }

    if ($alert) $text = $text;
    else $text = "Internal Server Error!";

    $data = [
        "alert" => $alert,
        "text"   => $text
    ];
    return $ci->session->set_flashdata($data);
}
