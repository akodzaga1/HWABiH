<?php
session_start();
header('Location: '."index.php",true,303);
     $veza = new PDO("mysql:dbname=moja_baza;host=localhost;port=3306;charset=utf8", "admin", "admin");
     $veza->exec("set names utf8");

$xmlDoc = new DOMDocument();
	$xmlDoc->load('volonteri.xml');

	$x = $xmlDoc->getElementsByTagName( 'volonter' );

	for($i=0; $i<($x->length); $i++) {
	    $foto = $x->item($i)->getElementsByTagName('fotografija');
	    $prezime=$x->item($i)->getElementsByTagName('prezime');
	    $ime=$x->item($i)->getElementsByTagName('ime');
	    $datum_rodjenja=$x->item($i)->getElementsByTagName('datum_rodjenja');
	    $adresa=$x->item($i)->getElementsByTagName('adresa');
	    $grad=$x->item($i)->getElementsByTagName('grad');
		
		$fotografijaBaza = $foto->item(0)->childNodes->item(0)->nodeValue;
		$prezimeBaza = $prezime->item(0)->childNodes->item(0)->nodeValue;
		$imeBaza = $ime->item(0)->childNodes->item(0)->nodeValue;
		$datumBaza = $datum_rodjenja->item(0)->childNodes->item(0)->nodeValue;
		$adresaBaza = $adresa->item(0)->childNodes->item(0)->nodeValue;
		$gradBaza = $grad->item(0)->childNodes->item(0)->nodeValue;
	    if ($gradBaza == "Sarajevo")
	    	$gradBaza = 1;
	    else if($gradBaza == "Tuzla")
	    	$gradBaza = 2;
		

	    $duplikat = false;


	    $volonteri = $veza->query( "SELECT * FROM `volonteri`");
	    if(!$volonteri)
		{
	    	print "Greška";
	    	die();
	   	}
	    else
	    {
	    	foreach($volonteri as $volonter) {
			if($volonter["prezime"]==$prezimeBaza && $volonter["ime"]==$imeBaza && $volonter["adresa"]==$adresaBaza && $volonter["datum_rodjenja"]==$datumBaza && $volonter["fotografija"]==$fotografijaBaza && $volonter["grad"]==$gradBaza)
  			$duplikat=true;
		}
			}


if(!$duplikat)
	    $veza->query( "INSERT INTO `volonteri` (`ID`, `prezime`, `ime`, `datum_rodjenja`, `adresa`, `fotografija`, `grad`) VALUES (NULL, '".$prezimeBaza."', '".$imeBaza."', '".$datumBaza."', '".$adresaBaza."', '".$fotografijaBaza."', '".$gradBaza."')" );
	}


 $veza2 = new PDO("mysql:dbname=moja_baza;host=localhost;port=3306;charset=utf8", "admin", "admin");
$veza2->exec("set names utf8");
$xmlDoc2 = new DOMDocument();
	$xmlDoc2->load('ugrozeni.xml');
	$x = $xmlDoc2->getElementsByTagName('porodica');

	for($i=0; $i<($x->length); $i++) {
	    $foto = $x->item($i)->getElementsByTagName('fotografija');
	    $prezime=$x->item($i)->getElementsByTagName('prezime');
	    $uslovi=$x->item($i)->getElementsByTagName('uslovi');
	    $broj_clanova=$x->item($i)->getElementsByTagName('broj_clanova');
	    $adresa=$x->item($i)->getElementsByTagName('adresa');
	    $grad=$x->item($i)->getElementsByTagName('grad');
		
		$fotografijaBaza = $foto->item(0)->childNodes->item(0)->nodeValue;
		$prezimeBaza = $prezime->item(0)->childNodes->item(0)->nodeValue;
		$usloviBaza = $uslovi->item(0)->childNodes->item(0)->nodeValue;
		$clanoviBaza = $broj_clanova->item(0)->childNodes->item(0)->nodeValue;
		$adresaBaza = $adresa->item(0)->childNodes->item(0)->nodeValue;
		$gradBaza = $grad->item(0)->childNodes->item(0)->nodeValue;
	    if ($gradBaza == "Sarajevo")
	    	$gradBaza = 1;
	    else if($gradBaza == "Tuzla")
	    	$gradBaza = 2;


		$duplikat = false;


	    $porodice = $veza2->query( "SELECT * FROM `ugrozeni`");
	    if(!$porodice)
		{
	    	print "Greška";
	    	die();
	   	}
	    else
	    {
	    	foreach($porodice as $porodica) {
			if($porodica["prezime"]==$prezimeBaza && $porodica["broj_clanova"]==$clanoviBaza && $porodica["adresa"]==$adresaBaza && $porodica["uslovi"]==$usloviBaza && $porodica["fotografija"]==$fotografijaBaza && $porodica["grad"]==$gradBaza)
  			$duplikat=true;
		}
	}
		if(!$duplikat)
	    	$veza2->query( "INSERT INTO `ugrozeni` (`ID`, `prezime`, `broj_clanova`, `uslovi`, `adresa`, `fotografija`, `grad`) VALUES (NULL, '".$prezimeBaza."', '".$clanoviBaza."', '".$usloviBaza."', '".$adresaBaza."', '".$fotografijaBaza."', '".$gradBaza."')" );
		}	


 $veza3 = new PDO("mysql:dbname=moja_baza;host=localhost;port=3306;charset=utf8", "admin", "admin");
$veza3->exec("set names utf8");
$xmlDoc3 = new DOMDocument();
	$xmlDoc3->load('autizam.xml');
	$x = $xmlDoc3->getElementsByTagName('potpisnik');

	for($i=0; $i<($x->length); $i++) {
	    $ime = $x->item($i)->getElementsByTagName('ime');
	    $prezime=$x->item($i)->getElementsByTagName('prezime');
	   
		
		$imeBaza = $ime->item(0)->childNodes->item(0)->nodeValue;
		$prezimeBaza = $prezime->item(0)->childNodes->item(0)->nodeValue;
	    


		$duplikat = false;


	    $potpisnici = $veza3->query( "SELECT * FROM `autizam`");
	    if(!$potpisnici)
		{
	    	print "Greška";
	    	die();
	   	}
	    else
	    {
	    	foreach($potpisnici as $potpisnik) {
			if($potpisnik["prezime"]==$prezimeBaza && $potpisnik["ime"]==$imeBaza)
  			$duplikat=true;
		}
	}
		if(!$duplikat)
	    	$veza3->query( "INSERT INTO `autizam` (`ID`, `prezime`, `ime`) VALUES (NULL, '".$prezimeBaza."', '".$imeBaza."')" );
		}

			
?>