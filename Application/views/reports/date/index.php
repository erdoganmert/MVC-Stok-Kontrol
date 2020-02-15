<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header" style="display: flex;">
                        <span><h3 class="box-title">Tarih Bazlı Raporlama</h3></span>
                        <form action="" method="get" class="col-md-6" style="margin-left: auto;">
                            <div class="box-tools col-md-12">
                                <div class="input-group input-group-sm" style=" display: flex;">
                                    <input type="date" name="start_date" class="form-control pull-right" >
                                    <input type="date" name="end_date" class="form-control pull-right" >
                                    <div class="input-group-btn">
                                        <button type="submit" class="btn btn-default"><i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tr>
                                <th>ID</th>
                                <th>Ürün Adı</th>
                                <th>Toplam Alınan Ürün</th>
                                <th>Toplam Satılan Ürün</th>
                                <th>Kalan Ürün</th>
                                <th>Toplam Alım Fiyatı</th>
                                <th>Toplam Satış Fİyatı</th>
                                <th>Kar - Zarar</th>

                            </tr>

                            <?php
                            if (count($params['data']) != 0) {
                                foreach ($params['data'] as $key => $value) {

                                    $urunler = $this->model("productModel")->getData($value["urun_id"]);
                                    $toplam_alinan_urun = $this->model('reportsModel')->girenAdet($value['urun_id']);
                                    $toplam_satilan_urun = $this->model('reportsModel')->cikanAdet($value['urun_id']);
                                    $kalan_urun = $toplam_alinan_urun - $toplam_satilan_urun;


                                    $toplam_giren = $this->model('reportsModel')->girenUrunToplam($value["urun_id"]);
                                    $toplam_cikan = $this->model('reportsModel')->cikanUrunToplam($value["urun_id"]);
                                    $toplam_kalan = $toplam_cikan - $toplam_giren;
                                    if ($toplam_kalan > 0) {
                                        $toplam_kalan = "+" . $toplam_kalan;
                                    }
                                    ?>
                                    <tr>

                                        <td><?= $value['id']; ?></td>
                                        <td><?= $urunler['ad'] ?></td>
                                        <td><?= $toplam_alinan_urun ?></td>
                                        <td><?= $toplam_satilan_urun ?></td>
                                        <td><?= $kalan_urun ?></td>
                                        <td><?= $toplam_giren ?> ₺</td>
                                        <td><?= $toplam_cikan ?> ₺</td>
                                        <td><?= $toplam_kalan ?> ₺</td>


                                    </tr>
                                    <?php
                                }

                            }
                            ?>


                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>


            </div>
    </section>
</div>