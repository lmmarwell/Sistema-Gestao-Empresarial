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

        if (isset($_POST['email']) && !empty($_POST['email'])) {
            $email  = addslashes($_POST['email']);
            $pass   = addslashes($_POST['password']);

            $u = new Users();

            if ($u->doLogin($email, $pass)) {
                header("Location: ".BASE);
            } else {
                $data['error'] = 'Acesso negado! Cheque suas credencias';
            }
        }

        $this->loadView('login', $data);
    }

    public function logout ()
    {
        $u = new Users();
        $u->logout();

        header("Location: ".BASE);
    }
}