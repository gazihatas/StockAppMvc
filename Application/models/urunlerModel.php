<?php
class urunlerModel extends model
{
    public function listview()
    {
        $query = $this->db->prepare('select * from urunler');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
}