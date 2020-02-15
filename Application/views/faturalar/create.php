<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <?php
                Helper::flashDataView("statu");
                ?>
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Yeni Fatura Ekle</h3>
                    </div>


                    <form role="form" action="<?= SITE_URL ?>/fatura/send" method="post">
                        <div class="box-body">

                            <div class="form-group">
                                <div class="col-md-6">
                                    <label for="exampleInputEmail1">Fatura Tipi</label>
                                    <select name="tip" id="" class="form-control">
                                        <option value="0">Gelir</option>
                                        <option value="1">Gider</option>
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label for="exampleInputEmail1">Müşteri Seçiniz</label>
                                    <select name="musteri_id" id="" class="form-control">
                                        <?php
                                        foreach ($params['musteriler'] as $key => $value) {
                                            ?>
                                            <option value="<?= $value['id'] ?>"><?= $value['ad'] ?> <?= $value['soyad'] ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-md-4">
                                    <label for="exampleInputEmail1">Fatura No</label>
                                    <input type="text" class="form-control" name="fatura_no">
                                </div>
                                <div class="col-md-4">
                                    <label for="exampleInputEmail1">Tutar</label>
                                    <input type="text" class="form-control" name="tutar">
                                </div>
                                <div class="col-md-4">
                                    <label for="exampleInputEmail1">Açıklaama</label>
                                    <input type="text" class="form-control" name="aciklama">
                                </div>
                            </div>


                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary" style="margin-top: 5px;">Ekle
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
