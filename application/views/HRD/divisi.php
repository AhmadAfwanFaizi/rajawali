<section class="content">

  <div class="box">
    <div class="box-header">
      <!-- <h3 class="box-title">Data Table With Full Features</h3> -->
      <button class="btn btn-primary" data-toggle="modal" data-target="#tambahDivisiModal">Tambah</button>
      <button data-toggle="modal" id="alert" >Alert</button>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table id="tableDivisi" class="table table-bordered table-striped table-hover">
        <thead>
        <tr>
          <th>#</th>
          <th>Nama Divisi</th>
          <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
          <?php $no = 1; foreach($data->result() as $d) { ?>
            <tr>
              <td><?= $no++ ?></td>
              <td><?= $d->nama_divisi ?></td>
              <td width="130px">
                <button class="btn btn-sm btn-danger" onclick="modalHapus('<?= $d->id_divisi ?>')">Hapus</button>
                <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#ubahDivisiModal" onclick="modalUbahDivisi('<?= $d->id_divisi ?>')">Ubah</button>
              </td>
            </tr>
          <?php } ?>
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

<div class="modal fade alertModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document" style="margin: 4% 33%">
    <div class="modal-content" style="border-radius: 3px; width: 500px; text-align: center;">
      <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-check"></i> Alert!</h4>
        Success alert preview. This alert is dismissable.
      </div>
    </div>
  </div>
</div>


<script>
  $(document).ready(function () {
    resetForm();
    tambahDivisi();
    modalUbahDivisi();
    ubahDivisi();
    modalAlert();
  });


  function resetForm()
  {
    $('[data-dismiss]').click(function(){
      $('.formTambahDivisi').trigger('reset');
      $('.namaDivisi_err').html('');
      $('#namaDivisi').removeClass('err_border');
    })

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
            console.log(res);
            if(res != 'true') {
              $('#namaDivisi').addClass('err_border');
              $('.namaDivisi_err').html(res);
            }else{
              location.reload();
            }
           
          }
        });
    });
  }

  function modalUbahDivisi(param)
  {
    $.ajax({
      method  : "POST",
      url     : "<?= base_url('HRD/getDivisi/') ?>",
      dataType: "JSON",
      data    : {'id' : param},
      success : function(res) {
        if(res != 'false') {
          console.log(res);
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
            console.log(res);
            // location.reload(true);
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
          location.reload();
        }
      });

    });
  }

  function modalAlert()
  {
    $('#alert').click(function(){

      $('.alertModal').modal('show');
      setTimeout(function(){
        $('.alertModal').modal('hide');
      }, 2000)


    })
  }



</script>
