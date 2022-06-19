<?php
class musterilerModel extends model
{
    public function listview()
    {
        $query = $this->db->prepare("select * from musteriler");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($ad,$soyad,$sirket,$email,$telefon,$adres,$tc,$notu)
    {
        $query = $this->db->prepare("insert into musteriler(ad,soyad,sirket,email,telefon,adres,tc,notu,date) values(?,?,?,?,?,?,?,?,?)");
        $date = date("Y-m-d");
        $insert = $query->execute(array($ad,$soyad,$sirket,$email,$telefon,$adres,$tc,$notu,$date));
        if ($insert) :
            return true;
        else :
            return false;
        endif;
    }
}