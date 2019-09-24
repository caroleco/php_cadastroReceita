<?php
spl_autoload_register(function ($class){
   require_once (str_replace('\\','/',$class.'.php'));
});

$db = new mysqli('localhost','root','','prova');
if ($db->connect_errno>0){
    die('Erro ao conectar '.$db->connect_errno);
}