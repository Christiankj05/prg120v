<?php  
include("db-tilkobling.php");


$sqlStudium = "SELECT DISTINCT studiumkode FROM klasse ORDER BY studiumkode;";
$resultStudium = mysqli_query($db, $sqlStudium);
?>
<h3>Registrer studium</h3>
<form method="post" action="" id="registrerStudiumSkjema" name="registrerStudiumSkjema">
Klassekode  <input type="text" id="klassekode" name="klassekode" required /> <br/>
Klassenavn  <input type="text" id="klassenavn" name="klassenavn" required /> <br/>
Studiumkode 
<select id="studiumkode" name="studiumkode">
    <option value="">Velg eksisterende studiumkode</option>
    <?php
    while ($rad = mysqli_fetch_array($resultStudium)) {
        $kode = $rad["studiumkode"];
        print("<option value='$kode'>$kode</option>");
    }
    ?>
</select>
eller skriv ny: <input type="text" id="ny_studiumkode" name="ny_studiumkode" /> <br/>
<input type="submit" value="Registrer studium" id="registrerStudiumKnapp" name="registrerStudiumKnapp" />
<input type="reset" value="Nullstill" id="nullstill" name="nullstill" /> <br />
</form>

<?php
if (isset($_POST["registrerStudiumKnapp"])) {
    $studiumkode = $_POST["studiumkode"];
    $ny_studiumkode = $_POST["ny_studiumkode"];
    $klassenavn = $_POST["klassenavn"];
    $klassekode = $_POST["klassekode"];

  if ($studiumkode && $ny_studiumkode && $studiumkode !== $ny_studiumkode) {
        print('<span style="color:red;">Du er morsom, du kan bare velge ett alternativ (Studiumkode), prøv på nytt :D </span>');
 }
    else {
    if ($ny_studiumkode) {
        $studiumkode = $ny_studiumkode;
    }

    if (!$studiumkode || !$klassenavn || !$klassekode) {
        print("Alle felt m&aring; fylles ut");
    } else {
        include("db-tilkobling.php");

        $sqlSetning = "SELECT * FROM klasse WHERE studiumkode='$studiumkode' AND klassenavn='$klassenavn';";
        $sqlResultat = mysqli_query($db, $sqlSetning) or die("ikke mulig &aring; hente data fra databasen");
        $antallRader = mysqli_num_rows($sqlResultat);

        if ($antallRader != 0) {
            print '<span style="color: red;">Studiet finnes allerede!</span>';
        } else {
            $sqlSetning = "INSERT INTO klasse (studiumkode, klassenavn, klassekode)
                           VALUES('$studiumkode', '$klassenavn', '$klassekode');";
            mysqli_query($db, $sqlSetning) or die("ikke mulig &aring; registrere data i databasen");
            print("F&oslash;lgende klasse og studium er n&aring; registrert: $klassekode $studiumkode ($klassenavn)");
        }
    }
  }
}
?>
