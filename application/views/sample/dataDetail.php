<section class="content">

    <div class="row">
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
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
                                    <td><?= $row->sample_description ?></td>
                                    <td><?= $row->quantity ?></td>
                                    <td><?= $row->bapc_no ?></td>
                                    <td><?= $row->date_received ?></td>
                                    <td><?= $row->date_testing ?></td>
                                    <td><?= $row->age_grading ?></td>
                                    <td>
                                        <a href="<?= base_url('Sample/editDetail/') . $row->id_detail ?>" class="btn btn-warning">
                                            <i class="fas fa fa-edit"></i>
                                        </a>
                                        <!-- <button onclick="hapus('<?= $row->id_detail ?>')" class="btn btn-danger">
                                                <i class="fas fa fa-trash"></i>
                                            </button> -->
                                        <a href="<?= base_url('Sample/printDetail/') . $row->id_detail ?>" target="_blank" class="btn btn-success">
                                            <i class="fas fa fa-print"></i>
                                        </a>
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
            "scrollX": "200%",
            "scrollCollapse": true,
            "columnDefs": [{
                "targets": [10],
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