<section class="content">
    <div class="row">
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Form</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="<?= base_url() ?>Sample/edit" method="post">
                    <input type="hidden" name="idSample" value="<?= $data->id_sample ?>">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="quotationNo">Quotation</label>
                            <input type="text" class="form-control" name="quotationNo" placeholder="Quotation" value="<?= $data->quotation_no ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="idCustomer">Customer</label>
                            <select name="idCustomer" id="idCustomer" class="form-control">
                                <option value="">Select a customer</option>
                                <?php foreach ($customer as $row) { ?>
                                    <option value="<?= $row->id_customer ?>" <?= $row->id_customer == $data->id_customer ? 'selected' : null ?>><?= $row->customer_name ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="idBrand">Brand</label>
                            <select name="idBrand" id="idBrand" class="form-control">
                                <option value="">Select a brand</option>
                                <?php foreach ($brand as $row) { ?>
                                    <option value="<?= $row->id ?>" <?= $row->id == $data->id_brand ? 'selected' : null ?>><?= $row->brand ?></option>
                                <?php } ?>
                            </select>
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