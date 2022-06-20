<?php

class stokModel extends model
{
    public function listview()
    {
        $query = $this->db->prepare('select * from stok');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    public function create($urun_id,$musteri_id,$islem_tipi,$adet,$fiyat)
    {
        $query = $this->db->prepare("insert into stok(urun_id,musteri_id,islem_tipi,adet,fiyat,date)values(?,?,?,?,?,?)");
        $date = date("Y-m-d");
        $insert = $query->execute(array($urun_id,$musteri_id,$islem_tipi,$adet,$fiyat,$date));
        if ($insert) :
            return true;
        else :
            return false;
        endif;
    }
}