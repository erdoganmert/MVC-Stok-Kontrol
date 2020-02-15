<?php

class Category extends Controller
{
    public function index()
    {
        if (!$this->sessionManager->isLogged()) {
            Helper::reDirect(SITE_URL);
            die();
        }
        if (!$this->model('uyeModel')->izinler($this->myUserId, 0)) {
            Helper::reDirect(SITE_URL);
            die();
        }
        $data = $this->model("categoryModel")->listView();
        $this->render("site/header");
        $this->render("site/sidebar");
        $this->render("category/index", ['data' => $data]);
        $this->render("site/footer");


    }

    public function create()
    {
        if (!$this->sessionManager->isLogged()) {
            Helper::reDirect(SITE_URL);
            die();
        }
        if (!$this->model('uyeModel')->izinler($this->myUserId, 0)) {
            Helper::reDirect(SITE_URL);
            die();
        }
        $this->render("site/header");
        $this->render("site/sidebar");
        $this->render("category/create");
        $this->render("site/footer");
    }

    public function send()
    {
        if (!$this->sessionManager->isLogged()) {
            Helper::reDirect(SITE_URL);
            die();
        }
        if (!$this->model('uyeModel')->izinler($this->myUserId, 0)) {
            Helper::reDirect(SITE_URL);
            die();
        }
        if ($_POST) {
            $ad = Helper::cleaner($_POST["ad"]);
            if ($ad != "") {
                $ekle = $this->model("categoryModel")->addCategory($ad);
                if ($ekle) {
                    Helper::flashData("statu", "Kategori başarı ile eklendi.");
                    Helper::reDirect(SITE_URL . "/category/create/");

                } else {
                    Helper::flashData("statu", "Kategori eklenemedi.");
                    Helper::reDirect(SITE_URL . "/category/create/");
                }
            } else {
                Helper::flashData("statu", "Lütfen tüm alanları doldurunuz.");
                Helper::reDirect(SITE_URL . "/category/create/");

            }
        } else {
            exit("Giriş yok");
        }
    }


    public function edit($id)
    {

        if (!$this->sessionManager->isLogged()) {
            Helper::reDirect(SITE_URL);
            die();
        }
        if (!$this->model('uyeModel')->izinler($this->myUserId, 0)) {
            Helper::reDirect(SITE_URL);
            die();
        }
        $data = $this->model("categoryModel")->getData($id);
        $this->render("site/header");
        $this->render("site/sidebar");
        $this->render("category/edit", ['data' => $data]);
        $this->render("site/footer");
    }

    public function delete($id)
    {
        if (!$this->sessionManager->isLogged()) {
            Helper::reDirect(SITE_URL);
            die();
        }
        if (!$this->model('uyeModel')->izinler($this->myUserId, 0)) {
            Helper::reDirect(SITE_URL);
            die();
        }
        $sil = $this->model("categoryModel")->deleteCategory($id);
        if ($sil) {
            Helper::flashData("statu", "Kategori başarı ile silindi.");
            Helper::reDirect(SITE_URL . "/category/");

        } else {
            Helper::flashData("statu", "Kategori silinemedi.");
            Helper::reDirect(SITE_URL . "/category/");
        }

    }

    public function update($id)
    {
        $id = $id[0];
        if (!$this->sessionManager->isLogged()) {
            Helper::reDirect(SITE_URL);
            die();
        }
        if (!$this->model('uyeModel')->izinler($this->myUserId, 0)) {
            Helper::reDirect(SITE_URL);
            die();
        }
        if ($_POST) {
            $ad = Helper::cleaner($_POST["ad"]);
            if ($ad != "") {
                $update = $this->model("categoryModel")->updateCategory($id, $ad);
                if ($update) {
                    Helper::flashData("statu", "Kategori başarı ile güncellendi.");
                    Helper::reDirect(SITE_URL . "/category/edit/" . $id);
                }
            } else {
                Helper::flashData("statu", "Kategori güncellenemedi.");
                Helper::reDirect(SITE_URL . "/category/edit" . $id);
            }
        }
    }
}