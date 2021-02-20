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
                    <input type="hidden" name="idSubmition" value="<?= $data->id_submition ?>">
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
                                            <input type="radio" name="termOfService1" id="termOfService1" value="1" <?= $data->id_term_of_service_1 == '1' ? 'checked' : null ?>>
                                            (TOYS/ BABY WEAR/OTHERS) REGULAR
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="termOfService1" id="termOfService2" value="2" <?= $data->id_term_of_service_1 == '2' ? 'checked' : null ?>>
                                            (TOYS/ BABY WEAR/OTHERS) EXPRESS
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="termOfService2" id="termOfService3" value="1" <?= $data->id_term_of_service_2 == '1' ? 'checked' : null ?>>
                                            (CHILDREN BICYCLE) REGULAR
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="termOfService2" id="termOfService4" value="2" <?= $data->id_term_of_service_2 == '2' ? 'checked' : null ?>>
                                            (CHILDREN BICYCLE) EXPRESS
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="familyProduct">Family Product</label>
                                    <textarea class="form-control" name="familyProduct" id="familyProduct" cols="30" rows="1" required><?= $data->family_product ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="productEndUse">Product End Use</label>
                                    <textarea class="form-control" name="productEndUse" id="productEndUse" cols="30" rows="1" required><?= $data->product_end_use ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="ageGroup">Age Group</label>
                                    <textarea class="form-control" name="ageGroup" id="ageGroup" cols="30" rows="1" required><?= $data->age_group ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="country">Country</label>
                                    <textarea class="form-control" name="country" id="country" cols="30" rows="1" required><?= $data->country ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="labSubcont">Lab Subcont</label>
                                    <textarea class="form-control" name="labSubcont" id="labSubcont" cols="30" rows="1" required><?= $data->lab_subcont ?></textarea>
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
                                    <textarea class="form-control" name="otherMethod" id="otherMethod" cols="30" rows="1" required><?= $data->other_method ?></textarea>
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