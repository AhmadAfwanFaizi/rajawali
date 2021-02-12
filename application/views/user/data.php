<section class="content">
    <div class="row">
        <div class="col-xs-12">

            <div class="box">
                <div class="box-header">
                    <a href="<?= base_url() ?>User/add" class="btn btn-primary">Add Data</a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="tableUser" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>username</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th style="width: 130px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $row) { ?>
                                <tr>
                                    <td><?= $row->username ?></td>
                                    <td><?= $row->role ?></td>
                                    <td>
                                        <?php if ($row->status == 'Y') { ?>
                                            <small class="label bg-green">Active</small>
                                        <?php } else { ?>
                                            <small class="label bg-red">Not active</small>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <a href="<?= base_url('User/edit/') . $row->id ?>" class="btn btn-warning">
                                            <i class="fas fa fa-edit"></i>
                                        </a>
                                        <button class="btn btn-danger" onclick="hapus('<?= $row->id ?>')">
                                            <i class="fas fa fa-trash"></i>
                                        </button>
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
        $('#tableUser').DataTable({
            "columnDefs": [{
                "targets": [1],
                "orderable": false,
            }],
        });
    });

    function hapus(id) {
        let conf = confirm('Are you sure');
        if (conf) {
            location.replace("<?= base_url('User/delete/') ?>" + id)
        }
    }
</script>