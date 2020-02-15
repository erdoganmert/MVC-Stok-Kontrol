<?php

class FaturaModel extends Model
{
    public function listView()
    {
        $query = $this->db->prepare("SELECT * FROM faturalar");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($fatura_no,$musteri_id,$tutar,$aciklama,$fatura_tipi)
    {
        $query = $this->db->prepare("INSERT INTO faturalar SET fatura_no=?,
                                                                         musteri_id=?,
                                                                         tutar=?,
                                                                         aciklama=?,
                                                                         fatura_tipi=?");
        $insert = $query->execute([$fatura_no,$musteri_id,$tutar,$aciklama,$fatura_tipi]);
        if ($insert) {
            return true;
        } else {
            return false;
        }
    }

    public function getData($id)
    {
        $query = $this->db->prepare("SELECT * FROM faturalar WHERE id=?");
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $fatura_no,$musteri_id,$tutar,$aciklama,$fatura_tipi)
    {
        $query = $this->db->prepare("UPDATE faturalar SET      fatura_no=?,
                                                                         musteri_id=?,
                                                                         tutar=?,
                                                                         aciklama=?,
                                                                         fatura_tipi=? WHERE 
                                                                         id=?");
        $update = $query->execute([$fatura_no,$musteri_id,$tutar,$aciklama,$fatura_tipi, $id]);
        if ($update) {
            return true;
        } else {
            return false;
        }

    }

    public function delete($id)
    {
        $query = $this->db->prepare("DELETE FROM faturalar WHERE id=?");
        $delete = $query->execute([$id]);
        if ($delete) {
            return true;
        } else {
            return false;
        }
    }
}