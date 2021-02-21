<section class="content">

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
                                    <textarea name="bapcNo" id="bapcNo" cols="30" rows="5" class="form-control" required><?= $detail->bapc_no ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="ageGrading">Age Grading</label>
                                    <input type="text" class="form-control" name="ageGrading" placeholder="Age Grading" value="<?= $detail->age_grading ?>" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="sampleCode">Sample Code</label>
                                    <input type="text" class="form-control" name="sampleCode" placeholder="Sample Code" value="<?= $detail->id_sample ?>" readonly required>
                                </div>
                                <div class="form-group">
                                    <label for="sampleDescription">Sample Description</label>
                                    <textarea name="sampleDescription" id="sampleDescription" cols="30" rows="5" class="form-control"><?= $detail->sample_description ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="dateReceived">Date Received</label>
                                    <input type="date" class="form-control" name="dateReceived" placeholder="Date Received" value="<?= $detail->date_received ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="dateTesting">Date Testing</label>
                                    <input type="date" class="form-control" name="dateTesting" placeholder="Date Testing" value="<?= $detail->date_testing ?>" required>
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