<section class="content">

    <div class="row">
        <div class="col-lg-4 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
            <div class="inner" style="height: 130px;">
                <h3><?= $menu_pegawai ?></h3>

                <p>Pegawai</p>
            </div>
            <div class="icon">
                <i class="fas fa fa-users"></i>
            </div>
            <!-- <a href="<?= base_url('HRD/karyawan') ?>" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a> -->
            </div>
        </div>
        <!-- ./col -->

        <div class="col-lg-4 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
            <div class="inner" style="height: 130px;">
                <h3><?= $menu_divisi ?></h3>

                <p>Divisi</p>
            </div>
            <div class="icon">
                <i class="ion ion-pie-graph"></i>
            </div>
            <!-- <a href="<?= base_url('HRD/divisi') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
            </div>
        </div>
        <!-- ./col -->
        
        <!-- HITUNG JUMLAH KARYAWAN MASUK -->
        <div class="col-lg-4 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
            <div class="inner" style="height: 130px;">
                <h3><?=$karyawan_masuk?><sup style="font-size: 20px">%</sup></h3>

                <p>Masuk Hari Ini</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
            </div>
        </div>
        <!-- ./col -->

    </div>
    
</section>
