<?php

$fichier = "users.json";

if (!file_exists($fichier)) {
    file_put_contents($fichier, 
    json_encode(["username" => null, "password"]));
}

class FileSet {
    public array $readData;
    const FILE_URL = __DIR__."/../users.json";

    public function getFile() {
        $usersData = file_get_contents(self::FILE_URL);
        $this->readData = json_decode($usersData, true) ?? [];
    }

    public function addToFile(array $dataToAdd) {
        $this->readData[] = $dataToAdd;
        try {
            file_put_contents(self::FILE_URL, json_encode($this->readData), 0);
        } catch (Exception $e) {
            die("error" . $e->getMessage());
        }
    }
}

?>