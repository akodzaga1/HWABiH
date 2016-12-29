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
	header('Location: '."onama.php",true,303);
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
		<div class="meni aktivan">
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




<div class="kolona osam" id="mainonama">
<div class="kolona dvanaest" id="onama">
Hilfswerk Austria International (HWA) je osnovana kao nevladina, humanitarna, neprofitna organizacija i počela je svoje internacionalne svjetske aktivnosti 1996. godine. Od 1989. godine internacionalni projekti bili su implementirani preko Österreichisches Hilfswerk. Kao organizacija Österreichisches Hilfswerk (Austrian welfare organization), HILFSWERK AUSTRIA INTERNATIONAL (HWA) pružala je humanitarnu pomoć širom svijeta kao i nadležno upravljanje projektima za projekte razvojne suradnje. HWA snabdijeva ljude dugi niz godina i pruža im podršku kao i priliku da reorganizuju i uravnoteže svoj život nakon velikih katastrofa. Sve aktivnosti ove organizacije su fleksibilne i pružaju pomoć gdje god je potrebna. HWA ima glavne urede u Beču, Austrija. Kroz 14 regionalnih ureda smještenih u Istočnoj Evropi (uključujući Balkan), Africi, Latinskoj Americi, Srednjem Istoku i Aziji i kroz saradnju sa lokalnim NVO, HWA implementira humanitarnu pomoć i projekte održivog razvoja na četiri kontinenta. <br>U 2010.-oj godini HWA je uspješno završila više od 80 projekata u 27 zemalja sa oko 100 zaposlenih, gdje je više od 80 njih lokalno osoblje koje radi na projektima širom svijeta. Fokusne regije HWA su: Jugoistočna Evropa/Kavkaz – Bosna i Hercegovina; Srbija; Rumunija; Republika Moldavija; Ukrajina; Bjelorusija; Ruska Federacija; Gruzija; Azerbejdžan; Armenija; Srednji Istok - Palestinske teritorije: Jordan, Iran; Azija - Avganistan; Tadžikistan; Pakistan; Indija; Nepal; Kina; Mjanmar/Burma; Tajland; Indonezija; Šri Lanka; Afrika - Sudan; Mozambik; Zimbabwe; Senegal; Latinska Amerika - Bolivija; Kolumbija; Nikaragva; Honduras; Haiti. <br>Bosna i Hercegovina je bila fokus aktivnosti HWA od 1992. godine. U periodu 1996.-2011. godina HWA je stekao specifična znanja i iskustva u Bosni i Hercegovini u oblasti reintegracije manjina, podrške izbjeglicama i raseljenim licima, pomirenju i izgradnji mira u post-konfliktnom periodu, stvaranju poslova, agrikulturi i socijalno-ekonomskom razvoju, o podršci malim i srednjim poduzećima, socijalnoj uključenosti, ljudskim pravima, korištenju kapaciteta i sl. <br>Prva oficijelna registracija HWA u BiH je obavljena odmah nakon Dejtonskog sporazuma, početkom 1996. godine. Pošto HWA ima projekte koji se mogu implementirati bez prekida, financijski doprinos različitih nacionalnih i međunarodnih donatora diljem cijele zemlje i ima dozvolu da radi na teritoriji čitave BiH. Više od 150 lokalnih profesionalaca je uključeno u projekte HWA u Bosni. <br>HWA ima jake i respektabilne preporuke u Bosni i Hercegovini s različitim donatorima: Vlada SAD-a (BPRM), Austrijska vlada (ADA), EC, UNHCR, nizozemska vlada, drugi austrijski donatori, bosanska vlada u organizaciji i implementaciji 73 projekta vrijedna više od 53 miliona eura. Više od 12 hiljada familija je potpomognuto rekonstrukcijom 3300 kuća, 6 stambenih zgrada sa 56 stanova, uvedeno bar 60 novih stalnih radnih mjesta, kreirana 2 centra za djecu sa posebnim potrebama itd. <br>Od početka svog angažmana u BiH HWA je imao raznolike aktivnosti usmjerene prema smanjenju siromaštva, socijalno-ekonomskom razvoju, jačanju civilne uloge stanovništva u promociji ljudskih prava i podršci najugroženijim skupinama, reintegraciji i socijalnoj integraciji, čime se doprinosi ispunjenju MDG-a.
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
					print "<a href='onama.php?logout=1'>Odjava</a>";
				}
				else
				{
					print '<form method="post" action="onama.php">
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
					print "<a href='onama.php?logout=1'>Odjava</a>";
				}
				else
				{
					print '<form method="post" action="onama.php">
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