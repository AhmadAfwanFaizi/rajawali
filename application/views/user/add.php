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
                <form role="form" action="<?= base_url() ?>User/add" method="post">
                    <div class="box-body">

                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" name="username" placeholder="Username" required>
                        </div>
                        <div class="form-group">
                            <label for="role">Role</label>
                            <select name="role" id="role" class="form-control" required>
                                <option value="">Select a role</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                                <option value="ADMIN">ADMIN</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>
                        <div class="form-group">
                            <label for="passwordConf">Password Confirmation</label>
                            <input type="password" class="form-control" name="passwordConf" placeholder="Password Confirmation" required>
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="status" value="Y" checked>
                                    Active
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" id="image">
                            <p class="help-block">blank the image if you don't want to fill it</p>
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