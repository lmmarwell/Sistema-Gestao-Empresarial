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
            }
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
}