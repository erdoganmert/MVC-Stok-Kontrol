<?php

class Controller
{
    public $sessionManager;
    public $myUserInfo;
    public $myUserId;
    public function __construct()
    {
        $this->sessionManager = new SessionManager();
        $this->myUserInfo = $this->sessionManager->getUserInfo();
        $this->myUserId = $this->myUserInfo['id'];
    }


    public function render($file, $params = [])
    {

        if (file_exists(VIEWS_PATH . "/" . $file . ".php")) {
            //extract($params);
            require_once VIEWS_PATH . "/" . $file . ".php";

        } else {
            exit($file . " görüntü dosyası bulunamadı");
        }
    }

    public function model($file)
    {
        if (file_exists(MODELS_PATH . "/" . $file . ".php")) {
            require_once MODELS_PATH . "/" . $file . ".php";
            if(class_exists($file)){
                return new $file;
            }else{
                exit($file . " bir class değil");
            }
        } else {
            exit($file . " model dosyası bulunamadı");
        }
    }
}
