<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <a href="<?=SITE_URL?>/excel/exportCustomers" class="btn btn-info">Excell olarak Kaydet</a>
                <?=Helper::flashDataView("statu")?>
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Müşteri Listesi</h3>

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
                                <th>Ad</th>
                                <th>Soyad</th>
                                <th>Mail</th>
                                <th>Telefon</th>


                                <th>Tarih</th>
                                <th>İşlemler</th>


                            </tr>

                            <?php

                            if (count($params['data']) != 0) {
                                foreach ($params['data'] as $key => $value) {
                                    ?>

                                    <tr>
                                        <td style="vertical-align: center;"><?=$value['id'];?></td>
                                        <td><?=$value["ad"];?></td>
                                        <td><?=$value["soyad"]?></td>
                                        <td><?=$value["mail"]?></td>
                                        <td><?=$value["telefon"]?></td>
                                        <td><?=$value['tarih']?></td>
                                        <td>
                                            <a href="<?=SITE_URL?>/customers/edit/<?=$value["id"]?>" class="btn btn-primary" style="height: 30px; margin-bottom: 10px;">Düzenle</a>
                                            <a href="<?=SITE_URL?>/customers/delete/<?=$value['id'];?>" class="btn btn-danger" style="height: 30px; width: 73px; margin-bottom: 10px;">Sil</a>
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