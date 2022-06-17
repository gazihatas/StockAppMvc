<?php 
class system{

    protected  $controller;
    protected  $method;


    public function __construct()
    {
        $this->controller = "main";
        $this->method = "index";

        /* Adres verilerini alma */
        if (isset($_GET['act'])) :
            $url = explode('/',filter_var(rtrim($_GET['act'], '/'), FILTER_SANITIZE_URL));
        else :
            $url[0] = $this->controller;
            $url[1] = $this->method;
        endif;


        /* Controller Bulma */
        if (file_exists(CONTROLLERS_PATH."/".$url[0].".php")) :
            //echo "var";
            $this->controller = $url[0];
        endif;

        require_once  CONTROLLERS_PATH."/".$this->controller.".php";

        //Eğer ilgili sınıf kontrol edilir yoksa belirtilir
        if (class_exists($this->controller)) :
            $this->controller = new $this->controller;
            array_shift($url); //bir class varsa url in içersindeki sil
        else :
            exit($this->controller." class'ı bulunamadı.");
        endif;

        /* Method Bulma */
        if (isset($url[0])) :
                if (method_exists($this->controller,$url[0])) :
                    $this->method = $url[0];
                    array_shift($url); //method varsa url in içersini sil
                else :
                    exit($url[0]." Method Bulunamadı");
                endif;
        endif;
        //echo $this->method;

        //call_userfunc_array = mvc programlamada değerlerimizi göderdiğimiz hazır bir fonksiyondur.
        //class ın içersindeki ilgili metoda çalıştır ilgili paremetreleri gönder gibisinden çalışır
        call_user_func_array([$this->controller,$this->method],$url);


        //print_r($url);
    }
}
?>