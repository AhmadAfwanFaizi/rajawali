<section class="content">
  <div class="box">
    <div class="box-header">
      <!-- <h3 class="box-title">Data Table With Full Features</h3> -->
      <!-- <button class="btn btn-primary" data-toggle="modal" data-target="#tambahDivisiModal">Tambah</button> -->
      <!-- <button onclick="reloadTableAbsen()">reload</button> -->
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
        $('#tableDataAbsenKepalaDivisi').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                url : "<?php echo base_url('HRD/getDataAbsen') ?>",
                type: 'POST',
                data: {'id_divisi' : "<?=$idDivisi?>"},
            },
            "columnDefs" : [{
                "targets" : [0],
                "orderable" : false,
            }],
        });

  reloadTableAbsen()

});

 function reloadTableAbsen()
  {
    $('#tableDataAbsenKepalaDivisi').DataTable().ajax.reload();
  }

  function absenMasuk(id)
    {
      $.ajax({
        url    : "<?= base_url('kepala_divisi/koreksiAbsen') ?>",
        method : "POST",
        data   : {'id' : id, 'res' : 'MASUK'},
        success: function(res) {
          if(res == 'true') {
            reloadTableAbsen()
            modalAlert('success', 'Berhaisl!');
          }
        }
      });
    }

    function absenOpsi(id)
    {
      $('#opsiModal').modal('show');
    }

    function absenAlpa(id)
    {
      $.ajax({
        url    : "<?= base_url('kepala_divisi/koreksiAbsen') ?>",
        method : "POST",
        data   : {'id' : id, 'res' : 'ALPA'},
        success: function(res) {
          if(res == 'true') {
            reloadTableAbsen()
            modalAlert('success', 'Berhaisl!');
          }
        }
      });
    }

</script>
