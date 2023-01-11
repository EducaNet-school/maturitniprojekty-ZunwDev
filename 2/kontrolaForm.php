<form method="post">
    <label>Jmeno a prijmeni</label>
    <input type="text" name="jmeno"><br>
    <label>Adresa</label>
    <input type="text" name="adresa">
    <input type="submit" name="submit">
</form>

<?php

function validate() {
    $jmeno = $_POST['jmeno'];
    $adresa = $_POST['adresa'];
    return !empty($jmeno) && strpos($jmeno, " ") && !empty($adresa) && strlen($adresa) > 10 ? "1" : "0";
}

if (isset($_POST['submit'])) {
    echo validate();
}
