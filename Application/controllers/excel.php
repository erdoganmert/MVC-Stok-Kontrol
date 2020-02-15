<?php
require_once "Classes/PHPExcel.php";

class Excel extends Controller
{

    // Ürün Excel Export
    public function exportProduct()
    {

        $excel = new PHPExcel();
        $urunler = $this->model("productModel")->listView();

        $excel->getActiveSheet()->setTitle("Sayfa1");
        $excel->getActiveSheet()->setCellValue('A1', 'Ürün Adı');
        $excel->getActiveSheet()->setCellValue('B1', 'Ürün Kategorisi');
        $excel->getActiveSheet()->setCellValue('C1', 'Ürün Özellikleri');
        $excel->getActiveSheet()->setCellValue('D1', 'Eklenme Tarihi');

        $a = 2;
        foreach ($urunler as $key => $value) {
            $kategori = $this->model("categoryModel")->getData($value['kategori_id']);
            $ozellikler = $this->ozellikOlustur(json_decode($value['ozellikler'], true));


            $excel->getActiveSheet()->setCellValue('A' . $a, $value['ad']);
            $excel->getActiveSheet()->setCellValue('B' . $a, $kategori['ad']);
            $excel->getActiveSheet()->setCellValue('C' . $a, $ozellikler);
            $excel->getActiveSheet()->setCellValue('D' . $a, $value['tarih']);

            $a++;
        }
        $dosya_ismi = rand(1000, 9000) . "-urunler.xlsx";
        $kaydet = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
        $kaydet->save($dosya_ismi);

        Helper::flashData("statu","Excel dosyası ".$dosya_ismi." adıyla indirildi.");
        Helper::reDirect(SITE_URL."/product/index");

    }

    public function ozellikOlustur($array = [])
    {
        $sonuc = [];
        foreach ($array as $key => $value) {
            $sonuc[] = $value['name'] . ":" . $value['value'];

        }
        return implode(',', $sonuc);
    }

    // Ürün Excel Export Sonu

    // Müşteri Excel Export

    public function exportCustomers()
    {
        $excel = new PHPExcel();
        $musteriler = $this->model("customersModel")->listView();

        $excel->getActiveSheet()->setTitle("Sayfa1");
        $excel->getActiveSheet()->setCellValue('A1', 'Ad');
        $excel->getActiveSheet()->setCellValue('B1', 'Soyad');
        $excel->getActiveSheet()->setCellValue('C1', 'Mail');
        $excel->getActiveSheet()->setCellValue('D1', 'Telefon');
        $excel->getActiveSheet()->setCellValue('E1', 'Adres');
        $excel->getActiveSheet()->setCellValue('F1', 'TC');
        $excel->getActiveSheet()->setCellValue('G1', 'Şirket');
        $excel->getActiveSheet()->setCellValue('H1', 'Not');
        $excel->getActiveSheet()->setCellValue('I1', 'Tarih');

        $a = 2;
        foreach ($musteriler as $key => $value) {

            $excel->getActiveSheet()->setCellValue('A' . $a, $value['ad']);
            $excel->getActiveSheet()->setCellValue('B' . $a, $value['soyad']);
            $excel->getActiveSheet()->setCellValue('C' . $a, $value['mail']);
            $excel->getActiveSheet()->setCellValue('D' . $a, $value['telefon']);
            $excel->getActiveSheet()->setCellValue('E' . $a, $value['adres']);
            $excel->getActiveSheet()->setCellValue('F' . $a, $value['tc']);
            $excel->getActiveSheet()->setCellValue('G' . $a, $value['sirket']);
            $excel->getActiveSheet()->setCellValue('H' . $a, $value['notu']);
            $excel->getActiveSheet()->setCellValue('I' . $a, $value['tarih']);

            $a++;
        }
        $dosya_ismi = rand(1000, 9000) . "-musteriler.xlsx";
        $kaydet = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
        $kaydet->save($dosya_ismi);

        Helper::flashData("statu","Excel dosyası ".$dosya_ismi." adıyla indirildi.");
        Helper::reDirect(SITE_URL."/customers/index");
    }
}


