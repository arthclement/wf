<?php

spl_autoload_register(
    function($namespace){
        $filename = sprintf('%s/%s.php',__DIR__,str_replace('\\', '/', $namespace));

        if (is_file($filename)) {
            require_once $filename;
        }
    }
);

use Model\Role;
use Model\User;
use Model\Person;

$user = new User();
$role = new Role(Role::ROLE_USER);

$user->setPassword('myPassword')
    ->setRoles([$role])
    ->setSalt('mySalt')
    ->setUsername('myUsername');

$person = new Person();
$person->setFirstname('Eric')
    ->setLastname('Montecalvo')
    ->setEmails(['eric.montecalvo@example.org']);