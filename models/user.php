<?php

require_once "config/json_set.php";

class User {
    public FileSet $FileSet;
    private ?string $errorEmail = null;
    private ?string $errorLogin = null;
    private ?string $successLogin = null;

    public function __construct() {
        $this->FileSet = new FileSet();
    }

    public function register(string $username, string $email, string $password) : bool {
        $this->FileSet->getFile();
        $userlist = $this->FileSet->readData;
        foreach ($userlist as $user) {
            if ($email === $user["email"]) {
                $this->errorEmail = "Cet email existe déjà";
                return false;
            }
        }
        $newUser = [
            "id" => rand(1 , 3000),
            "username" => $username,
            "email" =>$email,
            "passwordHash" => password_hash($password, PASSWORD_DEFAULT)
        ];
        $this->FileSet->addToFile($newUser);
        return true;
    }

    public function login(string $username, string $password) : ?array {
        $this->FileSet->getFile();
        $userlist = $this->FileSet->readData;
        foreach ($userlist as $user) {
            if ($user["username"] === $username && password_verify($password, $user["passwordHash"])) {
                $this->successLogin = "Vous êtes connecté";
                return $user;
            }
        }
        $this->errorLogin = "Email ou Mot de Passe incorrect";
        return null;
    }
    
    public function createSession(array $userSessionData) : void {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $_SESSION["user_id"] = $userSessionData["id"] ?? null;
    }
    
    public function rememberUser(array $rememberMeData) : void {
        setcookie("userCookie", $rememberMeData["id"], time() + 3600);
    }

    public function getErrorEmail(): ?string {
        return $this->errorEmail;
    }
    public function getErrorLogin(): ?string {
        return $this->errorLogin;
    }
    public function getSuccessLogin(): ?string {
        return $this->successLogin;
    }
}