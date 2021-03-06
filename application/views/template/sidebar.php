<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= base_url() ?>assets/img/user/<?= $this->session->userdata('img') ?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?= $this->session->userdata('username') ?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">NAVIGATION</li>

            <li class="<?= segment(1) == 'Dashboard' ? 'active' : null ?>">
                <a href="<?= base_url() ?>Dashboard">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>

            <li class="treeview <?= segment(1) == 'Master' ? 'active menu-open' : null ?>">
                <a href="#">
                    <i class="fa fa-file"></i> <span>Master Data</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?= segment(2) == 'customer' ? 'active' : null ?>">
                        <a href="<?= base_url() ?>Master/customer">
                            <i class="fa fa-circle-o"></i> <span>Customer</span>
                        </a>
                    </li>
                    <li class="<?= segment(2) == 'brand' ? 'active' : null ?>">
                        <a href="<?= base_url() ?>Master/brand">
                            <i class="fa fa-circle-o"></i> <span>Brand</span>
                        </a>
                    </li>
                    <li class="<?= segment(2) == 'iso' ? 'active' : null ?>">
                        <a href="<?= base_url() ?>Master/iso">
                            <i class="fa fa-circle-o"></i> <span>Iso</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="treeview <?= segment(1) == 'Sample' ? 'active menu-open' : null ?>">
                <a href="#">
                    <i class="fa fa-tag"></i> <span>Sample</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?= segment(2) == 'head' ? 'active' : null ?>">
                        <a href="<?= base_url() ?>Sample/head">
                            <i class="fa fa-circle-o"></i> <span>Head</span>
                        </a>
                    </li>
                    <li class="<?= segment(2) == 'dataDetail' ? 'active' : null ?>">
                        <a href="<?= base_url() ?>Sample/dataDetail">
                            <i class="fa fa-circle-o"></i> <span>Detail</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="<?= segment(1) == 'Submition' ? 'active' : null ?>">
                <a href="<?= base_url() ?>Submition">
                    <i class="fa fa-file-text"></i> <span>Submition</span>
                </a>
            </li>
            <?php
            $role = $this->session->userdata('role');
            if ($role == 'ADMIN') { ?>
                <li class="<?= segment(1) == 'User' ? 'active' : null ?>">
                    <a href="<?= base_url() ?>User">
                        <i class="fa fa-user"></i> <span>User</span>
                    </a>
                </li>
            <?php } ?>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>