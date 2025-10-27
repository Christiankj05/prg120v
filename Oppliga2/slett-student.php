<?php ?>
<script src="funksjoner.js"></script>

<h3>Slett student</h3>

<form method="post" action="" id="slettStudentkjema" name="slettStudentskjema" onSubmit="return bekreft()">
    Student 
    <select name="brukernavn" id="brukernavn">
        <?php 
        print("<option value=''>Velg en student å slette</option>");
        include("dynamiske-funksjoner.php"); 
        listeboksstudent(); 
        ?> 
    </select> 
    <br/>
    <input type="submit" value="Slett student" name="slettStudentKnapp" id="slettStudentKnapp" />
</form>

<?php
if (isset($_POST["slettStudentKnapp"])) {
    include("db-tilkobling.php");
    $brukernavn = $_POST["brukernavn"];
    if (!$brukernavn) {
        print("Du har ikke valgt en student");
    } else {
        $sqlHent = "SELECT fornavn, etternavn, klassekode FROM student WHERE brukernavn='$brukernavn';";
        $resultat = mysqli_query($db, $sqlHent) or die("Feil ved henting av studentdata");
        if (mysqli_num_rows($resultat) == 0) {
            print("Fant ingen student med brukernavn <strong>$brukernavn</strong>.");
        } else {
            $rad = mysqli_fetch_array($resultat);
            $fornavn = $rad["fornavn"];
            $etternavn = $rad["etternavn"];
            $klassekode = $rad["klassekode"];
            $sqlSlett = "DELETE FROM student WHERE brukernavn='$brukernavn';";
            mysqli_query($db, $sqlSlett) or die("ikke mulig &aring; slette data i databasen");
            print("Studenten <strong>$fornavn $etternavn</strong> (brukernavn: <strong>$brukernavn</strong>, klasse: <strong>$klassekode</strong>) er nå slettet.");
        }
    }
}
?>
