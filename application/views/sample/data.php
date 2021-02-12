<section class="content">
    <div class="row">
        <div class="col-xs-12">

            <div class="box">
                <div class="box-header">
                    <a href="<?= base_url() ?>Sample/add" class="btn btn-primary">Add Data</a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="tableSample" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Quotation</th>
                                <th>Customer</th>
                                <th>Brand</th>
                                <th style="width: 130px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $row) { ?>
                                <tr>
                                    <td><?= $row->quotation_no ?></td>
                                    <td><?= $row->customer_name ?></td>
                                    <td><?= $row->brand ?></td>
                                    <td>
                                        <a href="<?= base_url('Sample/addDetail/') . $row->id_sample ?>" class="btn btn-primary">
                                            <i class="fas fa fa-plus"></i>
                                        </a>
                                        <a href="<?= base_url('Sample/edit/') . $row->id_sample ?>" class="btn btn-warning">
                                            <i class="fas fa fa-edit"></i>
                                        </a>
                                        <a href="<?= base_url('Sample/delete/') . $row->id_sample ?>" class="btn btn-danger">
                                            <i class="fas fa fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Quotation</th>
                                <th>Customer</th>
                                <th>Brand</th>
                                <th style="width: 85px;">Action</th>
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
        $('#tableSample').DataTable({
            "columnDefs": [{
                "targets": [3],
                "orderable": false,
            }],
        });
    });
</script>