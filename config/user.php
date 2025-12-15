<?php

require_once "json_set.php";

class User {
    public string $username;
    public string $email;
    public string $password;
    public int $id;
    public FileSet $FileSet;
    private ?string $errorEmail = null;

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
            "passwordHash" => password_hash($password)
        ];
        $this->FileSet->getFile();
        $this->FileSet->addToFile($newUser);
        return true;
    }

    public function login(string $username, string $password) : bool {
        $this->FileSet->getFile();
        $userlist = $this->FileSet->readData;
        foreach ($userlist as $user) {
            if ($user["username"] === $username && password_verify($password, $user["passwordHash"])) {
                return true;
            }
        }
        return false;
    }
    
    public function createSession(array $userSessionData) : void {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $_SESSION["user_id"] = $userSessionData["id"] ?? null;
    }
    
    public function rememberUser(array $rememberMeData) : void {
        $rememberUserValue = implode(":", $rememberMeData);
        setcookie("userCookie", password_verify($password, $userSessionValue["passwordHash"]), time()+180);
    }
}