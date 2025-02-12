<?php

//Variabelen vullen
$attractie = $_POST['attractie'];
$type = $_POST['type'];
$capaciteit = $_POST['capaciteit'];
$melder = $_POST['melder'];
$overig = $_POST['overig'];

if (isset($_POST['prioriteit']))
{
    $prioriteit = 1;
}
else 
{
    $prioriteit = 0;
}

echo $attractie . " / " . $capaciteit . " / " . $melder;

//1. Verbinding
require_once '../../../config/conn.php';

$query = "INSERT INTO meldingen (attractie, type, capaciteit, prioriteit, melder, overige_info) 
VALUES (:attractie, :type, :capaciteit, :prioriteit, :melder, :overige_info);";

$statement = $conn->prepare($query);

$statement->execute([
    ":attractie" => $attractie,
    ":type" => $type,
    ":capaciteit" => $capaciteit,
    ":prioriteit" => $prioriteit,
    ":melder" => $melder,
    ":overige_info" => $overig,
]);
?>
