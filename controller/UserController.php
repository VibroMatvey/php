<?php

class UserController
{
    public function __construct(private readonly UserRepository $userRepository)
    {
    }

    public function showUsers(): void
    {
        $html = '';
        $users = $this->userRepository->getUsers();
        foreach ($users as $user) {
            $name = $user->getName();
            $id = $user->getId();
            $html .= "<a href='/?user=$id'>$name</a>\n";
        }
        echo $html;
    }

    public function showUser(int $id): void
    {
        $user = $this->userRepository->getUser($id);
        if (!isset($user)) {
            http_response_code(404);
            echo "<h1>User with id $id not found</h1>";
            return;
        }
        $name = $user->getName();
        echo "<h1>$name</h1>";
    }
}