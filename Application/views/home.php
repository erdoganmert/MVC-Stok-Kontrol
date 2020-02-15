<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Hızlı Bakış
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3><?= $this->model("reportsModel")->toplamGelir() ?><sup style="font-size: 20px">₺</sup></h3>

                        <p>Toplam Gelir</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-arrow-down-a"></i>
                    </div>

                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3><?= $this->model("reportsModel")->toplamGider() ?><sup style="font-size: 20px">₺</sup></h3>

                        <p>Toplam Gider</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-arrow-up-a"></i>
                    </div>

                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3><?= $this->model("reportsModel")->toplamGelir() - $this->model("reportsModel")->toplamGider() ?>
                            <sup style="font-size: 20px">₺</sup></h3>

                        <p>Kar - Zarar</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>

                </div>
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
            <!-- Left col -->
            <section class="col-lg-12 connectedSortable">

                <!-- quick email widget -->
                <div class="box box-info">
                    <div class="box-header">
                        <i class="fa fa-product-hunt"></i>

                        <h3 class="box-title">Ürün Ara</h3>

                    </div>
                    <div class="box-body">
                        <form action="" method="post">
                            <div class="form-group">
                                <input type="text" class="form-control" name="ad" placeholder="Ürün Adı Giriniz..">
                            </div>
                            <div class="box-footer clearfix">
                                <button type="submit" class="pull-right btn btn-default">Ürün Getir
                                    <i class="fa fa-arrow-circle-right"></i></button>
                            </div>
                        </form>

                        <?php if ($_POST) {
                            if ($_POST['ad'] == "") {
                                echo '<div class="alert alert-danger">Lütfen Ürün Adı Giriniz.</div>';
                            } else {
                                $data = $this->model("productModel")->search($_POST['ad']);
                                if (count($data) != 0) {
                                    ?>
                                    <table class="table table-hover">
                                    <tr>
                                        <th>ID</th>
                                        <th>Ürün Adı</th>
                                        <th>Stok Giriş</th>
                                        <th>Stok Çıkış</th>
                                        <th>Stok Kalan</th>

                                    </tr>
                                    <?php

                                    foreach ($data as $key => $value) {

                                        $girenAdet = $this->model("reportsModel")->girenAdet($value['id']);
                                        $cikanAdet = $this->model("reportsModel")->cikanAdet($value['id']);
                                        $kalanAdet = $girenAdet - $cikanAdet;

                                        ?>
                                        <td><?= $value['id'] ?></td>
                                        <td><?= $value['ad'] ?></td>
                                        <td><?= $girenAdet ?></td>
                                        <td><?= $cikanAdet ?></td>
                                        <td><?= $kalanAdet ?></td>
                                        </table>
                                        <?php
                                    }
                                }

                            }
                        }

                        ?>

                    </div>


                </div>


            </section>
            <!-- /.Left col -->

        </div>
        <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
</div>