<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="data:image/jpeg;base64,<?=base64_encode($this->myUserInfo['resim']);?>" style="height: 40px;" class="img-circle" alt="User Image">

            </div>
            <div class="pull-left info">
                <p><?= $this->myUserInfo['ad']; ?></p>
            </div>
        </div>

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MENÜ</li>
            <?php if ($this->model('uyeModel')->izinler($this->myUserId, 0)) { ?>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-th"></i>
                    <span>KATEGORİLER</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?=SITE_URL?>/category/create"><i class="fa fa-circle-o"></i> Yeni Kategori Ekle</a></li>
                    <li><a href="<?=SITE_URL?>/category/"><i class="fa fa-circle-o"></i> Kategori Listesi</a></li>

                </ul>
            </li>
            <?php } ?>

            <?php if ($this->model('uyeModel')->izinler($this->myUserId, 1)) { ?>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-product-hunt"></i>
                    <span>ÜRÜNLER</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?=SITE_URL?>/product/create"><i class="fa fa-circle-o"></i> Yeni Ürün Ekle</a></li>
                    <li><a href="<?=SITE_URL?>/product/"><i class="fa fa-circle-o"></i> Ürün Listesi</a></li>

                </ul>
            </li>
            <?php } ?>

            <?php if ($this->model('uyeModel')->izinler($this->myUserId, 2)) { ?>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-id-card"></i>
                    <span>MÜŞTERİLER</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?=SITE_URL?>/customers/create"><i class="fa fa-circle-o"></i>Yeni Müşteri Ekle</a></li>
                    <li><a href="<?=SITE_URL?>/customers/"><i class="fa fa-circle-o"></i>Müşteri Listesi</a></li>

                </ul>
            </li>
            <?php } ?>

            <?php if ($this->model('uyeModel')->izinler($this->myUserId, 3)) { ?>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-cubes"></i>
                    <span>STOK İŞLEMLERİ</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?=SITE_URL?>/stok/create"><i class="fa fa-circle-o"></i>Yeni Stok İşlemi Ekle</a></li>
                    <li><a href="<?=SITE_URL?>/stok/"><i class="fa fa-circle-o"></i>Stok İşlem Listesi</a></li>

                </ul>
            </li>
            <?php } ?>

            <?php if ($this->model('uyeModel')->izinler($this->myUserId, 4)) { ?>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-money"></i>
                    <span>KASA</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?=SITE_URL?>/kasa/create"><i class="fa fa-circle-o"></i> Yeni Kasa Ekle</a></li>
                    <li><a href="<?=SITE_URL?>/kasa/"><i class="fa fa-circle-o"></i> Kasa Listesi</a></li>

                </ul>
            </li>
            <?php } ?>

            <?php if ($this->model('uyeModel')->izinler($this->myUserId, 5)) { ?>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-tag"></i>
                    <span>FATURALAR</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?=SITE_URL?>/fatura/create"><i class="fa fa-circle-o"></i> Yeni Fatura Ekle</a></li>
                    <li><a href="<?=SITE_URL?>/fatura/"><i class="fa fa-circle-o"></i> Fatura Listesi</a></li>

                </ul>
            </li>
            <?php } ?>

            <?php if ($this->model('uyeModel')->izinler($this->myUserId, 6)) { ?>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-pie-chart"></i>
                    <span>RAPORLAR</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?=SITE_URL?>/reports/customers"><i class="fa fa-circle-o"></i>Müşteri Raporları</a></li>
                    <li><a href="<?=SITE_URL?>/reports/products"><i class="fa fa-circle-o"></i>Ürün Raporları</a></li>
                    <li><a href="<?=SITE_URL?>/reports/kasa"><i class="fa fa-circle-o"></i>Kasa Raporları</a></li>
                    <li><a href="<?=SITE_URL?>/reports/date"><i class="fa fa-circle-o"></i>Tarih Bazlı Raporlama</a></li>

                </ul>
            </li>
            <?php } ?>

            <?php if ($this->model('uyeModel')->izinler($this->myUserId, 7)) { ?>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span>KULLANICILAR</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?=SITE_URL?>/kullanici/create"><i class="fa fa-circle-o"></i> Yeni Kullanıcı Ekle</a></li>
                    <li><a href="<?=SITE_URL?>/kullanici/"><i class="fa fa-circle-o"></i> Kullanıcı Listesi</a></li>

                </ul>
            </li>
            <?php } ?>

            <li><a href="<?=SITE_URL?>/logout"><i class="fa fa-circle-o text-red"></i> <span>Çıkış</span></a></li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>