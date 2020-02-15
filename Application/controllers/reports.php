<?php

class Reports extends Controller
{
    public function customers()
    {
        if (!$this->sessionManager->isLogged()) {
            Helper::reDirect(SITE_URL);
            die();
        }
        if (!$this->model('uyeModel')->izinler($this->myUserId, 6)) {
            Helper::reDirect(SITE_URL);
            die();
        }
        $data = $this->model("customersModel")->listView();
        $this->render("site/header");
        $this->render("site/sidebar");
        $this->render("reports/customers/index", ["data" => $data]);
        $this->render("site/footer");
    }

    public function products()
    {
        if (!$this->sessionManager->isLogged()) {
            Helper::reDirect(SITE_URL);
            die();
        }
        if (!$this->model('uyeModel')->izinler($this->myUserId, 6)) {
            Helper::reDirect(SITE_URL);
            die();
        }
        $data = $this->model("productModel")->listView();
        $this->render("site/header");
        $this->render("site/sidebar");
        $this->render("reports/products/index", ["data" => $data]);
        $this->render("site/footer");
    }

    public function date()
    {
        if (!$this->sessionManager->isLogged()) {
            Helper::reDirect(SITE_URL);
            die();
        }
        if (!$this->model('uyeModel')->izinler($this->myUserId, 6)) {
            Helper::reDirect(SITE_URL);
            die();
        }

        if (isset($_GET['start_date']) and isset($_GET['end_date'])) {
            $data = $this->model("reportsModel")->filtrele($_GET['start_date'], $_GET['end_date']);

        } else {
            $data = $this->model("reportsModel")->filtrele(date("Y-m-01"), date("Y,m,d"));

        }
        $this->render("site/header");
        $this->render("site/sidebar");
        $this->render("reports/date/index", ["data" => $data]);
        $this->render("site/footer");

    }

    public function kasa()
    {
        if (!$this->sessionManager->isLogged()) {
            Helper::reDirect(SITE_URL);
            die();
        }
        if (!$this->model('uyeModel')->izinler($this->myUserId, 6)) {
            Helper::reDirect(SITE_URL);
            die();
        }
        $data = $this->model("kasaModel")->listView();
        $this->render("site/header");
        $this->render("site/sidebar");
        $this->render("reports/kasa/index", ["data" => $data]);
        $this->render("site/footer");
    }
}