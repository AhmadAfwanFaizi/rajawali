<section class="content">
    <div class="row">
        <div class="col-xs-12">

            <div class="box">
                <div class="box-header">
                    <div class="row">
                        <div class="col-md-12">
                            <?php if (privilege()->add_privilege == 'Y') { ?>
                                <a href="<?= base_url() ?>Sample/add" class="btn btn-primary">Add Data</a>
                            <?php } ?>


                            <button onclick="exportHeadSample()" class="btn btn-success">Export Excel</button>
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
                    <table id="tableSample" class="table table-bordered table-hover" style="min-width: 50%;">
                        <thead>
                            <tr>
                                <th>Quotation</th>
                                <th>Customer</th>
                                <th>Brand</th>
                                <th>Enable</th>
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
                                    <td><?= $row->enable == 'Y' ? 'YES' : 'NO' ?></td>
                                    <td><?= $row->created_by_sample ?></td>
                                    <td><?= $row->created_at_sample ?></td>
                                    <td><?= $row->updated_by_sample ?></td>
                                    <td><?= $row->updated_at_sample ?></td>
                                    <td>
                                        <?php if (privilege()->add_privilege == 'Y') { ?>
                                            <a href="<?= base_url('Sample/addDetail/') . $row->id_sample ?>" class="btn btn-primary">
                                                <i class="fas fa fa-plus"></i>
                                            </a>
                                        <?php } ?>

                                        <?php if (privilege()->edit_privilege == 'Y') { ?>
                                            <a href="<?= base_url('Sample/edit/') . $row->id_sample ?>" class="btn btn-warning">
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
        $('#tableSample').DataTable({
            "scrollCollapse": true,
            "scrollX": "200%",
            "columnDefs": [{
                "targets": [8],
                "orderable": false,
            }],
            "order": [
                [5, "desc"]
            ]
        });
    });

    function hapus(id) {
        let conf = confirm('Are you sure?');
        if (conf) {
            location.replace("<?= base_url('Sample/delete/') ?>" + id)
        }
    }

    function exportHeadSample() {
        let start_date = $('#start_date').val();
        let end_date = $('#end_date').val();
        location.replace("<?= base_url('Sample/export_head/') ?>" + start_date + '/' + end_date);
    }
</script>