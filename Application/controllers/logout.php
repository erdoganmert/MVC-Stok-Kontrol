<?php

class Logout extends Controller
{
    public function index()
    {
        unset($_SESSION["mail"]);
        unset($_SESSION["parola"]);
        Helper::reDirect(SITE_URL);
    }
}