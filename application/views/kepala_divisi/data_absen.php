<section class="content">

  <div class="box">
    <div class="box-header">
      <form action="" method="post" id="formAbsen">
          <div class="form-row">
            <div class="form-group col-sm-4">
              <input type="date" class="form-control" name="tanggalMulai" id="tanggalMulai" required>
            </div>
            <div class="form-group col-sm-4">
              <input type="date" class="form-control" name="tanggalBerakhir" id="tanggalBerakhir" required>
            </div>
            <div class="form-group col-sm-4">
              <button type="button" class="btn btn-secondary pilihAbsen">Pilih</button>
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

<div class="modal fade" id="opsiModal" tabindex="-1" role="dialog" aria-labelledby="opsiModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="">
        <div class="modal-header">
          <h5 class="modal-title" id="opsiModalLabel">Opsi</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          <button type="button" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
$(document).ready(function(){

  tampilDataAbsen();
});

  function tampilDataAbsen()
  {
    $('.pilihAbsen').click(function(){

        var tanggalMulai    = $('#tanggalMulai').val();
        var tanggalBerakhir = $('#tanggalBerakhir').val();
        var idDivisi        = "<?= $idDivisi ?>";
        console.log(idDivisi);

        $('#tableDataAbsenKepalaDivisi').dataTable().fnDestroy();
        $('#tableDataAbsenKepalaDivisi').DataTable({
          "processing": true,
          "serverSide": true,
          "ajax": {
            "url" : "<?= base_url('kepala_divisi/getDataAbsen') ?>",
            "type": 'POST',
            "data": {
              'tanggalMulai'   : tanggalMulai,
              'tanggalBerakhir': tanggalBerakhir,
              'idDivisi'       : idDivisi,
            },
          },
          "columnDefs" : [{
            "targets"  : [0],
            "orderable": false
          }],
        });

        });
  }

</script>
