<?php

class urunler extends controller
{
    public function index()
    {
        $data = $this->model('urunlerModel')->listview();
        $this->render('site/header');
        $this->render('site/sidebar');
        $this->render('urunler/index',['data'=>$data]);
        $this->render('site/footer');
    }

    public function create()
    {
        $category = $this->model('categoryModel')->listview();
        $this->render('site/header');
        $this->render('site/sidebar');
        $this->render('urunler/create',['category'=>$category]);
        $this->render('site/footer');
    }

    public function send()
    {
        if (!$this->sessionManager->isLogged()) :
            helper::redirect(SITE_URL);
            die();
        endif;

        if ($_POST) :
                $ad = helper::cleaner($_POST['ad']);
                $kategoriId = intval($_POST['kategoriId']);
                $ozellikler = json_encode($_POST['ozellik']);

                if ($ad!="") :
                    $insert = $this->model('urunlerModel')->create($ad,$kategoriId,$ozellikler);
                    if ($insert) :
                        helper::flashData("statu","Ürün Başarı İle Eklendi");
                        helper::redirect(SITE_URL."/urunler/create");
                    else :
                        helper::flashData("statu","Ürün Başarı İle Eklenemedi");
                        helper::redirect(SITE_URL."/urunler/create");
                    endif;

                else :
                    helper::flashData("statu","Ürün adı boş bırakılamaz");
                    helper::redirect(SITE_URL."/urunler/create");
                endif;
        else :
            exit("Yasaklı Giriş");
        endif;
    }
}