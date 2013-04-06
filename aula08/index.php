<?php

require_once "vendor/autoload.php";

$smarty = new Smarty();

// preenche variáveis do template
$smarty->assign('nome', 'Ricardo Augusto Isernhagen');
$users = array('ricardo', 'jeremias', 'antonio');
$smarty->assign('users', $users);

// exibe template
$smarty->display('index.tpl');

