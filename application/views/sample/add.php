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
                <form role="form" action="<?= base_url() ?>Sample/add" method="post">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="quotationNo">Quotation</label>
                                    <input type="text" class="form-control" name="quotationNo" placeholder="Quotation">
                                </div>
                                <div class="form-group">
                                    <label for="idCustomer">Customer</label>
                                    <select name="idCustomer" id="idCustomer" class="form-control">
                                        <option value="" disabled="disabled">Select</option>
                                        <?php foreach ($customer as $row) { ?>
                                            <option value="<?= $row->id_customer ?>"><?= $row->customer_name ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="idBrand">Brand</label>
                                    <select name="idBrand" id="idBrand" class="form-control">
                                        <option value="" disabled="disabled">Select</option>
                                        <?php foreach ($brand as $row) { ?>
                                            <option value="<?= $row->id ?>"><?= $row->brand ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="quantity">Quantity</label>
                                    <input type="text" class="form-control" name="quantity" placeholder="Quantity">
                                </div>
                                <div class="form-group">
                                    <label for="bapcNo">BAPC</label>
                                    <textarea name="bapcNo" id="bapcNo" cols="30" rows="5" class="form-control"></textarea>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="sampleCode">Sample Code</label>
                                    <input type="text" class="form-control" name="sampleCode" placeholder="Sample Code" value="<?= $sample_code ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="sampleDescription">Sample Description</label>
                                    <textarea name="sampleDescription" id="sampleDescription" cols="30" rows="5" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="dateReceived">Date Received</label>
                                    <input type="date" class="form-control" name="dateReceived" placeholder="Date Received">
                                </div>
                                <div class="form-group">
                                    <label for="dateTesting">Date Testing</label>
                                    <input type="date" class="form-control" name="dateTesting" placeholder="Date Testing">
                                </div>
                                <div class="form-group">
                                    <label for="ageGrading">Age Grading</label>
                                    <input type="text" class="form-control" name="ageGrading" placeholder="Age Grading">
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
        $("#idCustomer").select2();
        $("#idBrand").select2();
    });
</script>