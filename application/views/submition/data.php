<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <div class="row">
                        <div class="col-md-12">
                            <?php if (privilege()->add_privilege == 'Y') { ?>
                                <a href="<?= base_url() ?>Submition/add" class="btn btn-primary">Add Data</a>
                            <?php } ?>

                            <button onclick="exportSubmition()" class="btn btn-success">Export Excel</button>
                        </div>
                    </div>

                    <div class="row">
                        <form action="" method="post">
                            <div class="form-group col-md-3">
                                <label for="start_date">Start Date</label>
                                <input class="form-control" type="date" name="start_date" id="start_date" value="<?= ($start_date) ? $start_date : null ?>" required>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="end_date">End Date</label>
                                <input class="form-control" type="date" name="end_date" id="end_date" value="<?= ($end_date) ? $end_date : null ?>" required>
                            </div>
                            <div class="form-group col-md-1">
                                <button class="btn btn-info" type="submit" style="margin-top: 40%;">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </form>
                    </div>

                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="tableSubmition" class="table table-bordered table-hover" style="min-width: 50%;">
                        <thead>
                            <tr>
                                <th>Customer</th>
                                <th>Brand</th>
                                <th>Sample Code</th>
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
                                <th>Created By</th>
                                <th>Created At</th>
                                <th>Updated By</th>
                                <th>Updated At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Customer</th>
                                <th>Brand</th>
                                <th>Sample Code</th>
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
                                <th>Created By</th>
                                <th>Created At</th>
                                <th>Updated By</th>
                                <th>Updated At</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php foreach ($data as $row) { ?>
                                <tr>
                                    <td><?= $row->customer_name ?></td>
                                    <td><?= $row->brand ?></td>
                                    <td><?= $row->sample_code ?></td>
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
                                    <td><?= $row->created_by_submition ?></td>
                                    <td><?= $row->created_at_submition ?></td>
                                    <td><?= $row->updated_by_submition ?></td>
                                    <td><?= $row->updated_at_submition ?></td>
                                    <td>
                                        <?php if (privilege()->print_privilege == 'Y') { ?>
                                            <a target="_blank" href="<?= base_url('Submition/print/') . $row->id_submition ?>" class="btn btn-success">
                                                <i class="fas fa fa-print"></i>
                                            </a>
                                        <?php } ?>

                                        <?php if (privilege()->edit_privilege == 'Y') { ?>
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
            "scrollCollapse": true,
            "scrollX": "200%",
            "columnDefs": [{
                "targets": [17],
                "orderable": false,
            }],
            "order": [
                [14, "desc"]
            ]
        });
    });

    function hapus(id) {
        let conf = confirm('Are you sure?');
        if (conf) {
            location.replace("<?= base_url('Submition/delete/') ?>" + id)
        }
    }

    function exportSubmition() {
        let start_date = $('#start_date').val();
        let end_date = $('#end_date').val();
        if (start_date && end_date) {
            location.replace("<?= base_url('Submition/export/') ?>" + start_date + '/' + end_date);
        } else {
            location.replace("<?= base_url('Submition/export/') ?>");
        }
    }
</script>