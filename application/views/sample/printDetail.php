<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Sample</title>
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <style>
        .frame {
            margin: 10px;
            border: 1px solid #3e2f2f;
            width: 227px;
            height: 151px;
        }

        th {
            font-size: x-small;
            padding: 2px;
        }

        td {
            font-size: x-small;
            padding: 1px;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="frame">
            <table>
                <tr>
                    <th>Desc</th>
                    <td>:</td>
                    <td><?= $sample_description ?></td>
                </tr>
                <tr>
                    <th>ID Sample</th>
                    <td>:</td>
                    <td><?= $sample_code ?></td>
                </tr>
                <tr>
                    <th>Qty</th>
                    <td>:</td>
                    <td><?= $quantity ?></td>
                </tr>
                <tr>
                    <th>BAPC</th>
                    <td>:</td>
                    <td><?= $bapc_no ?></td>
                </tr>
                <tr>
                    <th>Age Grading</th>
                    <td>:</td>
                    <td><?= $age_grading ?></td>
                </tr>
                <tr>
                    <th>Date Receive</th>
                    <td>:</td>
                    <td><?= $date_received ?></td>
                </tr>
                <tr>
                    <th>Date Testing</th>
                    <td>:</td>
                    <td><?= $date_testing ?></td>
                </tr>
            </table>
        </div>
    </div>

    <script>
        // window.print();
        // setTimeout(window.close, 1000);
    </script>
</body>

</html>