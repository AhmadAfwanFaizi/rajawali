<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak karty</title>
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
    <!-- data table css -->
    <?php if($this->uri->segment(1) == 'HRD' && $this->uri->segment(2) == 'absen') { ?>
        <link rel="stylesheet" href="<?= base_url('assets/bower_components/DataTables/datatables.min.css') ?>">
    <?php } else { ?>
        <link rel="stylesheet" href="<?=base_url('assets/')?>bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <?php } ?>
    <!-- Select2 -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>bower_components/select2/dist/css/select2.min.css">
    <!-- jquery dipindah -->
    <script src="<?= base_url('assets/') ?>bower_components/jquery/dist/jquery.min.js"></script>

</head>
<body>


    <section class="content" id="section-to-print">

    <div class="row">
    <div class="col-md-3" style="width: 315px">


        <!-- About Me Box -->
        <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-user"></i> Nama</h3>
            <p class="text-muted">
                <?= $data->nama ?>
            </p>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <strong><i class="fa fa-barcode margin-r-5"></i> Barcode</strong>

            <p class="text-muted">
                <div>
                    <?= $barcode; ?>
                </div>
            </p>

            <hr>

            <strong><i class="fa fa-cubes margin-r-5"></i> Divisi</strong>

            <p class="text-muted"><?= $data->nama_divisi ?></p>

            <!-- <hr> -->

            <!-- <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>

            <p>
            <span class="label label-danger">UI Design</span>
            <span class="label label-success">Coding</span>
            <span class="label label-info">Javascript</span>
            <span class="label label-warning">PHP</span>
            <span class="label label-primary">Node.js</span>
            </p>

            <hr>

            <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>

            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p> -->
        </div>
        <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>

    </div>
    <!-- /.row -->

    </section>


    

    <!-- jQuery 3 -->
    <script src="<?= base_url('assets/') ?>bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap 3.3.7 -->
    <script src="<?= base_url('assets/') ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- data tables -->
    <?php if($this->uri->segment(1) == 'HRD' && $this->uri->segment(2) == 'absen') { ?>
    <script src="<?= base_url('assets/') ?>bower_components/DataTables/datatables.min.js"></script>

    <?php } else { ?>
    <script src="<?= base_url('assets/') ?>bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url('assets/') ?>bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

    <?php } ?>

    <!-- SlimScroll -->
    <script src="<?= base_url('assets/') ?>bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="<?= base_url('assets/') ?>bower_components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('assets/') ?>dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <scr src="<?= base_url('assets/') ?>dist/js/demo.js"></script>
    <!-- Select2 -->
    <script src="<?= base_url('assets/') ?>bower_components/select2/dist/js/select2.full.min.js"></script>
</body>
</html>