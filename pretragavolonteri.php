<?php


$xmlDoc=new DOMDocument();
$xmlDoc->load("volonteri.xml");

$x=$xmlDoc->getElementsByTagName('volonter');

$q=$_GET["q"];
$brojac = 0;
if (strlen($q)>0) {
  $hint="";
  for($i=0; $i<($x->length); $i++) {
    $foto = $x->item($i)->getElementsByTagName('fotografija');
    $prezime=$x->item($i)->getElementsByTagName('prezime');
    $ime=$x->item($i)->getElementsByTagName('ime');
    $datum_rodjenja=$x->item($i)->getElementsByTagName('datum_rodjenja');
    $adresa=$x->item($i)->getElementsByTagName('adresa');
    if ($prezime->item(0)->nodeType==1 && $prezime->item(0)->nodeType==1) {
      if (stristr($prezime->item(0)->childNodes->item(0)->nodeValue,$q) || stristr($ime->item(0)->childNodes->item(0)->nodeValue,$q)) {
        $brojac = $brojac + 1;
        if ($hint=="") {
          $hint = '<div class="kolona sest" id="karton">' . "<form method='post' action='prikazvolontera.php?obrisi=1'>" . '<input type="hidden" name="obrisiIndeks" id="obrisiIndeks" value="' .  $i . '"><img src="images/' . $foto->item(0)->childNodes->item(0)->nodeValue . '"' . ' alt="volonter_slika">Prezime: ' . $prezime->item(0)->childNodes->item(0)->nodeValue . '<br>Ime: ' . $ime->item(0)->childNodes->item(0)->nodeValue . '<br>Datum rođenja: ' . $datum_rodjenja->item(0)->childNodes->item(0)->nodeValue . '<br>Adresa: ' . $adresa->item(0)->childNodes->item(0)->nodeValue . '<br>Indeks: (' . $i . ')' . '<br><button type="submit" name="x">x</button>' . '</form>' . "<form method='post' action='prikazvolontera.php?edit=1'>" . '<input type="hidden" name="izmijeniIndeks" id="izmijeniIndeks" value="' . $i . '">' . '<button type="submit" name="izmijeni">Izmijeni</button>' . '</form>' . '</div>';

        } else {
         $hint = $hint . '<div class="kolona sest" id="karton">' . "<form method='post' action='prikazvolontera.php?obrisi=1'>" . '<input type="hidden" name="obrisiIndeks" id="obrisiIndeks" value="' .  $i . '"><img src="images/' . $foto->item(0)->childNodes->item(0)->nodeValue . '"' . ' alt="volonter_slika">Prezime: ' . $prezime->item(0)->childNodes->item(0)->nodeValue . '<br>Ime: ' . $ime->item(0)->childNodes->item(0)->nodeValue . '<br>Datum rođenja: ' . $datum_rodjenja->item(0)->childNodes->item(0)->nodeValue . '<br>Adresa: ' . $adresa->item(0)->childNodes->item(0)->nodeValue . '<br>Indeks: (' . $i . ')' . '<br><button type="submit" name="x">x</button>' . '</form>' . "<form method='post' action='prikazvolontera.php?edit=1'>" . '<input type="hidden" name="izmijeniIndeks" id="izmijeniIndeks" value="' . $i . '">' . '<button type="submit" name="izmijeni">Izmijeni</button>' . '</form>' . '</div>';
        }
      }
    }
    if($brojac > 9)
      break;
  }
}

if ($hint=="") {
  $response="nema rezultata";
} else {
  $response=$hint;
}

echo $response;



?>