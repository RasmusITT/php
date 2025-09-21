<?php

$duration = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $start = $_POST['start'];
    $end = $_POST['end'];

    if (strlen($start) >= 5 && strlen($end) >= 5) {
        $startTime = strtotime($start);
        $endTime = strtotime($end);

        if ($startTime !== false && $endTime !== false) {
            $diff = $endTime - $startTime;
            if ($diff < 0) {
                $duration = "lopp peab olema hiljem kui algus";
            } else {
                $hours = floor($diff / 3600);
                $minutes = floor(($diff % 3600) / 60);
                $duration = $hours . " tundi ja " . $minutes . " minutit";
            }
        } else {
            $duration = "vigane aeg";
        }
    } else {
        $duration = "aeg peab olema vahemalt 5 symbolit (nt 08:30)";
    }
}


$fail = "tootajad.csv";
$mehed = [];
$naised = [];

if (file_exists($fail)) {
    $read = fopen($fail, "r");
    while (($data = fgetcsv($read, 1000, ";")) !== false) {
        $nimi = $data[0];
        $sugu = $data[1];
        $palk = (int)$data[2];
        if ($sugu == "m") {
            $mehed[] = $palk;
        } elseif ($sugu == "n") {
            $naised[] = $palk;
        }
    }
    fclose($read);
}

$keskmineMehed = count($mehed) ? array_sum($mehed) / count($mehed) : 0;
$keskmineNaised = count($naised) ? array_sum($naised) / count($naised) : 0;

$maxMehed = count($mehed) ? max($mehed) : 0;
$maxNaised = count($naised) ? max($naised) : 0;
?>

<h2>Soiduaeg</h2>
<form method="post">
    Algusaeg: <input type="text" name="start" placeholder="hh:mm">
    Loppaeg: <input type="text" name="end" placeholder="hh:mm">
    <input type="submit" value="Arvuta">
</form>

<?php if ($duration) echo "<p>Soiduaeg: $duration</p>"; ?>

<h2>Palkade analyys</h2>
<?php
if (file_exists($fail)) {
    echo "Meeste keskmine palk: " . round($keskmineMehed, 2) . "<br>";
    echo "Naiste keskmine palk: " . round($keskmineNaised, 2) . "<br>";
    echo "Meeste suurim palk: " . $maxMehed . "<br>";
    echo "Naiste suurim palk: " . $maxNaised . "<br>";

    if ($keskmineMehed > $keskmineNaised) {
        echo "Meeste keskmine palk on suurem.";
    } elseif ($keskmineMehed < $keskmineNaised) {
        echo "Naiste keskmine palk on suurem.";
    } else {
        echo "Keskmised on vordsed.";
    }
} else {
    echo "Faili tootajad.csv ei leitud!";
}
?>
