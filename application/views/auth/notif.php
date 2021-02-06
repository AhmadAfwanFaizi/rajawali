<?php
$notif = $this->session->has_userdata("alert");
$alert = $this->session->flashdata("alert");
$text = $this->session->flashdata("text");

if ($notif) { ?>
    <div class="box-body">
        <div class="alert alert-<?= $alert ?> alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <?= $text ?>
        </div>
    </div>
<?php } ?>