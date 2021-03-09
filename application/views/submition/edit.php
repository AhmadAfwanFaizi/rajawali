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
                    <input type="hidden" name="idSubmitionTos" value="<?= $data->id_submition_tos    ?>">
                    <?php foreach ($detail as $d) { ?>
                        <input type="hidden" name="isoLama[]" value="<?= $d->id_sni_iso ?>">
                    <?php } ?>
                    <?php foreach ($get_submition_tos as $d) { ?>
                        <input type="hidden" name="tosLama[]" value="<?= $d->id ?>">
                    <?php } ?>

                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="sampleCode">Sample Code</label>
                                    <input type="text" class="form-control" name="sampleCode" value="<?= $data->sample_code ?>" readonly requires>
                                </div>
                                <div class="form-group">
                                    <label for="">Term Of Service</label>
                                    <?php foreach ($term_of_service as $row) { ?>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="idTermOfService[]" value="<?= $row->id ?>" <?= $row->id ?> <?php foreach ($get_submition_tos as $d) {
                                                                                                                                            echo ($row->id == $d->id) ? 'checked' : null;
                                                                                                                                        } ?>>
                                                <?= '(' . $row->category . ') ' . $row->type ?>
                                            </label>
                                        </div>
                                    <?php } ?>
                                </div>

                                <div class="form-group">
                                    <label for="familyProduct">Family Product</label>
                                    <textarea class="form-control" name="familyProduct" id="familyProduct" cols="30" rows="1"><?= $data->family_product ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="productEndUse">Product End Use</label>
                                    <textarea class="form-control" name="productEndUse" id="productEndUse" cols="30" rows="1"><?= $data->product_end_use ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="ageGroup">Age Group</label>
                                    <textarea class="form-control" name="ageGroup" id="ageGroup" cols="30" rows="1"><?= $data->age_group ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="country">Country</label>
                                    <textarea class="form-control" name="country" id="country" cols="30" rows="1"><?= $data->country ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="labSubcont">Lab Subcont</label>
                                    <textarea class="form-control" name="labSubcont" id="labSubcont" cols="30" rows="1"><?= $data->lab_subcont ?></textarea>
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
                                    <textarea class="form-control" name="otherMethod" id="otherMethod" cols="30" rows="1"><?= $data->other_method ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="ItemNo">Item No</label>
                                    <input type="number" class="form-control" name="ItemNo" placeholder="Item No" value="<?= $data->item_no ?>">
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

                                    <?php foreach ($toys as $row) { ?>
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