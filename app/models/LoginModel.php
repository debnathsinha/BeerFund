<?php


class LoginModel {

    function login() {

        echo "logging in\n";
    }

    function logout() {

        echo "logging out\n";
        session_destroy();
    }   

    function authenticate($new_user, $new_password) {
        session_start();
        session_register("user");
        session_register("password");
        if(!session_is_registered("user")) {
            $user = $new_user;
            $_SESSION["user"] = $new_user;
        }       
        if(!session_is_registered("password")) {
            $password = $new_password;
            $_SESSION["password"] = $new_password;
        }
        return true;
    }

//      function authenticate($user, $pass)
//          {
//  
//  // check login and password
//  // connect and execute query
//              $db_host = "localhost";
//              $db_user = "mysql1";
//              $db_pass = "foobar";
//              $db_name = "beerfund";
//              $connection = mysql_connect($db_host, $db_user, $db_pass) or die ("Unable to connect!");
//              $db_name = "beerfund";
//              $connection = mysql_connect($db_host, $db_user, $db_pass) or die ("Unable to connect!");
//              mysql_select_db($db_name);
//      
//              $query = "SELECT * from user_info WHERE user_name = '$user' AND user_passwd = '$pass'";
//              $result = mysql_query($query, $connection) or die ("Error in query:$query" . mysql_error());
//  
//  // if row exists -> user/pass combination is correct
//              if (mysql_num_rows($result) == 1)
//              {
//                  $_SESSION['login_user'] = $user;
//                  mysql_close();
//                  return 1;
//              }
//  // user/pass combination is wrong
//              else
//              {
//                  mysql_close();
//                  return 0;
//              }
//          }


}


?>