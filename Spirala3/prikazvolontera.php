<?php
session_start();
$uspjesno = 0;
$foto_replace = 0;
$foto_greska = 0;
$foto_nepredvidjeno = 0;
$foto_dimenzija = 0;
$foto_format = 0;
$greska_prezime = 0;
$greska_ime = 0;
$greska_datum = 0;
$greska_adresa = 0;
$korisnik = "";
$formaIzmjena = 0;
$fotografija = "";


	
if(isset($_REQUEST['csv']))
{
$filexml='volonteri.xml';

    if (file_exists($filexml)) 
           {
       $xml = simplexml_load_file($filexml);
       $f = fopen('volonteri.csv', 'w');
       createCsv($xml, $f);
       fclose($f);
    }
    else
    {
    	die("Nema xml-a!");
    }

    
}


function createCsv($xml,$f)
    {
    	$list = array();
    	foreach($xml->children() as $item)
    	{
    		
    		$list = array();
    		foreach ($item->children() as $children) {
    			$put_arr = array_push($list, $children->getName());
    			
    		}
    		
    	}	
    	fputcsv($f, $list);
    	$list = array();
    	foreach($xml->children() as $item)
    	{
    		
    		foreach ($item->children() as $children) {
    			
    				array_push($list, $children);
    			
    			
    		}
    		fputcsv($f, $list);
    		$list = array();
    	}	

    }


	if (isset($_SESSION['usernameForma'])) $korisnik = $_SESSION['usernameForma'];
	else
	{
		header('Location: '."volonteri.php",true,303);
		exit();
	}

if(isset($_REQUEST['obrisi'])){
	$obrisiIndeks = $_POST['obrisiIndeks'];
	$obrisiIndeks = htmlentities($obrisiIndeks, ENT_COMPAT, 'UTF-8', false);
	$xml3 = simplexml_load_file('volonteri.xml');
	$indeksBrisanje = 0;
	foreach($xml3->volonter as $volonter)
	{
		if($indeksBrisanje == $obrisiIndeks)
		{
			$dom=dom_import_simplexml($volonter);
        	$dom->parentNode->removeChild($dom);
		}
		$indeksBrisanje = $indeksBrisanje + 1;
	}
	$xml3->asXml('volonteri.xml');
}

if(isset($_REQUEST['edit'])){
	$izmijeniIndeks = $_POST['izmijeniIndeks'];
	$izmijeniIndeks = htmlentities($izmijeniIndeks, ENT_COMPAT, 'UTF-8', false);
	$formaIzmjena = 1;
	$xml3 = simplexml_load_file('volonteri.xml');
	$indeksIzmjena = 0;
	foreach($xml3->volonter as $volonter) { 
		if($indeksIzmjena == $izmijeniIndeks){
	    
		$fotografija = $volonter->fotografija;
		$prezime = $volonter->prezime;
		$ime = $volonter->ime;
		$datum = $volonter->datum_rodjenja;
		$adresa = $volonter->adresa;
	}
	    $indeksIzmjena = $indeksIzmjena + 1;


	}
	if($izmijeniIndeks >= $indeksIzmjena)
		$formaIzmjena = 0;
}

if(isset($_REQUEST['izmjena']))
{
	
	$izmijeniIndeks = $_POST['sendIndeks'];
	$izmijeniIndeks = htmlentities($izmijeniIndeks, ENT_COMPAT, 'UTF-8', false);
	$formaIzmjena = 1;

	$uspjesno = 2;
		
		
		
		
			
	$prezime = $_POST['prezimeVolonteri'];
	$ime = $_POST['imeVolonteri'];
	$datum = $_POST['datumVolonteri'];
			//var_dump($datum);
	$adresa = $_POST['adresaVolonteri'];
			//$fotografija = $_FILES['fotografijaVolonteri']['name'];



			
	$prezime = htmlentities($prezime, ENT_COMPAT, 'UTF-8', false);
	$ime = htmlentities($ime, ENT_COMPAT, 'UTF-8', false);
	$datum = htmlentities($datum, ENT_COMPAT, 'UTF-8', false);
	$adresa = htmlentities($adresa, ENT_COMPAT, 'UTF-8', false);
			//$fotografija = htmlentities($fotografija, ENT_COMPAT, 'UTF-8', false);

	if(!preg_match('/^[A-Z][a-z]{1,19}$/',
                $prezime) || !preg_match('/^[A-Z][a-z]{1,19}$/',
                $ime) || !preg_match('/^([1][9][0-9][0-9])\-([0][13578]|[1][02])\-([0][1-9]|[12][0-9]|[3][01]$)|([1][9][0-9][0-9])\-([0][469]|[1][1])\-([0][1-9]|[12][0-9]|[3][0]$)|([1][9][0-9][0-9])\-[0][2]\-([0][1-9]|[12][0-9]$)$/', $datum) || !preg_match('/^[a-zA-Z\s]{4,}[0-9]+[a-z]?$/', $adresa))
	{
		if (!preg_match('/^[A-Z][a-z]{1,19}$/',
	                $prezime))
		{
			$greska_prezime = 1;
		}
		if (!preg_match('/^[A-Z][a-z]{1,19}$/',
	                $ime))
		{
			$greska_ime = 1;
		}
		if(!preg_match('/^([1][9][0-9][0-9])\-([0][13578]|[1][02])\-([0][1-9]|[12][0-9]|[3][01]$)|([1][9][0-9][0-9])\-([0][469]|[1][1])\-([0][1-9]|[12][0-9]|[3][0]$)|([1][9][0-9][0-9])\-[0][2]\-([0][1-9]|[12][0-9]$)$/', $datum))
		{
			$greska_datum = 1;
		}
		if(!preg_match('/^[a-zA-Z\s]{4,}[0-9]+[a-z]?$/', $adresa))
		{
			$greska_adresa = 1;
		}
	}

	
	if(file_exists('volonteri.xml'))
	{
		$xml3 = simplexml_load_file('volonteri.xml');
	}
	else
	{
		die('Ne postoji xml!');
	}
	
	$indeksIzmjena = 0;
	foreach($xml3->volonter as $volonter)
	{
		if($indeksIzmjena == $izmijeniIndeks)
		{
			$fotografija = $_FILES['fotografijaVolonteri']['name'];
			$fotografija = htmlentities($fotografija, ENT_COMPAT, 'UTF-8', false);
			if(($fotografija != $volonter->fotografija) && ($fotografija != ""))
			{
				
				if($_FILES['fotografijaVolonteri']['error'] > 0){
				    $foto_nepredvidjeno = 1;
					$foto_greska = 1;
				}
				if($_FILES['fotografijaVolonteri']['size'] > 500000){
				    $foto_dimenzija = 1;
					$foto_greska = 1;
				}
				if(file_exists('images/' . $_FILES['fotografijaVolonteri']['name']))
				{
					$foto_replace = 1;
					$foto_greska = 1;
				}
				if($fotografija != "")
				{
					if(!getimagesize($_FILES['fotografijaVolonteri']['tmp_name']))
					{
				    	$foto_format = 1;
						$foto_greska = 1;
					}	
					
				}
			}

			if(!preg_match('/^[A-Z][a-z]{1,19}$/',
                $prezime) || !preg_match('/^[A-Z][a-z]{1,19}$/',
                $ime) || !preg_match('/^([1][9][0-9][0-9])\-([0][13578]|[1][02])\-([0][1-9]|[12][0-9]|[3][01]$)|([1][9][0-9][0-9])\-([0][469]|[1][1])\-([0][1-9]|[12][0-9]|[3][0]$)|([1][9][0-9][0-9])\-[0][2]\-([0][1-9]|[12][0-9]$)$/', $datum) || !preg_match('/^[a-zA-Z\s]{4,}[0-9]+[a-z]?$/', $adresa))
			{
				if (!preg_match('/^[A-Z][a-z]{1,19}$/',
	                $prezime))
				{
					$greska_prezime = 1;
				}
				if (!preg_match('/^[A-Z][a-z]{1,19}$/',
	                $ime))
				{
					$greska_ime = 1;
				}
				if(!preg_match('/^([1][9][0-9][0-9])\-([0][13578]|[1][02])\-([0][1-9]|[12][0-9]|[3][01]$)|([1][9][0-9][0-9])\-([0][469]|[1][1])\-([0][1-9]|[12][0-9]|[3][0]$)|([1][9][0-9][0-9])\-[0][2]\-([0][1-9]|[12][0-9]$)$/', $datum))
				{
					$greska_datum = 1;
				}
				if(!preg_match('/^[a-zA-Z\s]{4,}[0-9]+[a-z]?$/', $adresa))
				{
					$greska_adresa = 1;
				}
			}

			else if ($foto_greska == 1)
			{
			}
			
			else
			{
			 	if($fotografija != $volonter->fotografija && $fotografija != "")
			 	{
					if(!move_uploaded_file($_FILES['fotografijaVolonteri']['tmp_name'], 'images/' . $_FILES['fotografijaVolonteri']['name']))
					{
	    				die('Greška pri uploadu - provjerite odredište.');
					}
				}

				$uspjesno = 3;
				$formaIzmjena = 0;
			 	
		
				if($prezime != $volonter->prezime)
				{
					$volonter->prezime = $prezime;
				}
				if($ime != $volonter->ime)
				{
					$volonter->ime = $ime;
				}
				if($datum != $volonter->datum_rodjenja)
				{
					$volonter->datum_rodjenja = $datum;
				}
				if($adresa != $volonter->adresa)
				{
					$volonter->adresa = $adresa;
				}
				if($fotografija != $volonter->fotografija && $fotografija != "")
				{
					$volonter->fotografija = $fotografija;
				}
			
		
		
			}

		}
		$indeksIzmjena = $indeksIzmjena + 1;
	
	}
	$xml3->asXml('volonteri.xml');
}

if(isset($_REQUEST['logout'])) {
	session_unset();
	header('Location: '."volonteri.php",true,303);
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
	<?php
	$xml2 = simplexml_load_file('volonteri.xml');

	$indeks = 0;
	/*print '<div class="kolona sest" id="karton">';
	print "Obriši (indeks):<br><form method='post' action='prikazvolontera.php?obrisi=1'>";
	print '<input value="0" type="number" name="obrisiIndeks0" id="obrisiIndeks0" min="0" required>';
	print '<br>
			<button type="submit" name="obrisi">Obriši</button></form></div>';
*/
	foreach($xml2->volonter as $volonter) { 
	    print '<div class="kolona sest" id="karton">'; 
	    print "<form method='post' action='prikazvolontera.php?obrisi=1'>"; 
	    print '<input type="hidden" name="obrisiIndeks" id="obrisiIndeks" value="';  
	    print $indeks;
		print '">';
		
		$foto = $volonter->fotografija;
		echo '<img src="images/'; 
		echo $foto;
		echo '"';
		echo ' alt="volonter_slika">';
		echo 'Prezime: ';
		echo $volonter->prezime;
		echo '<br>Ime: ';
		echo $volonter->ime;
		echo '<br>Datum rođenja: ';
		echo $volonter->datum_rodjenja;
		echo '<br>Adresa: ';
		echo $volonter->adresa;
		echo '<br>Indeks: (';
		echo $indeks;
		echo ')';
		print '<br><button type="submit" name="x">x</button>';
	    print '</form>';
	    print "<form method='post' action='prikazvolontera.php?edit=1'>"; 
	    print '<input type="hidden" name="izmijeniIndeks" id="izmijeniIndeks" value="';  
	    print $indeks;
		print '">';
		print '<button type="submit" name="izmijeni">Izmijeni</button>';
	    print '</form>';
	    print '</div>';
	    $indeks = $indeks + 1;


	}


	?>
		<div class="kolona dvanaest" id="karton_siroki">
		<form method='post' action='prikazvolontera.php?edit=1'>
				Izmijeni (indeks):<br>
				<input value="0" type="number" name="izmijeniIndeks" id="izmijeniIndeks" min="0" required><button type="submit" name="potvrdi">Potvrdi</button>
				
		</form>
		<?php
		if($formaIzmjena == 1)
		{
			print "<form method='post' enctype='multipart/form-data' action='prikazvolontera.php?izmjena=1'>";
				print '<input type="hidden" name="sendIndeks" id="sendIndeks" value="';
				print $izmijeniIndeks;
				print '">';
				
				print "Prezime:<br>";
				print '<input placeholder="Unesite prezime" value="';
				print $prezime;
				print '" type="text" name="prezimeVolonteri" id="prezimeVolonteri" onchange="ValidatePrezimeVolonteri()" required>
				<div class="labela" id="labelaPrezimeVolonteri">';
				if($greska_prezime == 1)
					print 'Greška u prezimenu!';
				
				print '</div>
				<br>
				Ime:<br>
				<input placeholder="Unesite ime" value="';
				print $ime;
				print '" type="text" name="imeVolonteri" id="imeVolonteri" onchange="ValidateImeVolonteri()" required>
				<div class="labela" id="labelaImeVolonteri">';
			
				if($greska_ime == 1)
					print 'Greška u imenu!';
				
				print '</div>
				<br>
				Datum rođenja:<br>
				<input type="date" value="';
				print $datum;
				print '" name="datumVolonteri" id="datumVolonteri" onchange="ValidateDatumVolonteri()" required>
				<div class="labela" id="labelaDatumVolonteri">';
				
				if($greska_datum == 1)
					print 'Greška u datumu rođenja!';
				
				print '</div>
				<br>
				Adresa:<br>
				<input placeholder="Unesite adresu" value="';
				print $adresa;
				print '" type="text" name="adresaVolonteri" id="adresaVolonteri" onchange="ValidateAdresaVolonteri()" required>
				<div class="labela" id="labelaAdresaVolonteri">';
				
				if($greska_adresa == 1)
					print 'Greška u adresi!';
				
				print '</div>
				<br>
				Fotografija:<br>
				<input type="file" accept="image/*" value="" name="fotografijaVolonteri" id="fotografijaVolonteri"><br>Fotografija: ';
				print $fotografija;
				print '<div class="labela" id="labelaFotografijaVolonteri">';
				
					
					if($foto_nepredvidjeno == 1)
						print 'Nepredviđena greška pri uploadu.';
					else if($foto_format == 1)
						print 'Morate uploadovati fotografiju!';
					else if($foto_dimenzija == 1)
						print 'Fotografija veća od 500kb.';
					else if($foto_replace == 1)
						print 'Fotografija sa datim imenom već postoji.';



			
				print '</div>
				<br>
				<button type="submit" onclick="return ValidateVolonteri1()" name="izmijeni">Izmijeni</button>
				
				</form>';
		}
		?>
				</div>

</div>


<div class="kolona dva" id="rightbar">
<?php

				if (isset($_SESSION['usernameForma']))
				{
					print "<a href='volonteri.php?logout=1'>Odjava</a><br><a href='volonteri.php'>Nazad</a>";

				}
				?>
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
<p><a href='prikazvolontera.php?csv=1'>CSV</a>
</p>
</div>
<div class="kolona sest" id="mobilni">
	<div class="aktivan"><a href="autizam.php"><img src="images/autizam.jpg" alt="autizam"></a></div>
</div>
<div class="kolona sest" id="mobilnidesno">
<?php

				if (isset($_SESSION['usernameForma']))
				{
					print "<a href='volonteri.php?logout=1'>Odjava</a><br><a href='volonteri.php'>Nazad</a>"; 
				}
				?>
	
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
<p><a href='prikazvolontera.php?csv=1'>CSV</a>
</p>
</div>
<div class="kolona dvanaest" id="footer">
Copyright © TKC Team 2016.
</div>

</BODY>
</HTML>