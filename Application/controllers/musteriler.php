<?php
class musteriler extends controller
{
    public function index()
    {
        if (!$this->sessionManager->isLogged()) :
            helper::redirect(SITE_URL);
            die();
        endif;
        $data = $this->model('musterilerModel')->listview();
        $this->render('site/header');
        $this->render('site/sidebar');
        $this->render('musteriler/index',['data'=>$data]);
        $this->render('site/footer');
    }

    public function create()
    {
        if (!$this->sessionManager->isLogged()) :
            helper::redirect(SITE_URL);
            die();
        endif;

        $this->render('site/header');
        $this->render('site/sidebar');
        $this->render('musteriler/create');
        $this->render('site/footer');
    }

    public function send()
    {
        if (!$this->sessionManager->isLogged()) :
            helper::redirect(SITE_URL);
            die();
        endif;

        if ($_POST) :
            $ad      = helper::cleaner($_POST['ad']);
            $soyad   = helper::cleaner($_POST['soyad']);
            $sirket  = helper::cleaner($_POST['sirket']);
            $email   = helper::cleaner($_POST['email']);
            $telefon = helper::cleaner($_POST['telefon']);
            $adres   = helper::cleaner($_POST['adres']);
            $tc      = helper::cleaner($_POST['tc']);
            $notu    = helper::cleaner($_POST['notu']);

            if ($ad!="" and $soyad!="") :
                $insert = $this->model('musterilerModel')->create($ad,$soyad,$sirket,$email,$telefon,$adres,$tc,$notu);
                if ($insert) :
                    helper::flashData("statu","Müşteri Başarı ile Eklendi");
                    helper::redirect(SITE_URL."/musteriler/create");
                else :
                    helper::flashData("statu","Müşteri Başarı ile Eklenemedi");
                    helper::redirect(SITE_URL."/musteriler/create");
                endif;
            else:
                helper::flashData("statu","Müşteri Adı ve Soyadı Alanı Boş Bırakılamaz");
                helper::redirect(SITE_URL."/musteriler/create");
            endif;

        else :
            exit("Yasaklı Giriş");
        endif;
    }

    public function edit($id)
    {
        if (!$this->sessionManager->isLogged()) :
            helper::redirect(SITE_URL);
            die();
        endif;
        $data = $this->model('musterilerModel')->getData($id);
        $this->render('site/header');
        $this->render('site/sidebar');
        $this->render('musteriler/edit',['data'=>$data]);
        $this->render('site/footer');
    }

    public function update($id)
    {
        if (!$this->sessionManager->isLogged()) :
            helper::redirect(SITE_URL);
            die();
        endif;

        if ($_POST) :
            $ad      = helper::cleaner($_POST['ad']);
            $soyad   = helper::cleaner($_POST['soyad']);
            $sirket  = helper::cleaner($_POST['sirket']);
            $email   = helper::cleaner($_POST['email']);
            $telefon = helper::cleaner($_POST['telefon']);
            $adres   = helper::cleaner($_POST['adres']);
            $tc      = helper::cleaner($_POST['tc']);
            $notu    = helper::cleaner($_POST['notu']);

            if ($ad!="" and $soyad!="") :
                $insert = $this->model('musterilerModel')->updateData($id,$ad,$soyad,$sirket,$email,$telefon,$adres,$tc,$notu);
                if ($insert) :
                    helper::flashData("statu","Müşteri Başarı ile Düzenlendi");
                    helper::redirect(SITE_URL."/musteriler/edit/".$id);
                else :
                    helper::flashData("statu","Müşteri Başarı ile Düzenlenemedi");
                    helper::redirect(SITE_URL."/musteriler/edit/".$id);
                endif;
            else:
                helper::flashData("statu","Müşteri Adı ve Soyadı Alanı Boş Bırakılamaz");
                helper::redirect(SITE_URL."/musteriler/edit/".$id);
            endif;

        else :
            exit("Yasaklı Giriş");
        endif;
    }

    public function delete($id)
    {
        if (!$this->sessionManager->isLogged()) :
            helper::redirect(SITE_URL);
            die();
        endif;

        $this->model('musterilerModel')->delete($id);
        helper::redirect(SITE_URL."/musteriler");
    }
}