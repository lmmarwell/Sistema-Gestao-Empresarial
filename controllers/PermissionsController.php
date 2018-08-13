<?php
/**
 * Created by PhpStorm.
 * User: victo
 * Date: 12/08/2018
 * Time: 21:39
 */

class PermissionsController extends controller
{
    public function __construct()
    {
        parent::__construct();
        $u = new Users();
        if ($u->isLogged() == false) {
            header("location: " . BASE . "login");
        }
    }

    public function index()
    {
        $data = array();
        $u = new Users();
        $u->setLoggedUser();
        $company = new Companies($u->getCompany());
        $data['company_name'] = $company->getName();
        $data['user_email'] = $u->getEmail();

        $this->loadTemplate('permissions', $data);
    }
}