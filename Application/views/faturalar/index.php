<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Fatura Listesi</h3>

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
                                <th>Fatura No </th>
                                <th>Müşteri</th>
                                <th>Tutar</th>
                                <th>İşlemler</th>

                            </tr>

                            <?php
                            if (count($params['data']) != 0) {
                                foreach ($params['data'] as $key => $value) {
                                    $musteri = $this->model('customersModel')->getData($value['musteri_id']);
                                    ?>
                                    <tr>
                                        <td><?=$value['id'];?></td>
                                        <td><?=$value['fatura_no'];?></td>
                                        <td><?=$musteri['ad']?> <?=$musteri['soyad']?></td>
                                        <td><?=$value['tutar']?></td>
                                        <td>
                                            <a href="<?=SITE_URL?>/fatura/edit/<?=$value["id"]?>" class="btn btn-primary">Düzenle</a>
                                            <a href="<?=SITE_URL?>/fatura/delete/<?=$value['id'];?>" class="btn btn-danger" style="width: 73px;">Sil</a>
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