<?php

$authTableData = [
    'table' => 'users',
    'idfield' => 'login',
    'cfield' => 'mdp', /*password*/
    'uidfield' => 'uid',
    'rfield' => 'role',
];

$pathFor = [
    "login"  => "login.php",
    "logout" => "logout.php",
    "adduser" => "adduser.php",
    "root"   => "home.php",
];

const SKEY = '_Redirect';