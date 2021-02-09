<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Submition</title>

    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <style>
        .container {
            font-size: xx-small;
        }

        .iso-data {
            padding: 10px;
        }

        table {
            width: 100%;
            border: 1px solid black;
        }

        td {
            padding: 2px;
        }

        .term {
            vertical-align: top;
        }

        .rlm {
            border: 1px solid black;
            padding: 5px;
            text-align: center;
        }

        @media print {
            body {
                -webkit-print-color-adjust: exact;
            }

            #rtl {
                background-color: lightgrey !important;
            }
        }
    </style>
</head>

<body>

    <div class="container">

        <div class="row">
            <div class="col-xs-2">
                gambar
            </div>
            <div class="col-xs-5">
                PT Rajawali Baskara Perkasa <br />
                Komplek Ruko Taman Tekno Boulevard Blok A20-21 <br />
                Jl. Raya Tekno Widya, BSD City, Tangerang 15314 <br />
                Tel: (62 21) 29313344 <br />
                E-mail: cs@rajawalilab.com
            </div>
            <div class="col-xs-5">
                <div class="row">
                    <div class="col-md-6">

                    </div>
                    <div class="col-md-6 rlm">
                        RLM-FR-001/017
                    </div>
                </div>
                <br />
                <div class="row">
                    <table border="1">
                        <tr>
                            <th style="font-size: medium;">
                                FOR LABORATORY USE ONLY
                            </th>
                        </tr>
                        <tr>
                            <th id="rtl" style="font-size: larger; background-color: lightgrey">
                                <?= $dataPrint->sample_code ?>
                            </th>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="row">
            <h3><u>Submission Testing Request Form</u></h3>
            <table border="1px">
                <tr>
                    <td rowspan="2">
                        <b>TERM OF SERVICE:</b>
                    </td>
                    <td colspan="2">TOYS/ BABY WEAR/OTHERS</td>
                    <td colspan="2">CHILDREN BICYCLE</td>
                    <td>Date received : <?= $dataPrint->date_received ?></td>
                </tr>
                <tr>
                    <td class="term">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="" <?= $data->id_term_of_service == '1' ? 'checked' : null ?>>
                                <b>REGULAR</b> <br />
                                (8 working days)
                            </label>
                        </div>

                    </td>
                    <td class="term">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="" <?= $data->id_term_of_service == '2' ? 'checked' : null ?>>
                                <b>EXPRESS</b> <br />
                                (3 working days) <br />
                                (40% surcharge)
                            </label>
                        </div>

                    </td>
                    <td class="term">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="" <?= $data->id_term_of_service == '3' ? 'checked' : null ?>>
                                <b>REGULAR</b> <br />
                                (15 working days)
                            </label>
                        </div>

                    </td>
                    <td class="term">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="" <?= $data->id_term_of_service == '4' ? 'checked' : null ?>>
                                <b>EXPRESS</b> <br />
                                (7 working days) <br />
                                (40% surcharge)
                            </label>
                        </div>
                    </td>
                    <td>21 Desember 2020</td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="5">*Note: NO testing will be proceeded until applicant (submitter) confirmed the quotation.</td>
                </tr>

                <tr>
                    <td colspan="3">
                        <b>APPLICANT INFORMATION *</b> mark refers to mandate information needed for test start *
                    </td>
                    <td colspan="3">
                        <b>SAMPLE INFORMATION</b> (Below information will state in report unless specified)
                    </td>
                </tr>

                <tr>
                    <td>
                        Applicant
                    </td>
                    <td colspan="2">
                        : <?= $dataPrint->customer_name ?>
                    </td>
                    <td>
                        Sample Description
                    </td>
                    <td colspan="2">
                        : <?= $dataPrint->sample_description ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        Address
                    </td>
                    <td colspan="2">
                        : <?= $dataPrint->address ?>
                    </td>
                    <td>
                        Product End Use
                    </td>
                    <td colspan="2">
                        : <?= $dataPrint->age_grading ?>
                    </td>
                </tr>
                <tr>
                    <td>

                    </td>
                    <td colspan="2">

                    </td>
                    <td>
                        Brand
                    </td>
                    <td colspan="2">
                        : <?= $dataPrint->brand ?>
                    </td>
                </tr>
                <tr>
                    <td>

                    </td>
                    <td colspan="2">

                    </td>
                    <td>
                        Quantity
                    </td>
                    <td colspan="2">
                        : <?= $dataPrint->quantity ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        Contact Person
                    </td>
                    <td colspan="2">
                        <?= $dataPrint->contact_person ?>
                    </td>
                    <td>
                        Country of Origin:
                    </td>
                    <td colspan="2">
                        : 7 Pcs
                    </td>
                </tr>
                <tr>
                    <td>
                        Email report
                        distribution
                    </td>
                    <td colspan="2">
                        : <?php foreach ($email as $row) {
                                echo $row->email . '<br/>';
                            } ?>
                    </td>
                    <td>
                        BAPC No.
                    </td>
                    <td colspan="2">
                        : <?= $dataPrint->bapc_no ?>
                    </td>
                </tr>
                <tr>
                    <td>

                    </td>
                    <td colspan="2">

                    </td>
                    <td>
                        Item No
                    </td>
                    <td colspan="2">
                        : <?= $data->item_no ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        Bill to
                    </td>
                    <td colspan="2">
                        : <?= $dataPrint->bill_to ?>
                    </td>
                    <td>
                        Family Product *
                    </td>
                    <td colspan="2">
                        : Toys
                    </td>
                </tr>
                <tr>
                    <td colspan="3">

                    </td>
                    <td colspan="3">
                        For SNI certification sample, all information based on BAPC
                    </td>
                </tr>
                <tr>
                    <td colspan="3">

                    </td>
                    <td colspan="3">
                        * : Only for Toys
                    </td>
                </tr>
            </table>
            <br />

            <b>TEST REQUEST :</b>
            <table border="1">
                <tr>
                    <td style="vertical-align: baseline;">
                        <div class="iso-data">
                            <b>
                                <u>SNI ISO INDONESIAN STANDARD PACKAGE for toys</u>
                            </b> <br />
                            Include: <br />
                            <div class="form-group">
                                <?php foreach ($include as $row) { ?>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="" <?php foreach ($detail as $d) {
                                                                                echo ($row->id == $d->id_sni_iso) ? 'checked' : null;
                                                                            } ?>>
                                            <b><?= $row->iso ?></b>
                                        </label>
                                    </div>
                                <?php } ?>
                            </div>

                            <br />
                            <div class="form-group">
                                <?php foreach ($based as $row) { ?>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="" <?php foreach ($detail as $d) {
                                                                                echo ($row->id == $d->id_sni_iso) ? 'checked' : null;
                                                                            } ?>>
                                            <b><?= $row->iso ?></b>
                                        </label>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </td>
                    <td style="vertical-align: baseline;">
                        <div class="iso-data">
                            <b>
                                <u>Baby Wear</u>
                            </b>
                            <div class="form-group">
                                <?php foreach ($baby_wear as $row) { ?>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="" <?php foreach ($detail as $d) {
                                                                                echo ($row->id == $d->id_sni_iso) ? 'checked' : null;
                                                                            } ?>>
                                            <b><?= $row->iso ?></b>
                                        </label>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="iso-data">
                            <b>
                                <u>Bicycle</u>
                            </b>
                            <div class="form-group">
                                <?php foreach ($bicycle as $row) { ?>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="" <?php foreach ($detail as $d) {
                                                                                echo ($row->id == $d->id_sni_iso) ? 'checked' : null;
                                                                            } ?>>
                                            <b><?= $row->iso ?></b>
                                        </label>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </td>
                    <td style="vertical-align: baseline;">
                        <div class="iso-data">
                            <b>
                                <u>Others</u>
                            </b>
                            <div class="form-group">
                                <?php foreach ($others as $row) { ?>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="" <?php foreach ($detail as $d) {
                                                                                echo ($row->id == $d->id_sni_iso) ? 'checked' : null;
                                                                            } ?>>
                                            <b><?= $row->iso ?></b>
                                        </label>
                                    </div>
                                <?php } ?>
                            </div>
                            <br />
                            <div class="form-group">
                                <?php foreach ($other as $row) { ?>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="" <?php foreach ($detail as $d) {
                                                                                echo ($row->id == $d->id_sni_iso) ? 'checked' : null;
                                                                            } ?>>
                                            <b><?= $row->iso ?></b>
                                        </label>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </td>
                </tr>
            </table>
            <table border="1">
                <tr>
                    <td colspan="">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="doNotShowPass" <?= $data->do_not_show_pass == 'TRUE' ? 'checked' : null ?>>
                                <b>Do not show PASS/FAIL conclusion in test report</b>
                            </label>
                        </div>
                    </td>
                    <td colspan="">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="retainSample" <?= $data->retain_sample == 'TRUE' ? 'checked' : null ?>>
                                <b>Retain sample to be returned</b>
                            </label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="otherMethod" <?= $data->other_method == 'TRUE' ? 'checked' : null ?>>
                                Others ( Please Specify Method):
                            </label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <b>Subcontract testing (based on quotation)</b>
                    </td>
                    <td>
                        <b>Lab. Subcont :__Vertex_</b>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        Date :
                    </td>
                </tr>
            </table>
        </div>
    </div>

</body>

</html>