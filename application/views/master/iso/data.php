<section class="content">
    <div class="row">
        <div class="col-xs-12">

            <div class="box">
                <?php if (privilege() && privilege()->add_privilege == 'Y') { ?>
                    <div class="box-header">
                        <a href="<?= base_url() ?>Master/addIso" class="btn btn-primary">Add Data</a>
                    </div>
                <?php } else { ?>
                    <div class="box-header">
                        <a href="<?= base_url() ?>Master/addIso" class="btn btn-primary">Add Data</a>
                    </div>
                <?php } ?>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="tableIso" class="table table-bordered table-hover" style="min-width: 50%;">
                        <thead>
                            <tr>
                                <th>Iso Name</th>
                                <th>Category</th>
                                <th>Enable</th>
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
                                    <td><?= $row->iso ?></td>
                                    <td><?= str_replace('_', ' ', $row->category) ?></td>
                                    <td>
                                        <?= $row->enable == 'Y' ? 'YES' : 'NO' ?>
                                    </td>
                                    <td><?= $row->created_by_iso ?></td>
                                    <td><?= $row->created_at_iso ?></td>
                                    <td><?= $row->updated_by_iso ?></td>
                                    <td><?= $row->updated_at_iso ?></td>
                                    <td>
                                        <?php if (privilege() && privilege()->edit_privilege == 'Y') { ?>
                                            <a href="<?= base_url('Master/editIso/') . $row->id ?>" class="btn btn-warning">
                                                <i class="fas fa fa-edit"></i>
                                            </a>
                                        <?php } else { ?>
                                            <a href="<?= base_url('Master/editIso/') . $row->id ?>" class="btn btn-warning">
                                                <i class="fas fa fa-edit"></i>
                                            </a>
                                        <?php } ?>
                                        <!-- <button onclick="hapus('<?= $row->id ?>')" class="btn btn-danger">
                                            <i class="fas fa fa-trash"></i>
                                        </button> -->
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
        $('#tableIso').DataTable({
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

    function hapus(id) {
        let conf = confirm('Are you sure?');
        if (conf) {
            location.replace("<?= base_url('Master/deleteIso/') ?>" + id)
        }
    }
</script>