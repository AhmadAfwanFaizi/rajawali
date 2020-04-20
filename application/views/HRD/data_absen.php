<section class="content">
  <div class="box">
    <div class="box-header">
      <form action="<?= base_url('HRD/dataAbsenBiasa') ?>" method="post" id="formAbsen">
        <div class="form-row">
          <div class="form-group col-sm-3">
            <input type="date" class="form-control" name="tanggalMulai" id="tanggalMulai" required>
          </div>
          <div class="form-group col-sm-3">
            <input type="date" class="form-control" name="tanggalBerakhir" id="tanggalBerakhir" required>
          </div>
          <div class="form-group col-sm-3">
            <select name="idDivisi" class="form-control" id="idDivisi" required>
              <option value="" hidden>Pilih Divisi</option>
              <?php foreach($divisi->result() as $d) { ?>
                <option value="<?= $d->id_divisi ?>"><?= $d->nama_divisi ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="form-group col-sm-3">
            <button type="submit" class="btn btn-secondary pilihAbsen">Pilih</button>
          </div>
        </div>
        
      </form>
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

  // $('.pilihAbsen').click(function(){

  //   var tanggalMulai   = $('#tanggalMulai').val();
  //   var tanggaBerakhir = $('#tanggaBerakhir').val();
  //   var idDivisi       = $('#idDivisi').val();
  //   // console.log(data);
    
  //   $('#tableDataAbsenKepalaDivisi').DataTable({
  //     "processing": true,
  //     "serverSide": true,
  //     "ajax": {
  //       "url" : "<?= base_url('HRD/getDataAbsen/') ?>",
  //       "type": 'POST',
  //       "data": {
  //         'tanggalMulai'   : tanggalMulai,
  //         'tanggalBerakhir': tanggalBerakhir,
  //         'idDivisi'       : idDivisi,
  //       },
  //     },
  //     "columnDefs" : [{
  //       "targets"  : [0],
  //       "orderable": false
  //     }],
  //     dom: 'Bfrtip',
  //     buttons: [
  //           {
  //             extend: 'print',
  //             messageTop: 'Print data absensi karyawan'
  //           }
  //       ]
  //   });  
  //   $('.buttons-print').addClass('btn btn-primary');

  // });

});
</script>
