<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Stok İşlemleri Listesi</h3>

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
                                <th>İşlem tipi</th>
                                <th>Adet</th>
                                <th>Toplam Fiyat</th>
                                <th>Kasa</th>
                                <th>İşlemler</th>

                            </tr>

                            <?php
                            if (count($params['data']) != 0) {
                                foreach ($params['data'] as $key => $value) {
                                    $urunler = $this->model("productModel")->getData($value["urun_id"]);
                                    $kasalar = $this->model("kasaModel")->getData($value["kasa_id"]);
                                    if ($value['islem_tipi'] == 0) {
                                        $islem = "Stok Giriş";
                                        $toplam_fiyat = -($value['adet']*$value['fiyat']);
                                    } else {
                                        $islem = "Stok Çıkış";
                                        $toplam_fiyat = $value['adet']*$value['fiyat'];
                                    }

                                    ?>
                                    <tr>
                                        <td><?= $value['id'];?></td>
                                        <td><?= $urunler['ad'];?></td>
                                        <th><?=$islem?></th>
                                        <th><?=$value['adet']?></th>
                                        <td><?=$toplam_fiyat?> ₺</td>
                                        <td><?=$kasalar["ad"]?></td>
                                        <td>
                                            <a href="<?= SITE_URL ?>/stok/edit/<?= $value["id"] ?>"
                                               class="btn btn-primary">Düzenle</a>
                                            <a href="<?= SITE_URL ?>/stok/delete/<?= $value['id']; ?>"
                                               class="btn btn-danger" style="width: 73px;">Sil</a>
                                        </td>

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