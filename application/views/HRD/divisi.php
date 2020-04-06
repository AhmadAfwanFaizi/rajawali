<section class="content">

  <div class="box">
    <div class="box-header">
      <!-- <h3 class="box-title">Data Table With Full Features</h3> -->
      <button class="btn btn-primary" data-toggle="modal" data-target="#tambahDivisiModal">Tambah</button>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table id="tableDivisi" class="table table-bordered table-striped table-hover">
        <thead>
        <tr>
          <th>#</th>
          <th>Nama Divisi</th>
          <th width="130px">Aksi</th>
        </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
    </div>
  </div>

</section>

<!-- MODAL TAMBAH -->
<div class="modal fade" id="tambahDivisiModal" tabindex="-1" role="dialog" aria-labelledby="tambahDivisiModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="" method="post" class="formTambahDivisi">
        <div class="modal-header">
          <h5 class="modal-title" id="tambahDivisiModalLabel">Tambah Divisi</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          
        <div class="form-group">
          <label for="namaDivisi">Nama Divisi</label>
          <input type="text" class="form-control" id="namaDivisi" name="namaDivisi">
          <p class="err namaDivisi_err"></p>
        </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          <button type="button" class="btn btn-primary tambahDivisi">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- MODAL UBAH -->
<div class="modal fade" id="ubahDivisiModal" tabindex="-1" role="dialog" aria-labelledby="ubahDivisiModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="" method="post" class="formUbahDivisi">
        <div class="modal-header">
          <h5 class="modal-title" id="ubahDivisiModalLabel">Ubah Divisi</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          
        <div class="form-group">
          <input type="hidden" name="ubahIdDivisi" id="ubahIdDivisi">
          <label for="ubahNamaDivisi">Nama Divisi</label>
          <input type="text" class="form-control" id="ubahNamaDivisi" name="ubahNamaDivisi">
          <p class="err ubahNamaDivisi_err"></p>
        </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          <button type="button" class="btn btn-primary tombolUbahDivisi">Ubah</button>
        </div>
      </form>
    </div>
  </div>
</div>


<!-- ODAL HAPUS -->
<div class="modal fade hapusModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Perhatian!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Apakah anda yakin ingin menghapus?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-danger hapusDivisi">Hapus</button>
      </div>
    </div>
  </div>
</div>


<script>
  $(document).ready(function () {

    $('#tableDivisi').DataTable({
      "processing": true,
      "serverSide": true,
      "ajax": {
        url: "<?php echo base_url('HRD/dataTableDivisi') ?>",
        type:'POST',
      },
      "columnDefs" : [{
        "targets" : [0, 2],
        "orderable" : false,
      }]

    });

    reloadTable();
    ButtonResetForm();
    resetForm();
    tambahDivisi();
    modalUbahDivisi();
    ubahDivisi();
  });

  function reloadTable()
  {
    $('#tableDivisi').DataTable().ajax.reload();
  }

  function ButtonResetForm()
  {
    $('[data-dismiss]').click(function(){
      $('.formTambahDivisi').trigger('reset');
      $('.namaDivisi_err').html('');
      $('#namaDivisi').removeClass('err_border');
    });
  }

  function resetForm()
  {
      $('.formTambahDivisi').trigger('reset');
      $('.namaDivisi_err').html('');
      $('#namaDivisi').removeClass('err_border');
  }

  function tambahDivisi()
  {
    $('.tambahDivisi').click(function(){
      var data = $('.formTambahDivisi').serialize();

        $.ajax({
          method  : "POST",
          url     : "<?= base_url('HRD/tambahDivisi') ?>",
          dataType: "JSON",
          data    : data,
          success : function(res) {
            if(res != 'true') {
              $('#namaDivisi').addClass('err_border');
              $('.namaDivisi_err').html(res);
            }else{
              resetForm();
              modalAlert('success', 'Data berhasil ditambah!');
              reloadTable();
            }
           
          }
        });
    });
  }

  function modalUbahDivisi(param)
  {
    $.ajax({
      method  : "POST",
      url     : "<?= base_url('HRD/getDivisiById/') ?>",
      dataType: "JSON",
      data    : {'id' : param},
      success : function(res) {
        if(res != 'false') {
          $('#ubahIdDivisi').val(res[0].id_divisi);
          $('#ubahNamaDivisi').val(res[0].nama_divisi);
        }else{
          // location.reload(true);
          alert('kosong');
        }
      }
    });
  }

  function ubahDivisi()
  {
    $('.tombolUbahDivisi').click(function(){
      var data = $('.formUbahDivisi').serialize();
      $.ajax({
        url     : "<?= base_url('HRD/ubahDivisi') ?>",
        method  : "POST",
        dataType: "JSON",
        data    : data,
        success : function(res) {
          if(res != "true") {
              $('#ubahNamaDivisi').addClass('err_border');
              $('.ubahNamaDivisi_err').html(res);
          } else {
            resetForm();
            modalAlert('success', 'Data berhasil diubah!');
            reloadTable();
          }
        }
      });
    })
  }

  function modalHapus(param)
  {
    $('.hapusModal').modal('show');
    $('.hapusDivisi').click(function(){

      $.ajax({
        method : "post",
        url    : "<?= base_url('HRD/hapusDivisi') ?>",
        data   : {"idDivisi" : param},
        success: function(res) {
          if(res == 'true') {
            $('.hapusModal').modal('hide');
            modalAlert('success', 'Data berhasil dihapus!');
            reloadTable();
          }else{
            $('.hapusModal').modal('hide');
            modalAlert('warning', 'Data gagal dihapus!');
          }
        }
      });

    });
  }




</script>
