<?php
$login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
$password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);


$password = md5($password . "gdsjofhsolfh");

$mysql = new mysqli('localhost:3306', 'root', '', 'esteticapro');


$query = "SELECT * FROM `users` WHERE `login` = '$login'";

$result = mysqli_query($mysql, $query);

$user = $result->fetch_assoc();

if (count($user) == 0) {
    echo "Такой пользователь не найден";
    exit();
}

setcookie('user', $user['name'], time() + 3600, "/");

mysqli_close($mysql);


header('Location: /');
