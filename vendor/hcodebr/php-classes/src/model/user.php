<?php

namespace Hcode\Model;

use \Hcode\DB\Sql;
use \Hcode\Model;

class User extends model{

   const SESSION ="User";

   public static function login($login, $password)
   {
        $sql = new Sql();

        $results = $sql->select("SELECT * FROM tb_users WRERE deslogin = :LOGIN", array(
          "LOGIN"=>$login
        ));
      
        if (count($results) === 0)
        {
          throw new \Exception("Usuário inexistente ou inválido.");
        }
        
        $data = $results[0];

        if (password_verify($password, $data["despassword"]) === true)
        {
          $user = new  User();

          $user = setData($data);

          $_SESSION[User::SESSION] = $user->getValues();

          var_dump($users);
          exit;

        } else {
            throw new \Exception("Usuário inexistente ou inválido.");
        }
   }

}

?>