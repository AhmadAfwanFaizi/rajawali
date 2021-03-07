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
                <form role="form" action="<?= base_url() ?>Master/addIso" method="post">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="iso">ISO</label>
                            <input type="text" class="form-control" name="iso" placeholder="ISO" required>
                        </div>
                        <div class="form-group">
                            <label for="category">Category</label>
                            <select name="category" id="category" class="form-control">
                                <option value="" hidden>Select Category</option>
                                <option value="INCLUDE">INCLUDE</option>
                                <option value="BABY_WEAR">BABY WEAR</option>
                                <option value="BICYCLE">BICYCLE</option>
                                <option value="OTHERS">OTHERS</option>
                                <option value="BASED">BASED</option>
                            </select>
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