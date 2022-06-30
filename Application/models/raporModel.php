<?php

class raporModel extends model
{
    public function girenUrunToplam($id)
    {
        $query = $this->db->prepare("select SUM(fiyat*adet) as toplam from stok where urun_id = ? and islem_tipi = '0'");
        $query->execute(array($id));
        $sonuc = $query->fetch(PDO::FETCH_ASSOC);
        return doubleval($sonuc['toplam']);

    }
    public function cikanUrunToplam($id)
    {
        $query = $this->db->prepare("select SUM(fiyat*adet) as toplam from stok where urun_id = ? and islem_tipi = '1'");
        $query->execute(array($id));
        $sonuc = $query->fetch(PDO::FETCH_ASSOC);
        return doubleval($sonuc['toplam']);
    }

    public function girenUrunAdet($id)
    {
        $query = $this->db->prepare("select SUM(adet) from stok where urun_id = ? and islem_tipi = '0'");
        $query->execute(array($id));
        $sonuc = $query->fetch(PDO::FETCH_ASSOC);
        return doubleval($sonuc['SUM(adet)']);
    }

    public function cikanUrunAdet($id)
    {
        $query = $this->db->prepare("select SUM(adet) from stok where urun_id = ? and islem_tipi = '1'");
        $query->execute(array($id));
        $sonuc = $query->fetch(PDO::FETCH_ASSOC);
        return doubleval($sonuc['SUM(adet)']);
    }
}