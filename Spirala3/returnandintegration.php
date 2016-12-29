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
	header('Location: '."returnandintegration.php",true,303);
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

		<h1>SUPPORT TO DURABLE SOLUTIONS OF THE REVISED STRATEGY FOR IMPLEMENTATION OF ANNEX VII OF THE DAYTON PEACE AGREEMENT</h1>

		<p>The project: „Support to durable solutions of the Revised strategy for implementation of Annex VII of the Dayton Peace Agreement“, worth 8.1 million is funded by the European Union (in the amount of 7 million euro through IPA 2012), and co-funded and implemented by the UNHCR in cooperation with the project partners.</p>

<p>The purpose of this project is to assist at least 2.400 vulnerable displaced persons and refugees in B&H, including the women war victims with finding solutions to social challenges that they are facing, through the joint team work with local authorities, local community, civil society and project partners.</p>

<p>Project partners in cooperation with the local autorities are indentifying the needs od displaced persons and refugees with the aim of strengthening their social protection and inclusion, provision of health protection for the elderly, education for the children, providing of the free legal aid, pshychological and social  counselling and the housing. The project started in 2014 and shall be implemented untill 2016 in the following Municipalities in B&H: Bosanski Petrovac, Gradiška, Prijedor, Derventa, Maglaj, Bijeljina, Brčko Distrikt, Živinice, Mostar and Foča.</p>

<p>Project implementation partners are: UN Development fund (UNDP), UN Children's Fund (UNICEF), International organisation for migrations (IOM), Hilfswerk Austria International (HWA), Bosnian Humanitarian Logistic Service (BHLS), Foundation of local democracy (FLD), and Vaša prava B&H Association (VP).</p>
<br>HWA – Objectives within the project:
<br>-Ensure durable solutions for housing of vulnerable returnee and IDP families and support local integration of displaced persons who are not in the position to return to their pre-war homes.

<br>-Ensure sustainable economic conditions for returnee and IDP families through comprehensive actions adjusted to specific needs of each case individually.

<p>HWA – Main activities of the project:
<br>As a part of project activities in target municipalitites and through construction/reconstruction of housing units, Hilfswerk Austria International  shall support the most vulnerable families with the priority given to those who already returned and live in unbarable conditions and families who are in need of housing/soucial housing in the areas of their displacement. Reconstructed housing units shall be connected to utilities infrastructure.
For the most vulnerable IDP and returnee families with the priority of those whose housing units shall be constructed/reconstructed within the  project Hilfswerk Austria International shall create opportunities for self-employment and income generation through allocation of individual grants and HWA shall support small and medium enterprises with expanding their production capacities with the aim to create new jobs and possibilities to place their products to the market.</p>
<p>HWA – Quantitative and qualitative results of the project
<br>-105 housing units constructed/reconstructed
<br>-Constructed/reconstructed housing units connected to public utilities or adequate substitute solutions provided
<br>-231 individual grants allocated for economic sustainability;
<br>-10 jobs created through the development of 10 small/medium enterprises</p>

		
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
					print "<a href='returnandintegration.php?logout=1'>Odjava</a>";
				}
				else
				{
					print '<form method="post" action="returnandintegration.php">
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
					print "<a href='returnandintegration.php?logout=1'>Odjava</a>";
				}
				else
				{
					print '<form method="post" action="returnandintegration.php">
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