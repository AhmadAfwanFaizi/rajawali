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
                <form role="form" action="<?= base_url() ?>Submition/add" method="post">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="sampleCode">Sample Code</label>
                                    <select name="sampleCode" id="sampleCode" class="form-control" required>
                                        <option value="">Pilih Sample Code</option>
                                        <?php foreach ($sample_code as $row) { ?>
                                            <option value="<?= $row->sample_code ?>"><?= $row->sample_code ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="termOfService">Term Of Service</label>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="termOfService" id="termOfService1" value="1" checked>
                                            (TOYS/ BABY WEAR/OTHERS) REGULAR
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="termOfService" id="termOfService2" value="2">
                                            (TOYS/ BABY WEAR/OTHERS) EXPRESS
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="termOfService" id="termOfService3" value="3">
                                            (CHILDREN BICYCLE) REGULAR
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="termOfService" id="termOfService4" value="4">
                                            (CHILDREN BICYCLE) EXPRESS
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="familyProduct">Family Product</label>
                                    <input type="text" class="form-control" name="familyProduct" placeholder="Family Product" required>
                                </div>
                                <div class="form-group">
                                    <label for="productEndUse">Product End Use</label>
                                    <input type="text" class="form-control" name="productEndUse" placeholder="Product End Use" required>
                                </div>
                                <div class="form-group">
                                    <label for="ageGroup">Age Group</label>
                                    <input type="text" class="form-control" name="ageGroup" placeholder="Age Group" required>
                                </div>
                                <div class="form-group">
                                    <label for="country">Country</label>
                                    <input type="text" class="form-control" name="country" placeholder="Country" required>
                                </div>
                                <div class="form-group">
                                    <label for="labSubcont">Lab Subcont</label>
                                    <input type="text" class="form-control" name="labSubcont" placeholder="Family Product" required>
                                </div>

                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="doNotShowPass" value="TRUE">
                                        <b>Do not show PASS/FAIL conclusion in test report</b>
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="retainSample" value="TRUE">
                                        <b>Retain sample to be returned</b>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label for="otherMethod">Other</label>
                                    <input type="text" class="form-control" name="otherMethod" placeholder="Please Specify Method">
                                </div>
                                <div class="form-group">
                                    <label for="ItemNo">Item No</label>
                                    <input type="text" class="form-control" name="ItemNo" placeholder="Item No" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="sniCertification" value="TRUE">
                                        <b>For SNI certification sample, all information based on BAPC </b>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label for="">SNI ISO INDONESIAN STANDARD PACKAGE for toys</label>
                                    <?php foreach ($include as $row) { ?>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="iso[]" value="<?= $row->id ?>">
                                                <?= $row->iso ?>
                                            </label>
                                        </div>
                                    <?php } ?>
                                </div>
                                <div class="form-group">
                                    <?php foreach ($based as $row) { ?>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="iso[]" value="<?= $row->id ?>">
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
                                                <input type="checkbox" name="iso[]" value="<?= $row->id ?>">
                                                <?= $row->iso ?>
                                            </label>
                                        </div>
                                    <?php } ?>
                                </div>
                                <div class="form-group">
                                    <label for="">Bicycle</label>
                                    <?php foreach ($bicycle as $row) { ?>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="iso[]" value="<?= $row->id ?>">
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
                                                <input type="checkbox" name="iso[]" value="<?= $row->id ?>">
                                                <?= $row->iso ?>
                                            </label>
                                        </div>
                                    <?php } ?>
                                </div>

                                <div class="form-group">
                                    <?php foreach ($other as $row) { ?>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="iso[]" value="<?= $row->id ?>">
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
                        <button type="submit" class="btn btn-primary">Add</button>
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