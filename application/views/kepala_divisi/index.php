<section class="content">

  <div class="box">
    <div class="box-header">
      <!-- <h3 class="box-title">Data Table With Full Features</h3> -->
      <!-- <button class="btn btn-primary" data-toggle="modal" data-target="#tambahDivisiModal">Tambah</button> -->
      <!-- <button onclick="reloadTableAbsen()">reload</button> -->
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table id="tableAbsenTempKepalaDivisi" class="table table-bordered table-striped table-hover">
        <thead>
        <tr>
          <th>#</th>
          <th>Nip</th>
          <th>Nama</th>
          <th>Tanggal</th>
          <th>Waktu</th>
          <th width="180px">Aksi</th>
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
      <form action="" method="post" id="formOpsiAbsen">
        <div class="modal-header">
          <h5 class="modal-title" id="opsiModalLabel">Opsi</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <input type="hidden" name="idAbsen" id="idAbsen">
        <div class="modal-body">
          <div class="form-group">
            <label for="">Status</label>
            <select class="form-control" name="status" id="status" required>
              <option value="" hidden>Pilih Status</option>
              <option value="IZIN">IZIN</option>
              <option value="ALPA" >ALPA</option>
            </select>
            <div class="err status_err"></div>
          </div>
          <div class="form-group">
            <label for="keterangan">Keterangan</label>
            <textarea class="form-control" name="keterangan" id="keterangan" cols="30" rows="10"></textarea>
            <div class="err keterangan_err"></div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          <button type="button" class="btn btn-primary" onclick="simpanOpsi()">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
$(document).ready(function(){
        $('#tableAbsenTempKepalaDivisi').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                url: "<?php echo base_url('kepala_divisi/getAbsen') ?>",
                type:'POST',
            },
            "columnDefs" : [{
                "targets" : [0, 5],
                "orderable" : false,
            }],
        });

  reloadTableAbsen()

});

 function reloadTableAbsen()
  {
    $('#tableAbsenTempKepalaDivisi').DataTable().ajax.reload();
  }

  function absenMasuk(id)
    {
      $.ajax({
        url    : "<?= base_url('kepala_divisi/koreksiAbsen') ?>",
        method : "POST",
        dataType: "JSON",
        data   : {'idAbsen' : id, 'status' : 'MASUK', 'keterangan': '-'},
        success: function(res) {
          if(res.res == 'true') {
            reloadTableAbsen()
            modalAlert('success', 'Berhaisl!');
          }
        }
      });
    }

    function simpanOpsi(id)
    {
      var data = $('#formOpsiAbsen').serialize();
      
      $.ajax({
        url    : "<?= base_url('kepala_divisi/koreksiAbsen') ?>",
        method : "POST",
        dataType: "JSON",
        data   : data,
        success: function(res) {
          
          if(res.res == 'true') {
            reloadTableAbsen();
            $('#opsiModal').modal('hide');
            modalAlert('success', 'Data berhaisl disimpan!');
          } else {
            if(res.status) {
              $('#status').addClass('err_border');
              $('.status_err').html(res.status);
            } else {
              $('#status').removeClass('err_border');
              $('.status_err').html('');
            }

            if(res.keterangan) {
              $('#keterangan').addClass('err_border');
              $('.keterangan_err').html(res.keterangan);
            } else {
              $('#keterangan').removeClass('err_border');
              $('.keterangan_err').html('');
            }
            
          }

        }
      });
    }

    function hapusAbsen(id)
    { 
      $.ajax({
        url    : "<?= base_url('kepala_divisi/hapusAbsen') ?>",
        method : "POST",
        dataType: "JSON",
        data   : {'id' : id},
        success: function(res) {
          if(res.res == 'true') {
            reloadTableAbsen();
            $('#opsiModal').modal('hide');
            modalAlert('success', 'Data berhasil dihapus!');
          }
        }
      });
    }

    function opsiModal(idAbsen)
    {
      $('#opsiModal').modal('show');
      $('#idAbsen').val(idAbsen);
    }

</script>
