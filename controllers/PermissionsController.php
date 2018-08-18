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
            exit;
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

        if ($u->hasPermission('permissions_view')) {
            $permissions = new Permissions();
            $data['permissions_list'] = $permissions->getList($u->getCompany());

            $this->loadTemplate('permissions', $data);
        } else {
            header("Location: " . BASE);
            exit;
        }
    }

    public function add()
    {
        $data = array();
        $u = new Users();
        $u->setLoggedUser();
        $company = new Companies($u->getCompany());
        $data['company_name'] = $company->getName();
        $data['user_email'] = $u->getEmail();

        if ($u->hasPermission('permissions_view')) {
            $permissions = new Permissions();

            // Verificar se esta retornando algo do formulario de adicionar permissao
            if (isset($_POST['name']) && !empty($_POST['name'])) {
                $pname = addslashes($_POST['name']);
                // Adicionar permissão a essa empresa/cliente
                $permissions->add($pname, $u->getCompany());
                header("Location: " . BASE . "permissions");
                exit;
            }

            $this->loadTemplate('permissions_add', $data);
        } else {
            header("Location: " . BASE);
            exit;
        }
    }

    public function delete($id)
    {
        $data = array();
        $u = new Users();
        $u->setLoggedUser();
        $company = new Companies($u->getCompany());
        $data['company_name'] = $company->getName();
        $data['user_email'] = $u->getEmail();

        if ($u->hasPermission('permissions_view')) {
            $permissions = new Permissions();
            $permissions->delete($id);

            header("Location: " . BASE . "permissions");
            exit;
        } else {
            header("Location: " . BASE);
            exit;
        }
    }

}