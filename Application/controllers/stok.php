<?php

class Stok extends Controller
{
    public function index()
    {
        if (!$this->sessionManager->isLogged()) {
            Helper::reDirect(SITE_URL);
            die();
        }
        if (!$this->model('uyeModel')->izinler($this->myUserId, 3)) {
            Helper::reDirect(SITE_URL);
            die();
        }
        $data = $this->model("stokModel")->listView();
        $this->render("site/header");
        $this->render("site/sidebar");
        $this->render("stok/index", ["data" => $data]);
        $this->render("site/footer");

    }

    public function create()
    {
        if (!$this->sessionManager->isLogged()) {
            Helper::reDirect(SITE_URL);
            die();
        }
        if (!$this->model('uyeModel')->izinler($this->myUserId, 3)) {
            Helper::reDirect(SITE_URL);
            die();
        }

        $urunler    = $this->model("productModel")->listView();
        $musteriler = $this->model("customersModel")->listView();
        $kasalar    = $this->model("kasaModel")->listView();
        $this->render("site/header");
        $this->render("site/sidebar");
        $this->render("stok/create", ["urunler" => $urunler, "musteriler" => $musteriler,"kasalar" =>$kasalar]);
        $this->render("site/footer");
    }

    public function send()
    {
        if (!$this->sessionManager->isLogged()) {
            Helper::reDirect(SITE_URL);
            die();
        }
        if (!$this->model('uyeModel')->izinler($this->myUserId, 3)) {
            Helper::reDirect(SITE_URL);
            die();
        }
        if ($_POST) {
            $urun_id = intval($_POST["urun_id"]);
            $musteri_id = intval($_POST["musteri_id"]);
            $islem_tipi = intval($_POST["islem_tipi"]);
            $adet = intval($_POST["adet"]);
            $fiyat = Helper::cleaner($_POST["fiyat"]);
            $kasa_id =intval($_POST['kasa_id']);

            if ($adet != 0 and $fiyat != "") {
                $insert = $this->model("stokModel")->create($urun_id, $musteri_id, $islem_tipi, $adet, $fiyat,$kasa_id);
                if ($insert) {
                    Helper::flashData("statu", "Ürün başarı ile eklendi.");
                    Helper::reDirect(SITE_URL . "/stok/create");
                } else {
                    Helper::flashData("statu", "Ürün eklenemedi.");
                    Helper::reDirect(SITE_URL . "/stok/create");
                }

            } else {
                Helper::flashData("statu", "Ürün fiyatı ve adeti boş bırakılamaz");
                Helper::reDirect(SITE_URL . "/stok/create");
            }

        } else {
            exit("Yasaklı Giriş");
        }
    }

    public function edit($id)
    {
        $id = $id[0];
        if (!$this->sessionManager->isLogged()) {
            Helper::reDirect(SITE_URL);
            die();
        }
        if (!$this->model('uyeModel')->izinler($this->myUserId, 3)) {
            Helper::reDirect(SITE_URL);
            die();
        }
        $data = $this->model("stokModel")->getData($id);
        $urunler = $this->model("productModel")->listView();
        $musteriler = $this->model("customersModel")->listView();
        $kasalar    = $this->model("kasaModel")->listView();
        $this->render("site/header");
        $this->render("site/sidebar");
        $this->render("stok/edit", ["data" => $data, "urunler" => $urunler, "musteriler"=>$musteriler,"kasalar" =>$kasalar]);
        $this->render("site/footer");
    }

    public function update($id)
    {
        if (!$this->sessionManager->isLogged()) {
            Helper::reDirect(SITE_URL);
            die();
        }
        if (!$this->model('uyeModel')->izinler($this->myUserId, 3)) {
            Helper::reDirect(SITE_URL);
            die();
        }

        $id = $id[0];
        if ($_POST) {
            $urun_id = intval($_POST["urun_id"]);
            $musteri_id = intval($_POST["musteri_id"]);
            $islem_tipi = intval($_POST["islem_tipi"]);
            $adet = intval($_POST["adet"]);
            $fiyat = Helper::cleaner($_POST["fiyat"]);
            $kasa_id =intval($_POST['kasa_id']);

            if ($adet != 0 and $fiyat != "") {
                $insert = $this->model("stokModel")->update($id,$urun_id, $musteri_id, $islem_tipi, $adet, $fiyat,$kasa_id);
                if ($insert) {
                    Helper::flashData("statu", "Ürün başarı ile düzenlendi.");
                    Helper::reDirect(SITE_URL . "/stok/edit/".$id);
                } else {
                    Helper::flashData("statu", "Ürün eklenemedi.");
                    Helper::reDirect(SITE_URL . "/stok/edit/".$id);
                }

            } else {
                Helper::flashData("statu", "Ürün fiyatı ve adeti boş bırakılamaz");
                Helper::reDirect(SITE_URL . "/stok/edit/".$id);
            }

        } else {
            exit("Yasaklı Giriş");
        }
    }

    public function delete($id)
    {
        if (!$this->sessionManager->isLogged()) {
            Helper::reDirect(SITE_URL);
            die();
        }
        if (!$this->model('uyeModel')->izinler($this->myUserId, 3)) {
            Helper::reDirect(SITE_URL);
            die();
        }
        $id = $id[0];
        $delete = $this->model("stokModel")->delete($id);
        if ($delete) {
            Helper::flashData("statu", "Ürün başarı ile silindi.");
            Helper::reDirect(SITE_URL . "/stok");
        } else {
            Helper::flashData("statu", "Ürün silinemedi.");
            Helper::reDirect(SITE_URL . "/stok");
        }

    }

}