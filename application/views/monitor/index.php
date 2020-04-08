<section class="content">

    <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Responsive Hover Table</h3>

                    <div class="box-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                        </div>
                    </div>
                    <div class="box-body table-responsive no-padding">
                        <input type="text" id="inputScann" autofocus>
                    </div>
                </div>
            </div>
        </div>
    </div>
 
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Responsive Hover Table</h3>

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
              <tbody>

              </tbody>
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
                        url    : "<?= base_url('monitor/inputAbsen') ?>",
                        type   : "POST",
                        data   : {'nip' : nip},
                        success: function(res) {
                            if(res == 'true') {
                                alert('masuk pak eko');

                                

                            } else if (res == 'ada') {
                                alert('data sudah ada');
                            } else {
                                alert('gagal pak eko');
                            }
                        }
                    })

                }
            }
            });
    
        });
    



    });

    function loadDataAbsenTemp()
    {
      $.ajax({
        url    : "<?= base_url('monitor/getDataAbsenTemp') ?>",
        type   : "POST",
        success: function(res) {
          var html = '';
          var i;
           console.log(res);
          // for(i = 0; i < res.length; i++) {
          //   html += '<tr>'+
          //     '<td>'+nip[i]+'</td>'+
          //     '<td>'+nama[i]+'</td>'+
          //     '<td>'+waktu[i]+'</td>'+
          //   '</tr>'
          // }
          $('.dataMonitorAbsen > tbody').html(html);
          console.log(html);
        }
      });
    }

    
</script>