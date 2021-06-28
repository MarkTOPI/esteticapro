<?php 
 $login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
 $password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);
 
 if(mb_strlen($login) < 5 || mb_strlen($login) > 15)
 {
     echo "Недопустимая длина логина";
     exit();
 }else if (mb_strlen($password) < 8 || mb_strlen($password) > 25)
 {
    echo "Недопустимая длина пароля";
    exit();
 }

 $password=md5($password."gdsjofhsolfh");

 $mysql = new mysqli('localhost:3306', 'root', '', 'esteticapro');
 $mysql->query("INSERT INTO `users` (`login`,`pass`) VALUES('$login', '$password') ");
 $mysql->close();

 header('Location: /');
