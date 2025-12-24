<?php

header('Content-Type: application/json');

$chemin_serveur = __DIR__ . "/../";

$dossier = [
    ["assets/images/CFVpics/",   "assets/images/CFback.png"],
    ["assets/images/YGORDpics/", "assets/images/RDback.png"],
    ["assets/images/YGOMDpics/", "assets/images/MDback.png"]
];

$tcg_id = $dossier[array_rand($dossier)];
$tcg_cards = $tcg_id[0];
$tcg_back = $tcg_id[1];

$chemin_recherche = $chemin_serveur . $tcg_cards . "*.{png,webp,WEBP,jpg,jpeg}";
$chemin_recherche = str_replace('\\', '/', $chemin_recherche);

$cardlist = glob($chemin_recherche, GLOB_BRACE);
$randcard = $cardlist[array_rand($cardlist)];
$idcardonly = basename($randcard);
$idcard = $tcg_cards . $idcardonly;

echo json_encode([
    "face" => $idcard,
    "back" => $tcg_back
]);

?>