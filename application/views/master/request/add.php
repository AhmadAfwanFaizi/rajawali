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
                <form role="form" action="<?= base_url() ?>Master/addRequest" method="post">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="item">Item</label>
                            <input type="text" class="form-control" name="item" placeholder="Item" required>
                        </div>
                        <div class="form-group">
                            <label for="category">Category</label>
                            <!-- <input type="text" class="form-control" name="category" placeholder="Category"> -->
                            <select name="category" id="category" class="form-control" required>
                                <option value="TOYS">TOYS</option>
                                <option value="BABY_WEAR">BABY WEAR</option>
                                <option value="BICYCLE">BICYCLE</option>
                                <option value="OTHERS">OTHERS</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="remark">Remark</label>
                            <textarea name="remark" id="remark" cols="0" rows="5" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="enable">Enable</label>
                            <!-- <input type="text" class="form-control" name="enable" placeholder="Enable"> -->
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