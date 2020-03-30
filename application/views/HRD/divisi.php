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
          <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
    </div>
  </div>

</section>

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

    // $('#tableDivisi').dataTable({
    //   "processing": "true",
    //   "serverSide": "true",
    //   "ajax"      : "<?= base_url('HRD/getDivisi') ?>",
    //   "columns"   : [
    //     {data : "id"},
    //     {data : "nama_divisi"},
    //     {data : "id"}
    //  ], 
    //  "rowCallback" : function(row, data) {
    //   console.log(data);
    //   $('td:eq(2)', row).html( 
    //     "<button class='btn btn-sm btn-danger' data-target='.hapusModal' onclick=modalHapus('"+data.id+"')>Hapus</button>" + 
    //     " <button class='btn btn-sm btn-warning'>Ubah</button>"
    //   );
    //  }
    // });
    loadData();
    resetForm();
    tambahDivisi();

  });

  function loadData()
  {
    $('#tableDivisi').dataTable({
      "processing": "true",
      "serverSide": "true",
      "ajax"      : "<?= base_url('HRD/getDivisi') ?>",
      "columns"   : [
        {"data" : "id"},
        {"data" : "nama_divisi"},
        {"data" : "id"}
     ], 
     "rowCallback" : function(row, data) {
      console.log(data);
      $('td:eq(2)', row).html( 
        "<button class='btn btn-sm btn-danger' data-target='.hapusModal' onclick=modalHapus('"+data.id+"')>Hapus</button>" + 
        " <button class='btn btn-sm btn-warning'>Ubah</button>"
      );
     }
    });

  }

  // function loadData()
  // {
  //   $.ajax({
  //     method  : "POST",
  //     url     : "<?= base_url('HRD/getDivisi') ?>",
  //     dataType: "JSON",
  //     success : function(res){
  //       // console.log(res)
  //       $.each(res, function(i, v){
  //          console.log(i, v)
  //         $('#tableDivisi > tbody:last-child').append(
  //           "<tr>" +
  //             +"<td>"+i+"</td>"
  //             +"<td>"+v.nama_divisi+"</td>"
  //             +"<td><button class='btn btn-sm btn-danger' v-target='.hapusModal' onclick=modalHapus('"+v.id+"')>Hapus</button>"
  //             +" <button class='btn btn-sm btn-warning'>Ubah</button></td>"+
  //           "</tr>"
  //         )
  //       })
  //     }
  //   })
  // }

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
      var namaDivisi = $('#namaDivisi').val();

      if(namaDivisi == ''){
        $('#namaDivisi').addClass('err_border');
        $('.namaDivisi_err').html('Nama divisi tidak boleh kosong');
      } else {
        $('.namaDivisi_err').html('');
        $('#namaDivisi').removeClass('err_border');
        var status = true;
      }

      if(status == true) {
        var data = $('.formTambahDivisi').serialize();

        $.ajax({
          method : "POST",
          url    : "<?= base_url('HRD/divisi') ?>",
          data   : data,
          success: function(res) {

            loadData();
            $('.formTambahDivisi').trigger('reset');
   
          }
        });
      }

    });
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
          
        }
      });

    });
  }



</script>
