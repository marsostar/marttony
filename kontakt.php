<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
  if ($_SERVER["REQUEST_METHOD"] === 'POST') {
      $ime=$_POST['ime'];
      $tvrtka=$_POST['tvrtka'];
      $em=$_POST['em'];
       $opis=$_POST['opis'];
       
       $primatelj ="martamsostarec@gmail.com";
                      $naslov = "MartTony - Zahtjev za posao";
                     $poruka = "Ime i Prezime: ".$ime." Tvrtka: ".$tvrtka." kontakt : ".$em." opis : ".$opis."";
                     $por="po";
        $headers =  'MIME-Version: 1.0' . "\r\n"; 
$headers .= 'From: Your name <info@address.com>' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";           
   if(mail($primatelj , $naslov , $por,$headers )){echo "Zahtjev je poslan ! :)";}
              
  }
  
?>
<!DOCTYPE html>
<html>
<head>
    <link href="https://fonts.googleapis.com/css?family=Athiti|Didact+Gothic|Exo+2|Libre+Franklin|
          Poiret+One|Prompt|Quicksand|Roboto+Mono|Secular+One|Ubuntu+Condensed|Arimo|Dawning+of+a+New+Day" rel="stylesheet">
    <link href="stil.css" rel="stylesheet">
<style>
    footer{
        top:1000px;
    }
</style>
<script>
  function show(id) {
    document.getElementById(id).style.visibility = "visible";
  }
  function hide(id) {
    document.getElementById(id).style.visibility = "hidden";
  }
</script>
</head>
<body>



    <div class="prvi">
        
    </div>

    <div class="menu"  >
        <img  id="img" src="logoil.gif" alt="Mountain View" style="width:150px;height:110px;">
        <br>
        <a href="kontakt.php">Kontakt </a> 
        <a href="storadimo.php">Sto radimo </a> 
        <a href="projekti.php">Projekti </a> 
    </div>
    

 <form name="form" id="form" method="post" action="kontakt.php" enctype="multipart/form-data"> 
    
    <input type="text" name="ime" value="Ime i Prezime"  size="20" required class="submit">  <br>
    <input type="text" name="tvrtka" value="Tvrtka"  size="20" class="submit" >  <br>
    <input type="text" name="em" value="email/telefon"  size="20"  required class="submit">  <br>
    <textarea rows="4" cols="50" name="opis" required class="submit21" >
 Opis zahtjeva, pitanja ...
</textarea><br>
    <input type ="submit" value="Pošalji" class="submit">
    </form>
    
    <div class="potpis">
        MartTony
        </div>
   
<footer>
   <img src='logoilbijeli.gif' alt='footer' style='width:80px;height:60px;'>  Copyright © 2016 Antonio Ćosić & Marta Šostarec<br>
    All rights reserved  Site by MartTony<br>
    
 Contact: martamsostarec@gmail.com
          marsostar@foi.hr
          antcosic@foi.hr<br>
           <div class='fotmart'>   
      MartTony</div>
    </footer>
</body>
</html>