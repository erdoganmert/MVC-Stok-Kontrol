<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Ürün Rapor Listesi</h3>

                        <div class="box-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control pull-right"
                                       placeholder="Search">

                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </div>
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


                                    $toplam_alinan_urun = $this->model('reportsModel')->girenAdet($value['id']);
                                    $toplam_satilan_urun = $this->model('reportsModel')->cikanAdet($value['id']);
                                    $kalan_urun = $toplam_alinan_urun - $toplam_satilan_urun;


                                    $toplam_giren = $this->model('reportsModel')->girenUrunToplam($value["id"]);
                                    $toplam_cikan = $this->model('reportsModel')->cikanUrunToplam($value["id"]);
                                    $toplam_kalan = $toplam_cikan - $toplam_giren;
                                    if($toplam_kalan > 0){
                                        $toplam_kalan = "+".$toplam_kalan;
                                    }
                                    ?>
                                    <tr>

                                        <td><?=$value['id'];?></td>
                                        <td><?=$value['ad'];?></td>
                                        <td><?=$toplam_alinan_urun?></td>
                                        <td><?=$toplam_satilan_urun?></td>
                                        <td><?=$kalan_urun?></td>
                                        <td><?=$toplam_giren?> ₺</td>
                                        <td><?=$toplam_cikan?> ₺</td>
                                        <td><?=$toplam_kalan?> ₺</td>



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