<h2>Soiduaeg</h2>
<form method="post">
    Stardi aeg (hh:mm): <input type="text" name="algus"><br>
    Lopp aeg (hh:mm): <input type="text" name="lopp"><br>
    <input type="submit" value="Arvuta">
</form>

<?php
if (!empty($_POST['algus']) && !empty($_POST['lopp'])) {
    $algus = $_POST['algus'];
    $lopp = $_POST['lopp'];

    if (strlen($algus) >= 5 && strlen($lopp) >= 5) {
        $algusAeg = strtotime($algus);
        $loppAeg = strtotime($lopp);

        if ($algusAeg && $loppAeg) {
            $vahe = $loppAeg - $algusAeg;

            if ($vahe >= 0) {
                $tunnid = floor($vahe / 3600);
                $minutid = floor(($vahe % 3600) / 60);
                echo "<p>soiduaeg: $tunnid tundi ja $minutid minutit.</p>";
            } else {
                echo "<p>loppaeg ei saa olla enne algusaega!</p>";
            }
        } else {
            echo "<p>Vigane sisestus (kasuta vormi hh:mm).</p>";
        }
    } else {
        echo "<p>Palun sisesta vahemalt 5 symbolit (nt 08:30).</p>";
    }
}
?>
