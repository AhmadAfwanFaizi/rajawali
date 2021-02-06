<section class="content">
    <div class="row">
        <div class="col-xs-12">

            <div class="box">
                <div class="box-header">
                    <a href="<?= base_url() ?>Master/addBrand" class="btn btn-primary">Add Data</a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="tableBrand" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Brand</th>
                                <th>Remark</th>
                                <th>Enable</th>
                                <th style="width: 85px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $row) { ?>
                                <tr>
                                    <td><?= $row->brand ?></td>
                                    <td><?= $row->remark ?></td>
                                    <td><?= $row->enable == 'Y' ? 'YES' : 'NO' ?></td>
                                    <td>
                                        <a href="<?= base_url('Master/editBrand/') . $row->id ?>" class="btn btn-warning">
                                            <i class="fas fa fa-edit"></i>
                                        </a>
                                        <a href="<?= base_url('Master/deleteBrand/') . $row->id ?>" class="btn btn-danger">
                                            <i class="fas fa fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Brand</th>
                                <th>Remark</th>
                                <th>Enable</th>
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