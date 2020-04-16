<section class="content">
  <div class="box">
    <div class="box-header">
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table id="tableDataAbsenKepalaDivisi" class="table table-bordered table-striped table-hover">
        <thead>
        <tr>
          <th>#</th>
          <th>Nip</th>
          <th>Nama</th>
          <th>Tanggal</th>
          <th>Waktu</th>
        </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
    </div>
  </div>
</section>

<script>
$(document).ready(function(){
  $('#tableDataAbsenKepalaDivisi').DataTable({
      "processing": true,
      "serverSide": true,
      "ajax": {
        "url": "<?= base_url('HRD/getDataAbsen') ?>",
        "type":'POST',
        // "data" : {'idDivisi' : "<?php //$idDivisi ?>"},
      },
      "columnDefs" : [{
        "targets"   : [0],
        "orderable": false
      }],
      dom: 'Bfrtip',
      buttons: [
            {
              extend: 'print',
              messageTop: 'Print data absensi karyawan'
            }
        ]
  });  
  $('.buttons-print').addClass('btn btn-primary')    ;
});
</script>
