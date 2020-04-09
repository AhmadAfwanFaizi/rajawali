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