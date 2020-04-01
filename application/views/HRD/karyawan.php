<section class="content">

  <div class="box">
    <div class="box-header">
      <!-- <h3 class="box-title">Data Table With Full Features</h3> -->
      <button class="btn btn-primary" data-toggle="modal" data-target="#tambahKaryawanModal">Tambah</button>
      <!-- <button data-toggle="modal" id="alert" >Alert</button> -->
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table id="tableDivisi" class="table table-bordered table-striped table-hover" role="grid">
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
          <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
          <?php $no = 1; foreach($data->result() as $d) { ?>
            <tr>
              <td><?= $no++ ?></td>
              <td><?= $d->nip ?></td>
              <td><?= $d->nama ?></td>
              <td><?= $d->jenis_kelamin == 'L' ? 'LAKI-LAKI' : 'PERMPUAN' ?></td>
              <td><?= $d->tempat_lahir ?></td>
              <td><?= $d->tanggal_lahir ?></td>
              <td><?= $d->email ?></td>
              <td><?= $d->nomor_telepon ?></td>
              <td width="130px">
                <button type="button" class="btn btn-sm btn-danger" onclick="modalHapusKaryawan('<?= $d->id_karyawan ?>')">Hapus</button>
                <button type="button" class="btn btn-sm btn-warning" onclick="ubahKaryawanModal('<?= $d->id_karyawan ?>')">Ubah</button>
              </td>
            </tr>
          <?php } ?>
        </tbody>
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
            <div class="form-group col-md-4">
              <label for="nik">NIK</label>
              <input type="text" class="form-control" id="nik" name="nik">
              <p class="err nik_err"></p>
            </div>
            <div class="form-group col-md-4">
              <label for="nip">NIP</label>
              <input type="text" class="form-control" id="nip" name="nip">
              <p class="err nip_err"></p>
            </div>
            <div class="form-group col-md-4">
              <label for="nama">Nama</label>
              <input type="text" class="form-control" id="nama" name="nama">
              <p class="err nama_err"></p>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-4">
              <label for="jenisKelamin">Jenis Kelamin</label>
                <select name="jenisKelamin" id="jenisKelamin" class="form-control">
                  <option value="" hidden>Pilih terlebih dahulu</option>
                  <option value="L">Laki-Laki</option>
                  <option value="P">Perempuan</option>
                </select>
              <p class="err jenisKelamin_err"></p>
            </div>
            <div class="form-group col-md-4">
              <label for="agama">Agama</label>
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
            <div class="form-group col-md-4">
              <label for="tempatLahir">Tempta Lahir</label>
              <input type="text" class="form-control" id="tempatLahir" name="tempatLahir">
              <p class="err tempatLahir_err"></p>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
              <label for="tanggalLahir">Tanggal Lahir</label>
              <input type="date" class="form-control" id="tanggalLahir" name="tanggalLahir">
              <p class="err tanggalLahir_err"></p>
            </div>
            <div class="form-group col-md-6">
            <label for="jabatan">Jabatan</label>
                <select name="jabatan" id="jabatan" class="form-control">
                  <option value="" hidden>Pilih terlebih dahulu</option>
                  <option value="PEGAWAI">PEGAWAI</option>
                  <option value="KETUA_DIVISI">KETUA DIVISI</option>
                </select>
              <p class="err jabatan_err"></p>
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-6">
              <label for="nomorTelepon">Nomor Telepon</label>
              <input type="text" class="form-control" id="nomorTelepon" name="nomorTelepon">
              <p class="err nomorTelepon_err"></p>
          </div>
          <div class="form-group col-md-6">
              <label for="email">Email</label>
              <input type="text" class="form-control" id="email" name="email">
              <p class="err email_err"></p>
          </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-12">
              <label for="alamat">Alamat</label>
              <textarea name="alamat" id="alamat" class="form-control" cols="" rows="3">
              
              </textarea>
            </div>
        </div>
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          <button type="button" class="btn btn-primary tambahKaryawan">Simpan</button>
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
            <input type="text" name="uIdKaryawan" id="uIdKaryawan">
            <input type="text" name="uIdDivisi" id="uIdDivisi">
        <div class="form-row">
            <div class="form-group col-md-4">
              <label for="uNik">NIK</label>
              <input type="text" class="form-control" id="uNik" name="uNik">
              <p class="err uNik_err"></p>
            </div>
            <div class="form-group col-md-4">
              <label for="uNip">NIP</label>
              <input type="text" class="form-control" id="uNip" name="uNip">
              <p class="err uNip_err"></p>
            </div>
            <div class="form-group col-md-4">
              <label for="uNama">Nama</label>
              <input type="text" class="form-control" id="uNama" name="uNama">
              <p class="err uNama_err"></p>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-4">
              <label for="uJenisKelamin">Jenis Kelamin</label>
                <select name="uJenisKelamin" id="uJenisKelamin" class="form-control">
                  <option value="" hidden>Pilih terlebih dahulu</option>
                  <option value="L">Laki-Laki</option>
                  <option value="P">Perempuan</option>
                </select>
              <p class="err uJenisKelamin_err"></p>
            </div>
            <div class="form-group col-md-4">
              <label for="uAgama">uAgama</label>
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
            <div class="form-group col-md-4">
              <label for="uTempatLahir">Tempta Lahir</label>
              <input type="text" class="form-control" id="uTempatLahir" name="uTempatLahir">
              <p class="err uTempatLahir_err"></p>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
              <label for="uTanggalLahir">Tanggal Lahir</label>
              <input type="date" class="form-control" id="uTanggalLahir" name="uTanggalLahir">
              <p class="err uTanggalLahir_err"></p>
            </div>
            <div class="form-group col-md-6">
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
          <div class="form-group col-md-6">
              <label for="uNomorTelepon">Nomor Telepon</label>
              <input type="text" class="form-control" id="uNomorTelepon" name="uNomorTelepon">
              <p class="err uNomorTelepon_err"></p>
          </div>
          <div class="form-group col-md-6">
              <label for="uEmail">uEmail</label>
              <input type="text" class="form-control" id="uEmail" name="uEmail">
              <p class="err uEmail_err"></p>
          </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-12">
              <label for="uAlamat">uAlamat</label>
              <textarea name="uAlamat" id="uAlamat" class="form-control" cols="" rows="3">
              
              </textarea>
            </div>
        </div>
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          <button type="button" class="btn btn-primary ubahhKaryawan">Simpan</button>
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
    tambahKaryawan();
    modalAlert();
  });


  function resetForm()
  {
    $('[data-dismiss]').click(function(){
      $('.formTambahKaryawan').trigger('reset');
      $('.namaKaryawan_err').html('');
      $('#namaKaryawan').removeClass('err_border');
    })
  }

  function tambahKaryawan()
  {
    $('.tambahKaryawan').click(function(){
      var data = $('.formTambahKaryawan').serialize();

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
              location.reload();
            }
          }
        });
    });
  }

  function ubahKaryawanModal(param)
  {
      $('#ubahKaryawanModal').modal('show');
        $.ajax({
        method  : "POST",
        url     : "<?= base_url('HRD/getKaryawan') ?>",
        dataType: "JSON",
        data    : {'id_karyawan' : param},
        success : function(res) {
          if(res.res == 'true') {
            var data = res.data[0];
            console.log(data);
            $('#uIdKaryawan').val(data.id_karyawan);
            $('#uIdDivisi').val(data.id_divisi);
            $('#uNik').val(data.nik);
            $('#uNip').val(data.nip);
            $('#uNama').val(data.nama);
            $('#uJenisKelamin').val(data.jenis_kelamin);
            $('#uAgama').val(data.agama);
            $('#uTempatLahir').val(data.tempat_Lahir);
            $('#uTanggalLahir').val(data.tanggaL_Lahir);
            $('#uJabatan').val(data.jabatan);
            $('#uNomorTelepon').val(data.nomor_telepon);
            $('#uEmail').val(data.email);
            $('#uAlamat').val(data.alamat);
          }else{
            alert('kosong');
          }
        }
      })

  }

  function ubahKaryawan()
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
            location.reload(true);
          }
        }
      });
    })
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
          alert(res)
          // location.reload();
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
