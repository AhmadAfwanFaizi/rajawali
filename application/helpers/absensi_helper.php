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
        $ci = get_instance();
        if($ci->uri->segment(1) == $param && $ci->uri->segment(2) == $param2)
        {
            return 'class="active"';
        } else {
            return null;
        }
    }