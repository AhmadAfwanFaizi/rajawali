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
    header("Content-Disposition: attachment; filename=sample-detail.xls");
    ?>
</head>

<body>

    <table id="tableSampleDetail" class="table table-bordered table-hover" style="min-width: 50%;">
        <thead>
            <tr>
                <th>Quotation</th>
                <th>Customer</th>
                <th>Brand</th>
                <th>Sample Code</th>
                <th>Sample Description</th>
                <th>Quantity</th>
                <th>BAPC</th>
                <th>Date Received</th>
                <th>Date Testing</th>
                <th>Age Grading</th>
                <th>Created By</th>
                <th>Created At</th>
                <th>Updated By</th>
                <th>Updated At</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($detail as $row) { ?>
                <tr>
                    <td><?= $row->quotation_no ?></td>
                    <td><?= $row->customer_name ?></td>
                    <td><?= $row->brand ?></td>
                    <td><?= $row->sample_code ?></td>
                    <td><?= $row->sample_description ?></td>
                    <td><?= $row->quantity ?></td>
                    <td><?= $row->bapc_no ?></td>
                    <td><?= $row->date_received ?></td>
                    <td><?= $row->date_testing ?></td>
                    <td><?= $row->age_grading ?></td>
                    <td><?= $row->created_by_sd ?></td>
                    <td><?= $row->created_at_sd ?></td>
                    <td><?= $row->updated_by_sd ?></td>
                    <td><?= $row->updated_at_sd ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

</body>

</html>