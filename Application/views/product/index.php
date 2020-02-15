<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <a href="<?=SITE_URL?>/excel/exportProduct" class="btn btn-info">Excell olarak Kaydet</a>
                <?=Helper::flashDataView("statu")?>
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Ürün Listesi</h3>

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
                                <th>Kategori</th>

                                <th>Tarih</th>
                                <th>İşlemler</th>
                               

                            </tr>

                            <?php

                            if (count($params['data']) != 0) {
                                foreach ($params['data'] as $key => $value) {
                                    $kategori = $this->model("categoryModel")->getData($value["kategori_id"]);
                                    ?>

                                    <tr>
                                        <td style="vertical-align: center;"><?=$value['id'];?></td>
                                        <td><?=$value['ad'];?></td>
                                        <td><?=$kategori["ad"]?></td>

                                        <td><?=$value['tarih']?></td>
                                        <td>
                                            <a href="<?=SITE_URL?>/product/edit/<?=$value["id"]?>" class="btn btn-primary" style="height: 30px; margin-bottom: 10px;">Düzenle</a>
                                            <a href="<?=SITE_URL?>/product/delete/<?=$value['id'];?>" class="btn btn-danger" style="height: 30px; width: 73px; margin-bottom: 10px;">Sil</a>
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