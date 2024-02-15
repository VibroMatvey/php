<?php

class Router
{
    private ?string $path = null;

    private ?array $query = [];

    const ROUTES = [
        "/" => "pages/home.php",
        "/login" => "pages/login.php",
        "/admin" => "pages/admin.php",
        "/me" => "pages/account.php",
    ];

    const TITLES = [
        "/" => "HOME",
        "/login" => "LOGIN",
        "/admin" => "ADMIN",
        "/me" => "ACCOUNT",
    ];

    public function __construct(private readonly string $uri)
    {
        $parse_uri = parse_url($this->uri);
        $this->path = $parse_uri['path'];
        if (!isset($parse_uri['query'])) {
            return;
        }
        foreach (explode('&', $parse_uri['query']) as $item) {
            $parse_item = explode('=', $item);
            $this->query[$parse_item[0]] = $parse_item[1];
        }
    }

    function getRoute(): void
    {
        if (!isset(self::ROUTES[$this->path])) {
            http_response_code(404);
            require "pages/not_found.php";
            return;
        }
        require self::ROUTES[$this->path];
    }

    function getTitle(): string
    {
        if (!isset(self::ROUTES[$this->path])) {
            return "NOT FOUND";
        }
        return self::TITLES[$this->path];
    }

    function getQuery(): array
    {
        return $this->query;
    }
}