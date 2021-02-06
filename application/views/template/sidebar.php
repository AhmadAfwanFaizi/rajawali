<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= base_url() ?>assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>

            <!-- Role Admin  -->
            <?php
            $role = $this->session->userdata('role');
            if ($role == 'ADMIN') { ?>
                <li>
                    <a href="<?= base_url() ?>Master/customer">
                        <i class="fa fa-th"></i> <span>Customer</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url() ?>Master/brand">
                        <i class="fa fa-th"></i> <span>Brand</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url() ?>Master/request">
                        <i class="fa fa-th"></i> <span>Request</span>
                    </a>
                </li>
            <?php }
            if ($role == 'ADMIN' || $role == 'C' || $role == 'A') { ?>
                <!-- Role A -->
                <li>
                    <a href="#">
                        <i class="fa fa-th"></i> <span>Label</span>
                    </a>
                </li>
            <?php }
            if ($role == 'ADMIN' || $role == 'C' || $role == 'B') { ?>
                <!-- Role B -->
                <li>
                    <a href="#">
                        <i class="fa fa-th"></i> <span>Submition</span>
                    </a>
                </li>
            <?php } ?>

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>