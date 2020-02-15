<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <?php
                Helper::flashDataView("statu");
                ?>
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Üyeler Listesi</h3>

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
                                <th>Ad Soyad</th>
                                <th>İşlemler</th>

                            </tr>

                            <?php
                            if (count($params['data']) != 0) {
                                foreach ($params['data'] as $key => $value) {
                                    ?>
                                    <tr>
                                        <td><?=$value['id'];?></td>
                                        <td><?=$value['ad'];?></td>
                                        <td>
                                            <a href="<?=SITE_URL?>/kullanici/edit/<?=$value["id"]?>" class="btn btn-primary">Düzenle</a>
                                            <a href="<?=SITE_URL?>/kullanici/delete/<?=$value['id'];?>" class="btn btn-danger" style="width: 73px;">Sil</a>
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