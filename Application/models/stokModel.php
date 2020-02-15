<?php

class StokModel extends Model
{
    public function listView()
    {
        $query = $this->db->prepare("SELECT * FROM stok");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getData($id)
    {
        $query = $this->db->prepare("SELECT * FROM  stok WHERE id=?");
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function create($urun_id, $musteri_id, $islem_tipi, $adet, $fiyat,$kasa_id)
    {
        $query = $this->db->prepare("INSERT INTO stok SET urun_id=?,
                                                                    islem_tipi=?,
                                                                    adet=?, 
                                                                    fiyat=?,
                                                                    tarih=?,
                                                                    musteri_id=?,
                                                                    kasa_id");

        $tarih = date("Y-m-d");
        $insert = $query->execute([$urun_id, $islem_tipi, $adet, $fiyat, $tarih, $musteri_id,$kasa_id]);
        if ($insert) {
            return true;
        } else {
            return false;
        }
    }

    public function update($id, $urun_id, $musteri_id, $islem_tipi, $adet, $fiyat,$kasa_id)
    {
        $query = $this->db->prepare("UPDATE stok SET      urun_id=?,
                                                                    islem_tipi=?,
                                                                    adet=?, 
                                                                    fiyat=?,
                                                                    tarih=?,
                                                                    musteri_id=?,
                                                                    kasa_id=? WHERE
                                                                    id=?");

        $tarih = date("Y-m-d");
        $update = $query->execute([$urun_id, $islem_tipi, $adet, $fiyat, $tarih, $musteri_id,$kasa_id, $id]);
        if ($update) {
            return true;
        } else {
            return false;
        }
    }

    public function delete($id)
    {
        $query = $this->db->prepare("DELETE FROM stok WHERE id=?");
        $delete = $query->execute([$id]);
        if ($delete) {
            return true;
        } else {
            return false;
        }
    }
}
