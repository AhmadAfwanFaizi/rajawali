<section class="content">

    <div class="row">
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Sample Head Data</h3>
                </div>
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

    <form role="form" action="<?= base_url() ?>Sample/editDetail" method="post">
        <input type="hidden" name="idDetail" value="<?= $detail->id_detail ?>">
        <div class="row">
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Form</h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <input type="hidden" name="idSample" id="idSample" value="<?= $detail->id_sample ?>">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="quantity">Quantity</label>
                                    <input type="text" class="form-control" name="quantity" placeholder="Quantity" value="<?= $detail->quantity ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="bapcNo">BAPC</label>
                                    <textarea name="bapcNo" id="bapcNo" cols="30" rows="5" class="form-control"><?= $detail->bapc_no ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="ageGrading">Age Grading</label>
                                    <input type="text" class="form-control" name="ageGrading" placeholder="Age Grading" value="<?= $detail->age_grading ?>">
                                </div>
                                <div class="form-group">
                                    <label for="enable">Enable</label>
                                    <select name="enable" id="enable" class="form-control">
                                        <option value="Y" <?= $detail->enable == 'Y' ? 'selected' : null ?>>YES</option>
                                        <option value="N" <?= $detail->enable == 'N' ? 'selected' : null ?>>NO</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="sampleCode">Sample Code</label>
                                    <input type="text" class="form-control" name="sampleCode" placeholder="Sample Code" value="<?= $detail->sample_code ?>" readonly required>
                                </div>
                                <div class="form-group">
                                    <label for="sampleDescription">Sample Description</label>
                                    <textarea name="sampleDescription" id="sampleDescription" cols="30" rows="5" class="form-control"><?= $detail->sample_description ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="remark">Remark</label>
                                    <textarea name="remark" id="remark" cols="30" rows="5" class="form-control"><?= $detail->remark ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="dateReceived">Date Received</label>
                                    <input type="date" class="form-control" name="dateReceived" placeholder="Date Received" value="<?= $detail->date_received ?>">
                                </div>
                                <div class="form-group">
                                    <label for="dateTesting">Date Testing</label>
                                    <input type="date" class="form-control" name="dateTesting" placeholder="Date Testing" value="<?= $detail->date_testing ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

</section>
<script>
    $(function() {
        $("#idCustomer").select2();
        $("#idBrand").select2();

        $("#tableSampleDetail").DataTable();
    });
</script>