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
                <form role="form" action="<?= base_url() ?>Master/addCustomer" method="post">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="customerName">Customer Name</label>
                                    <input type="text" class="form-control" name="customerName" placeholder="Customer Name">
                                </div>
                                <div class="form-group">
                                    <label for="phoneNumber">Phone Number</label>
                                    <input type="text" class="form-control" name="phoneNumber" placeholder="Phone Number">
                                </div>
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <textarea name="address" id="address" cols="30" rows="5" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="remark">Remark</label>
                                    <input type="text" class="form-control" name="remark" placeholder="Remark">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="contactPerson">Contect Person</label>
                                    <input type="text" class="form-control" name="contactPerson" placeholder="Contact Person">
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="email">Email</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-10" id="divEmail">
                                            <input type="text" class="form-control" name="email[]" placeholder="Email">
                                        </div>
                                        <div class="col-md-2">
                                            <button type="button" class="btn btn-primary" onclick="addInputEmail()"><i class="fas fa fa-plus"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="billTo">Bill To</label>
                                    <textarea name="billTo" id="billTo" cols="30" rows="5" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="enable">Enable</label>
                                    <!-- <input type="text" class="form-control" name="enable" placeholder="Enable"> -->
                                    <select name="enable" id="enable" class="form-control">
                                        <option value="Y">YES</option>
                                        <option value="N">NO</option>
                                    </select>
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
    function addInputEmail() {
        let element = '<br/><input type="text" class="form-control" name="email[]" placeholder="Email">';
        $("#divEmail").append(element);
    }
</script>