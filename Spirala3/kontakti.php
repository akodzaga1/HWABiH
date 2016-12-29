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
	header('Location: '."kontakti.php",true,303);
	die();}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML>
<HEAD>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="stil.css">
<script type="text/javascript" src="java.js"></script>

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
		<div class="meni aktivan">
			Kontakti
		</div>
		</a>

	</div>
	
</div>


<div class="kolona dva" id="leftbar">
	<a href="autizam.php"><img src="images/autizam.jpg" alt="autizam"></a>
</div>





<div class="kolona osam" id="mainkontakt">
	<div class="kolona jedan" id="malilogo">
		<img src="images/logo_mali.png" alt="logo">
	</div>
	<div class="kolona jedanaest" id="kontakt">
		<h4>Hilfswerk Austria International
		<br>Representation office B&H
		<br>Derviša Numića 6
		<br>71000 Sarajevo 
		<br>Tel.: 
		<br>+387 33 525 372
                <br>+387 33 525 369
                <br>+387 33 715 275
                <br>+387 33 611 569
		<br>Fax.:   +387 33 611 563
		<br>e-mail:	hwambih@bih.net.ba</h4>
	</div>
</div>




<div class="kolona dva" id="rightbar">
<?php
	if($uspjesno == 1)

	print "Uspjesna prijava!<br>";
	
    else if(count($_POST) > 0 && $uspjesno == 0)
    print "Niste unijeli ispravne podatke!<br>";

				if (isset($_SESSION['usernameForma']))
				{
					print "<a href='kontakti.php?logout=1'>Odjava</a>";
				}
				else
				{
					print '<form method="post" action="kontakti.php">
			<div class="kolona dvanaest" id="formaautizam">
				username:<br>
				<input placeholder="Unesite username" value="" type="text" name="usernameForma" id="usernameForma"  required>
				<div class="labela" id="labelaUsername"></div>
				<br>
				password:<br>
				<input placeholder="Unesite password" value="" type="password" name="passwordForma" id="passwordForma"  required>
				<div class="labela" id="labelaPassword"></div>
				<br>
				<button name="login">Login</button>
				
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
					print "<a href='kontakti.php?logout=1'>Odjava</a>";
				}
				else
				{
					print '<form method="post" action="kontakti.php">
			<div class="kolona dvanaest" id="formaautizam">
				username:<br>
				<input placeholder="Unesite username" value="" type="text" name="usernameForma" id="usernameForma"  required>
				<div class="labela" id="labelaUsername"></div>
				<br>
				password:<br>
				<input placeholder="Unesite password" value="" type="password" name="passwordForma" id="passwordForma"  required>
				<div class="labela" id="labelaPassword"></div>
				<br>
				<button name="login">Login</button>
				
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