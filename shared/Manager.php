<?php

class Manager
{
    private ?mysqli $manager = null;
    private string $user = 'root';
    private string $password = '';
    private string $database = 'db';
    private string $host = '127.0.0.1';

    public function __construct()
    {
        $this->manager = mysqli_connect(
            $this->host,
            $this->user,
            $this->password,
            $this->database
        );
    }

    /**
     * @return mysqli|null
     */
    public function getManager(): ?mysqli
    {
        return $this->manager;
    }
}
