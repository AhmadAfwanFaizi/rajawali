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
                <form role="form" action="<?= base_url() ?>Master/addTermOfService" method="post">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="category">Category</label>
                            <input type="text" class="form-control" name="category" placeholder="Category" required>
                        </div>
                        <div class="form-group">
                            <label for="enable">Enable</label>
                            <select name="enable" id="enable" class="form-control" required>
                                <option value="Y">YES</option>
                                <option value="N">NO</option>
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