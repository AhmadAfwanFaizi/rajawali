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
                <form role="form" action="<?= base_url() ?>Submition/edit" method="post">
                    <input type="hidden" name="idSubmition" value="<?= $data->id ?>">
                    <input type="hidden" name="isoSubmition" value="<?= $data->iso_submition ?>">
                    <?php foreach ($detail as $d) { ?>
                        <input type="hidden" name="isoLama[]" value="<?= $d->id_sni_iso ?>">
                    <?php } ?>

                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="sampleCode">Sample Code</label>
                                    <input type="text" class="form-control" name="sampleCode" value="<?= $data->sample_code ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="termOfService">Term Of Service</label>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="termOfService" id="termOfService1" value="1" <?= $data->id_term_of_service == '1' ? 'checked' : null ?>>
                                            (TOYS/ BABY WEAR/OTHERS) REGULAR
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="termOfService" id="termOfService2" value="2" <?= $data->id_term_of_service == '2' ? 'checked' : null ?>>
                                            (TOYS/ BABY WEAR/OTHERS) EXPRESS
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="termOfService" id="termOfService3" value="3" <?= $data->id_term_of_service == '3' ? 'checked' : null ?>>
                                            (CHILDREN BICYCLE) REGULAR
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="termOfService" id="termOfService4" value="4" <?= $data->id_term_of_service == '4' ? 'checked' : null ?>>
                                            (CHILDREN BICYCLE) EXPRESS
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="familyProduct">Family Product</label>
                                    <input type="text" class="form-control" name="familyProduct" placeholder="Family Product" value=<?= $data->family_product ?> required>
                                </div>
                                <div class="form-group">
                                    <label for="productEndUse">Product End Use</label>
                                    <input type="text" class="form-control" name="productEndUse" placeholder="Product End Use" value=<?= $data->product_end_use ?> required>
                                </div>
                                <div class="form-group">
                                    <label for="ageGroup">Age Group</label>
                                    <input type="text" class="form-control" name="ageGroup" placeholder="Age Group" value=<?= $data->age_group ?> required>
                                </div>
                                <div class="form-group">
                                    <label for="country">Country</label>
                                    <input type="text" class="form-control" name="country" placeholder="Country" value=<?= $data->country ?> required>
                                </div>
                                <div class="form-group">
                                    <label for="labSubcont">Lab Subcont</label>
                                    <input type="text" class="form-control" name="labSubcont" placeholder="Family Product" value=<?= $data->lab_subcont ?> required>
                                </div>

                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="doNotShowPass" value="TRUE" <?= $data->do_not_show_pass == 'TRUE' ? 'checked' : null ?>>
                                        <b>Do not show PASS/FAIL conclusion in test report</b>
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="retainSample" value="TRUE" <?= $data->retain_sample == 'TRUE' ? 'checked' : null ?>>
                                        <b>Retain sample to be returned</b>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label for="otherMethod">Other</label>
                                    <input type="text" class="form-control" name="otherMethod" placeholder="Please Specify Method" value="<?= $data->other_method ?>">
                                </div>
                                <div class="form-group">
                                    <label for="ItemNo">Item No</label>
                                    <input type="text" class="form-control" name="ItemNo" placeholder="Item No" value="<?= $data->item_no ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="sniCertification" value="TRUE" <?= $data->sni_certification == 'TRUE' ? 'checked' : null ?>>
                                        <b>For SNI certification sample, all information based on BAPC </b>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label for="">SNI ISO INDONESIAN STANDARD PACKAGE for toys</label>

                                    <?php foreach ($include as $row) { ?>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="iso[]" value="<?= $row->id ?>" <?php foreach ($detail as $d) {
                                                                                                                echo ($row->id == $d->id_sni_iso) ? 'checked' : null;
                                                                                                            } ?>>
                                                <?= $row->iso ?>
                                            </label>
                                        </div>

                                    <?php } ?>
                                </div>
                                <div class="form-group">
                                    <?php foreach ($based as $row) { ?>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="iso[]" value="<?= $row->id ?>" <?php foreach ($detail as $d) {
                                                                                                                echo ($row->id == $d->id_sni_iso) ? 'checked' : null;
                                                                                                            } ?>>
                                                <b><?= $row->iso ?></b>
                                            </label>
                                        </div>
                                    <?php } ?>
                                </div>
                                <div class="form-group">
                                    <label for="">Baby Wear</label>
                                    <?php foreach ($baby_wear as $row) { ?>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="iso[]" value="<?= $row->id ?>" <?php foreach ($detail as $d) {
                                                                                                                echo ($row->id == $d->id_sni_iso) ? 'checked' : null;
                                                                                                            } ?>>
                                                <?= $row->iso ?>
                                            </label>
                                        </div>
                                    <?php } ?>
                                </div>
                                <div class="form-group">
                                    <label for="">Others</label>
                                    <?php foreach ($others as $row) { ?>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="iso[]" value="<?= $row->id ?>" <?php foreach ($detail as $d) {
                                                                                                                echo ($row->id == $d->id_sni_iso) ? 'checked' : null;
                                                                                                            } ?>>
                                                <?= $row->iso ?>
                                            </label>
                                        </div>
                                    <?php } ?>
                                </div>

                                <div class="form-group">
                                    <?php foreach ($other as $row) { ?>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="iso[]" value="<?= $row->id ?>" <?php foreach ($detail as $d) {
                                                                                                                echo ($row->id == $d->id_sni_iso) ? 'checked' : null;
                                                                                                            } ?>>
                                                <b><?= $row->iso ?></b>
                                            </label>
                                        </div>
                                    <?php } ?>
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
        $("#sampleCode").select2();
    })
</script>