<link rel="stylesheet" href="<?= base_url('assets/') ?>bower_components/bootstrap/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="<?= base_url('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.css') ?>">

<table class="table">
    <thead>
        <tr>
            <th>No</th>
            <th>NIP</th>
            <th>Nama</th>
            <th>Tanggal</th>
            <th>Waktu</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; foreach($data->result() as $d) { ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $d->a_nip ?></td>
                <td><?= $d->nama ?></td>
                <td><?= $d->tanggal ?></td>
                <td><?= $d->waktu ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<script>
    window.print();
</script>