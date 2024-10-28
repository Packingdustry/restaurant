<?php
function formatDate(string $date): string {
    $tmp = explode("-", $date);
    $date = $tmp[2] . '/' . $tmp[1] . '/' . $tmp[0];
    return $date;
}

function createPDO(): PDO {
    try {
        $bd = new PDO("mysql:host=localhost; dbname=restaurant; charset=utf8", "root", "");
    } catch(Exception $e) {
        die("Erreur : " . $e->getMessage());
    }
    return $bd;
}
?>