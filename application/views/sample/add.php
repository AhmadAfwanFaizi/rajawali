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
                <form role="form" action="<?= base_url() ?>Sample/add" method="post">
                    <div class="box-body">

                        <div class="form-group">
                            <label for="quotationNo">Quotation</label>
                            <input type="text" class="form-control" name="quotationNo" placeholder="Quotation" required>
                        </div>
                        <div class="form-group">
                            <label for="idCustomer">Customer</label>
                            <select name="idCustomer" id="idCustomer" class="form-control" required>
                                <option value="">Select a customer</option>
                                <?php foreach ($customer as $row) { ?>
                                    <option value="<?= $row->id_customer ?>"><?= $row->customer_name ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="idBrand">Brand</label>
                            <select name="idBrand" id="idBrand" class="form-control" required>
                                <option value="">Select a brand</option>
                                <?php foreach ($brand as $row) { ?>
                                    <option value="<?= $row->id ?>"><?= $row->brand ?></option>
                                <?php } ?>
                            </select>
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