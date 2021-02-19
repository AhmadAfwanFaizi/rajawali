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
                <form role="form" enctype="multipart/form-data" action="<?= base_url() ?>User/edit" method="post">
                    <input type="hidden" name="id" id="id" value="<?= $data->id ?>">
                    <div class="box-body">

                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" name="username" placeholder="Username" value="<?= $data->username ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="role">Role</label>
                            <select name="role" id="role" class="form-control" required>
                                <option value="">Select a role</option>
                                <option value="A" <?= $data->role == 'A' ? 'selected' : null ?>>A</option>
                                <option value="B" <?= $data->role == 'B' ? 'selected' : null ?>>B</option>
                                <option value="C" <?= $data->role == 'C' ? 'selected' : null ?>>C</option>
                                <option value="ADMIN" <?= $data->role == 'ADMIN' ? 'selected' : null ?>>ADMIN</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="status" value="Y" <?= $data->status == 'Y' ? 'checked' : null ?>>
                                    Active
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label> <br>
                            <img src="<?= base_url('assets/img/user/') . $data->image ?>" alt="image user" style="width: 130px; height: auto; margin: 0px 0px 15px 0px">
                            <input type="file" id="image" name="image">
                            <input type="hidden" name="oldImage" id="oldImage" value="<?= $data->image ?>">
                            <p class="help-block">blank the image if you don't want to fill it</p>
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