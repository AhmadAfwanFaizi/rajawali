<section class="content">

    <div class="row">
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <div class="row">
                        <div class="col-md-12">
                            <button onclick="exportSampleDetail()" class="btn btn-success">Export Excel</button>
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
                <div class="box-body">
                    <table id="tableSampleDetail" class="table table-bordered table-hover" style="min-width: 50%;">
                        <thead>
                            <tr>
                                <th>Quotation</th>
                                <th>Customer</th>
                                <th>Brand</th>
                                <th>Sample Code</th>
                                <th>Sample Description</th>
                                <th>Quantity</th>
                                <th>BAPC</th>
                                <th>Date Received</th>
                                <th>Date Testing</th>
                                <th>Age Grading</th>
                                <th>Remark</th>
                                <th>Enbale</th>
                                <th>Created By</th>
                                <th>Created At</th>
                                <th>Updated By</th>
                                <th>Updated At</th>
                                <th style="width: 130px;">Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Quotation</th>
                                <th>Customer</th>
                                <th>Brand</th>
                                <th>Sample Code</th>
                                <th>Sample Description</th>
                                <th>Quantity</th>
                                <th>BAPC</th>
                                <th>Date Received</th>
                                <th>Date Testing</th>
                                <th>Age Grading</th>
                                <th>Remark</th>
                                <th>Enbale</th>
                                <th>Created By</th>
                                <th>Created At</th>
                                <th>Updated By</th>
                                <th>Updated At</th>
                                <th style="width: 130px;">Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php foreach ($detail as $row) { ?>
                                <tr>
                                    <td><?= $row->quotation_no ?></td>
                                    <td><?= $row->customer_name ?></td>
                                    <td><?= $row->brand ?></td>
                                    <td><?= $row->sample_code ?></td>
                                    <td><?= $row->sample_description ?></td>
                                    <td><?= $row->quantity ?></td>
                                    <td><?= $row->bapc_no ?></td>
                                    <td><?= $row->date_received ?></td>
                                    <td><?= $row->date_testing ?></td>
                                    <td><?= $row->age_grading ?></td>
                                    <td><?= $row->remark ?></td>
                                    <td><?= $row->enable == 'Y' ? 'YES' : 'NO' ?></td>
                                    <td><?= $row->created_by_sd ?></td>
                                    <td><?= $row->created_at_sd ?></td>
                                    <td><?= $row->updated_by_sd ?></td>
                                    <td><?= $row->updated_at_sd ?></td>
                                    <td>
                                        <?php if (privilege()->edit_privilege == 'Y') { ?>
                                            <a href="<?= base_url('Sample/editDetail/') . $row->id_detail ?>" class="btn btn-warning">
                                                <i class="fas fa fa-edit"></i>
                                            </a>
                                        <?php } ?>
                                        <?php if (privilege()->print_privilege == 'Y') { ?>
                                            <a href="<?= base_url('Sample/printDetail/') . $row->id_detail ?>" target="_blank" class="btn btn-success">
                                                <i class="fas fa fa-print"></i>
                                            </a>
                                        <?php } ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</section>

<script>
    $(function() {
        $("#tableSampleDetail").DataTable({
            "scrollCollapse": true,
            "scrollX": "200%",
            "columnDefs": [{
                "targets": [16],
                "orderable": false,
            }],
            "order": [
                [13, "desc"]
            ]
        });
    });

    function hapus(id) {
        let conf = confirm('Are you sure?');
        if (conf) {
            location.replace("<?= base_url('Sample/deleteDetail/') ?>" + id)
        }
    }

    function exportSampleDetail() {
        let start_date = $('#start_date').val();
        let end_date = $('#end_date').val();
        if (start_date && end_date) {
            location.replace("<?= base_url('Sample/export_detail/') ?>" + start_date + '/' + end_date);
        } else {
            location.replace("<?= base_url('Sample/export_detail/') ?>");
        }
    }
</script>