<section class="content">
    <div class="row">
        <div class="col-xs-12">

            <div class="box">
                <div class="box-header">
                    <a href="<?= base_url() ?>Master/addCustomer" class="btn btn-primary">Add Data</a>
                </div>
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
                                        <a href="<?= base_url('Master/editCustomer/') . $row->id_customer ?>" class="btn btn-warning">
                                            <i class="fas fa fa-edit"></i>
                                        </a>
                                        <a href="<?= base_url('Master/deleteCustomer/') . $row->id_customer ?>" class="btn btn-danger">
                                            <i class="fas fa fa-trash"></i>
                                        </a>
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
                "targets": [0, 1, 2, 3, 4, 5, 6, 7, 8],
                "orderable": false,
            }],
        });
    })
</script>