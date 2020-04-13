<section class="content">

    <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Barcode scann</h3>

                    <div class="box-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                        </div>
                    </div>
                    <div class="box-body table-responsive no-padding">
                        <input type="text" class="form-control" id="inputScann" autofocus>
                    </div>
                </div>
            </div>
        </div>
    </div>
 
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data absen karyawan masuk</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover dataMonitorAbsen">
                <thead>
                    <tr>
                        <th>NIP</th>
                        <th>Nama</th>
                        <th>Waktu</th>
                    </tr>
              </thead>
              <tbody></tbody>
            </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>

<script>
    $(document).ready(function(){

      loadDataAbsenTemp();

        $('#inputScann').keyup(function(){
            var nip = $('#inputScann').val();

            $.ajax({
            url    : "<?= base_url('monitor/getDataKaryawan') ?>",
            type   : "POST",
            data   : {'nip' : nip},
            success: function(res) {

                if(res != 'false') {

                    $.ajax({
                        url     : "<?= base_url('monitor/inputAbsen') ?>",
                        type    : "POST",
                        data    : {'nip' : nip},
                        dataType:  "JSON",
                        success : function(response) {
                          // console.log(response);
                            if(response.res == 'ada') {
                              modalAlert('warning', "Data sudah ada");
                            } else if(response.res == 'true') {
                              loadDataAbsenTemp();
                              modalAlert('success', "<h1>Selamat datang <b>"+response.data.nama+"<b></h1>");
                            } else {
                              modalAlert('danger', "Data gagal di input");
                            }
                            $('#inputScann').val('');
                            setTimeout(function(){
                              $('#inputScann').focus();
                            }, 2000);
                            
                        }
                    });

                } 
                // else {
                //   modalAlert('danger', "Kode tidak terdaftar");
                // }
            }
            });
    
        });
    



    });

    function loadDataAbsenTemp()
    {
      $.ajax({
        url    : "<?= base_url('monitor/getDataAbsenTemp') ?>",
        method   : "POST",
        dataType: "JSON",
        success: function(res) {
          var html = '';
          var i;
          for(i = 0; i < res.length; i++) {
            html += '<tr>'+
              '<td>'+res[i].nip+'</td>'+
              '<td>'+res[i].nama+'</td>'+
              '<td>'+res[i].waktu+'</td>'+
            '</tr>';
          }
          $('.dataMonitorAbsen > tbody').html(html);
        }
      });

    }

    
</script>