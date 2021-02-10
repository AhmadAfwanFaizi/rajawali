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
                <form role="form" action="<?= base_url() ?>Master/editBrand" method="post">
                    <input type="hidden" name="id" value="<?= $data->id ?>">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="brand">Brand</label>
                            <input type="text" class="form-control" name="brand" placeholder="Brand" value="<?= $data->brand ?>">
                        </div>
                        <div class="form-group">
                            <label for="remark">Remark</label>
                            <textarea name="remark" id="remark" cols="0" rows="5" class="form-control"><?= $data->remark ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="enable">Enable</label>
                            <!-- <input type="text" class="form-control" name="enable" placeholder="Enable"> -->
                            <select name="enable" id="enable" class="form-control">
                                <option value="Y" <?= $data->enable == 'Y' ? 'selected' : '' ?>>YES</option>
                                <option value="N" <?= $data->enable == 'N' ? 'selected' : '' ?>>NO</option>
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