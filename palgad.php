<h2>Palkade võrdlus</h2>

<?php
$fail = fopen("tootajad.csv", "r");
$paise = fgetcsv($fail, 1000, ",");

$mehed = [];
$naised = [];

while (($rida = fgetcsv($fail, 1000, ",")) !== false) {
    list($nimi, $sugu, $palk) = $rida;
    $palk = (int)$palk;

    if (strtolower(trim($sugu)) == "mees") {
        $mehed[] = $palk;
    } else {
        $naised[] = $palk;
    }
}
fclose($fail);

function keskmine($arvud) {
    return count($arvud) > 0 ? array_sum($arvud) / count($arvud) : 0;
}

echo "Meeste keskmine palk: " . round(keskmine($mehed), 2) . " €<br>";
echo "Naiste keskmine palk: " . round(keskmine($naised), 2) . " €<br>";

if (!empty($mehed)) {
    echo "Kõige suurem meeste palk: " . max($mehed) . " €<br>";
}
if (!empty($naised)) {
    echo "Kõige suurem naiste palk: " . max($naised) . " €<br>";
}
?>
