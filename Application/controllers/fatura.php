<?php

class Fatura extends Controller
{
    public function index()
    {
        if (!$this->sessionManager->isLogged()) {
            Helper::reDirect(SITE_URL);
            die();
        }
        if (!$this->model('uyeModel')->izinler($this->myUserId, 5)) {
            Helper::reDirect(SITE_URL);
            die();
        }
        $data = $this->model("faturaModel")->listView();
        $this->render("site/header");
        $this->render("site/sidebar");
        $this->render("faturalar/index", ['data' => $data]);
        $this->render("site/footer");
    }

    public function create()
    {
        if (!$this->sessionManager->isLogged()) {
            Helper::reDirect(SITE_URL);
            die();
        }
        if (!$this->model('uyeModel')->izinler($this->myUserId, 5)) {
            Helper::reDirect(SITE_URL);
            die();
        }
        $musteriler = $this->model("customersModel")->listView();
        $this->render("site/header");
        $this->render("site/sidebar");
        $this->render("faturalar/create", ['musteriler' => $musteriler]);
        $this->render("site/footer");
    }

    public function send()
    {
        if (!$this->sessionManager->isLogged()) {
            Helper::reDirect(SITE_URL);
            die();
        }
        if (!$this->model('uyeModel')->izinler($this->myUserId, 5)) {
            Helper::reDirect(SITE_URL);
            die();
        }
        if ($_POST) {
            $fatura_no = intval($_POST['fatura_no']);
            $musteri_id = intval($_POST['musteri_id']);
            $tutar = Helper::cleaner($_POST['tutar']);
            $aciklama = Helper::cleaner($_POST['aciklama']);
            $tip = intval($_POST['tip']);

            if ($musteri_id >= 0 and $fatura_no >= 0 and $tutar != "") {
                $insert = $this->model("faturaModel")->create($fatura_no, $musteri_id, $tutar, $aciklama, $tip);
                if ($insert) {
                    Helper::flashData("statu", "Fatura başarı ile eklendi.");
                    Helper::reDirect(SITE_URL . "/fatura/create");

                } else {
                    Helper::flashData("statu", "Fatura eklenemedi.");
                    Helper::reDirect(SITE_URL . "/fatura/create");
                }
            } else {
                Helper::flashData("statu", "Gerekli yerleri doldurunuz");
                Helper::reDirect(SITE_URL . "/fatura/create");
            }
        } else {
            exit("Yasaklı giriş");
        }
    }

    public function edit($id)
    {
        $id = $id[0];
        if (!$this->sessionManager->isLogged()) {
            Helper::reDirect(SITE_URL);
            die();
        }
        if (!$this->model('uyeModel')->izinler($this->myUserId, 5)) {
            Helper::reDirect(SITE_URL);
            die();
        }
        $musteriler = $this->model("customersModel")->listView();
        $data = $this->model("faturaModel")->getData($id);
        $this->render("site/header");
        $this->render("site/sidebar");
        $this->render("faturalar/edit", ['data' => $data, 'musteriler' => $musteriler]);
        $this->render("site/footer");
    }

    public function update($id)
    {
        $id = $id[0];

        if (!$this->sessionManager->isLogged()) {
            Helper::reDirect(SITE_URL);
            die();
        }
        if (!$this->model('uyeModel')->izinler($this->myUserId, 5)) {
            Helper::reDirect(SITE_URL);
            die();
        }
        if ($_POST) {
            $fatura_no = intval($_POST['fatura_no']);
            $musteri_id = intval($_POST['musteri_id']);
            $tutar = Helper::cleaner($_POST['tutar']);
            $aciklama = Helper::cleaner($_POST['aciklama']);
            $tip = intval($_POST['tip']);

            if ($musteri_id > 0 and $fatura_no > 0 and $tutar != "") {
                $update = $this->model("faturaModel")->update($id,$fatura_no, $musteri_id, $tutar, $aciklama, $tip);
                if ($update) {
                    Helper::flashData("statu", "Fatura başarı ile düzenlendi");
                    Helper::reDirect(SITE_URL . "/fatura/edit/" . $id);
                } else {
                    Helper::flashData("statu", "Fatura düzenlenemedi.");
                    Helper::reDirect(SITE_URL . "/fatura/edit/" . $id);
                }
            }else {
                Helper::flashData("statu", "Gerekli yerleri doldurunuz");
                Helper::reDirect(SITE_URL . "/fatura/create");
            }
        }
    }


    public function delete($id)
    {
        if (!$this->sessionManager->isLogged()) {
            Helper::reDirect(SITE_URL);
            die();
        }
        if (!$this->model('uyeModel')->izinler($this->myUserId, 5)) {
            Helper::reDirect(SITE_URL);
            die();
        }
        $id = $id[0];

        $delete = $this->model("faturaModel")->delete($id);
        if($delete)
        {
            Helper::flashData("statu", "Fatura başarıyla silindi.");
            Helper::reDirect(SITE_URL . "/fatura/");

        }else{
            Helper::flashData("statu", "Fatura silinemedi.");
            Helper::reDirect(SITE_URL . "/faturalar/index");
        }

    }
}
