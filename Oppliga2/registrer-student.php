<?php /* registrer-studium */
/*
/* Programmet lager et html-skjema for å registrere et studium
/* Programmet registrerer data (studiumkode og klassenavn) i databasen
*/
?>
<h3>Registrer studium </h3>
<form method="post" action="" id="registrerStudiumSkjema" name="registrerStudiumSkjema">
Klassekode  <input type="text" id="klassekode" name="klassekode" required /> <br/>
Klassenavn  <input type="text" id="klassenavn" name="klassenavn" required /> <br/>
Studiumkode <input type="text" id="studiumkode" name="studiumkode" required /> <br/>
<input type="submit" value="Registrer studium" id="registrerStudiumKnapp" name="registrerStudiumKnapp" />
<input type="reset" value="Nullstill" id="nullstill" name="nullstill" /> <br />
</form>
<?php
if (isset($_POST["registrerStudiumKnapp"]))
{
    $studiumkode = $_POST["studiumkode"];
    $klassenavn   = $_POST["klassenavn"];
    $klassekode   = $_POST["klassekode"];

    if (!$studiumkode || !$klassenavn || !$klassekode)
    {
        print("Alle felt m&aring; fylles ut");
    }
    else
    {
        include("db-tilkobling.php"); /* tilkobling til database-serveren utført og valg av database foretatt */

        $sqlSetning  = "SELECT * FROM klasse WHERE studiumkode='$studiumkode';";
        $sqlResultat = mysqli_query($db, $sqlSetning) or die("ikke mulig &aring; hente data fra databasen");
        $antallRader = mysqli_num_rows($sqlResultat);

        if ($antallRader != 0) /* studiet er registrert fra før */
        {
            print("\033[Dette studiet finnes allerede\033[0m\n");
        }
        else
        {
            $sqlSetning = "INSERT INTO klasse (studiumkode, klassenavn, klassekode)
                           VALUES('$studiumkode', '$klassenavn', '$klassekode');";
            mysqli_query($db, $sqlSetning) or die("ikke mulig &aring; registrere data i databasen");
            /* SQL-setning sendt til database-serveren */
            print("F&oslash;lgende studium er n&aring; registrert: $studiumkode $klassenavn $klassekode");
        }
    }
}
?>
