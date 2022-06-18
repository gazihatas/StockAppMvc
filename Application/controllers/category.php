<?php
class category extends controller
{
    public function index()
    {
        if (!$this->sessionManager->isLogged()) :
            helper::redirect(SITE_URL);
            die();
        endif;
        $data = $this->model('categoryModel')->listview();
        $this->render('site/header');
        $this->render('site/sidebar');
        $this->render('category/index',['data'=>$data]);
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
        $this->render('category/create');
        $this->render('site/footer');

    }

    public function send()
    {
        if (!$this->sessionManager->isLogged()) :
            helper::redirect(SITE_URL);
            die();
        endif;

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

    public function edit($id)
    {
        if (!$this->sessionManager->isLogged()) :
            helper::redirect(SITE_URL);
            die();
        endif;
        $data = $this->model('categoryModel')->getData($id);
        $this->render('site/header');
        $this->render('site/sidebar');
        $this->render('category/edit',['data'=>$data]);
        $this->render('site/footer');
    }

    public function update($id)
    {
        if (!$this->sessionManager->isLogged()) :
            helper::redirect(SITE_URL);
            die();
        endif;

        if($_POST) :
            $ad = helper::cleaner($_POST['ad']);
            if ($ad!="") :

                $duzenle = $this->model('categoryModel')->updateData($id,$ad);

                if ($duzenle) :
                    helper::flashData("statu","Kategori Başarı ile Düzenlendi");
                    helper::redirect(SITE_URL."/category/edit/".$id);
                else :
                    helper::flashData("statu","Kategori Düzenlenemedi");
                    helper::redirect(SITE_URL."/category/create/".$id);
                endif;

            else :
                helper::flashData("statu","Lütfen Tüm alanları giriniz.");
                helper::redirect(SITE_URL."/category/edit/".$id);
            endif;

        else :
            exit("Giriş Yok");
        endif;
    }

    public function delete($id)
    {
        if (!$this->sessionManager->isLogged()) :
            helper::redirect(SITE_URL);
            die();
        endif;
        $delete = $this->model('categoryModel')->deleteData($id);
        helper::redirect(SITE_URL."/category");
    }
}
