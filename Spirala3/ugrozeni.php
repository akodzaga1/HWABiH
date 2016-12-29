<?php
session_start();
$uspjesno = 0;
$foto_replace = 0;
$foto_greska = 0;
$foto_nepredvidjeno = 0;
$foto_dimenzija = 0;
$foto_format = 0;
$greska_prezime = 0;
$greska_clanovi = 0;
$greska_uslovi = 0;
$greska_adresa = 0;
$korisnik = "";

if(count($_FILES) > 0)
{
	if($_FILES['fotografijaUgrozeni']['error'] > 0){
	    $foto_nepredvidjeno = 1;
		$foto_greska = 1;
	}
	if($_FILES['fotografijaUgrozeni']['size'] > 500000){
	    $foto_dimenzija = 1;
		$foto_greska = 1;
	}
	if(file_exists('images/' . $_FILES['fotografijaUgrozeni']['name'])){
		$foto_replace = 1;
		$foto_greska = 1;
	}
	if(!getimagesize($_FILES['fotografijaUgrozeni']['tmp_name'])){
	    $foto_format = 1;
		$foto_greska = 1;
	}	
	
}

if(count($_POST) > 0)
{

	

	if(isset($_REQUEST['forma'])){
		$uspjesno = 2;
		
		
		
		
			
			$prezime = $_POST['prezimeUgrozeni'];
			$clanovi = $_POST['brojClanovaUgrozeni'];
			$uslovi = $_POST['opisUgrozeni'];
			$adresa = $_POST['adresaUgrozeni'];
			$fotografija = $_FILES['fotografijaUgrozeni']['name'];



			
			$prezime = htmlentities($prezime, ENT_COMPAT, 'UTF-8', false);
			$clanovi = htmlentities($clanovi, ENT_COMPAT, 'UTF-8', false);
			$uslovi = htmlentities($uslovi, ENT_COMPAT, 'UTF-8', false);
			$adresa = htmlentities($adresa, ENT_COMPAT, 'UTF-8', false);
			$fotografija = htmlentities($fotografija, ENT_COMPAT, 'UTF-8', false);

			if(!preg_match('/^[A-Z][a-z]{1,19}$/',
                $prezime) || $clanovi <= 0 || !preg_match('/^[A-Za-z\s]+$/', $uslovi) || !preg_match('/^[A-Za-z\s]{4,}[0-9]+[a-z]?$/', $adresa))
			{
				if (!preg_match('/^[A-Z][a-z]{1,19}$/',
	                $prezime))
				{
					$greska_prezime = 1;
				}
				if ($clanovi <= 0)
				{
					$greska_clanovi = 1;
				}
				if(!preg_match('/^[A-Za-z\s]+$/', $uslovi))
				{
					$greska_uslovi = 1;
				}
				if(!preg_match('/^[A-Za-z\s]{4,}[0-9]+[a-z]?$/', $adresa))
				{
					$greska_adresa = 1;
				}
			}

			else if ($foto_greska == 1)
			{

			}
			
			else
			{
			 	$uspjesno = 3;
			 	if(file_exists('ugrozeni.xml')){
		
			$xml = simplexml_load_file('ugrozeni.xml');

			$novi = $xml->addChild('porodica');
			
			$novi->addChild('prezime', $prezime);
			$novi->addChild('broj_clanova', $clanovi);
			$novi->addChild('uslovi', $uslovi);
			$novi->addChild('adresa', $adresa);
			$novi->addChild('fotografija', $fotografija);

			$xml->asXml('ugrozeni.xml');
		}
		else
		{
			

			$str = '<?xml version="1.0" encoding="UTF-8"?><porodice></porodice>';
			$xml = simplexml_load_string($str);


			$xml->porodica = "";
			
			$xml->porodica->addChild('prezime', $prezime);
			$xml->porodica->addChild('broj_clanova', $clanovi);
			$xml->porodica->addChild('uslovi', $uslovi);
			$xml->porodica->addChild('adresa', $adresa);
			$xml->porodica->addChild('fotografija', $fotografija);
			

			$doc = new DOMDocument('1.0');
			$doc->formatOutput = true;
			$doc->preserveWhiteSpace = true;
			$doc->loadXML($xml->asXML(), LIBXML_NOBLANKS);
			$doc->save('ugrozeni.xml');
		}

		if(!move_uploaded_file($_FILES['fotografijaUgrozeni']['tmp_name'], 'images/' . $_FILES['fotografijaUgrozeni']['name'])){
	    die('Greška pri uploadu - provjerite odredište.');
			}
		}


	}

	

	
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
	header('Location: '."ugrozeni.php",true,303);
	die();}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML>
<HEAD>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="stil.css">
<script type="text/javascript" src="java.js"></script>
<script type="text/javascript" src="validate.js"></script>

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
	<div class="kolona dvanaest" id="ugrozeni">
		<p>Prijavite ugroženu porodicu</p>
		<form method='post' enctype='multipart/form-data' action='ugrozeni.php?forma=1'>
			<?php
			if (isset($_SESSION['usernameForma']))
			{
				print '<div class="kolona sest" id="formaugrozeni">';
			}
			else
			{
				print '<div class="kolona dvanaest" id="formaugrozeni">';
			}
			?>
				Prezime porodice:<br>
				<input placeholder="Unesite prezime" value="" type="text" name="prezimeUgrozeni" id="prezimeUgrozeni" onchange="return ValidatePrezimeUgrozeni()" required>
				<div class="labela" id="Ugrozeni">
					<?php
				if($greska_prezime == 1)
					print 'Greška u prezimenu!';
				?>
				</div>
				<br>
				Broj članova domaćinstva:<br>
				<input value="1" type="number" name="brojClanovaUgrozeni" id="brojClanovaUgrozeni" onchange="return ValidateBrojClanovaUgrozeni()" min="1" required>
				<div class="labela" id="labelaBrojClanovaUgrozeni">
					<?php
				if($greska_clanovi == 1)
					print 'Greška u broju članova domaćinstva!';
				?>
				</div>
				<br>
				Opis uslova života:<br>
				<input placeholder="Opišite uslove života" value="" type="text" name="opisUgrozeni" id="opisUgrozeni" onchange="return ValidateOpisUgrozeni()" required>
				<div class="labela" id="labelaOpisUgrozeni">
					<?php
				if($greska_uslovi == 1)
					print 'Greška u opisu uslova života!';
				?>
				</div>
				<br>
				Adresa:<br>
				<input placeholder="Unesite adresu" value="" type="text" name="adresaUgrozeni" id="adresaUgrozeni" onchange="return ValidateAdresaUgrozeni()" required>
				<div class="labela" id="labelaAdresaUgrozeni">
					<?php
				if($greska_adresa == 1)
					print 'Greška u adresi!';
				?>
				</div>
				<br>
				Fotografija koja najbolje opisuje situaciju:<br>
				<input type="file" accept="image/*" name="fotografijaUgrozeni" id="fotografijaUgrozeni" required>
				<div class="labela" id="labelaFotografijaUgrozeni">
					<?php
					
					if($foto_nepredvidjeno == 1)
						print 'Nepredviđena greška pri uploadu.';
					else if($foto_format == 1)
						print 'Morate uploadovati fotografiju!';
					else if($foto_dimenzija == 1)
						print 'Fotografija veća od 500kb.';
					else if($foto_replace == 1)
						print 'Fotografija sa datim imenom već postoji.';



					?>
				</div>
				<br>
				<button type="submit" onclick="return ValidateUgrozeni()" name="prijavi">Prijavi</button>
			<?php
		print '</div>';
		print '</form>';
		if (isset($_SESSION['usernameForma']))
		{
			print '<div class="kolona sest" id="formaugrozeni">';
			print "<a href='prikazugrozenih.php'>Prikaži ugrožene</a>";
			print '</div>';
		}


		if($uspjesno == 3)
		print 'Uspješna prijava!';
		?>
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
					print "<a href='ugrozeni.php?logout=1'>Odjava</a>";
				}
				else
				{
					print '<form method="post" action="ugrozeni.php">
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
					print "<a href='ugrozeni.php?logout=1'>Odjava</a>";
				}
				else
				{
					print '<form method="post" action="ugrozeni.php">
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