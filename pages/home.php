<?php
global $manager;
global $router;

require 'repository/UserRepository.php';
require 'controller/UserController.php';

$query = $router->getQuery();

$userRepository = new UserRepository($manager->getManager());
$userController = new UserController($userRepository);


$userController->showUsers();

if (isset($query['user'])) {
    $userController->showUser($query['user']);
}
