<!DOCTYPE html>
<html lang="et">
<head>
    <meta charset="UTF-8">
    <title>ylesanne 12</title>
</head>
<body>

<nav>
    <a href="index.php?leht=soiduaeg">Soiduaeg</a> |
    <a href="index.php?leht=palgad">Palgad</a>
</nav>
<hr>

<?php
$leht = $_GET['leht'] ?? "soiduaeg";

if ($leht == "soiduaeg") {
    include "soiduaeg.php";
} elseif ($leht == "palgad") {
    include "palgad.php";
} else {
    echo "<p>Lehte ei leitud</p>";
}
?>

</body>
</html>
