<?php

class Kasa extends Controller
{
    public function index()
    {
        if (!$this->sessionManager->isLogged()) {
            Helper::reDirect(SITE_URL);
            die();
        }
        if (!$this->model('uyeModel')->izinler($this->myUserId, 4)) {
            Helper::reDirect(SITE_URL);
            die();
        }
        $data = $this->model("kasaModel")->listView();
        $this->render("site/header");
        $this->render("site/sidebar");
        $this->render("kasa/index", ["data" => $data]);
        $this->render("site/footer");
    }

    public function create()
    {
        if (!$this->sessionManager->isLogged()) {
            Helper::reDirect(SITE_URL);
            die();
        }
        if (!$this->model('uyeModel')->izinler($this->myUserId, 4)) {
            Helper::reDirect(SITE_URL);
            die();
        }
        $this->render("site/header");
        $this->render("site/sidebar");
        $this->render("kasa/create");
        $this->render("site/footer");
    }

    public function send()
    {
        if (!$this->sessionManager->isLogged()) {
            Helper::reDirect(SITE_URL);
            die();
        }
        if (!$this->model('uyeModel')->izinler($this->myUserId, 4)) {
            Helper::reDirect(SITE_URL);
            die();
        }
        if ($_POST) {
            $ad = Helper::cleaner($_POST['ad']);
            if ($ad != "") {
                $ekle = $this->model("kasaModel")->addKasa($ad);
                if ($ekle) {
                    Helper::flashData("statu", "Kasa başarı ile eklendi.");
                    Helper::reDirect(SITE_URL . "/kasa/create");
                } else {
                    Helper::flashData("statu", "Kasa eklenemedi.");
                    Helper::reDirect(SITE_URL . "/kasa/create");
                }
            } else {
                Helper::flashData("statu", "Kasa ismi boş bırakılamaz.");
                Helper::reDirect(SITE_URL . "/kasa/create");
            }
        }
    }

    public function edit($id)
    {
        $id = $id[0];
        if (!$this->sessionManager->isLogged()) {
            Helper::reDirect(SITE_URL);
            die();
        }
        if (!$this->model('uyeModel')->izinler($this->myUserId, 4)) {
            Helper::reDirect(SITE_URL);
            die();
        }
        $data = $this->model("kasaModel")->getData($id);
        $this->render("site/header");
        $this->render("site/sidebar");
        $this->render("kasa/edit", ["data" => $data]);
        $this->render("site/footer");
    }

    public function update($id)
    {
        $id = $id[0];
        if (!$this->sessionManager->isLogged()) {
            Helper::reDirect(SITE_URL);
            die();
        }
        if (!$this->model('uyeModel')->izinler($this->myUserId, 4)) {
            Helper::reDirect(SITE_URL);
            die();
        }
        if ($_POST) {
            $ad = Helper::cleaner($_POST['ad']);
            if ($ad != "") {
                $ekle = $this->model("kasaModel")->update($id, $ad);
                if ($ekle) {
                    Helper::flashData("statu", "Kasa başarı ile düzenlendi.");
                    Helper::reDirect(SITE_URL . "/kasa/edit/" . $id);
                } else {
                    Helper::flashData("statu", "Kasa düzenlenemedi.");
                    Helper::reDirect(SITE_URL . "/kasa/edit" . $id);
                }
            } else {
                Helper::flashData("statu", "Kasa ismi boş bırakılamaz.");
                Helper::reDirect(SITE_URL . "/kasa/edit/" . $id);
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
        if (!$this->model('uyeModel')->izinler($this->myUserId, 4)) {
            Helper::reDirect(SITE_URL);
            die();
        }
        $delete = $this->model("kasaModel")->delete($id);
        if ($delete) {
            Helper::flashData("statu", "Kasa başarı ile silindi.");
            Helper::reDirect(SITE_URL . "/kasa");
        } else {
            Helper::flashData("statu", "Kasa silinemedi");
            Helper::reDirect(SITE_URL . "/kasa");
        }

    }
}