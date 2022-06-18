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

    public function getData($id)
    {
        $query = $this->db->prepare("select * from urunler where id = ?");
        $query->execute(array($id));
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function updateData($id,$ad,$kategoriId,$ozellik)
    {
        $query = $this->db->prepare("update urunler set ad =?, kategoriId = ?, ozellikler = ? where id = ?");
        $update = $query->execute(array($ad,$kategoriId,$ozellik,$id));
        if ($update) :
            return true;
        else :
            return false;
        endif;
    }
    public function getDelete($id)
    {
        $query = $this->db->prepare("delete from urunler where id=?");
        $query->execute(array($id));
    }
}