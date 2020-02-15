<?php

class CustomersModel extends Model
{
    public function listView()
    {
        $query = $this->db->prepare("SELECT * FROM musteriler");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($ad, $soyad, $mail, $telefon, $adres, $tc, $notu, $sirket)
    {


        $query = $this->db->prepare("INSERT INTO musteriler SET     ad      =?,
                                                                              soyad   =?,
                                                                              mail    =?,
                                                                              telefon =?,
                                                                              adres   =?,
                                                                              tc      =?,
                                                                              notu    =?,
                                                                              sirket  =?,
                                                                              tarih   =?");
        $tarih = date("Y-m-d");
        $insert = $query->execute([$ad, $soyad, $mail, $telefon, $adres, $tc, $notu, $sirket, $tarih]);

        return $insert;
    }

    public function getData($id)
    {
        $query = $this->db->prepare("SELECT * FROM musteriler WHERE id=?");
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function updateCustomer($id, $ad, $soyad, $mail, $telefon, $adres, $tc, $notu, $sirket)
    {
        $query = $this->db->prepare("UPDATE musteriler SET  ad      =?,
                                                                      soyad   =?,
                                                                      mail    =?,
                                                                      telefon =?,
                                                                      adres   =?,
                                                                      tc      =?,
                                                                      notu    =?,
                                                                      sirket  =?,
                                                                      tarih   =? WHERE id=?");
        $tarih = date("Y-m-d");
        $update = $query->execute([$ad, $soyad, $mail, $telefon, $adres, $tc, $notu, $sirket, $tarih, $id]);
        if ($update) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteCustomer($id)
    {
        $query = $this->db->prepare("DELETE FROM musteriler WHERE id=?");
        $delete = $query->execute($id);
        if ($delete) {
            return true;
        } else {
            return false;
        }
    }
}














