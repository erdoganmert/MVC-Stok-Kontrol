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
                        <h3 class="box-title">Yeni Kullanıcı Ekle</h3>
                    </div>

                    <form role="form" action="<?= SITE_URL ?>/kullanici/send" method="post" enctype="multipart/form-data">

                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Fotoğraf</label>
                                <input type="file" class="form-control" name="fotograf">
                            </div>
                        </div>

                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Ad Soyad</label>
                                <input type="text" class="form-control" name="ad">
                            </div>
                        </div>

                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Mail</label>
                                <input type="text" class="form-control" name="mail">
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Parola</label>
                                <input type="password" class="form-control" name="parola">
                            </div>
                        </div>

                        <div class="box-body">
                            <div class="form-group">
                                <label>İzinler</label><br>
                                <?php foreach (IZINLER as $key => $value) {
                                    ?>
                                    <input type="checkbox" name="izinler[]" value="<?= $key ?>"> <?= $value ?> <br>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary" style="margin-top: 5px;">Ekle
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
</div>
</section>
</div>
