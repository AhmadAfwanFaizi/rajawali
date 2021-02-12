<section class="content">

    <div class="row">
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Quick Example</h3>
                </div>
                <div class="box-body">
                    <table id="tableSampleDetail" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Quotation</th>
                                <th>Customer</th>
                                <th>Brand</th>
                                <th>Sample Code</th>
                                <!-- <th>Sample Description</th> -->
                                <th>Quantity</th>
                                <!-- <th>BAPC</th> -->
                                <th>Date Received</th>
                                <th>Date Testing</th>
                                <!-- <th>Age Grading</th> -->
                                <th style="width: 130px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($detail as $row) { ?>
                                <tr>
                                    <td><?= $row->quotation_no ?></td>
                                    <td><?= $row->customer_name ?></td>
                                    <td><?= $row->brand ?></td>
                                    <td><?= $row->sample_code ?></td>
                                    <!-- <td><?= $row->sample_description ?></td> -->
                                    <td><?= $row->quantity ?></td>
                                    <!-- <td><?= $row->bapc_no ?></td> -->
                                    <td><?= $row->date_received ?></td>
                                    <td><?= $row->date_testing ?></td>
                                    <!-- <td><?= $row->age_grading ?></td> -->
                                    <td>
                                        <?php if ($row->status_sample == 'PENDING') { ?>
                                            <a href="<?= base_url('Sample/printDetail/') . $row->id ?>" target="_blank" class="btn btn-success">
                                                <i class="fas fa fa-print"></i>
                                            </a>
                                            <a href="<?= base_url('Sample/editDetail/') . $row->id ?>" class="btn btn-warning">
                                                <i class="fas fa fa-edit"></i>
                                            </a>
                                            <button onclick="hapus('<?= $row->id_detail ?>')" class="btn btn-danger">
                                                <i class="fas fa fa-trash"></i>
                                            </button>
                                        <?php } else { ?>
                                            <div class="btn btn-info disabled"> PROGRESS</div>
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
            "columnDefs": [{
                "targets": [0, 1, 2, 3, 4, 5, 6, 7],
                "orderable": false,
            }],
        });
    });

    function hapus(id) {
        let conf = confirm('Are you sure?');
        if (conf) {
            location.replace("<?= base_url('Sample/deleteDetail/') ?>" + id)
        }
    }
</script>