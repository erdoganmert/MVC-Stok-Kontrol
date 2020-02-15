<?php

class UyeModel extends Model
{
    public function control($mail, $parola)
    {
        $query = $this->db->prepare("SELECT * FROM uyeler WHERE mail=? AND parola=?");
        $query->execute([$mail, $parola]);
        return $query->rowCount();

    }

    public function listView()
    {
        $query = $this->db->prepare("SELECT * FROM uyeler");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($ad,$mail,$parola,$izinler,$resim_ismi,$resim)
    {
        $query = $this->db->prepare("INSERT INTO uyeler SET ad=?,mail=?,parola=?,izinler=?,resim_ismi=?,resim=?");
        $insert = $query->execute([$ad,$mail,$parola,$izinler,$resim_ismi,$resim]);
        if ($insert) {
            return true;
        } else {
            return false;
        }
    }

    public function getData($id)
    {
        $query = $this->db->prepare("SELECT * FROM uyeler WHERE id=?");
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $ad,$mail,$parola,$izinler,$resim_ismi,$resim)
    {
        $query = $this->db->prepare("UPDATE uyeler SET ad=?,mail=?,parola=?,izinler=?,resim_ismi =?,resim=? WHERE id=?");
        $update = $query->execute([$ad,$mail,$parola,$izinler,$resim_ismi,$resim, $id]);
        if ($update) {
            return true;
        } else {
            return false;
        }

    }

    public function delete($id)
    {
        $query = $this->db->prepare("DELETE FROM uyeler WHERE id=?");
        $delete = $query->execute([$id]);
        if ($delete) {
            return true;
        } else {
            return false;
        }
    }

    // İzinler

    public function izinler($id,$izin)
    {
        $data = $this->getData($id);
        if($data['izinler'] == "")
        {
            return true;
        }else {

            $izinler = explode(",", $data['izinler']);
            if (in_array($izin, $izinler)) {
                return true;
            } else {
                return false;
            }
        }
    }

}