<?php
/**
 * Created by PhpStorm.
 * User: victo
 * Date: 12/08/2018
 * Time: 09:55
 */

class Users extends model
{
    // Verifica se o usuario esta logado
    public function isLogged()
    {
        if (isset($_SESSION['userLogin']) && !empty($_SESSION['userLogin'])) {
            return true;
        } else {
            return false;
        }
    }
}