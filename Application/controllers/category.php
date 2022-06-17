<?php
class category extends controller
{
    public function create()
    {
        if (!$this->sessionManager->isLogged()) :
            helper::redirect(SITE_URL);
            die();
        endif;
        $this->render('site/header');
        $this->render('site/sidebar');
        $this->render('category/create');
        $this->render('site/footer');

    }

    public function send()
    {
        if($_POST) :
            $ad = helper::cleaner($_POST['ad']);
            if ($ad!="") :

                    $ekle = $this->model('categoryModel')->create($ad);

                    if ($ekle) :
                        helper::flashData("statu","Kategori Başarı ile Eklendi");
                        helper::redirect(SITE_URL."/category/create");
                    else :
                        helper::flashData("statu","Kategori Eklenemedi");
                        helper::redirect(SITE_URL."/category/create");
                    endif;

            else :
                helper::flashData("statu","Lütfen Tüm alanları giriniz.");
                helper::redirect(SITE_URL."/category/create");
            endif;

        else :
            exit("Giriş Yok");
        endif;
    }
}
