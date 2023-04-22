<?php

$username = 'test_user';
$enpass = '8UKJbFalRlbK/LoCkFQ28Q==';

$key = "5aa3c281e42ba7101f7227a7519d5e961c7bcf2b10a42914304bffc1afcebb1d2be98f53caa80d05";
$method = "AES-192-CBC";
$iv = 5782920193848291;
$pass = openssl_decrypt($enpass, $method, $key, 0, $iv);


return [
    'class' => 'yii\db\Connection',
    'dsn' => 'pgsql:host=calc-postgresdb;port=5432;dbname=postgres',
    'username' => $username,
    'password' => $pass,
    'charset' => 'utf8',
];