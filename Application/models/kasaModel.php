<?php

class KasaModel extends Model
{
    public function listView()
    {
        $query = $this->db->prepare("SELECT * FROM kasa");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addKasa($ad)
    {
        $query = $this->db->prepare("INSERT INTO kasa SET ad=?");
        $insert = $query->execute([$ad]);
        if ($insert) {
            return true;
        } else {
            return false;
        }
    }

    public function getData($id)
    {
        $query = $this->db->prepare("SELECT * FROM kasa WHERE id=?");
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $ad)
    {
        $query = $this->db->prepare("UPDATE kasa SET ad =?WHERE id=?");
        $update = $query->execute([$ad, $id]);
        if ($update) {
            return true;
        } else {
            return false;
        }

    }

    public function delete($id)
    {
        $query = $this->db->prepare("DELETE FROM kasa WHERE id=?");
        $delete = $query->execute([$id]);
        if ($delete) {
            return true;
        } else {
            return false;
        }
    }
}