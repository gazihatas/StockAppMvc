<?php
class sessionManager extends model
{
    static function createSession($array = [])
    {
        foreach ($array as $key=> $value)
        {
            $_SESSION[$key] = helper::cleaner($value);
        }
    }

    static function deleteSession($key)
    {
        unset($_SESSION[$key]);
    }

    static function allSessionDelete()
    {
        session_destroy();
    }

    public function isLogged()
    {
        if (isset($_SESSION['email']) and isset($_SESSION['password'])) :
            $email = $_SESSION['email'];
            $password = $_SESSION['password'];
            $query = $this->db->prepare("select * from uyeler where email = ? and password = ?");
            $query->execute(array($email,$password));

                if ($query->rowCount()!=0) :
                    return true;
                else :
                    return false;
                endif;
        else :
            false;
        endif;
    }

    public function getUserInfo()
    {
        if($this->isLogged()) :
            $sorgu = $this->db->query("select * from uyeler where email = ? and password = ?");
            $sorgu->execute(array($_SESSION['email'], $_SESSION['password']));
            return $sorgu->fetch(PDO::FETCH_ASSOC);
        else :
            return false;
        endif;
    }


}

?>