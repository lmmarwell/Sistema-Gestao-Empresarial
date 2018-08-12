<?php
/**
 * Created by PhpStorm.
 * User: victo
 * Date: 12/08/2018
 * Time: 10:02
 */

class LoginController extends controller
{
    public function index () {
        $data = array();

        $this->loadView('login', $data);
    }
}