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
                <form role="form" action="<?= base_url() ?>Master/editTermOfServiceDetail" method="post">
                    <input type="hidden" name="id" value="<?= $data->id_term_of_service_detail ?>">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="id_term_of_service">Term Of Service Category</label>
                            <select name="id_term_of_service" id="id_term_of_service" class="form-control" required>
                                <option value="">Select a category</option>
                                <?php foreach ($term_of_service as $row) { ?>
                                    <option value="<?= $row->id_term_of_service ?>" <?= $row->id_term_of_service == $data->id_term_of_service ? 'selected' : null ?>><?= $row->category ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="type">Type</label>
                            <select name="type" id="type" class="form-control" required>
                                <option value="REGULAR" <?= $data->type == 'REGULAR' ? 'selected' : null ?>>REGULAR</option>
                                <option value="EXPRESS" <?= $data->type == 'EXPRESS' ? 'selected' : null ?>>EXPRESS</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="category">Information</label>
                            <textarea class="form-control" name="information" id="information" cols="30" rows="3"><?= $data->information ?></textarea>
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