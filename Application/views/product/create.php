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
                        <h3 class="box-title">Yeni Ürün Ekle</h3>
                    </div>


                    <form role="form" action="<?= SITE_URL ?>/product/send" method="post">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Ürün Adı</label>
                                <input type="text" class="form-control" name="ad">
                            </div>
                            <div class="form-group">
                                <label>Ürün Kategorisi</label>
                                <select name="kategori_id" class="form-control">
                                    <option>Kategori Seçiniz</option>
                                    <?php foreach ($params['category'] as $key => $value) {
                                        ?>
                                        <option value="<?=$value['id']?>"><?= $value['ad'] ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>

                            </div>
                            <div class="form-group">
                                <label style="display:block">Ürün Özellikleri</label>
                                <button id="ozellik_ekle" class="btn btn-info" type="button">Yeni Özellik Ekle</button>
                                <div id="urunOzellikAlani"></div>

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

<script src="http://localhost/mvcstok/public/bower_components/jquery/dist/jquery.min.js"></script>

<script>
    $('#ozellik_ekle').click(function () {

        var i = $('.ozellik_adi').length;
        var temp = '<div class="col-md-6"><label>Ürün Özellik Adı</label><input type="text" class="form-control ozellik_adi" name="ozellik['+i+'][name]"></div>' +
            '<div class="col-md-6"><label>Ürün Özellik Değeri</label><input type="text" class="form-control" name="ozellik['+i+'][value]"></div>';

        $('#urunOzellikAlani').append(temp);
        i++;
    });

</script>