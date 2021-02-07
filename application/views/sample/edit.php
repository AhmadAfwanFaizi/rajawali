<section class="content">
    <div class="row">
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Quick Example</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="<?= base_url() ?>Sample/edit" method="post">
                    <input type="hidden" name="idSample" value="<?= $data->id_sample ?>">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="quotationNo">Quotation</label>
                                    <input type="text" class="form-control" name="quotationNo" placeholder="Quotation" value="<?= $data->quotation_no ?>">
                                </div>
                                <div class="form-group">
                                    <label for="idCustomer">Customer</label>
                                    <select name="idCustomer" id="idCustomer" class="form-control">
                                        <option value="" disabled="disabled">Select</option>
                                        <?php foreach ($customer as $row) { ?>
                                            <option value="<?= $row->id_customer ?>" <?= $data->id_customer == $row->id_customer ? 'selected' : '' ?>><?= $row->customer_name ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="idBrand">Brand</label>
                                    <select name="idBrand" id="idBrand" class="form-control">
                                        <option value="" disabled="disabled">Select</option>
                                        <?php foreach ($brand as $row) { ?>
                                            <option value="<?= $row->id ?>" <?= $data->id_brand == $row->id ? 'selected' : '' ?>><?= $row->brand ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="quantity">Quantity</label>
                                    <input type="text" class="form-control" name="quantity" placeholder="Quantity" value="<?= $data->quantity ?>">
                                </div>
                                <div class="form-group">
                                    <label for="bapcNo">BAPC</label>
                                    <textarea name="bapcNo" id="bapcNo" cols="30" rows="5" class="form-control"><?= $data->bapc_no ?></textarea>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="sampleCode">Sample Code</label>
                                    <input type="text" class="form-control" name="sampleCode" placeholder="Sample Code" value="<?= $data->sample_code ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="sampleDescription">Sample Description</label>
                                    <textarea name="sampleDescription" id="sampleDescription" cols="30" rows="5" class="form-control"><?= $data->sample_description ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="dateReceived">Date Received</label>
                                    <input type="date" class="form-control" name="dateReceived" placeholder="Date Received" value="<?= $data->date_received ?>">
                                </div>
                                <div class="form-group">
                                    <label for="dateTesting">Date Testing</label>
                                    <input type="date" class="form-control" name="dateTesting" placeholder="Date Testing" value="<?= $data->date_testing ?>">
                                </div>
                                <div class="form-group">
                                    <label for="ageGrading">Age Grading</label>
                                    <input type="text" class="form-control" name="ageGrading" placeholder="Age Grading" value="<?= $data->age_grading ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</section>
<script>
    $(function() {
        $("#idCustomer").select2();
        $("#idBrand").select2();
    });
</script>