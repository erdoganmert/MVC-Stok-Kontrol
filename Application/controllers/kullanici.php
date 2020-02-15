<?php

class Kullanici extends Controller
{
    public function index()
    {
        if (!$this->sessionManager->isLogged()) {
            Helper::reDirect(SITE_URL);
            die();
        }
        if (!$this->model('uyeModel')->izinler($this->myUserId, 7)) {
            Helper::reDirect(SITE_URL);
            die();
        }
        $data = $this->model("uyeModel")->listView();
        $this->render("site/header");
        $this->render("site/sidebar");
        $this->render("uyeler/index", ["data" => $data]);
        $this->render("site/footer");
    }

    public function create()
    {
        if (!$this->sessionManager->isLogged()) {
            Helper::reDirect(SITE_URL);
            die();
        }
        if (!$this->model('uyeModel')->izinler($this->myUserId, 6)) {
            Helper::reDirect(SITE_URL);
            die();
        }
        $this->render("site/header");
        $this->render("site/sidebar");
        $this->render("uyeler/create");
        $this->render("site/footer");
    }

    public function send()
    {
        if ($_POST) {
            if (!$this->sessionManager->isLogged()) {
                Helper::reDirect(SITE_URL);
                die();
            }
            if (!$this->model('uyeModel')->izinler($this->myUserId, 6)) {
                Helper::reDirect(SITE_URL);
                die();
            }
            $ad = Helper::cleaner($_POST['ad']);
            $mail = Helper::cleaner($_POST['mail']);
            $parola = Helper::cleaner($_POST['parola']);
            $izinler = $_POST['izinler'];
            $resim_ismi = addslashes($_FILES['fotograf']['name']);
            $resim = file_get_contents($_FILES['fotograf']['tmp_name']);


            if ($ad != "" and $mail != "" and $parola != "") {
                $insert = $this->model("uyeModel")->create($ad, $mail, md5($parola), implode(",", $izinler), $resim_ismi, $resim);
                if ($insert) {
                    Helper::flashData("statu", "Kullanıcı başarıyla eklendi");
                    Helper::reDirect(SITE_URL . "/kullanici/create");
                } else {
                    Helper::flashData("statu", "Kullanıcı eklenemedi");
                    Helper::reDirect(SITE_URL . "/kullanici/create");
                }

            } else {
                Helper::flashData("statu", "Gerekli alanları doldurunuz");
                Helper::reDirect(SITE_URL . "/kullanici/create");
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
        if (!$this->model('uyeModel')->izinler($this->myUserId, 6)) {
            Helper::reDirect(SITE_URL);
            die();
        }
        $data = $this->model("uyeModel")->getData($id);
        $this->render("site/header");
        $this->render("site/sidebar");
        $this->render("uyeler/edit", ["data" => $data]);
        $this->render("site/footer");
    }

    public function update($id)
    {
        $id = $id[0];

        if (!$this->sessionManager->isLogged()) {
            Helper::reDirect(SITE_URL);
            die();
        }
        if (!$this->model('uyeModel')->izinler($this->myUserId, 6)) {
            Helper::reDirect(SITE_URL);
            die();
        }

        if ($_POST) {

            $ad = Helper::cleaner($_POST['ad']);
            $mail = Helper::cleaner($_POST['mail']);
            $parola = Helper::cleaner($_POST['parola']);
            $izinler = $_POST['izinler'];
            $resim_ismi = addslashes($_FILES['fotograf']['name']);
            $resim = file_get_contents($_FILES['fotograf']['tmp_name']);


            if ($ad != "" and $mail != "") {


                if ($parola == "") {
                    $data = $this->model("uyeModel")->getData($id);
                    $parola = $data['parola'];

                } else {
                    $parola = md5($parola);
                }
                $update = $this->model("uyeModel")->update($id, $ad, $mail, $parola, implode(",", $izinler), $resim_ismi, $resim);
                if ($update) {
                    Helper::flashData("statu", "Kullanıcı başarıyla düzenlendi");
                    Helper::reDirect(SITE_URL . "/kullanici/edit/" . $id);
                } else {
                    Helper::flashData("statu", "Kullanıcı düzenlenemedi");
                    Helper::reDirect(SITE_URL . "/kullanici/edit/" . $id);
                }

            } else {
                Helper::flashData("statu", "Gerekli alanları doldurunuz");
                Helper::reDirect(SITE_URL . "/kullanici/edit/" . $id);
            }
        } else {
            exit("Yasaklı giriş.");
        }


    }


    public function delete($id)
    {
        if (!$this->sessionManager->isLogged()) {
            Helper::reDirect(SITE_URL);
            die();
        }
        if (!$this->model('uyeModel')->izinler($this->myUserId, 6)) {
            Helper::reDirect(SITE_URL);
            die();
        }
        $id = $id[0];
        $delete = $this->model('uyeModel')->delete($id);
        if ($delete) {
            Helper::flashData("statu", "Kullanıcı başarı ile silindi");
            Helper::reDirect(SITE_URL . "/kullanici");
        } else {
            Helper::flashData("statu", "Kullanıcı silinemedi");
            Helper::reDirect(SITE_URL . "/kullanici");
        }
    }

}

