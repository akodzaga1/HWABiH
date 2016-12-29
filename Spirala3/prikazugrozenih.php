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
$formaIzmjena = 0;
$fotografija = "";

if(isset($_REQUEST['csv']))
{
$filexml='ugrozeni.xml';

    if (file_exists($filexml)) 
           {
       $xml = simplexml_load_file($filexml);
       $f = fopen('ugrozeni.csv', 'w');
       createCsv($xml, $f);




       fclose($f);
    }
    else
    {
    	die("Nema xml-a!");
    }
    header("Content-Type: application/octet-stream");
    header("Content-Disposition: attachment; filename=ugrozeni.csv");
    readfile('ugrozeni.csv');
    exit();
    
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
		header('Location: '."ugrozeni.php",true,303);
		exit();
	}

if(isset($_REQUEST['obrisi'])){
	$obrisiIndeks = $_POST['obrisiIndeks'];
	$obrisiIndeks = htmlentities($obrisiIndeks, ENT_COMPAT, 'UTF-8', false);
	$xml3 = simplexml_load_file('ugrozeni.xml');
	$indeksBrisanje = 0;
	foreach($xml3->porodica as $porodica)
	{
		if($indeksBrisanje == $obrisiIndeks)
		{
			$dom=dom_import_simplexml($porodica);
        	$dom->parentNode->removeChild($dom);
		}
		$indeksBrisanje = $indeksBrisanje + 1;
	}
	$xml3->asXml('ugrozeni.xml');
}

if(isset($_REQUEST['edit'])){
	$izmijeniIndeks = $_POST['izmijeniIndeks'];
	$izmijeniIndeks = htmlentities($izmijeniIndeks, ENT_COMPAT, 'UTF-8', false);
	$formaIzmjena = 1;
	$xml3 = simplexml_load_file('ugrozeni.xml');
	$indeksIzmjena = 0;
	foreach($xml3->porodica as $porodica) { 
		if($indeksIzmjena == $izmijeniIndeks){
	    
		$fotografija = $porodica->fotografija;
		$prezime = $porodica->prezime;
		$uslovi = $porodica->uslovi;
		$broj_clanova = $porodica->broj_clanova;
		$adresa = $porodica->adresa;
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
		
		
		
		
			
	$prezime = $_POST['prezimeUgrozeni'];
	$uslovi = $_POST['opisUgrozeni'];
	$broj_clanova = $_POST['brojClanovaUgrozeni'];
			//var_dump($datum);
	$adresa = $_POST['adresaUgrozeni'];
			//$fotografija = $_FILES['fotografijaVolonteri']['name'];



			
	$prezime = htmlentities($prezime, ENT_COMPAT, 'UTF-8', false);
	$uslovi = htmlentities($uslovi, ENT_COMPAT, 'UTF-8', false);
	$broj_clanova = htmlentities($broj_clanova, ENT_COMPAT, 'UTF-8', false);
	$adresa = htmlentities($adresa, ENT_COMPAT, 'UTF-8', false);
			//$fotografija = htmlentities($fotografija, ENT_COMPAT, 'UTF-8', false);

	if(!preg_match('/^[A-Z][a-z]{1,19}$/',
                $prezime) || $broj_clanova <= 0 || !preg_match('/^[a-zA-Z\s]+$/', $uslovi) || !preg_match('/^[a-zA-Z\s]{4,}[0-9]+[a-z]?$/', $adresa))
			{
				if (!preg_match('/^[A-Z][a-z]{1,19}$/',
	                $prezime))
				{
					$greska_prezime = 1;
				}
				if ($broj_clanova <= 0)
				{
					$greska_clanovi = 1;
				}
				if(!preg_match('/^[a-zA-Z\s]+$/', $uslovi))
				{
					$greska_uslovi = 1;
				}
				if(!preg_match('/^[a-zA-Z\s]{4,}[0-9]+[a-z]?$/', $adresa))
				{
					$greska_adresa = 1;
				}
			}

	
	if(file_exists('ugrozeni.xml'))
	{
		$xml3 = simplexml_load_file('ugrozeni.xml');
	}
	else
	{
		die('Ne postoji xml!');
	}
	
	$indeksIzmjena = 0;
	foreach($xml3->porodica as $porodica)
	{
		if($indeksIzmjena == $izmijeniIndeks)
		{
			$fotografija = $_FILES['fotografijaUgrozeni']['name'];
			$fotografija = htmlentities($fotografija, ENT_COMPAT, 'UTF-8', false);
			if(($fotografija != $porodica->fotografija) && ($fotografija != ""))
			{
				
				if($_FILES['fotografijaUgrozeni']['error'] > 0){
				    $foto_nepredvidjeno = 1;
					$foto_greska = 1;
				}
				if($_FILES['fotografijaUgrozeni']['size'] > 500000){
				    $foto_dimenzija = 1;
					$foto_greska = 1;
				}
				if(file_exists('images/' . $_FILES['fotografijaUgrozeni']['name']))
				{
					$foto_replace = 1;
					$foto_greska = 1;
				}
				if($fotografija != "")
				{
					if(!getimagesize($_FILES['fotografijaUgrozeni']['tmp_name']))
					{
				    	$foto_format = 1;
						$foto_greska = 1;
					}	
					
				}
			}

			if(!preg_match('/^[A-Z][a-z]{1,19}$/',
                $prezime) || $broj_clanova <= 0 || !preg_match('/^[a-zA-Z\s]+$/', $uslovi) || !preg_match('/^[a-zA-Z\s]{4,}[0-9]+[a-z]?$/', $adresa))
			{
				if (!preg_match('/^[A-Z][a-z]{1,19}$/',
	                $prezime))
				{
					$greska_prezime = 1;
				}
				if ($broj_clanova <= 0)
				{
					$greska_clanovi = 1;
				}
				if(!preg_match('/^[a-zA-Z\s]+$/', $uslovi))
				{
					$greska_uslovi = 1;
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
			 	if($fotografija != $porodica->fotografija && $fotografija != "")
			 	{
					if(!move_uploaded_file($_FILES['fotografijaUgrozeni']['tmp_name'], 'images/' . $_FILES['fotografijaUgrozeni']['name']))
					{
	    				die('Greška pri uploadu - provjerite odredište.');
					}
				}

				$uspjesno = 3;
				$formaIzmjena = 0;
			 	
		
				if($prezime != $porodica->prezime)
				{
					$porodica->prezime = $prezime;
				}
				if($uslovi != $porodica->uslovi)
				{
					$porodica->uslovi = $uslovi;
				}
				if($broj_clanova != $porodica->broj_clanova)
				{
					$porodica->broj_clanova = $broj_clanova;
				}
				if($adresa != $porodica->adresa)
				{
					$porodica->adresa = $adresa;
				}
				if($fotografija != $porodica->fotografija && $fotografija != "")
				{
					$porodica->fotografija = $fotografija;
				}
			
		
		
			}

		}
		$indeksIzmjena = $indeksIzmjena + 1;
	
	}
	$xml3->asXml('ugrozeni.xml');
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
	<?php
	$xml2 = simplexml_load_file('ugrozeni.xml');
	
	$indeks = 0;
	/*print '<div class="kolona sest" id="karton">';
	print "Obriši (indeks):<br><form method='post' action='prikazugrozenih.php?obrisi=1'>";
	print '<input value="0" type="number" name="obrisiIndeks" id="obrisiIndeks" min="0" required>';
	print '<br>
			<button type="submit" name="obrisi">Obriši</button></form></div>';*/

	foreach($xml2->porodica as $porodica) { 
	    print '<div class="kolona sest" id="karton">';   
	    print "<form method='post' action='prikazugrozenih.php?obrisi=1'>"; 
	    print '<input type="hidden" name="obrisiIndeks" id="obrisiIndeks" value="';  
	    print $indeks;
		print '">';

		$foto = $porodica->fotografija;
		echo '<img src="images/'; 
		echo $foto;
		echo '"';
		echo ' alt="ugrozeni_slika">';
		echo 'Prezime: ';
		echo $porodica->prezime;
		echo '<br>Broj članova domaćinstva: ';
		echo $porodica->broj_clanova;
		echo '<br>Uslovi života: ';
		echo $porodica->uslovi;
		echo '<br>Adresa: ';
		echo $porodica->adresa;
		echo '<br>Indeks: (';
		echo $indeks;
		echo ')';
		print '<br><button type="submit" name="x">x</button>';
	    print '</form>';
	    print "<form method='post' action='prikazugrozenih.php?edit=1'>"; 
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
		<form method='post' action='prikazugrozenih.php?edit=1'>
				Izmijeni (indeks):<br>
				<input value="0" type="number" name="izmijeniIndeks" id="izmijeniIndeks" min="0" required><button type="submit" name="potvrdi">Potvrdi</button>
				
		</form>
		<?php
		if($formaIzmjena == 1)
		{
			print "<form method='post' enctype='multipart/form-data' action='prikazugrozenih.php?izmjena=1'>";
				print '<input type="hidden" name="sendIndeks" id="sendIndeks" value="';
				print $izmijeniIndeks;
				print '">';
				
				print "Prezime:<br>";
				print '<input placeholder="Unesite prezime" value="';
				print $prezime;
				print '" type="text" name="prezimeUgrozeni" id="prezimeUgrozeni" onchange="ValidatePrezimeUgrozeni()" required>
				<div class="labela" id="labelaPrezimeUgrozeni">';
				if($greska_prezime == 1)
					print 'Greška u prezimenu!';
				
				print '</div>
				<br>
				Broj članova domaćinstva:<br>
				<input value="';
				print $broj_clanova;
				print '" type="number" name="brojClanovaUgrozeni" id="brojClanovaUgrozeni" onchange="ValidateBrojClanovaUgrozeni()" min="1" required>
				<div class="labela" id="labelaBrojClanovaUgrozeni">';
				if($greska_clanovi == 1)
					print 'Greška u broju članova domaćinstva!';
				
				print '</div>
				<br>
				Opis uslova života:<br>';
				print '<input placeholder="Opišite uslove života" value="';
				print $uslovi;
				print '" type="text" name="opisUgrozeni" id="opisUgrozeni" onchange="ValidateOpisUgrozeni()" required>
				<div class="labela" id="labelaOpisUgrozeni">';
				if($greska_uslovi == 1)
					print 'Greška u opisu uslova života!';
				print '</div>
				<br>
				Adresa:<br>
				<input placeholder="Unesite adresu" value="';
				print $adresa;
				print '" type="text" name="adresaUgrozeni" id="adresaUgrozeni" onchange="ValidateAdresaUgrozeni()" required>
				<div class="labela" id="labelaAdresaUgrozeni">';
				
				if($greska_adresa == 1)
					print 'Greška u adresi!';
				
				print '</div>
				<br>
				Fotografija:<br>
				<input type="file" accept="image/*" value="" name="fotografijaUgrozeni" id="fotografijaUgrozeni"><br>Fotografija: ';
				print $fotografija;
				print '<div class="labela" id="labelaFotografijaUgrozeni">';
				
					
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
				<button type="submit" onclick="return ValidateUgrozeni1()" name="izmijeni">Izmijeni</button>
				
				</form>';
		}
		?>
				</div>

</div>



<div class="kolona dva" id="rightbar">
<?php

				if (isset($_SESSION['usernameForma']))
				{
					print "<a href='ugrozeni.php?logout=1'>Odjava</a><br><a href='ugrozeni.php'>Nazad</a>";

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
<p><a href='prikazugrozenih.php?csv=1'>CSV</a>
</p>
</div>
<div class="kolona sest" id="mobilni">
	<div class="aktivan"><a href="autizam.php"><img src="images/autizam.jpg" alt="autizam"></a></div>
</div>
<div class="kolona sest" id="mobilnidesno">
<?php

				if (isset($_SESSION['usernameForma']))
				{
					print "<a href='ugrozeni.php?logout=1'>Odjava</a><br><a href='ugrozeni.php'>Nazad</a>"; 
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
<p><a href='prikazugrozenih.php?csv=1'>CSV</a>
</p>
</div>
<div class="kolona dvanaest" id="footer">
Copyright © TKC Team 2016.
</div>

</BODY>
</HTML>