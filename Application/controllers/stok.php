<?php

class stok extends controller
{
    public function index()
    {
        if(!$this->sessionManager->isLogged()) :
            helper::redirect(SITE_URL);
            die();
        endif;

        $data = $this->model('stokModel')->listview();
        $this->render('site/header');
        $this->render('site/sidebar');
        $this->render('stok/index',['data'=>$data]);
        $this->render('site/footer');
    }

    public function create()
    {
        if(!$this->sessionManager->isLogged()) :
            helper::redirect(SITE_URL);
            die();
        endif;
        $urunler = $this->model('urunlerModel')->listview();
        $musteriler = $this->model('musterilerModel')->listview();
        $this->render('site/header');
        $this->render('site/sidebar');
        $this->render('stok/create',['urunler'=>$urunler,'musteriler'=>$musteriler]);
        $this->render('site/footer');
    }

    public function send()
    {
        if(!$this->sessionManager->isLogged()) :
            helper::redirect(SITE_URL);
            die();
        endif;

        if($_POST) :
            $urun_id = intval($_POST['urun_id']);
            $musteri_id = intval($_POST['musteri_id']);
            $islem_tipi = intval($_POST['islem_tipi']);
            $adet = intval($_POST['adet']);
            $fiyat = helper::cleaner($_POST['adet']);

            if ($adet!=0 and $fiyat !=0) :
                $insert = $this->model('stokModel')->create($urun_id,$musteri_id,$islem_tipi,$adet,$fiyat);
                if ($insert) :
                    helper::flashData("statu","Stok Başarı ile Eklendi");
                    helper::redirect(SITE_URL."/stok/create");
                else :
                    helper::flashData("statu","Stok Eklenemedi");
                    helper::redirect(SITE_URL."/stok/create");
                endif;
            else :
                helper::flashData("statu","Stok fiyat ve adeti boş bırakılamaz");
                helper::redirect(SITE_URL."/stok/create");
            endif;

        else :
            exit("Yasaklı Giriş");
        endif;
    }

    public function edit($id)
    {
        if(!$this->sessionManager->isLogged()) :
            helper::redirect(SITE_URL);
            die();
        endif;

        $data = $this->model('stokModel')->getData($id);
        $this->render('site/header');
        $this->render('site/sidebar');
        $this->render('stok/edit',['data'=>$data]);
        $this->render('site/footer');
    }

    public function update($id)
    {

    }

    public function delete($id)
    {

    }
}