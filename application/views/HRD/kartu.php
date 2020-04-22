<section class="content" id="section-to-print">

      <div class="row">
        <div class="col-md-3">


          <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-user"></i> Nama</h3>
                <p class="text-muted">
                    <?= $data->nama ?>
                </p>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-barcode margin-r-5"></i> Barcode</strong>

              <p class="text-muted">
               <?= $barcode; ?>
              </p>

              <hr>

              <strong><i class="fa fa-cubes margin-r-5"></i> Divisi</strong>

              <p class="text-muted"><?= $data->nama_divisi ?></p>

              <!-- <hr> -->

              <!-- <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>

              <p>
                <span class="label label-danger">UI Design</span>
                <span class="label label-success">Coding</span>
                <span class="label label-info">Javascript</span>
                <span class="label label-warning">PHP</span>
                <span class="label label-primary">Node.js</span>
              </p>

              <hr>

              <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>

              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p> -->
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>

      </div>
      <!-- /.row -->

    </section>

