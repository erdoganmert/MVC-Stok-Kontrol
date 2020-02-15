<?php

class Customers extends Controller
{
    public function index()
    {
        if (!$this->sessionManager->isLogged()) {
            Helper::reDirect(SITE_URL);
            die();
        }
        if (!$this->model('uyeModel')->izinler($this->myUserId, 2)) {
            Helper::reDirect(SITE_URL);
            die();
        }
        $data = $this->model("customersModel")->listView();
        $this->render("site/header");
        $this->render("site/sidebar");
        $this->render("customers/index", ["data" => $data]);
        $this->render("site/footer");
    }

    public function send()
    {
        if (!$this->sessionManager->isLogged()) {
            Helper::reDirect(SITE_URL);
            die();
        }
        if (!$this->model('uyeModel')->izinler($this->myUserId, 2)) {
            Helper::reDirect(SITE_URL);
            die();
        }

        if ($_POST) {

                $ad = Helper::cleaner($_POST["ad"]);
                $soyad = Helper::cleaner($_POST["soyad"]);
                $mail = Helper::cleaner($_POST["mail"]);
                $telefon = Helper::cleaner($_POST["telefon"]);
                $adres = Helper::cleaner($_POST["adres"]);
                $tc = Helper::cleaner($_POST["tc"]);
                $notu = Helper::cleaner($_POST["notu"]);
                $sirket = Helper::cleaner($_POST["sirket"]);
            if ($ad != "" and $soyad != "") {

                $insert = $this->model("customersModel")->create($ad,$soyad,$mail,$telefon,$adres,$tc,$notu,$sirket);

                if($insert)
                {
                    Helper::flashData("statu","Müşteri başarıyla eklendi");
                    Helper::reDirect(SITE_URL . "/customers/create");
                }
                else{
                    Helper::flashData("statu","Müşteri eklenemedi.");
                    Helper::reDirect(SITE_URL . "/customers/create");
                }

            } else {
                Helper::flashData("statu", "Müşteri ad ve soyadı boş bırakılamaz");
                Helper::reDirect(SITE_URL . "/customers/create");
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
        if (!$this->model('uyeModel')->izinler($this->myUserId, 2)) {
            Helper::reDirect(SITE_URL);
            die();
        }
        $this->render("site/header");
        $this->render("site/sidebar");
        $this->render("customers/create");
        $this->render("site/footer");
    }

    public function edit($id)
    {

        if (!$this->sessionManager->isLogged()) {
            Helper::reDirect(SITE_URL);
            die();
        }
        if (!$this->model('uyeModel')->izinler($this->myUserId, 2)) {
            Helper::reDirect(SITE_URL);
            die();
        }
        $data = $this->model("customersModel")->getData($id);
        $this->render("site/header");
        $this->render("site/sidebar");
        $this->render("customers/edit", ["data" => $data]);
        $this->render("site/footer");
    }

    public function update($id)
    {
        $id = $id[0];
        if (!$this->sessionManager->isLogged()) {
            Helper::reDirect(SITE_URL);
            die();
        }
        if (!$this->model('uyeModel')->izinler($this->myUserId, 2)) {
            Helper::reDirect(SITE_URL);
            die();
        }

        if ($_POST) {

            $ad = Helper::cleaner($_POST["ad"]);
            $soyad = Helper::cleaner($_POST["soyad"]);
            $mail = Helper::cleaner($_POST["mail"]);
            $telefon = Helper::cleaner($_POST["telefon"]);
            $adres = Helper::cleaner($_POST["adres"]);
            $tc = Helper::cleaner($_POST["tc"]);
            $notu = Helper::cleaner($_POST["notu"]);
            $sirket = Helper::cleaner($_POST["sirket"]);
            if ($ad != "" and $soyad != "") {

                $update = $this->model("customersModel")->updateCustomer($id,$ad,$soyad,$mail,$telefon,$adres,$tc,$notu,$sirket);

                if($update)
                {
                    Helper::flashData("statu","Müşteri başarıyla düzenlendi");
                    Helper::reDirect(SITE_URL . "/customers/edit/".$id);
                }
                else{
                    Helper::flashData("statu","Müşteri düzenlenemedi.");
                    Helper::reDirect(SITE_URL . "/customers/edit".$id);
                }

            } else {
                Helper::flashData("statu", "Müşteri ad ve soyadı boş bırakılamaz");
                Helper::reDirect(SITE_URL . "/customers/edit".$id);
            }
        } else {
            exit("Yasaklı giriş");
        }
    }

    public function delete($id)
    {
        $id = $id[0];
        if (!$this->sessionManager->isLogged()) {
            Helper::reDirect(SITE_URL);
            die();
        }
        if (!$this->model('uyeModel')->izinler($this->myUserId, 2)) {
            Helper::reDirect(SITE_URL);
            die();
        }

        $delete = $this->model("customersModel")->deleteCustomer($id);

        if($delete)
        {
            Helper::flashData("statu","Müşteri başarıyla silindi");
            Helper::reDirect(SITE_URL . "/customers/");
        }else{
            Helper::flashData("statu","Müşteri silinemedi");
            Helper::reDirect(SITE_URL . "/customers/");
        }
    }
}