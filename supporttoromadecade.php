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
	header('Location: '."supporttoromadecade.php",true,303);
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
		<div class="meni">
			Kontakti
		</div>
		</a>

	</div>
	
</div>


<div class="kolona dva" id="leftbar">
	<a href="autizam.php"><img src="images/autizam.jpg" alt="autizam"></a>
</div>






<div class="kolona osam" id="mainpojedinacniprojekat">
	<div class="kolona dvanaest" id="pojedinacniprojekat">

		<h1>ROMA ACTION PROJECT</h1>

		<p>Hilfswerk Austria International (HWA), in partnership with organisation Arbeiter – Samariter – Bund Deutschland (ASB) and association Kali Sara – RIC and in the close cooperatoin with fourteen municipalities/towns (Tuzla, Lukavac, Gracanica, Novo Sarajevo, Kakanj, Centar Sarajevo, Zenica, Bihac, Krupa, Gornji Vakuf/Uskoplje, Capljina, Bijeljina, Vukosavlje and Zvornik), and four Ministries (Federation Ministry of displaced persos and refugees, Canton Tuzla – Ministry for work, social policy and return; Government of Una Sana Canton, Zenica Doboj Canton – Ministry for Labour, social policy and refugees) through conducting of all planned activities ensured that all project activities have been met.</p>
<p>Roma Action project is one of the most valuable and the most significant projects of support to the inclustion of Roma national minority that has ever been implemened in Bosnia and Herzegovina. Its total value is 3.036.856 Euro, out which the European Union provided 2,5 million Euro, and the rest  has been covered by B&H authorities of all levels. Besides solving the housing issues for 149 Roma families in 14 Municipalities/towns in the entire B&H along with the reconstruction of the accompanying infrastructure and the appropirate sustainability measures, the project has been a support to the implementation of Roma Action plans in B&H with a contribution to the improvement of the living conditions and socio-economic inclusion of the marginalised Roma population with the active inclusion and participation of local authorites. The achieved project results have provided a significantly better quality of life for the Roma in  the project implementation Municipalities/towns.</p>
<p>Apart from the co-financing, Municipalites/towns participating in the project have actively supported the inclusion of the Roma, participated in the selection of beneficiaries and following of all project activities and assisted with obtaining all neccessary documentation and permits. Municipalities/towns in which new facilites were built (social housing) provided the locations, neccessary documents and permits, as well as the connections to utility infrastructure. Čapljina Municipality is a special example since, upon an intervention by the EU, OSCE; UNHCR; US Embassy in B&H, Roma citizens and the other organizations, allocated land and all necessary documentation for five individual housing units that will be the property of the beneficiaries who will have solidly constructed homes for the first time in their lives after having spent their lives at the garbage dumps in the improvised facilities without water, electricity, sewage and other minimum living conditions.</p>
<p>Taking into consideration a fact that there is a large number of socially vulnerable Roma families who have no property at all and who did not receive any housing assistance through most of the projects implemented to far, HWA, along with the project partner ASB planned and constructed seven buildings with 64 housing units using the model of social housing in Bihać, Kakanj, Municipality Centar Sarajevo, Zenica, Bijeljina, Bosanska Krupa and Tuzla.</p>
<p>The housing for the remaining project beneficiaries, 85 families, who have been selected in line with the book of rules for selection of beneficiaries that was published by the B&H Ministry for human rights and refugees for all projects that are being implemented as the support to the Decade of Roma Inclusion 2005-2015, has been resolved through construction and reconstruction of the housing units that they own.</p>
<p>The project additionally provided for the better social inclusion of the Roma families through the promotion of registration into citizens registry books, facilitation of access to educatoin, employment and health care through organising workshops and direct work at the field that was implemented by the partner association Kali Sara RIC with its fourteen field cooperators. More than 300 persons have been informed and counselled through these workshops.</p>
<p>The foreseen support to socio-economic measures for improvement of living conditions, self-employment and income generation was, in agreement with the EUD, for the most part redirected to assisting Roma families who sustained major damages in the floods in May 2014.</p>
<p>The total of 246 families struck by the floods were assisted with emergency measures, parcels with foor and sanitary products. The remaining funds were used to procure and deliver 11 individual grants (machinery, greenhouses and live kettle) for beneficiaries in Municipalities Čapljina and Gornji Vakuf/Uskoplje and thereby it ensured the economic inclusion through the measure of sustainability.</p>

		
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
					print "<a href='supporttoromadecade.php?logout=1'>Odjava</a>";
				}
				else
				{
					print '<form method="post" action="supporttoromadecade.php">
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
					print "<a href='supporttoromadecade.php?logout=1'>Odjava</a>";
				}
				else
				{
					print '<form method="post" action="supporttoromadecade.php">
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