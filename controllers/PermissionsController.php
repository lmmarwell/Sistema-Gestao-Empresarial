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
            $data['permissions_groups_list'] = $permissions->getGroupList($u->getCompany());
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

    public function add_group()
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
                $plist = $_POST['permissions'];

                // Adicionar permissão a essa empresa/cliente
                $permissions->addGroup($pname, $plist, $u->getCompany());
                header("Location: " . BASE . "permissions");
                exit;
            }

            $data['permissions_list'] = $permissions->getList($u->getCompany());

            $this->loadTemplate('permissions_addgroup', $data);
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

    public function deleteGroup($id)
    {
        $data = array();
        $u = new Users();
        $u->setLoggedUser();
        $company = new Companies($u->getCompany());
        $data['company_name'] = $company->getName();
        $data['user_email'] = $u->getEmail();

        if ($u->hasPermission('permissions_view')) {
            $permissions = new Permissions();
            $permissions->deleteGroup($id);

            header("Location: " . BASE . "permissions");
            exit;
        } else {
            header("Location: " . BASE);
            exit;
        }
    }

    public function editGroup ($id)
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
                $plist = $_POST['permissions'];

                // Adicionar permissão a essa empresa/cliente
                $permissions->editGroup($pname, $plist, $id, $u->getCompany());
                header("Location: " . BASE . "permissions");
                exit;
            }

            $data['permissions_list'] = $permissions->getList($u->getCompany());
            $data['group_info'] = $permissions->getGroup($id, $u->getCompany());

            $this->loadTemplate('permissions_editgroup', $data);
        } else {
            header("Location: " . BASE);
            exit;
        }
    }

}