<section class="content">

  <div class="box">
    <div class="box-header">
      <!-- <h3 class="box-title">Data Table With Full Features</h3> -->
      <button class="btn btn-primary" data-toggle="modal" data-target="#tambahKaryawanModal">Tambah</button>
      <!-- <button data-toggle="modal" id="reload" >Reload</button> -->
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table id="tableKaryawan" class="table table-bordered table-striped table-hover" role="grid">
        <thead>
        <tr>
          <th>#</th>
          <th>NIP</th>
          <th>Nama</th>
          <th>Jenis Kelamin</th>
          <th>Tempat Lahir</th>
          <th>Tanggal Lahir</th>
          <th>Email</th>
          <th>Nomor telepon</th>
          <th width="130px">Aksi</th>
        </tr>
        </thead>
        <!-- <tbody>
        </tbody> -->
      </table>
    </div>
  </div>

</section>

<!-- MODAL TAMBAH -->
<div class="modal fade bd-example-modal-lg" id="tambahKaryawanModal" tabindex="-1" role="dialog" aria-labelledby="tambahKaryawanModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog  modal-lg" role="document">
    <div class="modal-content">
      <form action="" method="post" class="formTambahKaryawan">
        <div class="modal-header">
          <h5 class="modal-title" id="tambahKaryawanModalLabel">Tambah Karyawan <?= $subJudul ?></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <input type="hidden" name="idDivisi" id="idDivisi" value="<?= $idDivisi ?>">
        <div class="form-row">
            <div class="form-group col-md-4 h-in">
              <label for="nik">NIK*</label>
              <input type="text" class="form-control" id="nik" name="nik">
              <p class="err nik_err"></p>
            </div>
            <div class="form-group col-md-4 h-in">
              <label for="nip">NIP*</label>
              <input type="text" class="form-control" id="nip" name="nip">
              <p class="err nip_err"></p>
            </div>
            <div class="form-group col-md-4 h-in">
              <label for="nama">Nama*</label>
              <input type="text" class="form-control" id="nama" name="nama">
              <p class="err nama_err"></p>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-4 h-in">
              <label for="jenisKelamin">Jenis Kelamin*</label>
                <select name="jenisKelamin" id="jenisKelamin" class="form-control">
                  <option value="" hidden>Pilih terlebih dahulu</option>
                  <option value="L">Laki-Laki</option>
                  <option value="P">Perempuan</option>
                </select>
              <p class="err jenisKelamin_err"></p>
            </div>
            <div class="form-group col-md-4 h-in">
              <label for="agama">Agama*</label>
                <select name="agama" id="agama" class="form-control">
                  <option value="" hidden>Pilih terlebih dahulu</option>
                  <option value="ISLAM">ISLAM</option>
                  <option value="KATOLIK">KATOLIK</option>
                  <option value="PROTESTAN">PROTESTAN</option>
                  <option value="KONGHUCU">KONGHUCU</option>
                  <option value="BUDHA">BUDHA</option>
                  <option value="LAIN-LAIN">LAIN-LAIN</option>
                </select>
              <p class="err agama_err"></p>
            </div>
            <div class="form-group col-md-4 h-in">
              <label for="tempatLahir">Tempta Lahir*</label>
              <input type="text" class="form-control" id="tempatLahir" name="tempatLahir">
              <p class="err tempatLahir_err"></p>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-4 h-in">
              <label for="tanggalLahir">Tanggal Lahir*</label>
              <input type="date" class="form-control" id="tanggalLahir" name="tanggalLahir">
              <p class="err tanggalLahir_err"></p>
            </div>
          <div class="form-group col-md-4 h-in">
              <label for="nomorTelepon">Nomor Telepon*</label>
              <input type="text" class="form-control" id="nomorTelepon" name="nomorTelepon">
              <p class="err nomorTelepon_err"></p>
          </div>
          <div class="form-group col-md-4 h-in">
              <label for="email">Email*</label>
              <input type="text" class="form-control" id="email" name="email">
              <p class="err email_err"></p>
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-6 h-in">
            <label for="jabatan">Jabatan</label>
                <select name="jabatan" id="jabatan" class="form-control">
                  <option value="" hidden>Pilih terlebih dahulu</option>
                  <option value="PEGAWAI">PEGAWAI</option>
                  <option value="KETUA_DIVISI">KETUA DIVISI</option>
                </select>
              <p class="err jabatan_err"></p>
          </div>
          <div class="form-group col-md-6 h-in">
            <div class="">
              <label for="gambar">File input</label>
              <input type="file" id="gambar" name="gambar">
              <!-- <p class="help-block">Example block-level help text here.</p> -->
            </div>
          </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-12 h-in">
              <label for="alamat">Alamat*</label>
              <textarea name="alamat" id="alamat" class="form-control" cols="" rows="3">
              
              </textarea>
            </div>
        </div>
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          <button type="button" class="btn btn-primary" onclick="tambahKaryawan()">Simpan</button>
        </div>
        
      </form>
    </div>
  </div>
</div>

<!-- MODAL UBAH -->
<div class="modal fade bd-example-modal-lg" id="ubahKaryawanModal" tabindex="-1" role="dialog" aria-labelledby="ubahKaryawanModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog  modal-lg" role="document">
    <div class="modal-content">
      <form action="" method="post" class="formUbahKaryawan">
        <div class="modal-header">
          <h5 class="modal-title" id="ubahKaryawanModalLabel">Ubah Karyawan <?= $subJudul ?></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <input type="hidden" name="uIdKaryawan" id="uIdKaryawan">
            <input type="hidden" name="uIdDivisi" id="uIdDivisi">
        <div class="form-row">
            <div class="form-group col-md-4 h-in">
              <label for="uNik">NIK</label>
              <input type="text" class="form-control" id="uNik" name="uNik">
              <p class="err uNik_err"></p>
            </div>
            <div class="form-group col-md-4 h-in">
              <label for="uNip">NIP</label>
              <input type="text" class="form-control" id="uNip" name="uNip">
              <p class="err uNip_err"></p>
            </div>
            <div class="form-group col-md-4 h-in">
              <label for="uNama">Nama</label>
              <input type="text" class="form-control" id="uNama" name="uNama">
              <p class="err uNama_err"></p>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-4 h-in">
              <label for="uJenisKelamin">Jenis Kelamin</label>
                <select name="uJenisKelamin" id="uJenisKelamin" class="form-control">
                  <option value="" hidden>Pilih terlebih dahulu</option>
                  <option value="L">Laki-Laki</option>
                  <option value="P">Perempuan</option>
                </select>
              <p class="err uJenisKelamin_err"></p>
            </div>
            <div class="form-group col-md-4 h-in">
              <label for="uAgama">Agama</label>
                <select name="uAgama" id="uAgama" class="form-control">
                  <option value="" hidden>Pilih terlebih dahulu</option>
                  <option value="ISLAM">ISLAM</option>
                  <option value="KATOLIK">KATOLIK</option>
                  <option value="PROTESTAN">PROTESTAN</option>
                  <option value="KONGHUCU">KONGHUCU</option>
                  <option value="BUDHA">BUDHA</option>
                  <option value="LAIN-LAIN">LAIN-LAIN</option>
                </select>
              <p class="err uAgama_err"></p>
            </div>
            <div class="form-group col-md-4 h-in">
              <label for="uTempatLahir">Tempta Lahir</label>
              <input type="text" class="form-control" id="uTempatLahir" name="uTempatLahir">
              <p class="err uTempatLahir_err"></p>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6 h-in">
              <label for="uTanggalLahir">Tanggal Lahir</label>
              <input type="date" class="form-control" id="uTanggalLahir" name="uTanggalLahir">
              <p class="err uTanggalLahir_err"></p>
            </div>
            <div class="form-group col-md-6 h-in">
            <label for="uJabatan">Jabatan</label>
                <select name="uJabatan" id="uJabatan" class="form-control">
                  <option value="" hidden>Pilih terlebih dahulu</option>
                  <option value="PEGAWAI">PEGAWAI</option>
                  <option value="KETUA_DIVISI">KETUA DIVISI</option>
                </select>
              <p class="err uJabatan_err"></p>
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-6 h-in">
              <label for="uNomorTelepon">Nomor Telepon</label>
              <input type="text" class="form-control" id="uNomorTelepon" name="uNomorTelepon">
              <p class="err uNomorTelepon_err"></p>
          </div>
          <div class="form-group col-md-6 h-in">
              <label for="uEmail">Email</label>
              <input type="text" class="form-control" id="uEmail" name="uEmail">
              <p class="err uEmail_err"></p>
          </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-12 h-in">
              <label for="uAlamat"> Alamat</label>
              <textarea name="uAlamat" id="uAlamat" class="form-control" cols="" rows="3">
              
              </textarea>
            </div>
        </div>
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          <button type="button" class="btn btn-primary ubahKaryawan">Ubah</button>
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
        <button type="button" class="btn btn-danger hapusKaryawan">Hapus</button>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function () {

    $('#tableKaryawan').DataTable({
      "processing": true,
      "serverSide": true,
      "ajax": {
        "url": "<?= base_url('HRD/dataTableKaryawan') ?>",
        "type":'POST',
        "data" : {'idDivisi' : "<?= $idDivisi ?>"},
      },
      "columnDefs" : [{
        "targets"   : [0, 8],
        "orderable": false
      }],
    });

    // $('#jabatan').change(function(){
    //   var param = $('#jabatan').val();
    //   if(param == "KETUA_DIVISI") {
    //     $('#gambar').parent('div').removeClass('hidden');
    //   } else {
    //     $('#gambar').parent('div').addClass('hidden');
    //   }
    // });


// WAJIBE =========
    reloadTable();
    resetForm();
    resetFormClick();
// =============
    ubahKaryawan();
   
  });

  function reloadTable()
  {
      $('#tableKaryawan').DataTable().ajax.reload();

  }

  function resetFormClick()
  {
    $('[data-dismiss]').click(function(){
      resetForm();
    });
  }

  function resetForm()
  {
      $('.formTambahKaryawan').trigger('reset');
      $('#nik').removeClass('err_border');
      $('.nik_err').html('');
      $('#nip').removeClass('err_border');
      $('.nip_err').html('');
      $('#nama').removeClass('err_border');
      $('.nama_err').html('');
      $('#jenisKelamin').removeClass('err_border');
      $('.jenisKelamin_err').html('');
      $('#agama').removeClass('err_border');
      $('.agama_err').html('');
      $('#tempatLahir').removeClass('err_border');
      $('.tempatLahir_err').html('');
      $('#tanggalLahir').removeClass('err_border');
      $('.tanggalLahir_err').html('');
      $('#jabatan').removeClass('err_border');
      $('.jabatan_err').html('');
      $('#nomorTelepon').removeClass('err_border');
      $('.nomorTelepon_err').html('');
      $('#email').removeClass('err_border');
      $('.email_err').html('');
      $('#alamat').removeClass('err_border');
      $('.alamat_err').html('');

      $('.formUbahKaryawan').trigger('reset');
      $('#uNik').removeClass('err_border');
      $('.uNik_err').html('');
      $('#uNip').removeClass('err_border');
      $('.uNip_err').html('');
      $('#uNama').removeClass('err_border');
      $('.uNama_err').html('');
      $('#uJenisKelamin').removeClass('err_border');
      $('.uJenisKelamin_err').html('');
      $('#uAgama').removeClass('err_border');
      $('.uAgama_err').html('');
      $('#uTempatLahir').removeClass('err_border');
      $('.uTempatLahir_err').html('');
      $('#uTanggalLahir').removeClass('err_border');
      $('.uTanggalLahir_err').html('');
      $('#uJabatan').removeClass('err_border');
      $('.uJabatan_err').html('');
      $('#uNomorTelepon').removeClass('err_border');
      $('.uNomorTelepon_err').html('');
      $('#uEmail').removeClass('err_border');
      $('.uEmail_err').html('');
      $('#uAlamat').removeClass('err_border');
      $('.uAlamat_err').html('');
  }

  function tambahKaryawan()
  {
      var gambar = $("#gambar").val().replace(/.*(\/|\\)/, '');
      var data = $('.formTambahKaryawan').serialize() + "&gambar="+gambar;
console.log(data)
        $.ajax({
          method  : "POST",
          url     : "<?= base_url('HRD/tambahKaryawan') ?>",
          dataType: "JSON",
          data    : data,
          success : function(res) {

            if(res.res != 'true') {
              if (res.nik){
                $('#nik').addClass('err_border');
                $('.nik_err').html(res.nik);
              } else {
                $('#nik').removeClass('err_border');
                $('.nik_err').html('');
              }
              if (res.nip){
                $('#nip').addClass('err_border');
                $('.nip_err').html(res.nip);
              }else{
                $('#nip').removeClass('err_border');
                $('.nip_err').html('');
              }
              if (res.nama) {
                $('#nama').addClass('err_border');
                $('.nama_err').html(res.nama);
              } else {
                $('#nama').removeClass('err_border');
                $('.nama_err').html('');
              }
              if (res.jenisKelamin) {
                $('#jenisKelamin').addClass('err_border');
                $('.jenisKelamin_err').html(res.jenisKelamin);  
              } else {
                $('#jenisKelamin').removeClass('err_border');
                $('.jenisKelamin_err').html('');
              }
              if (res.agama) {
                $('#agama').addClass('err_border');
                $('.agama_err').html(res.agama);
              } else {
                $('#agama').removeClass('err_border');
                $('.agama_err').html('');                
              }
              if (res.tempatLahir) {
                $('#tempatLahir').addClass('err_border');
                $('.tempatLahir_err').html(res.tempatLahir);
              } else {
                $('#tempatLahir').removeClass('err_border');
                $('.tempatLahir_err').html('');
              }
              if (res.tanggalLahir) {
                $('#tanggalLahir').addClass('err_border');
                $('.tanggalLahir_err').html(res.tanggalLahir);
              } else {
                $('#tanggalLahir').removeClass('err_border');
                $('.tanggalLahir_err').html('');
              }
              if (res.jabatan) {
                $('#jabatan').addClass('err_border');
                $('.jabatan_err').html(res.jabatan);
              } else {
                $('#jabatan').removeClass('err_border');
                $('.jabatan_err').html('');
              }
              if (res.nomorTelepon) {
                $('#nomorTelepon').addClass('err_border');
                $('.nomorTelepon_err').html(res.nomorTelepon);
              } else {
                $('#nomorTelepon').removeClass('err_border');
                $('.nomorTelepon_err').html('');
              }
              if (res.email) {
                $('#email').addClass('err_border');
                $('.email_err').html(res.email);
              } else {
                $('#email').removeClass('err_border');
                $('.email_err').html('');
              }
              if (res.alamat) {
                $('#alamat').addClass('err_border');
                $('.alamat_err').html(res.alamat);
              } else {
                $('#alamat').removeClass('err_border');
                $('.alamat_err').html('');
              }
            }else{

              if(gambar != "") {

                var formData = new FormData();
                formData.append("gambar", $("#gambar")[0].files[0]);
                formData.append("namaGambar", res.nip);
                
                console.log(formData);

                $.ajax({
                  type : "POST",
                  url : "<?php echo base_url(); ?>HRD/uploadGambar",
                  contentType : false,
                  processData : false,
                  dataType : "JSON",
                  data : formData,
                  success : function(response){
                    console.log(response);
                  }
                });

              }

              resetForm();
              reloadTable();
              modalAlert('success', 'Data berhasil ditambah');
              
            }
          }
        });
  }


  function ubahKaryawanModal(param)
  {
      $('#ubahKaryawanModal').modal('show');
        $.ajax({
        method  : "POST",
        url     : "<?= base_url('HRD/getKaryawanById') ?>",
        dataType: "JSON",
        data    : {'id_karyawan' : param},
        success : function(res) {
          if(res.res == 'true') {
            var data = res.data[0];
            $('#uIdKaryawan').val(data.id_karyawan);
            $('#uIdDivisi').val(data.id_divisi);
            $('#uNik').val(data.nik);
            $('#uNip').val(data.nip);
            $('#uNama').val(data.nama);
            $('#uJenisKelamin').val(data.jenis_kelamin);
            $('#uAgama').val(data.agama);
            $('#uTempatLahir').val(data.tempat_lahir);
            $('#uTanggalLahir').val(data.tanggal_lahir);
            $('#uJabatan').val(data.jabatan);
            $('#uNomorTelepon').val(data.nomor_telepon);
            $('#uEmail').val(data.email);
            $('#uAlamat').val(data.alamat);
          }else{
            modalAlert('warning', 'Data tidak ditemukan');
          }
        }
      })

  }

  function ubahKaryawan()
  {
    $('.ubahKaryawan').click(function(){
      var data = $('.formUbahKaryawan').serialize();

        $.ajax({
          method  : "POST",
          url     : "<?= base_url('HRD/ubahKaryawan') ?>",
          dataType: "JSON",
          data    : data,
          success : function(res) {
            if(res.res != 'true') {
              if (res.nik){
                $('#uNik').addClass('err_border');
                $('.uNik_err').html(res.nik);
              } else {
                $('#uNik').removeClass('err_border');
                $('.uNik_err').html('');
              }
              if (res.nip){
                $('#uNip').addClass('err_border');
                $('.uNip_err').html(res.nip);
              }else{
                $('#uNip').removeClass('err_border');
                $('.uNip_err').html('');
              }
              if (res.nama) {
                $('#uNama').addClass('err_border');
                $('.uNama_err').html(res.nama);
              } else {
                $('#uNama').removeClass('err_border');
                $('.uNama_err').html('');
              }
              if (res.jenisKelamin) {
                $('#uJenisKelamin').addClass('err_border');
                $('.uJenisKelamin_err').html(res.jenisKelamin);  
              } else {
                $('#uJenisKelamin').removeClass('err_border');
                $('.uJenisKelamin_err').html('');
              }
              if (res.agama) {
                $('#uAgama').addClass('err_border');
                $('.uAgama_err').html(res.agama);
              } else {
                $('#uAgama').removeClass('err_border');
                $('.uAgama_err').html('');                
              }
              if (res.tempatLahir) {
                $('#uTempatLahir').addClass('err_border');
                $('.uTempatLahir_err').html(res.tempatLahir);
              } else {
                $('#uTempatLahir').removeClass('err_border');
                $('.uTempatLahir_err').html('');
              }
              if (res.tanggalLahir) {
                $('#uTanggalLahir').addClass('err_border');
                $('.uTanggalLahir_err').html(res.tanggalLahir);
              } else {
                $('#uTanggalLahir').removeClass('err_border');
                $('.uTanggalLahir_err').html('');
              }
              if (res.jabatan) {
                $('#uJabatan').addClass('err_border');
                $('.uJabatan_err').html(res.jabatan);
              } else {
                $('#uJabatan').removeClass('err_border');
                $('.uJabatan_err').html('');
              }
              if (res.nomorTelepon) {
                $('#uNomorTelepon').addClass('err_border');
                $('.uNomorTelepon_err').html(res.nomorTelepon);
              } else {
                $('#uNomorTelepon').removeClass('err_border');
                $('.uNomorTelepon_err').html('');
              }
              if (res.email) {
                $('#uEmail').addClass('err_border');
                $('.uEmail_err').html(res.email);
              } else {
                $('#uEmail').removeClass('err_border');
                $('.uEmail_err').html('');
              }
              if (res.alamat) {
                $('#uAlamat').addClass('err_border');
                $('.uAlamat_err').html(res.alamat);
              } else {
                $('#uAlamat').removeClass('err_border');
                $('.uAlamat_err').html('');
              }
            }else{
              // resetForm();
              reloadTable();
              $('#ubahKaryawanModal').modal('hide');
              modalAlert('success', 'Data berhasil diubah');
              
            }
          }
        });
    });
  }

  function modalHapusKaryawan(param)
  {
    $('.hapusModal').modal('show');
    $('.hapusKaryawan').click(function(){
      
      $.ajax({
        method : "post",
        url    : "<?= base_url('HRD/hapusKaryawan') ?>",
        data   : {"id_karyawan" : param},
        success: function(res) {
          if(res == 'true') {
            $('.hapusModal').modal('hide');
            modalAlert('success', 'Data berhasil dihapus');
            reloadTable();
          } else {
            modalAlert('danger', 'Data gagal dihapus');
            reloadTable();
          }
        }
      });

    });
  }


</script>
