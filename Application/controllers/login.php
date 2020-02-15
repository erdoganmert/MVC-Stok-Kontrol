<?php

class Login extends Controller
{
    public function index()
    {
        $this->render("login");
    }

    public function send()
    {
        if ($_POST) {

            $mail = Helper::cleaner($_POST["mail"]);
            $parola = Helper::cleaner($_POST["parola"]);

            if ($mail != "" and $parola != "") {
                $control = $this->model("uyeModel")->control($mail,md5($parola));
                if($control == 0)
                {
                    Helper::flashData("statu", "Böyle bir kullanıcı yok");
                    Helper::reDirect(SITE_URL . "/login");
                }else{
                    SessionManager::createSession(["mail" => $mail, "parola" => md5($parola)]);
                    Helper::reDirect(SITE_URL);
                }

            } else {
                Helper::flashData("statu", "Lütfen bütün alanları doldurun");
                Helper::reDirect(SITE_URL . "/login");
            }
        } else {
            exit("hatalı giriş");
        }
    }
}
