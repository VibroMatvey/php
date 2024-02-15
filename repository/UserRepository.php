<?php

require 'model/User.php';

class UserRepository
{
    public function __construct(private readonly \mysqli $manager)
    {
    }

    public function getUsers(): array
    {
        $res = mysqli_query($this->manager, 'SELECT * FROM `users`');
        $users = [];
        while ($user = $res->fetch_assoc()) {
            $users[] = new User($user['id'], $user['name'], $user['email'], $user['password']);
        }
        return $users;
    }

    public function getUser(int $id): ?User
    {
        $res = mysqli_query($this->manager, "SELECT * FROM `users` WHERE `users`.`id` = $id");
        if (!$res->num_rows) {
            return null;
        }
        $user = $res->fetch_assoc();
        return new User($user['id'], $user['name'], $user['email'], $user['password']);
    }

}