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
                        <h3 class="box-title"><?=$params["data"]["ad"]?></h3>
                    </div>



                    <form role="form" action="<?= SITE_URL ?>/kullanici/update/<?=$params["data"]["id"]?>" method="post" enctype="multipart/form-data">


                        <div class="box-body">
                            <div class="form-group">
                                <img src="data:image/jpeg;base64,<?=base64_encode($params["data"]['resim']);?>" style="width: 10%">
                            </div>
                        </div>

                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Fotoğraf</label>
                                <input type="file" class="form-control" name="fotograf" value="">
                            </div>
                        </div>

                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Ad Soyad</label>
                                <input type="text" class="form-control" name="ad" value="<?=$params["data"]["ad"]?>">
                            </div>
                        </div>

                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Mail</label>
                                <input type="text" class="form-control" name="mail" value="<?=$params["data"]["mail"]?>">
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
                                    <input type="checkbox" <?php if(in_array($key,explode(",",$params["data"]["izinler"]))) {echo "checked";} ?> name="izinler[]" value="<?= $key ?>"> <?= $value ?> <br>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary" style="margin-top: 5px;">Düzenle
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
