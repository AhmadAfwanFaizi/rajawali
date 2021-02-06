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
                <form role="form" action="<?= base_url() ?>Master/editCustomer" method="post">
                    <input type="hidden" name="id_customer" id="id_customer" value="<?= $data->id_customer ?>">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="customerName">Customer Name</label>
                                    <input type="text" class="form-control" name="customerName" placeholder="Customer Name" value="<?= $data->customer_name ?>">
                                </div>
                                <div class="form-group">
                                    <label for="phoneNumber">Phone Number</label>
                                    <input type="text" class="form-control" name="phoneNumber" placeholder="Phone Number" value="<?= $data->phone_number ?>">
                                </div>
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <textarea name="address" id="address" cols="0" rows="5" class="form-control"><?= $data->address ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="remark">Remark</label>
                                    <input type="text" class="form-control" name="remark" placeholder="Remark" value="<?= $data->remark ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="contactPerson">Contact Person</label>
                                    <input type="text" class="form-control" name="contactPerson" placeholder="Contact Person" value="<?= $data->contact_person ?>">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control" name="email" placeholder="Email" value="<?= $data->email ?>">
                                </div>
                                <div class="form-group">
                                    <label for="billTo">Bill To</label>
                                    <textarea name="billTo" id="billTo" cols="0" rows="5" class="form-control"><?= $data->bill_to ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="enable">Enable</label>
                                    <!-- <input type="text" class="form-control" name="enable" placeholder="Enable"> -->
                                    <select name="enable" id="enable" class="form-control">
                                        <option value="Y" <?= $data->bill_to == 'Y' ? 'selected' : '' ?>>YES</option>
                                        <option value="N" <?= $data->bill_to == 'N' ? 'selected' : '' ?>>NO</option>
                                    </select>
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