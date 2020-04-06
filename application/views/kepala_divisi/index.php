<section class="content">

  <div class="box">
    <div class="box-header">
      <!-- <h3 class="box-title">Data Table With Full Features</h3> -->
      <!-- <button class="btn btn-primary" data-toggle="modal" data-target="#tambahDivisiModal">Tambah</button> -->
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table id="tableAbsenKepalaDivisi" class="table table-bordered table-striped table-hover">
        <thead>
        <tr>
          <th>#</th>
          <th>Nip</th>
          <th>Nama</th>
          <th width="130px">Aksi</th>
        </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
    </div>
  </div>
</section>


<script>
    $(document).ready(function(){
        $('#tableAbsenKepalaDivisi').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                url: "<?php echo base_url('kepala_divisi/getAbsen') ?>",
                type:'POST',
            },
            "columnDefs" : [{
                "targets" : [0, 3],
                "orderable" : false,
            }],
        });
    });

</script>
