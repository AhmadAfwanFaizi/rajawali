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


<script>
  $(document).ready(function () {

    $('#tableDivisi').dataTable({
    //   ajax   : "<?= base_url('HRD/getDivisi') ?>",
    //   columns: [
    //     {data : "id"},
    //     {data : "nama_divisi"},
    //     {render : function(){
    //       var html  = "<a href=''>EDIT</a> | "
    //                     html += "<a href=''>DELETE</a>"
    //                     return html
    //     }}
    //  ]
    });

    loadDivisi();
    resetForm();
    tambahDivisi();

  });

  function loadDivisi()
  {
    $.ajax({
      method  : "POST",
      url     : "<?= base_url('HRD/getDivisi') ?>",
      dataType: "JSON",
      success : function(res){
        console.log(res.data)
        var html = '';
        var i
        var no = 1;
        for(i = 0; i < res.data.length; i++) {
          html += '<tr>'+
          '<td>'+ (i+1) +'</td>' +
            '<td>'+ res.data[i].nama_divisi +'</td>' +
            '<td> <a href="#" class="btn btn-danger">Hapus</a> </td>' +
          +'</tr>';
        }
        $('#tableDivisi > tbody').html(html)
          
      }
    });

  }

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

            loadDivisi();
            $('.formTambahDivisi').trigger('reset');
            
          }
        });
      }

    });
  }

</script>