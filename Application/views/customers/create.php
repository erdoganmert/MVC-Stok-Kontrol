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
                        <h3 class="box-title">Yeni Müşteri Ekle</h3>
                    </div>


                    <form role="form" action="<?= SITE_URL ?>/customers/send" method="post">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Ad</label>
                                <input type="text" class="form-control" name="ad">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Soyad</label>
                                <input type="text" class="form-control" name="soyad">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Mail</label>
                                <input type="text" class="form-control" name="mail">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Telefon</label>
                                <input type="text" class="form-control" name="telefon">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Adres</label>
                                <input type="text" class="form-control" name="adres">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">TC</label>
                                <input type="text" class="form-control" name="tc">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Not</label>
                                <input type="text" class="form-control" name="notu">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Şirket</label>
                                <input type="text" class="form-control" name="sirket">
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
