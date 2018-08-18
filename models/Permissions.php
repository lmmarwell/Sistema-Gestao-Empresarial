<?php
/**
 * Created by PhpStorm.
 * User: victo
 * Date: 13/08/2018
 * Time: 20:52
 */

class Permissions extends Model
{
    private $group;
    private $permissions;

    public function setGroup($id, $id_company)
    {
        $this->group = $id;
        $this->permissions = array();

        $sql = $this->db->prepare("SELECT params FROM permission_groups WHERE id = :id AND id_company = :id_company");
        $sql->bindValue(':id', $id);
        $sql->bindValue(':id_company', $id_company);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $row = $sql->fetch();

            if (empty($row['params'])) {
                $row['params'] = '0';
            }

            $params = $row['params'];

            $sql = $this->db->prepare("SELECT name FROM permission_params WHERE id IN ($params) AND id_company = :id_company");
            $sql->bindValue('id_company', $id_company);
            $sql->execute();

            if ($sql->rowCount() > 0) {
                foreach ($sql->fetchAll() as $item) {
                    $this->permissions[] = $item['name'];
                }
            }
        }
    }

    // Verificar se tem algum tipo de permissão
    public function hasPermission($name)
    {
        // verificar se a permissao existe no array
        if (in_array($name, $this->permissions)) {
            return true;
        } else {
            return false;
        }
    }

    // Metodo que retorna a lista de empresas e suas permissoes
    public function getList ($id_company) {
        $array = array();

        $sql = $this->db->prepare("select * from permission_params where id_company = :id_company");
        $sql->bindValue(':id_company', $id_company);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;
    }

    public function add ($name, $id_company) {

        $sql = $this->db->prepare("insert into permission_params set name = :name, id_company = :id_company");
        $sql->bindValue(':name', $name);
        $sql->bindValue(':id_company', $id_company);
        $sql->execute();
    }

    public function delete ($id) {

        $sql = $this->db->prepare("delete from permission_params where id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();
    }
}