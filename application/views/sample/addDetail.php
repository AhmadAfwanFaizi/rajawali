<section class="content">

    <div class="row">
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Form</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->

                <div class="box-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="quotationNo">Quotation</label>
                                <input type="text" class="form-control" name="quotationNo" placeholder="Quotation" value="<?= $data->quotation_no ?>" disabled="disabled">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="idCustomer">Customer</label>
                                <select name="idCustomer" id="idCustomer" class="form-control" disabled="disabled">
                                    <?php foreach ($customer as $row) { ?>
                                        <option value="<?= $row->id_customer ?>" <?= $row->id_customer == $data->id_customer ? 'selected' : null ?>><?= $row->customer_name ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="idBrand">Brand</label>
                                <select name="idBrand" id="idBrand" class="form-control" disabled="disabled">
                                    <?php foreach ($brand as $row) { ?>
                                        <option value="<?= $row->id ?>" <?= $row->id == $data->id_brand ? 'selected' : null ?>><?= $row->brand ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <form role="form" action="<?= base_url() ?>Sample/addDetail" method="post">
        <div class="row">
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Quick Example</h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <input type="hidden" name="idSample" id="idSample" value="<?= $data->id_sample ?>">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="quantity">Quantity</label>
                                    <input type="text" class="form-control" name="quantity" placeholder="Quantity" required>
                                </div>
                                <div class="form-group">
                                    <label for="bapcNo">BAPC</label>
                                    <textarea name="bapcNo" id="bapcNo" cols="30" rows="5" class="form-control" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="ageGrading">Age Grading</label>
                                    <input type="text" class="form-control" name="ageGrading" placeholder="Age Grading" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="sampleCode">Sample Code</label>
                                    <input type="text" class="form-control" name="sampleCode" placeholder="Sample Code" value="<?= $sample_code ?>" readonly required>
                                </div>
                                <div class="form-group">
                                    <label for="sampleDescription">Sample Description</label>
                                    <textarea name="sampleDescription" id="sampleDescription" cols="30" rows="5" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="dateReceived">Date Received</label>
                                    <input type="date" class="form-control" name="dateReceived" placeholder="Date Received" required>
                                </div>
                                <div class="form-group">
                                    <label for="dateTesting">Date Testing</label>
                                    <input type="date" class="form-control" name="dateTesting" placeholder="Date Testing" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </div>
            </div>
        </div>
    </form>


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
                                    <td><?= $row->sample_code ?></td>
                                    <td><?= $row->sample_description ?></td>
                                    <td><?= $row->quantity ?></td>
                                    <td><?= $row->bapc_no ?></td>
                                    <td><?= $row->date_received ?></td>
                                    <td><?= $row->date_testing ?></td>
                                    <td><?= $row->age_grading ?></td>
                                    <td>
                                        <?php if ($row->status_sample == 'PENDING') { ?>
                                            <a href="<?= base_url('Sample/printDetail/') . $row->id ?>" target="_blank" class="btn btn-success">
                                                <i class="fas fa fa-print"></i>
                                            </a>
                                            <a href="<?= base_url('Sample/editDetail/') . $row->id ?>" class="btn btn-warning">
                                                <i class="fas fa fa-edit"></i>
                                            </a>
                                            <a href="<?= base_url('Sample/deleteDetail/') . $row->id . '/' . $row->id_sample ?>" class="btn btn-danger">
                                                <i class="fas fa fa-trash"></i>
                                            </a>
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
        $("#idCustomer").select2();
        $("#idBrand").select2();

        $("#tableSampleDetail").DataTable({
            "columnDefs": [{
                "targets": [0, 1, 2, 3, 4, 5, 6],
                "orderable": false,
            }],
        });
    });
</script>