<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak kartu</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
        folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>dist/css/skins/_all-skins.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <style>
        .list {
            border-right: solid lightgrey 1px;
            border-left: solid lightgrey 1px;
            border-bottom: solid lightgray;
        }

        .kop {
            margin: 3%;
        }

        img {
            width: 150px;
            height: 150px;
            margin-left: 14px;
        }

        .data-diri {
            margin-left: 35px;
        }

        .barcode {
            margin: 5%;
        }
    </style>
</head>
<body>

<?php 

    $tanggalLahir = str_replace('-', '', $data->tanggal_lahir);
    $tanggal      = substr($tanggalLahir , 6, 2);
    $bulan        = substr($tanggalLahir , 4, 2);
    $tahun        = substr($tanggalLahir , 0, 4);
    $ttl          = $data->tempat_lahir.', '.$tanggal.'-'.$bulan.'-'.$tahun;

?>
<section class="content" id="section-to-print">
    <div class="row">
        <div class="col-md-12" style="width: 500px; height: 250px;">
            <div class="box box-primary list">

            <div class="kop">
                <h4><b>PT.makmur jaya</b></h4>
                <div class="garis"></div>
            </div>
            
            <div class="gambar">
                <table>
                    <tr>
                        <td>
                            <img src="assets/img/<?=$gambar?>" class="rounded float-left">
                        </td>
                        <td>
                            <div class="data-diri">
                                <?= $data->nip ?><br>
                                <b><?= $data->nama ?></b><br>
                                <?= ucwords($ttl) ?><br>
                                <?= $data->nama_divisi ?><br>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
                       

                <div class="barcode">
                    <?= $barcode ?>
                </div>

            </div>
        </div>
    </div>
</section>


    


    <script src="<?= base_url('assets/') ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?= base_url('assets/') ?>dist/js/adminlte.min.js"></script>

</body>
</html>