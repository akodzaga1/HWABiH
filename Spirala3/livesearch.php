<?php


$xmlDoc=new DOMDocument();
$xmlDoc->load("volonteri.xml");

$x=$xmlDoc->getElementsByTagName('volonter');

//get the q parameter from URL
$q=$_GET["q"];
//lookup all links from the xml file if length of q>0


/*
  if (strlen($q)>0) {
  $hint="";
  for($i=0; $i<($x->length) && $i<10; $i++) {
    $y=$x->item($i)->getElementsByTagName('prezime');
    $z=$x->item($i)->getElementsByTagName('ime');
    if ($y->item(0)->nodeType==1) {
      //find a link matching the search text
      if (stristr($y->item(0)->childNodes->item(0)->nodeValue,$q) || stristr($z->item(0)->childNodes->item(0)->nodeValue,$q)) {
        if ($hint=="") {
          $hint= $y->item(0)->childNodes->item(0)->nodeValue . " " . $z->item(0)->childNodes->item(0)->nodeValue . "<br>";
        } else {
          $hint= $hint . $y->item(0)->childNodes->item(0)->nodeValue . " " . $z->item(0)->childNodes->item(0)->nodeValue . "<br>";
        }
      }
    }
  }
}*/


if (strlen($q)>0) {
  $hint="";
  for($i=0; $i<($x->length) && $i<10; $i++) {
    $foto = $x->item($i)->getElementsByTagName('fotografija');
    $prezime=$x->item($i)->getElementsByTagName('prezime');
    $ime=$x->item($i)->getElementsByTagName('ime');
    $datum_rodjenja=$x->item($i)->getElementsByTagName('datum_rodjenja');
    $adresa=$x->item($i)->getElementsByTagName('adresa');
    if ($prezime->item(0)->nodeType==1) {
      //find a link matching the search text
      if (stristr($prezime->item(0)->childNodes->item(0)->nodeValue,$q) || stristr($ime->item(0)->childNodes->item(0)->nodeValue,$q)) {
        if ($hint=="") {
          $hint = '<div class="kolona sest" id="karton">' . "<form method='post' action='prikazvolontera.php?obrisi=1'>" . '<input type="hidden" name="obrisiIndeks" id="obrisiIndeks" value="' .  $i . '"><img src="images/' . $foto->item(0)->childNodes->item(0)->nodeValue . '"' . ' alt="volonter_slika">Prezime: ' . $prezime->item(0)->childNodes->item(0)->nodeValue . '<br>Ime: ' . $ime->item(0)->childNodes->item(0)->nodeValue . '<br>Datum rođenja: ' . $datum_rodjenja->item(0)->childNodes->item(0)->nodeValue . '<br>Adresa: ' . $adresa->item(0)->childNodes->item(0)->nodeValue . '<br>Indeks: (' . $i . ')' . '<br><button type="submit" name="x">x</button>' . '</form>' . "<form method='post' action='prikazvolontera.php?edit=1'>" . '<input type="hidden" name="izmijeniIndeks" id="izmijeniIndeks" value="' . $i . '">' . '<button type="submit" name="izmijeni">Izmijeni</button>' . '</form>' . '</div>';

          //$hint= $prezime->item(0)->childNodes->item(0)->nodeValue . " " . $z->item(0)->childNodes->item(0)->nodeValue . "<br>";
        } else {
         $hint = $hint . '<div class="kolona sest" id="karton">' . "<form method='post' action='prikazvolontera.php?obrisi=1'>" . '<input type="hidden" name="obrisiIndeks" id="obrisiIndeks" value="' .  $i . '"><img src="images/' . $foto->item(0)->childNodes->item(0)->nodeValue . '"' . ' alt="volonter_slika">Prezime: ' . $prezime->item(0)->childNodes->item(0)->nodeValue . '<br>Ime: ' . $ime->item(0)->childNodes->item(0)->nodeValue . '<br>Datum rođenja: ' . $datum_rodjenja->item(0)->childNodes->item(0)->nodeValue . '<br>Adresa: ' . $adresa->item(0)->childNodes->item(0)->nodeValue . '<br>Indeks: (' . $i . ')' . '<br><button type="submit" name="x">x</button>' . '</form>' . "<form method='post' action='prikazvolontera.php?edit=1'>" . '<input type="hidden" name="izmijeniIndeks" id="izmijeniIndeks" value="' . $i . '">' . '<button type="submit" name="izmijeni">Izmijeni</button>' . '</form>' . '</div>';
        }
      }
    }
  }
}


/*
$foto = $volonter->fotografija;
$prezime = $volonter->prezime;
$ime = $volonter->ime;
$datum_rodjenja = $volonter->datum_rodjenja;
$adresa = $volonter->adresa;
$hint = '<div class="kolona sest" id="karton">' . "<form method='post' action='prikazvolontera.php?obrisi=1'>" . '<input type="hidden" name="obrisiIndeks" id="obrisiIndeks" value="' .  $i . '"><img src="images/' . $foto . '"' . ' alt="volonter_slika">Prezime: ' . $prezime . '<br>Ime: ' . $ime . '<br>Datum rođenja: ' . $datum_rodjenja . '<br>Adresa: ' . $adresa . '<br>Indeks: (' . $i . ')' . '<br><button type="submit" name="x">x</button>' . '</form>' . "<form method='post' action='prikazvolontera.php?edit=1'>" . '<input type="hidden" name="izmijeniIndeks" id="izmijeniIndeks" value="' . $i . '">' . '<button type="submit" name="izmijeni">Izmijeni</button>' . '</form>' . '</div>';
*/

/*
if (strlen($q)>0) {
  $hint="";
  for($i=0; $i<($x->length); $i++) {
    $y=$x->item($i)->getElementsByTagName('prezime');
    $z=$x->item($i)->getElementsByTagName('ime');
    if ($y->item(0)->nodeType==1) {
      //find a link matching the search text
      if (stristr($y->item(0)->childNodes->item(0)->nodeValue,$q) || stristr($z->item(0)->childNodes->item(0)->nodeValue,$q)) {
        if ($hint=="") {
          $hint= $y->item(0)->childNodes->item(0)->nodeValue . " " . $z->item(0)->childNodes->item(0)->nodeValue . "<br>";
        } else {
          $hint= $hint . $y->item(0)->childNodes->item(0)->nodeValue . " " . $z->item(0)->childNodes->item(0)->nodeValue . "<br>";
        }
      }
    }
  }
}*/

// Set output to "no suggestion" if no hint was found
// or to the correct values
if ($hint=="") {
  $response="nema rezultata";
} else {
  $response=$hint;
}

//output the response
echo $response;



?>