<section class="content">
    <div class="row">
        <div class="col-xs-12">

            <div class="box">
                <div class="box-header">
                    <a href="<?= base_url() ?>Master/addRequest" class="btn btn-primary">Add Data</a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="tableRequest" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Item</th>
                                <th>Category</th>
                                <th>Remark</th>
                                <th>Enable</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $row) { ?>
                                <tr>
                                    <td><?= $row->item ?></td>
                                    <td><?= str_replace("_", " ", $row->category) ?></td>
                                    <td><?= $row->remark ?></td>
                                    <td><?= $row->enable == 'Y' ? 'YES' : 'NO' ?></td>
                                    <td>
                                        <a href="<?= base_url('Master/editRequest/') . $row->id ?>" class="btn btn-warning">
                                            <i class="fas fa fa-edit"></i>
                                        </a>
                                        <a href="<?= base_url('Master/deleteRequest/') . $row->id ?>" class="btn btn-danger">
                                            <i class="fas fa fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Item</th>
                                <th>Category</th>
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
        $('#tableRequest').DataTable();
    })
</script>