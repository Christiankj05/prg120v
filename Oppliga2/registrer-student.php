<?php  
include("db-tilkobling.php");


$sqlStudium = "SELECT DISTINCT klassekode FROM klasse ORDER BY klassekode;";
$resultStudium = mysqli_query($db, $sqlStudium);
?>
<h3>Registrer student</h3>
<form method="post" action="" id="registrerStudiumSkjema" name="registrerStudiumSkjema">
Brukernavn  <input type="text" id="brukernavn" name="brukernavn" required /> <br/>
Fornavn  <input type="text" id="fornavn" name="fornavn" required /> <br/>
Klassenavn  <input type="text" id="etternavn" name="etternavn" required /> <br/>
Klassekode 
<select id="klassekode" name="klassekode">
    <option value="">Velg eksisterende studiumkode</option>
    <?php
    while ($rad = mysqli_fetch_array($resultStudium)) {
        $kode = $rad["klqww3koe3"];
        print("<option value='$kode'>$kode</option>");
    }
    ?>
</select>
<input type="submit" value="Registrer student" id="registrerStudentKnapp" name="registrerStudentKnapp" />
<input type="reset" value="Nullstill" id="nullstill" name="nullstill" /> <br />
</form>

<?php
if (isset($_POST["registrerStudentKnapp"])) {
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
