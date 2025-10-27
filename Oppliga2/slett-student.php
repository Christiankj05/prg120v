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
