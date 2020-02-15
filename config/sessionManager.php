<?php

class SessionManager extends Model
{
    static function createSession($array = [])
    {
        foreach ($array as $key => $value) {
            $_SESSION[$key] = Helper::cleaner($value);
        }
    }

    static function deleteSession($key)
    {
        unset($_SESSION[$key]);
    }

    static function allSessionDelete()
    {
        session_destroy();
    }

    public function isLogged()
    {
        if (isset($_SESSION["mail"]) and isset($_SESSION["parola"])) {

            $sorgu = $this->db->prepare("SELECT * FROM uyeler WHERE mail=? AND parola=?");
            $sorgu->execute([$_SESSION["mail"], $_SESSION["parola"]]);
            if ($sorgu->rowCount() != 0) {
                return true;
            } else {
                return false;
            }
        } else {
            false;
        }
    }

    public function getUserInfo()
    {
        if ($this->isLogged()) {
            $sorgu = $this->db->prepare("SELECT * FROM uyeler WHERE mail=? AND parola=?");
            $sorgu->execute([$_SESSION["mail"], $_SESSION["parola"]]);
            return $sorgu->fetch(PDO::FETCH_ASSOC);

        } else {
            return false;
        }
    }


}
