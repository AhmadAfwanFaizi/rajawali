<section class="content">
    <div class="row">
        <div class="col-xs-12">

            <div class="box">
                <div class="box-header">
                    <?php if (privilege() && privilege()->add_privilege == 'Y') { ?>
                        <a href="<?= base_url() ?>Sample/add" class="btn btn-primary">Add Data</a>
                    <?php } else { ?>
                        <a href="<?= base_url() ?>Sample/add" class="btn btn-primary">Add Data</a>
                    <?php } ?>
                    <a href="<?= base_url() ?>Sample/export_head" target="_blank" class="btn btn-success" style="<?= $role == "C" ? 'display: none;' : null ?>">Export Excel</a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="tableSample" class="table table-bordered table-hover" style="min-width: 50%;">
                        <thead>
                            <tr>
                                <th>Quotation</th>
                                <th>Customer</th>
                                <th>Brand</th>
                                <th>Created By</th>
                                <th>Created At</th>
                                <th>Updated By</th>
                                <th>Updated At</th>
                                <th style="width: 130px; ">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $row) { ?>
                                <tr>
                                    <td><?= $row->quotation_no ?></td>
                                    <td><?= $row->customer_name ?></td>
                                    <td><?= $row->brand ?></td>
                                    <td><?= $row->created_by ?></td>
                                    <td><?= $row->created_at ?></td>
                                    <td><?= $row->updated_by ?></td>
                                    <td><?= $row->updated_at ?></td>
                                    <td>
                                        <?php if (privilege() && privilege()->add_privilege == 'Y') { ?>
                                            <a href="<?= base_url('Sample/addDetail/') . $row->id_sample ?>" class="btn btn-primary">
                                                <i class="fas fa fa-plus"></i>
                                            </a>
                                        <?php } else { ?>
                                            <a href="<?= base_url('Sample/addDetail/') . $row->id_sample ?>" class="btn btn-primary">
                                                <i class="fas fa fa-plus"></i>
                                            </a>
                                        <?php } ?>

                                        <?php if (privilege() && privilege()->edit_privilege == 'Y') { ?>
                                            <a href="<?= base_url('Sample/edit/') . $row->id_sample ?>" class="btn btn-warning">
                                                <i class="fas fa fa-edit"></i>
                                            </a>
                                        <?php } else { ?>
                                            <a href="<?= base_url('Sample/edit/') . $row->id_sample ?>" class="btn btn-warning">
                                                <i class="fas fa fa-edit"></i>
                                            </a>
                                        <?php } ?>
                                        <!-- <button onclick="hapus('<?= $row->id_sample ?>')" class="btn btn-danger">
                                            <i class="fas fa fa-trash"></i>
                                        </button> -->
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Quotation</th>
                                <th>Customer</th>
                                <th>Brand</th>
                                <th style="width: 85px; ">Action</th>
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
            "scrollCollapse": true,
            "scrollX": "200%",
            "columnDefs": [{
                "targets": [7],
                "orderable": false,
            }],
        });
    });

    function hapus(id) {
        let conf = confirm('Are you sure?');
        if (conf) {
            location.replace("<?= base_url('Sample/delete/') ?>" + id)
        }
    }
</script>