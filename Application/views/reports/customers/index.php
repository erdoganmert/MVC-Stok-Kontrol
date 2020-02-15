<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Müşteri Rapor Listesi</h3>

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
                                <th>TC</th>
                                <th>Ad Soyad</th>
                                <th>Gelir Faturası</th>
                                <th>Gider Faturası</th>
                                <th>Toplam Alınan Ürün</th>
                                <th>Toplam Satılan Ürün</th>
                                <th>Toplam Ödenen Para</th>
                                <th>Toplam Kazanılan Para</th>
                                <th>Kar - Zarar </th>




                            </tr>

                            <?php
                            if (count($params['data']) != 0) {
                                foreach ($params['data'] as $key => $value) {


                                    $gelir_faturasi = $this->model('reportsModel')->faturaGelir($value['id']);
                                    $gider_faturasi = $this->model('reportsModel')->faturaGider($value['id']);
                                    $toplam_alinan_urun = $this->model('reportsModel')->toplamAlinanUrun($value['id']);
                                    $toplam_satilan_urun = $this->model('reportsModel')->toplamSatilanUrun($value['id']);
                                    $kalan_urun = $toplam_alinan_urun - $toplam_satilan_urun;


                                    $toplam_giren = $this->model('reportsModel')->toplamOdenenPara($value["id"]);
                                    $toplam_cikan = $this->model('reportsModel')->toplamKazanilanPara($value["id"]);
                                    $toplam_kalan = ($toplam_cikan + $gelir_faturasi ) - ($toplam_giren + $gider_faturasi);
                                    if($toplam_kalan > 0){
                                        $toplam_kalan = "+".$toplam_kalan;
                                    }
                                    ?>
                                    <tr>

                                        <td><?=$value['id'];?></td>
                                        <td><?=$value['tc']?></td>
                                        <td><?=$value['ad'];?> <?=$value['soyad']?></td>
                                        <td><?=$gelir_faturasi?></td>
                                        <td><?=$gider_faturasi?></td>
                                        <td><?=$toplam_alinan_urun?></td>
                                        <td><?=$toplam_satilan_urun?></td>
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