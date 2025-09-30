<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>h01</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>
  <body>
<?php

$lubatudLehed = ["avaleht", "kontakt", "info", "abi"];


$page = $_GET['page'] ?? "avaleht"; 


if (in_array($page, $lubatudLehed)) {
    $fail = "pages/" . $page . ".php";
    
    if (file_exists($fail)) {
        include($fail);
    } else {
        echo "<h2>Viga: lehte ei leitud!</h2>";
    }
} else {
    echo "<h2>Viga: selline leht ei ole lubatud!</h2>";
}
?>

<hr>
<nav>
    <a href="index.php?page=avaleht">Avaleht</a> |
    <a href="index.php?page=kontakt">Kontakt</a> |
    <a href="index.php?page=info">Info</a> |
    <a href="index.php?page=abi">Abi</a>
</nav>    
</body>
