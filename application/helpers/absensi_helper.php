<?php

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
        $ci =& get_instance();
        if($ci->uri->segment(1) == $param && $ci->uri->segment(2) == $param2)
        {
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