<?php
class urunlerModel extends model
{
    public function listview()
    {
        $query = $this->db->prepare('select * from urunler');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($ad,$kategoriId,$ozellik)
    {
        $query = $this->db->prepare("insert into urunler( ad,kategoriId,ozellikler,date)values(?,?,?,?)");
        $date = date("Y-m-d");
        $insert = $query->execute(array($ad,$kategoriId,$ozellik,$date));
        if ($insert) :
            return true;
        else :
            return false;
        endif;
    }
}