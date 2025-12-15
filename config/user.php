<?php

require_once "json_set.php";

class User {
    public string $username;
    public string $email;
    public string $password;
    public int $id;
    public FileSet $FileSet;

    public function __construct() {
        $this->FileSet = new FileSet();
    }

    public function register(string $username, string $email, string $password) : bool {
        $newUser = [
            "id" => rand(1 , 3000),
            "username" => $username,
            "email" =>$email,
            "passwordHash" => md5($password)
        ];
        $this->FileSet->getFile();
        $this->FileSet->addToFile($newUser);
        return true;
    }

    public function login(string $username, string $password) {
        $this->FileSet->getFile();
        $userlist = $this->FileSet->readData;
        foreach ($userlist as $user) {
            if ($user["username"] === $username && $user["passwordHash"] === md5($password)) {
                return true;
            }
        }
        return false;
    }
    
    public function createSession(array $userSessionData) {
        session_start();
        $userSessionValue = implode(":", $userSessionData);
        $_SESSION["user"] = md5($userSessionValue);
    }
    
    public function rememberUser(array $rememberMeData) {
        $rememberUserValue = implode(":", $rememberMeData);
        setcookie("userCookie", md5($rememberUserValue), time()+180);
    }
}