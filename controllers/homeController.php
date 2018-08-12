<?php

class homeController extends controller {

    public function __construct()
    {
        parent::__construct();
        $u = new Users();
        if ($u->isLogged() == false) {
            header("location: ".BASE."login");
        }
    }

    public function index () {
        $dados = array();

        $this->loadTemplate('home', $dados);
    }

}