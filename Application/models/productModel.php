<?php

class ProductModel extends Model
{

    public function listView()
    {
        $query = $this->db->prepare("SELECT * FROM urunler");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($ad, $kategori_id, $ozellik)
    {
        $tarih = date("Y-m-d");
        $query = $this->db->prepare("INSERT INTO urunler SET ad=?,kategori_id=?,ozellikler=?,tarih=?");
        $insert = $query->execute([$ad, $kategori_id, $ozellik, $tarih]);

        if ($insert) {
            return true;
        } else {
            return false;
        }
    }

    public function getData($id)
    {
        $query = $this->db->prepare("SELECT * FROM urunler WHERE id=?");
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function updateProduct($id, $ad, $kategori_id, $ozellikler)
    {
        $query = $this->db->prepare("UPDATE urunler SET ad=?,kategori_id=?,ozellikler=? WHERE id=?");
        $update = $query->execute([$ad, $kategori_id, $ozellikler, $id]);
        if ($update) {
            return true;
        } else {
            return false;
        }
    }
    public function deleteProduct($id)
    {
        $query = $this->db->prepare("DELETE FROM urunler WHERE id=? ");
        $delete = $query->execute([$id]);
        if ($delete) {
            return true;
        } else {
            return false;
        }
    }

    public function search($ad)
    {
        $query = $this->db->prepare("SELECT * FROM urunler WHERE ad LIKE  ?");
        $query->execute(['%'.$ad.'%']);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
}


