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
                <form role="form" action="<?= base_url() ?>Master/editTermOfService" method="post">
                    <input type="hidden" name="id" value="<?= $data->id ?>">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="category">Category</label>
                            <input type="text" class="form-control" name="category" placeholder="Category" value="<?= $data->category ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="enable">Enable</label>
                            <select name="enable" id="enable" class="form-control" required>
                                <option value="Y" <?= $data->enable == 'Y' ? 'selected' : null ?>>YES</option>
                                <option value="N" <?= $data->enable == 'N' ? 'selected' : null ?>>NO</option>
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