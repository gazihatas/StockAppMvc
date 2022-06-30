<?php

class rapor extends controller
{
    public function urun()
    {
        if (!$this->sessionManager->isLogged()) :
            helper::redirect(SITE_URL);
            die();
        endif;

        $data = $this->model('urunlerModel')->listview();
        $this->render('site/header');
        $this->render('site/sidebar');
        $this->render('rapor/urun/index',['data'=>$data]);
        $this->render('site/footer');
    }

    public function musteri()
    {
        if (!$this->sessionManager->isLogged()) :
            helper::redirect(SITE_URL);
            die();
        endif;

        $this->render('site/header');
        $this->render('site/sidebar');
        $this->render('rapor/musteri');
        $this->render('site/footer');
    }
}