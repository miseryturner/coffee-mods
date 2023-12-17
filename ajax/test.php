<?
print_r($_POST);
require_once 'jwt.php'; // подключаем наш класс
$jwt = new JWT;
echo 'encode  ->  ';
print_r($jwt->encode(['name'=>'valera', 'login'=>'test'], '123'));
echo '<br>';
echo 'decode  ->  ';
print_r($jwt->decode('eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJuYW1lIjoidmFsZXJhIiwibG9naW4iOiJ0ZXN0In0.QLfXZB3LwPYtimASsZLHH17q2ZTDNtJTZHZeHMV2aaY'));

// print_r(JWT::encode());