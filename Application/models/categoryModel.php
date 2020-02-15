<?php

class CategoryModel extends Model
{


    public function addCategory($ad)
    {
        $query = $this->db->prepare("INSERT INTO kategori SET ad=?");
        $insert = $query->execute([$ad]);
        if ($insert) {
            return true;
        } else {
            return false;
        }
    }

    public function listView()
    {
        $query = $this->db->prepare("SELECT * FROM kategori");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getData($id)
    {
        $id = $id[0];
        $query = $this->db->prepare("SELECT * FROM kategori WHERE id=?");
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_ASSOC);

    }

    public function deleteCategory($id)
    {
        $id = $id[0];
        $query = $this->db->prepare("DELETE FROM kategori WHERE id=?");
        return $query->execute([$id]);

    }

    public function updateCategory($id, $ad)
    {
        $query = $this->db->prepare("UPDATE kategori SET ad=? WHERE id=?");
        $update = $query->execute([$ad, $id]);
        return $update;
    }


}
