<section class="content">
    <div class="row">
        <div class="col-xs-12">

            <div class="box">
                <div class="box-header">
                    <a href="<?= base_url() ?>Submition/add" class="btn btn-primary">Add Data</a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="tableBrand" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Sample Code</th>
                                <th style="width: 85px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $row) { ?>
                                <tr>
                                    <td><?= $row->sample_code ?></td>
                                    <td>
                                        <a target="_blank" href="<?= base_url('Submition/print/') . $row->id ?>" class="btn btn-success">
                                            <i class="fas fa fa-print"></i>
                                        </a>
                                        <a href="<?= base_url('Submition/edit/') . $row->id ?>" class="btn btn-warning">
                                            <i class="fas fa fa-edit"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Sample Code</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>

<script>
    $(function() {
        $('#tableBrand').DataTable({
            "columnDefs": [{
                "targets": [0, 1, 2, 3],
                "orderable": false,
            }],
        });
    });
</script>