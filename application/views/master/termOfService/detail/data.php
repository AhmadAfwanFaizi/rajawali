<section class="content">
    <div class="row">
        <div class="col-xs-12">

            <div class="box">
                <?php if (privilege() && privilege()->add_privilege == 'Y') { ?>
                    <div class="box-header">
                        <a href="<?= base_url() ?>Master/addTermOfServiceDetail" class="btn btn-primary">Add Data</a>
                    </div>
                <?php } else { ?>
                    <div class="box-header">
                        <a href="<?= base_url() ?>Master/addTermOfServiceDetail" class="btn btn-primary">Add Data</a>
                    </div>
                <?php } ?>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="tableTermOfServiceDetail" class="table table-bordered table-hover" style="min-width: 50%;">
                        <thead>
                            <tr>
                                <th>Category</th>
                                <th>Type</th>
                                <th>Information</th>
                                <th>Created By</th>
                                <th>Created At</th>
                                <th>Updated By</th>
                                <th>Updated At</th>
                                <th style="width: 85px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $row) { ?>
                                <tr>
                                    <td><?= $row->category ?></td>
                                    <td><?= $row->type ?></td>
                                    <td><?= $row->information ?></td>
                                    <td><?= $row->created_by_tosd ?></td>
                                    <td><?= $row->created_at ?></td>
                                    <td><?= $row->updated_by_tosd ?></td>
                                    <td><?= $row->updated_at ?></td>
                                    <td>
                                        <?php if (privilege() && privilege()->edit_privilege == 'Y') { ?>
                                            <a href="<?= base_url('Master/editTermOfServiceDetail/') . $row->id_term_of_service_detail ?>" class="btn btn-warning">
                                                <i class="fas fa fa-edit"></i>
                                            </a>
                                        <?php } else { ?>
                                            <a href="<?= base_url('Master/editTermOfServiceDetail/') . $row->id_term_of_service_detail ?>" class="btn btn-warning">
                                                <i class="fas fa fa-edit"></i>
                                            </a>
                                        <?php } ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
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
        $('#tableTermOfServiceDetail').DataTable({
            "scrollCollapse": true,
            "scrollX": "200%",
            "columnDefs": [{
                "targets": [7],
                "orderable": false,
            }],
            "order": [
                [4, "desc"]
            ]
        });
    });
</script>