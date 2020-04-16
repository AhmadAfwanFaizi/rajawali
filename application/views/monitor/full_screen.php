<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>.</title>
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
  <!-- <link rel="stylesheet" href="<?= base_url('assets/bower_components/DataTables/datatables.min.css') ?>"> -->
  <link rel="stylesheet" href="<?=base_url('assets/')?>bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?= base_url('assets/') ?>bower_components/select2/dist/css/select2.min.css">
<!-- jquery dipindah -->
  <script src="<?= base_url('assets/') ?>bower_components/jquery/dist/jquery.min.js"></script>

  <style>
    .err {
      color: red;
    }
    .err_border {
      border-color: red;
    }
    .h-in {
      height: 90px;
    }
  </style>
</head>
<body class="hold-transition skin-blue sidebar-mini">

<section class="content">

    <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Barcode scann</h3>

                    <div class="box-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                        </div>
                    </div>
                    <div class="box-body table-responsive no-padding">
                        <input type="text" class="form-control" id="inputScann" autofocus>
                    </div>
                </div>
            </div>
        </div>
    </div>
 
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data absen karyawan masuk</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover dataMonitorAbsen">
                <thead>
                    <tr>
                        <th>NIP</th>
                        <th>Nama</th>
                        <th>Waktu</th>
                    </tr>
              </thead>
              <tbody></tbody>
            </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>

<script>
    $(document).ready(function(){

      loadDataAbsenTemp();

        $('#inputScann').keyup(function(){
            var nip = $('#inputScann').val();

            $.ajax({
            url    : "<?= base_url('monitor/getDataKaryawan') ?>",
            type   : "POST",
            data   : {'nip' : nip},
            success: function(res) {

                if(res != 'false') {

                    $.ajax({
                        url     : "<?= base_url('monitor/inputAbsen') ?>",
                        type    : "POST",
                        data    : {'nip' : nip},
                        dataType:  "JSON",
                        success : function(response) {
                          console.log(response);
                            if(response.res == 'ada') {
                              modalAlert('warning', "Data sudah ada");
                            } else if(response.res == 'true') {
                              loadDataAbsenTemp();
                              modalAlert('success', "<h1>Selamat datang <b>"+response.data.nama+"<b></h1>");
                            } else {
                              modalAlert('danger', "Data gagal di input");
                            }
                            $('#inputScann').val('');
                            setTimeout(function(){
                              $('#inputScann').focus();
                            }, 2000);
                            
                        }
                    });

                } 
                // else {
                //   modalAlert('danger', "Kode tidak terdaftar");
                // }
            }
            });
    
        });



    });

    function loadDataAbsenTemp()
    {
      $.ajax({
        url    : "<?= base_url('monitor/getDataAbsenTemp') ?>",
        method   : "POST",
        dataType: "JSON",
        success: function(res) {
          var html = '';
          var i;
          for(i = 0; i < res.length; i++) {
            html += '<tr>'+
              '<td>'+res[i].nip+'</td>'+
              '<td>'+res[i].nama+'</td>'+
              '<td>'+res[i].waktu+'</td>'+
            '</tr>';
          }
          $('.dataMonitorAbsen > tbody').html(html);
        }
      });

    }

    
</script>


<!-- jQuery 3 -->
<script src="<?= base_url('assets/') ?>bower_components/jquery/dist/jquery.min.js"></script>

<!-- Bootstrap 3.3.7 -->
<script src="<?= base_url('assets/') ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- data tables -->
<!-- <script src="<?= base_url('assets/') ?>bower_components/datatables.net/js/jquery.dataTables.min.js"></script> -->
<!-- <script src="<?= base_url('assets/') ?>bower_components/DataTables/datatables.min.js"></script> -->

<script src="<?= base_url('assets/') ?>bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/') ?>bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

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
<script>
  $(document).ready(function () {
    $('.sidebar-menu').tree();
    $('#tableDivisi').dataTable();
    
  });

// SUB MENU HRD
  $('#subMenuKaryawan').mouseenter(function(){
    $.ajax({
      url    : "<?= base_url('HRD/getSubmenu') ?>",
      method : "POST",
      dataType: "JSON",
      success: function(res) {
        var html = '';
        var i;
        for(i=0; i<res.length; i++){
            html += '<li><a href="<?= base_url() ?>HRD/karyawan/'+res[i].id_divisi+'"><i class="fa fa-circle-o"></i>'+res[i].nama_divisi+'</a></li>';
        }
        $('.listSubMenuKaryawan').html(html);
      }
    });
  });

  $('#subMenuAbsen').mouseenter(function(){
    $.ajax({
      url    : "<?= base_url('HRD/getSubmenu') ?>",
      method : "POST",
      dataType: "JSON",
      success: function(res) {
        console.log(res.length);
        var html = '';
        var i;
        for(i=0; i< res.length; i++){
            html += '<li><a href="<?= base_url() ?>HRD/absen/'+res[i].id_divisi+'"><i class="fa fa-circle-o"></i>'+res[i].nama_divisi+'</a></li>';
        }
        $('.listSubMenuAbsen').html(html);
      }
    });
  });

  function modalAlert(res, content)
  {
    $('#warnaAlert').attr('class', '');
    $('#iconAlert').attr('class', '');
    $('#judulAlert').text('');
    $('#isiAlert').html('');

    var warnaAlert, iconAlert, judulAlert, isiAlert;
    if(res == "success") {
      warnaAlert = "alert alert-dismissible alert-success";
      iconAlert  = " icon fa fa-check";
      judulAlert = "BERHASIL";
      isiAlert   = content;
    } else if(res == "danger") {
      warnaAlert = "alert alert-dismissible alert-danger";
      iconAlert  = " icon fa fa-ban";
      judulAlert = "PERHATIAN";
      isiAlert   = content;
    } else if(res == "warning") {
      warnaAlert = "alert alert-dismissible alert-warning";
      iconAlert  = " icon fa fa-warning";
      judulAlert = "PERHATIAN";
      isiAlert   = content;
    } else if(res == "info") {
      warnaAlert = "alert alert-dismissible alert-info";
      iconAlert  = " icon fa fa-info";
      judulAlert = "PEMBERITAHUAN";
      isiAlert   = content;
    } else {
      warnaAlert = "alert alert-dismissible alert-danger";
      iconAlert  = " icon fa fa-ban";
      judulAlert = "PERHATIAN";
      isiAlert   = " PERHATIKAN PARAMETER SCRIPT";
    }

      $('#warnaAlert').addClass(warnaAlert);
      $('#iconAlert').addClass(iconAlert);
      $('#judulAlert').text(judulAlert);
      $('#isiAlert').html(isiAlert);

      $('.alertModal').modal('show');
      setTimeout(function(){
        $('.alertModal').modal('hide');
      }, 2000)
  }
</script>
</body>
</html>
