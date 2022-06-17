<?php

class categoryModel extends model
{
    public function create($ad)
    {
        $query = $this->db->prepare("insert into kategori(ad) VALUES (?)");
        $insert = $query->execute(array($ad));
        if ($insert) :
            return true;
        else :
            return false;
        endif;
    }
}