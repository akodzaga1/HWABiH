<?php


$xmlDoc=new DOMDocument();
$xmlDoc->load("ugrozeni.xml");

$x=$xmlDoc->getElementsByTagName('porodica');

$q=$_GET["q"];

if (strlen($q)>0) {
  $hint="";
  for($i=0; $i<($x->length) && $i<10; $i++) {
    $foto = $x->item($i)->getElementsByTagName('fotografija');
    $prezime=$x->item($i)->getElementsByTagName('prezime');
    $uslovi=$x->item($i)->getElementsByTagName('uslovi');
    $broj_clanova=$x->item($i)->getElementsByTagName('broj_clanova');
    $adresa=$x->item($i)->getElementsByTagName('adresa');
    if ($prezime->item(0)->nodeType==1 && $adresa->item(0)->nodeType==1) {
      if (stristr($prezime->item(0)->childNodes->item(0)->nodeValue,$q) || stristr($adresa->item(0)->childNodes->item(0)->nodeValue,$q)) {
        if ($hint=="") {
          $hint = '<div class="kolona sest" id="karton">' . "<form method='post' action='prikazugrozenih.php?obrisi=1'>" . '<input type="hidden" name="obrisiIndeks" id="obrisiIndeks" value="' .  $i . '"><img src="images/' . $foto->item(0)->childNodes->item(0)->nodeValue . '"' . ' alt="ugrozeni_slika">Prezime: ' . $prezime->item(0)->childNodes->item(0)->nodeValue . '<br>Broj članova domaćinstva: ' . $broj_clanova->item(0)->childNodes->item(0)->nodeValue . '<br>Uslovi života: ' . $uslovi->item(0)->childNodes->item(0)->nodeValue . '<br>Adresa: ' . $adresa->item(0)->childNodes->item(0)->nodeValue . '<br>Indeks: (' . $i . ')' . '<br><button type="submit" name="x">x</button>' . '</form>' . "<form method='post' action='prikazugrozenih.php?edit=1'>" . '<input type="hidden" name="izmijeniIndeks" id="izmijeniIndeks" value="' . $i . '">' . '<button type="submit" name="izmijeni">Izmijeni</button>' . '</form>' . '</div>';

        } else {
         $hint = $hint . '<div class="kolona sest" id="karton">' . "<form method='post' action='prikazugrozenih.php?obrisi=1'>" . '<input type="hidden" name="obrisiIndeks" id="obrisiIndeks" value="' .  $i . '"><img src="images/' . $foto->item(0)->childNodes->item(0)->nodeValue . '"' . ' alt="ugrozeni_slika">Prezime: ' . $prezime->item(0)->childNodes->item(0)->nodeValue . '<br>Broj članova domaćinstva: ' . $broj_clanova->item(0)->childNodes->item(0)->nodeValue . '<br>Uslovi života: ' . $uslovi->item(0)->childNodes->item(0)->nodeValue . '<br>Adresa: ' . $adresa->item(0)->childNodes->item(0)->nodeValue . '<br>Indeks: (' . $i . ')' . '<br><button type="submit" name="x">x</button>' . '</form>' . "<form method='post' action='prikazugrozenih.php?edit=1'>" . '<input type="hidden" name="izmijeniIndeks" id="izmijeniIndeks" value="' . $i . '">' . '<button type="submit" name="izmijeni">Izmijeni</button>' . '</form>' . '</div>';
        }
      }
    }
  }
}

if ($hint=="") {
  $response="nema rezultata";
} else {
  $response=$hint;
}

echo $response;



?>