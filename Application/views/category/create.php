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
                        <h3 class="box-title">Yeni Kategori Ekle</h3>
                    </div>



                    <form role="form" action="<?= SITE_URL ?>/category/send" method="post">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Kategori Adı</label>
                                <input type="text" class="form-control" name="ad"
                                       placeholder="Kategori Adını Giriniz..">
                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary" style="margin-top: 5px;">Ekle</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
