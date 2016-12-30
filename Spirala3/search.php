<?php
session_start();
$uspjesno = 0;
$korisnik = "";
if(count($_POST) > 0)
{

  if (isset($_SESSION['usernameForma'])) $korisnik = $_SESSION['usernameForma'];
  else if(isset($_REQUEST['usernameForma'])){
  $pass = $_POST['passwordForma'];
  $username = $_POST['usernameForma'];

  $xml2 = simplexml_load_file('podaci.xml');

  foreach($xml2->user as $user) { 
      if($user->password == $pass && $user->name == $username) {
        $korisnik = $_REQUEST['usernameForma'];
        $_SESSION['usernameForma'] = $korisnik;
        $uspjesno = 1;
          break;
      }
  }
  }
}



if(isset($_REQUEST['logout'])) {
  session_unset();
  header('Location: '."search.php",true,303);
  die();}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML>
<HEAD>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="stil.css">
<script type="text/javascript" src="java.js"></script>

<script>
function showResult(str) {
  if (str.length==0) { 
    document.getElementById("livesearch").innerHTML="";
    document.getElementById("livesearch").style.border="0px";
    return;
  }
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("livesearch").innerHTML=this.responseText;
      //document.getElementById("livesearch").style.border="1px solid #A5ACB2";
    }
  }
  xmlhttp.open("GET","livesearch.php?q="+str,true);
  xmlhttp.send();
}
</script>


<TITLE>
HWA BiH
</TITLE>

</HEAD>
<BODY>

<div id="LBpozadina" onclick="zatvoriLB()">
  <div id="LB">
    <img id="velikaslika">
  </div>
</div>
<div class="kolona dvanaest" id="zaglavlje">
  <div class="kolona dva" id="logo">
    <img src="images/logo20.png" alt="logo">
  </div>

  <div class="kolona deset" id="header">
    <a href="index.php">
    <div class="meni">
      Naslovna
    </div>
    </a>
    <a href="onama.php">
    <div class="meni">
      O nama
    </div>
    </a>

    
    <div class="meni" href="projekti.php" onmouseleave="zatvori()">
    <a href="projekti.php">
    <div class="dropmeni" onmouseover="mojaFunkcija()">
      Projekti</div>
      </a>
      <div id="myDropdown" class="dropdownsadrzaj">
        <a href="socialhousing.php">Social housing</a>
        <a href="returnandintegration.php">Return and integration</a>
        <a href="supporttoromadecade.php">Support to Roma decade</a>
        <a href="educationandinclusion.php">Education and inclusion</a>
   
    </div>
    </div>
    

    <a href="partneri.php">
    <div class="meni">
      Partneri
    </div>
    </a>
    <a href="kontakti.php">
    <div class="meni">
      Kontakti
    </div>
    </a>

  </div>
  
</div>


<div class="kolona dva" id="leftbar">
  <a href="autizam.php"><img src="images/autizam.jpg" alt="autizam"></a>
</div>




<div class="kolona osam" id="mainugrozeni">
  <div class="kolona dvanaest" id="formaugrozeni">
    <form method="post" action="search.php?search=1">
    <input type="text" size="30" value="" id="string" name="string" onkeyup="showResult(this.value)"><button name="search" id="search" type="submit" onclick="showResult(this.value)">Search</button></form></div>
    <div id="livesearch">
      <?php
if(isset($_REQUEST['search'])) {
$uspjesno = 2;
$xmlDoc=new DOMDocument();
$xmlDoc->load("volonteri.xml");

$x=$xmlDoc->getElementsByTagName('volonter');
 $hint="";
 if(isset($_POST['string']))
    $q = $_POST['string'];
  else
    $q = "";
 if (strlen($q)>0) {
  $hint="";
  for($i=0; $i<($x->length); $i++) {
    $foto = $x->item($i)->getElementsByTagName('fotografija');
    $prezime=$x->item($i)->getElementsByTagName('prezime');
    $ime=$x->item($i)->getElementsByTagName('ime');
    $datum_rodjenja=$x->item($i)->getElementsByTagName('datum_rodjenja');
    $adresa=$x->item($i)->getElementsByTagName('adresa');
    if ($prezime->item(0)->nodeType==1) {
      //find a link matching the search text
      if (stristr($prezime->item(0)->childNodes->item(0)->nodeValue,$q) || stristr($ime->item(0)->childNodes->item(0)->nodeValue,$q)) {
        if ($hint=="") {
          $hint = '<div class="kolona sest" id="karton">' . "<form method='post' action='prikazvolontera.php?obrisi=1'>" . '<input type="hidden" name="obrisiIndeks" id="obrisiIndeks" value="' .  $i . '"><img src="images/' . $foto->item(0)->childNodes->item(0)->nodeValue . '"' . ' alt="volonter_slika">Prezime: ' . $prezime->item(0)->childNodes->item(0)->nodeValue . '<br>Ime: ' . $ime->item(0)->childNodes->item(0)->nodeValue . '<br>Datum rođenja: ' . $datum_rodjenja->item(0)->childNodes->item(0)->nodeValue . '<br>Adresa: ' . $adresa->item(0)->childNodes->item(0)->nodeValue . '<br>Indeks: (' . $i . ')' . '<br><button type="submit" name="x">x</button>' . '</form>' . "<form method='post' action='prikazvolontera.php?edit=1'>" . '<input type="hidden" name="izmijeniIndeks" id="izmijeniIndeks" value="' . $i . '">' . '<button type="submit" name="izmijeni">Izmijeni</button>' . '</form>' . '</div>';

          //$hint= $prezime->item(0)->childNodes->item(0)->nodeValue . " " . $z->item(0)->childNodes->item(0)->nodeValue . "<br>";
        } else {
         $hint = $hint . '<div class="kolona sest" id="karton">' . "<form method='post' action='prikazvolontera.php?obrisi=1'>" . '<input type="hidden" name="obrisiIndeks" id="obrisiIndeks" value="' .  $i . '"><img src="images/' . $foto->item(0)->childNodes->item(0)->nodeValue . '"' . ' alt="volonter_slika">Prezime: ' . $prezime->item(0)->childNodes->item(0)->nodeValue . '<br>Ime: ' . $ime->item(0)->childNodes->item(0)->nodeValue . '<br>Datum rođenja: ' . $datum_rodjenja->item(0)->childNodes->item(0)->nodeValue . '<br>Adresa: ' . $adresa->item(0)->childNodes->item(0)->nodeValue . '<br>Indeks: (' . $i . ')' . '<br><button type="submit" name="x">x</button>' . '</form>' . "<form method='post' action='prikazvolontera.php?edit=1'>" . '<input type="hidden" name="izmijeniIndeks" id="izmijeniIndeks" value="' . $i . '">' . '<button type="submit" name="izmijeni">Izmijeni</button>' . '</form>' . '</div>';
        }
      }
    }
  }
}
if ($hint=="") {
  $response="no suggestion";
} else {
  $response=$hint;
}

//output the response
echo $response;

}
?>

    </div>

<!--</form>-->

  </div>
<!--</div>-->



<div class="kolona dva" id="rightbar">
<?php
  if($uspjesno == 1)

  print "Uspjesna prijava!<br>";
  
    else if(count($_POST) > 0 && $uspjesno == 0)
    print "Niste unijeli ispravne podatke!<br>";

        if (isset($_SESSION['usernameForma']))
        {
          print "<a href='search.php?logout=1'>Odjava</a>";
        }
        else
        {
          print '<form method="post" action="search.php">
      <div class="kolona dvanaest" id="formaautizam">
        username:<br>
        <input placeholder="Unesite username" value="" type="text" name="usernameForma" id="usernameForma"  required>
        <div class="labela" id="labelaUsername"></div>
        <br>
        password:<br>
        <input placeholder="Unesite password" value="" type="password" name="passwordForma" id="passwordForma"  required>
        <div class="labela" id="labelaPassword"></div>
        <br>
        <button  name="login">Login</button>
        
      </div>
    </form>';
          
        }?>
<p>&nbsp;<br>
<a href="ugrozeni.php">Prijavite ugrožene porodice</a>
</p>
<?php
if (isset($_SESSION['usernameForma']))
{
print "<p>
<a href='prikazugrozenih.php'>Prikaži ugrožene</a>
</p>";
}
?>
<p>
<a href="volonteri.php">Prijavite se za volontera</a>
</p>
<?php
if (isset($_SESSION['usernameForma']))
{
print "<p>
<a href='prikazvolontera.php'>Prikaži volontere</a>
</p>";
}
?>
</div>
<div class="kolona sest" id="mobilni">
  <div class="aktivan"><a href="autizam.php"><img src="images/autizam.jpg" alt="autizam"></a></div>
</div>
<div class="kolona sest" id="mobilnidesno">
<?php
if($uspjesno == 1)

  print "Uspjesna prijava!<br>";
  
    else if(count($_POST) > 0 && $uspjesno == 0)
    print "Niste unijeli ispravne podatke!<br>";

        if (isset($_SESSION['usernameForma']))
        {
          print "<a href='search.php?logout=1'>Odjava</a>";
        }
        else
        {
          print '<form method="post" action="search.php">
      <div class="kolona dvanaest" id="formaautizam">
        username:<br>
        <input placeholder="Unesite username" value="" type="text" name="usernameForma" id="usernameForma"  required>
        <div class="labela" id="labelaUsername"></div>
        <br>
        password:<br>
        <input placeholder="Unesite password" value="" type="password" name="passwordForma" id="passwordForma"  required>
        <div class="labela" id="labelaPassword"></div>
        <br>
        <button  name="login">Login</button>
        
      </div>
    </form>';
          
        }?>
  
<p>&nbsp;<br>
<a href="ugrozeni.php">Prijavite ugrožene porodice</a>
</p>
<?php
if (isset($_SESSION['usernameForma']))
{
print "<p>
<a href='prikazugrozenih.php'>Prikaži ugrožene</a>
</p>";
}
?>
<p>
<a href="volonteri.php">Prijavite se za volontera</a>
</p>
<?php
if (isset($_SESSION['usernameForma']))
{
print "<p>
<a href='prikazvolontera.php'>Prikaži volontere</a>
</p>";
}
?>
</div>
<div class="kolona dvanaest" id="footer">
Copyright © TKC Team 2016.
</div>

</BODY>
</HTML>