<form method="post">
    <label>Jmeno a prijmeni</label>
    <input type="text" name="jmeno"><br>
    <label>Adresa</label>
    <input type="text" name="adresa">
    <input type="submit" name="submit">
</form>

<?php

if (isset($_POST['submit'])) {
    $jmeno = $_POST['jmeno'];
    $adresa = $_POST['adresa'];
    if (!empty($jmeno) && strpos($jmeno, " ") && !empty($adresa) && strlen($adresa) > 10) {
        echo "jj";
    } else {
        echo "nn";
    }
}
