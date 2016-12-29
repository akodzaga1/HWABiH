<?php
session_start();
$uspjesno = 0;
$greska_ime = 0;
$greska_prezime = 0;
$korisnik = "";

if(isset($_REQUEST['pdf']))
{
	require('fpdf181/fpdf.php');

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->SetY(10);
$pdf->SetX(10);
$pdf->Cell(0,0,'Podrzali projekat:');
$pdf->SetFont('Arial','I',12);

$poY = 20;
$redni = 1;

$xml2 = simplexml_load_file('autizam.xml');
foreach($xml2->potpisnik as $potpisnik)
{
	$pdf->SetY($poY);
	$pdf->Cell(0,0,$redni . ". " . $potpisnik->ime . " " . $potpisnik->prezime);
	$poY = $poY + 5;
	if($redni%50==0 && $redni!=0) {
   		$pdf->addPage();
   		$poY = 20;
}
	$redni = $redni + 1;
}

$pdf->Output('autizam.pdf','I');

}


if (isset($_SESSION['usernameForma'])) $korisnik = $_SESSION['usernameForma'];
if(count($_POST) > 0)
{
	if(isset($_REQUEST['forma'])){
		$uspjesno = 2;
		
		
		
		
			$ime = $_POST['imeAutizam'];
			$prezime = $_POST['prezimeAutizam'];



			$ime = htmlentities($ime, ENT_COMPAT, 'UTF-8', false);
			$prezime = htmlentities($prezime, ENT_COMPAT, 'UTF-8', false);

			if(!preg_match('/^[A-Z][a-z]{1,19}$/',
                $ime) || !preg_match('/^[A-Z][a-z]{1,19}$/',
                $prezime))
			{
				if (!preg_match('/^[A-Z][a-z]{1,19}$/',
                $ime))
				{
				 $greska_ime = 1;
				}
				if (!preg_match('/^[A-Z][a-z]{1,19}$/',
	                $prezime))
				{
					$greska_prezime = 1;
				}
			}
				
			
			else
			{
			 	$uspjesno = 3;
			 	if(file_exists('autizam.xml')){
		
			$xml = simplexml_load_file('autizam.xml');

			$novi = $xml->addChild('potpisnik');
			$novi->addChild('ime', $ime);
			$novi->addChild('prezime', $prezime);

			$xml->asXml('autizam.xml');
		}
		else
		{
			

			$str = '<?xml version="1.0" encoding="UTF-8"?><potpisnici></potpisnici>';
			$xml = simplexml_load_string($str);


			$xml->potpisnik = "";
			$xml->potpisnik->addChild('ime', $ime);
			$xml->potpisnik->addChild('prezime', $prezime);
			

			$doc = new DOMDocument('1.0');
			$doc->formatOutput = true;
			$doc->preserveWhiteSpace = true;
			$doc->loadXML($xml->asXML(), LIBXML_NOBLANKS);
			$doc->save('autizam.xml');
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
	header('Location: '."autizam.php",true,303);
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
	<div class="aktivan"><a href="autizam.php"><img src="images/autizam.jpg" alt="autizam"></a></div>
</div>

<div class="kolona osam" id="mainautizam">
	<div class="kolona dvanaest" id="autizam">
		<img src="images/brosura1.png" alt="brosura1">
		<img src="images/brosura2.png" alt="brosura2">
		<p>
			Podržite projekat svojim potpisom:
		</p>
		<form method="post" action="autizam.php?forma=1">
			<div class="kolona tri" id="formaautizam">
				Ime:<br>
				<input placeholder="Unesite ime" value="" type="text" name="imeAutizam" id="imeAutizam" onchange="return ValidateImeAutizam()" required>
				<div class="labela" id="labelaIme">
				<?php
				if($greska_ime == 1)
					print 'Greška u imenu!';
				?>	

				</div>
				<br>
				Prezime:<br>
				<input placeholder="Unesite prezime" value="" type="text" name="prezimeAutizam" id="prezimeAutizam" onchange="return ValidatePrezimeAutizam()" required>
				<div class="labela" id="labelaPrezime">
					<?php
				if($greska_prezime == 1)
					print 'Greška u prezimenu!';
				?>	
				</div>
				<br>
				<button type="submit" onclick="return ValidateAutizam()" name="podrzi">Podrži</button>
			</div>
		</form>
	</div>
	<?php
	if($uspjesno == 3)
		print 'Uspješan potpis!';
	?>
</div>
<div class="kolona dva" id="rightbar">
<?php
	if($uspjesno == 1)

	print "Uspjesna prijava!<br>";
	
    else if(count($_POST) > 0 && $uspjesno == 0)
    print "Niste unijeli ispravne podatke!<br>";

				if (isset($_SESSION['usernameForma']))
				{
					print "<a href='autizam.php?logout=1'>Odjava</a>";
				}
				else
				{
					print '<form method="post" action="autizam.php">
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
<p><a href='autizam.php?pdf=1'>PDF</a>
</p>
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
					print "<a href='autizam.php?logout=1'>Odjava</a>";
				}
				else
				{
					print '<form method="post" action="autizam.php">
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
<p><a href='autizam.php?pdf=1'>PDF</a>
</p>
</div>
<div class="kolona dvanaest" id="footer">
Copyright © TKC Team 2016.
</div>

</BODY>
</HTML>