<?php

class Main extends Controller
{
    public function index()
    {
        if(!$this->sessionManager->isLogged()){Helper::reDirect(SITE_URL."/login"); die();}
        $this->render('site/header');
        $this->render('site/sidebar');
        $this->render('home');
        $this->render('site/footer');
    }
}