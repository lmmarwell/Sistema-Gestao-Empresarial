<?php
/**
 * Created by PhpStorm.
 * User: victo
 * Date: 12/08/2018
 * Time: 09:55
 */

class Users extends model
{
    private $userInfo;
    private $permissions;

    // Verifica se o usuario esta logado
    public function isLogged()
    {
        if (isset($_SESSION['userLogin']) && !empty($_SESSION['userLogin'])) {
            return true;
        } else {
            return false;
        }
    }

    // Metodo para realizar o login
    public function doLogin($email, $password)
    {
        $sql = $this->db->prepare("SELECT * from users where email = :email and password = :password");
        $sql->bindValue(':email', $email);
        $sql->bindValue(':password', md5($password));
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $row = $sql->fetch();
            // Se houve registro pega o id do usuario e adiciona na sessao
            $_SESSION['userLogin'] = $row['id'];
            return true;
        } else {
            return false;
        }
    }

    public function setLoggedUser()
    {
        if (isset($_SESSION['userLogin']) && !empty($_SESSION['userLogin'])) {
            $id = $_SESSION['userLogin'];

            $sql = $this->db->prepare("select * from users where id = :id");
            $sql->bindValue(':id', $id);
            $sql->execute();

            if ($sql->rowCount() > 0) {
                $this->userInfo = $sql->fetch();
                // Setando as permissoes do usuario
                $this->permissions = new Permissions();
                $this->permissions->setGroup($this->userInfo['id_group'], $this->userInfo['id_company']);
            }
        }
    }

    public function logout()
    {
        unset($_SESSION['userLogin']);
    }

    public function hasPermission($name)
    {
        return $this->permissions->hasPermission($name);
    }

    // Pegar o email do usuario logado
    public function getEmail()
    {
        if (isset($this->userInfo['email'])) {
            return $this->userInfo['email'];
        } else {
            return '';
        }
    }

    // Pegar por ID
    public function getCompany()
    {
        if (isset($this->userInfo['id_company'])) {
            return $this->userInfo['id_company'];
        } else {
            return 0;
        }
    }

    public function findUsersInGroup($id)
    {
        $sql = $this->db->prepare("select count(*) as c from users where id_group = :id_group");
        $sql->bindValue(':id_group', $id);
        $sql->execute();
        $row = $sql->fetch();

        if ($row['c'] == '0') {
            return false;
        } else {
            return true;
        }
    }

    public function getList($id_company)
    {
        $array = array();
        $sql = $this->db->prepare("select users.id, users.email, permission_groups.name
                                            from users
                                            left join permission_groups on permission_groups.id = users.id
                                            where users.id_company = :id_company");
        $sql->bindValue(':id_company', $id_company);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;

    }
}