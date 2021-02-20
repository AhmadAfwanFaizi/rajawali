<section class="content">
    <div class="row">
        <div class="col-xs-12">

            <div class="box">
                <?php if (privilege() && privilege()->add_privilege == 'Y') { ?>
                    <div class="box-header">
                        <a href="<?= base_url() ?>Master/addCustomer" class="btn btn-primary">Add Data</a>
                    </div>
                <?php } else { ?>
                    <div class="box-header">
                        <a href="<?= base_url() ?>Master/addCustomer" class="btn btn-primary">Add Data</a>
                    </div>
                <?php } ?>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="tableCustomer" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Contact</th>
                                <th>Phone</th>
                                <th>email</th>
                                <th>Bill To</th>
                                <th>Remark</th>
                                <th>Enable</th>
                                <th style="width: 85px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $row) { ?>
                                <tr>
                                    <td><?= $row->customer_name ?></td>
                                    <td><?= $row->address ?></td>
                                    <td><?= $row->contact_person ?></td>
                                    <td><?= $row->phone_number ?></td>
                                    <td>
                                        <?php
                                        $query = $this->db->query("SELECT email from customer_detail where id_customer = '$row->id_customer'")->result();
                                        // var_dump($query);
                                        foreach ($query as $subRow) {
                                            echo $subRow->email . "<br/>";
                                        } ?>
                                    </td>
                                    <td><?= $row->bill_to ?></td>
                                    <td><?= $row->remark ?></td>
                                    <td><?= $row->enable == 'Y' ? 'YES' : 'NO' ?></td>
                                    <td>
                                        <?php if (privilege() && privilege()->edit_privilege == 'Y') { ?>
                                            <a href="<?= base_url('Master/editCustomer/') . $row->id_customer ?>" class="btn btn-warning">
                                                <i class="fas fa fa-edit"></i>
                                            </a>
                                        <?php } else { ?>
                                            <a href="<?= base_url('Master/editCustomer/') . $row->id_customer ?>" class="btn btn-warning">
                                                <i class="fas fa fa-edit"></i>
                                            </a>
                                        <?php } ?>
                                        <!-- <button onclick="hapus('<?= $row->id_customer ?>')" class="btn btn-danger">
                                            <i class="fas fa fa-trash"></i>
                                        </button> -->
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Contact</th>
                                <th>Phone</th>
                                <th>email</th>
                                <th>Bill To</th>
                                <th>Remark</th>
                                <th>Enable</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>

<script>
    $(function() {
        $('#tableCustomer').DataTable({
            "columnDefs": [{
                "targets": [1, 2, 3, 4, 5, 6, 7, 8],
                "orderable": false,
            }],
        });
    });

    function hapus(id) {
        let conf = confirm('Are you sure?');
        if (conf) {
            location.replace("<?= base_url('Master/deleteCustomer/') ?>" + id)
        }
    }
</script>