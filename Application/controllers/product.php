<?php

class Product extends Controller
{
    public function index()
    {
        if (!$this->sessionManager->isLogged()) {
            Helper::reDirect(SITE_URL);
            die();
        }
        if (!$this->model('uyeModel')->izinler($this->myUserId, 1)) {
            Helper::reDirect(SITE_URL);
            die();
        }
        $data = $this->model("productModel")->listView();
        $this->render("site/header");
        $this->render("site/sidebar");
        $this->render("product/index", ['data' => $data]);
        $this->render("site/footer");
    }

    public function send()
    {
        if (!$this->sessionManager->isLogged()) {
            Helper::reDirect(SITE_URL);
            die();
        }
        if (!$this->model('uyeModel')->izinler($this->myUserId, 1)) {
            Helper::reDirect(SITE_URL);
            die();
        }
        if ($_POST) {
            $urun_adi = Helper::cleaner($_POST['ad']);
            $kategori_id = intval($_POST['kategori_id']);
            $ozellikler = json_encode($_POST['ozellik'], JSON_UNESCAPED_UNICODE);
            if (!$ad = "") {
                $insert = $this->model("productModel")->create($urun_adi, $kategori_id, $ozellikler);
                if ($insert) {
                    Helper::flashData("statu", "Ürün başarı ile eklendi.");
                    Helper::reDirect(SITE_URL . "/product/create");

                } else {
                    Helper::flashData("statu", "Ürün eklenemedi.");
                    Helper::reDirect(SITE_URL . "/product/create");
                }
            } else {
                Helper::flashData("statu", "Ürün adı boş bırakılamaz");
                Helper::reDirect(SITE_URL . "/product/create");
            }
        } else {
            exit("Yasaklı giriş");
        }
    }

    public function create()
    {
        if (!$this->sessionManager->isLogged()) {
            Helper::reDirect(SITE_URL);
            die();
        }
        if (!$this->model('uyeModel')->izinler($this->myUserId, 1)) {
            Helper::reDirect(SITE_URL);
            die();
        }
        $category = $this->model("categoryModel")->listView();
        $this->render("site/header");
        $this->render("site/sidebar");
        $this->render("product/create", ['category' => $category]);
        $this->render("site/footer");

    }

    public function edit($id)
    {
        if (!$this->sessionManager->isLogged()) {
            Helper::reDirect(SITE_URL);
            die();
        }
        if (!$this->model('uyeModel')->izinler($this->myUserId, 1)) {
            Helper::reDirect(SITE_URL);
            die();
        }
        $id = $id[0];
        $category = $this->model("categoryModel")->listView();
        $data = $this->model("productModel")->getData($id);
        $this->render("site/header");
        $this->render("site/sidebar");
        $this->render("product/edit", ['category' => $category, 'data' => $data]);
        $this->render("site/footer");

    }

    public function update($id)
    {
        $id = $id[0];
        if (!$this->sessionManager->isLogged()) {
            Helper::reDirect(SITE_URL);
            die();
        }
        if (!$this->model('uyeModel')->izinler($this->myUserId, 1)) {
            Helper::reDirect(SITE_URL);
            die();
        }
        if ($_POST) {
            $urun_adi = Helper::cleaner($_POST['ad']);
            $kategori_id = intval($_POST['kategori_id']);
            $ozellikler = json_encode($_POST['ozellik'], JSON_UNESCAPED_UNICODE);
            if (!$ad = "") {
                $update = $this->model("productModel")->updateProduct($id, $urun_adi, $kategori_id, $ozellikler);
                if ($update) {
                    Helper::flashData("statu", "Ürün başarı ile düzenlendi.");
                    Helper::reDirect(SITE_URL . "/product/edit/" . $id);

                } else {
                    Helper::flashData("statu", "Ürün düzenlenemedi.");
                    Helper::reDirect(SITE_URL . "/product/edit" . $id);
                }
            } else {
                Helper::flashData("statu", "Ürün adı boş bırakılamaz");
                Helper::reDirect(SITE_URL . "/product/edit" . $id);
            }
        }
    }

    public function delete($id)
    {
        $id = $id[0];
        if (!$this->sessionManager->isLogged()) {
            Helper::reDirect(SITE_URL);
            die();
        }
        if (!$this->model('uyeModel')->izinler($this->myUserId, 1)) {
            Helper::reDirect(SITE_URL);
            die();
        }
        $sil = $this->model("productModel")->deleteProduct($id);
        if ($sil) {
            Helper::flashData("statu", "Ürün başarı ile silindi.");
            Helper::reDirect(SITE_URL . "/product/");

        } else {
            Helper::flashData("statu", "Ürün silinemedi.");
            Helper::reDirect(SITE_URL . "/product/");
        }
    }

}