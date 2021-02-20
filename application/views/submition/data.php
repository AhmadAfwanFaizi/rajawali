<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <?php if (privilege() && privilege() && privilege()->add_privilege == 'Y') { ?>
                    <div class="box-header">
                        <a href="<?= base_url() ?>Submition/add" class="btn btn-primary">Add Data</a>
                    </div>
                <?php } else { ?>
                    <div class="box-header">
                        <a href="<?= base_url() ?>Submition/add" class="btn btn-primary">Add Data</a>
                    </div>
                <?php } ?>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="tableSubmition" class="table table-bordered table-hover" style="min-width: 50%;">
                        <thead>
                            <tr>
                                <th>Sample Code</th>
                                <th>Term Of Service 1</th>
                                <th>Term Of Service 2</th>
                                <th>Item No</th>
                                <th>SNI Certification</th>
                                <th>Do Not Show Pass</th>
                                <th>Retain Sample</th>
                                <th>Other Method </th>
                                <th>Family Product</th>
                                <th>Product End Use</th>
                                <th>Age Group</th>
                                <th>Country</th>
                                <th>Lab Subcont</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $row) { ?>
                                <tr>
                                    <td><?= $row->sample_code ?></td>
                                    <td><?= $row->type_1 ?></td>
                                    <td><?= $row->type_2 ?></td>
                                    <td><?= $row->item_no ?></td>
                                    <td><?= $row->sni_certification ?></td>
                                    <td><?= $row->do_not_show_pass ?></td>
                                    <td><?= $row->retain_sample ?></td>
                                    <td><?= $row->other_method ?></td>
                                    <td><?= $row->family_product ?></td>
                                    <td><?= $row->product_end_use ?></td>
                                    <td><?= $row->age_group ?></td>
                                    <td><?= $row->country ?></td>
                                    <td><?= $row->lab_subcont ?></td>
                                    <td>
                                        <?php if (privilege() && privilege()->print_privilege == 'Y') { ?>
                                            <a target="_blank" href="<?= base_url('Submition/print/') . $row->id_submition ?>" class="btn btn-success">
                                                <i class="fas fa fa-print"></i>
                                            </a>
                                        <?php } else { ?>
                                            <a target="_blank" href="<?= base_url('Submition/print/') . $row->id_submition ?>" class="btn btn-success">
                                                <i class="fas fa fa-print"></i>
                                            </a>
                                        <?php } ?>

                                        <?php if (privilege() && privilege()->edit_privilege == 'Y') { ?>
                                            <a href="<?= base_url('Submition/edit/') . $row->id_submition ?>" class="btn btn-warning">
                                                <i class="fas fa fa-edit"></i>
                                            </a>
                                        <?php } else { ?>
                                            <a href="<?= base_url('Submition/edit/') . $row->id_submition ?>" class="btn btn-warning">
                                                <i class="fas fa fa-edit"></i>
                                            </a>
                                        <?php } ?>
                                        <!-- <button onclick="hapus('<?= $row->id_submition ?>')" class="btn btn-danger">
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
        $('#tableSubmition').DataTable({
            // "autoWidth": false,
            "scrollX": "200%",
            "scrollCollapse": true,
            "columnDefs": [{
                "targets": [13],
                "orderable": false,
            }],
        });
    });

    function hapus(id) {
        let conf = confirm('Are you sure?');
        if (conf) {
            location.replace("<?= base_url('Submition/delete/') ?>" + id)
        }
    }
</script>