<?php

class ReportsModel extends Model
{

    /*
     islem_tipi = 0  stok giriş
     islem_tipi = 1  stok çıkış
     */

    // Ürün Raporları
    // id = urun_id

    public function girenUrunToplam($id)
    {
        $islem_tipi = 0;
        $query = $this->db->prepare("SELECT fiyat,adet FROM stok WHERE urun_id=? AND islem_tipi=?");
        $query->execute([$id, $islem_tipi]);
        $sonuc = $query->fetch(PDO::FETCH_ASSOC);
        return doubleval($sonuc['fiyat'] * $sonuc['adet']);
    }

    public function cikanUrunToplam($id)
    {
        $islem_tipi = 1;
        $query = $this->db->prepare("SELECT fiyat, adet FROM stok WHERE urun_id=? AND islem_tipi=?");
        $query->execute([$id, $islem_tipi]);
        $sonuc = $query->fetch(PDO::FETCH_ASSOC);

        return doubleval($sonuc['fiyat'] * $sonuc['adet']);
    }

    public function girenAdet($id)
    {
        $islem_tipi = 0;
        $query = $this->db->prepare("SELECT adet FROM stok WHERE urun_id=? AND islem_tipi=?");
        $query->execute([$id, $islem_tipi]);
        $sonuc = $query->fetch(PDO::FETCH_ASSOC);
        return intval($sonuc['adet']);
    }

    public function cikanAdet($id)
    {
        $islem_tipi = 1;
        $query = $this->db->prepare("SELECT adet FROM stok WHERE urun_id=? AND islem_tipi=?");
        $query->execute([$id, $islem_tipi]);
        $sonuc = $query->fetch(PDO::FETCH_ASSOC);
        return intval($sonuc['adet']);
    }

    // Ürün Rapor Sonu

    // Müşteri Raporları
    // id = musteri_id

    public function toplamAlinanUrun($id)
    {
        $islem_tipi = 0;
        $query = $this->db->prepare("SELECT adet FROM stok WHERE musteri_id=? AND islem_tipi=?");
        $query->execute([$id, $islem_tipi]);
        $sonuc = $query->fetch(PDO::FETCH_ASSOC);
        return intval($sonuc['adet']);
    }

    public function toplamSatilanUrun($id)
    {
        $islem_tipi = 1;
        $query = $this->db->prepare("SELECT adet FROM stok WHERE musteri_id=? AND islem_tipi=?");
        $query->execute([$id, $islem_tipi]);
        $sonuc = $query->fetch(PDO::FETCH_ASSOC);
        return intval($sonuc['adet']);
    }

    public function toplamOdenenPara($id)
    {
        $islem_tipi = 0;
        $query = $this->db->prepare("SELECT fiyat,adet FROM stok WHERE musteri_id=? AND islem_tipi=?");
        $query->execute([$id, $islem_tipi]);
        $sonuc = $query->fetch(PDO::FETCH_ASSOC);
        return doubleval($sonuc['fiyat'] * $sonuc['adet']);
    }

    public function toplamKazanilanPara($id)
    {
        $islem_tipi = 1;
        $query = $this->db->prepare("SELECT fiyat,adet FROM stok WHERE musteri_id=? AND islem_tipi=?");
        $query->execute([$id, $islem_tipi]);
        $sonuc = $query->fetch(PDO::FETCH_ASSOC);
        return doubleval($sonuc['fiyat'] * $sonuc['adet']);
    }

    // Müşteri Raporları Sonu



    // Kasa Raporları

    public function girenUrunToplamKasa($id)
    {
        $islem_tipi = 0;
        $query = $this->db->prepare("SELECT fiyat,adet FROM stok WHERE kasa_id=? AND islem_tipi=?");
        $query->execute([$id, $islem_tipi]);
        $sonuc = $query->fetch(PDO::FETCH_ASSOC);
        return doubleval($sonuc['fiyat'] * $sonuc['adet']);
    }

    public function cikanUrunToplamKasa($id)
    {
        $islem_tipi = 1;
        $query = $this->db->prepare("SELECT fiyat, adet FROM stok WHERE kasa_id=? AND islem_tipi=?");
        $query->execute([$id, $islem_tipi]);
        $sonuc = $query->fetch(PDO::FETCH_ASSOC);

        return doubleval($sonuc['fiyat'] * $sonuc['adet']);
    }

    public function girenAdetKasa($id)
    {
        $islem_tipi = 0;
        $query = $this->db->prepare("SELECT adet FROM stok WHERE kasa_id=? AND islem_tipi=?");
        $query->execute([$id, $islem_tipi]);
        $sonuc = $query->fetch(PDO::FETCH_ASSOC);
        return intval($sonuc['adet']);
    }

    public function cikanAdetKasa($id)
    {
        $islem_tipi = 1;
        $query = $this->db->prepare("SELECT adet FROM stok WHERE kasa_id=? AND islem_tipi=?");
        $query->execute([$id, $islem_tipi]);
        $sonuc = $query->fetch(PDO::FETCH_ASSOC);
        return intval($sonuc['adet']);
    }

    // Kasa Rapor Sonu

    //Filtreleme

    public function filtrele($start_date, $end_date)
    {
        $query = $this->db->prepare("SELECT * FROM stok WHERE tarih BETWEEN ? AND ? GROUP BY urun_id");
        $query->execute([$start_date, $end_date]);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    //Filtreleme Sonu




    // Anasayfa Rapor

    public function toplamGelir()
    {
        $islem_tipi = 1;
        $query = $this->db->prepare("SELECT SUM(fiyat*adet) AS toplam FROM stok WHERE islem_tipi =?");
        $query->execute([$islem_tipi]);
        $sonuc = $query->fetch(PDO::FETCH_ASSOC);
        return doubleval($sonuc['toplam']);
    }

    public function toplamGider()
    {
        $islem_tipi = 0;
        $query = $this->db->prepare("SELECT SUM(fiyat*adet) AS toplam FROM stok WHERE islem_tipi =?");
        $query->execute([$islem_tipi]);
        $sonuc = $query->fetch(PDO::FETCH_ASSOC);
        return doubleval($sonuc['toplam']);
    }

    // Anasayfa Rapor Sonu


    // Fatura Rapor

    public function faturaGelir($id) //müsteri id
    {
        $fatura_tipi = 0; //Gelir Faturası
        $query = $this->db->prepare("SELECT SUM(tutar) FROM faturalar WHERE musteri_id=? AND fatura_tipi=?");
        $query->execute([$id,$fatura_tipi]);
        $sonuc = $query->fetch(PDO::FETCH_ASSOC);
        return doubleval($sonuc["SUM(tutar)"]) ;
    }

    public function faturaGider($id) //müsteri id
    {
        $fatura_tipi = 1; //Gider Faturası
        $query = $this->db->prepare("SELECT SUM(tutar) FROM faturalar WHERE musteri_id=? AND fatura_tipi=?");
        $query->execute([$id,$fatura_tipi]);
        $sonuc = $query->fetch(PDO::FETCH_ASSOC);
        return doubleval($sonuc["SUM(tutar)"]) ;
    }

}


