<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Export Excel</title>

    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/skins/_all-skins.min.css">
    <?php
    header("Content-type: application/vnd-ms-excel");
    header("Content-Disposition: attachment; filename=submition.xls");
    ?>
</head>

<body>

    <table id="tableSubmition" class="table table-bordered table-hover" style="min-width: 50%;">
        <thead>
            <tr>
                <th>Customer</th>
                <th>Brand</th>
                <th>Sample Code</th>
                <th>Term Of Service</th>
                <th>Item No</th>
                <th>SNI Certification</th>
                <th>Do Not Show Pass</th>
                <th>Retain Sample</th>
                <th>Other Method </th>
                <th>Family Product</th>
                <th>Product End Use</th>
                <th>Age Group</th>
                <th>Country</th>
                <th>Lab Subcont</th>
                <th>Created By</th>
                <th>Created At</th>
                <th>Updated By</th>
                <th>Updated At</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $row) { ?>
                <tr>
                    <td><?= $row->customer_name ?></td>
                    <td><?= $row->brand ?></td>
                    <td><?= $row->sample_code ?></td>
                    <td><?= $row->category . ' - ' . $row->type ?></td>
                    <td><?= $row->item_no ?></td>
                    <td><?= $row->sni_certification ?></td>
                    <td><?= $row->do_not_show_pass ?></td>
                    <td><?= $row->retain_sample ?></td>
                    <td><?= $row->other_method ?></td>
                    <td><?= $row->family_product ?></td>
                    <td><?= $row->product_end_use ?></td>
                    <td><?= $row->age_group ?></td>
                    <td><?= $row->country ?></td>
                    <td><?= $row->lab_subcont ?></td>
                    <td><?= $row->created_by_submition ?></td>
                    <td><?= $row->created_at_submition ?></td>
                    <td><?= $row->updated_by_submition ?></td>
                    <td><?= $row->updated_at_submition ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

</body>

</html>