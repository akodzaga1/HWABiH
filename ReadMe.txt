Link na openshift (http://wt-akodzaga1-wt-akodzaga1.44fs.preview.openshiftapps.com/)

I  - Šta je urađeno?

<<<<<<< HEAD
a) Napravio sam MySQL bazu sa tri povezane tabele. 
Tabela roditelj gradovi, i dvije tabele (ugrozeni i volonteri) sa foreign key na nju.
Dodao sam u forme ugrozeni i volonteri drop-down sa ponu�enim gradovima.
b) Napravio sam skriptu prebacivanje.php koja se aktivira dugmetom na po�etnoj stranici (vidi ga samo admin).
Svi podaci se iz XML prebacuju u bazu (3 tabele), osim podataka o adminu, koje sam ostavio u xml-u.
Duplikati se porede po �itavom redu i ukoliko su svi atributi isti ne ubacuje se podatak u bazu.
c) Prepravio sam samo stranicu autizam.php, gdje se podaci u�itavaju u bazu, a pri kreiranju pdf-a se u�itavaju iz baze.
=======
1.) Napravio sam formu za login u desnom sidebar-u. 
Podaci za admina (username i password) nalaze se u XML fajlu podaci.xml.
Napravio sam serijalizaciju podataka iz sve tri forme u posebne XML fajlove. 
Unos je omogućen svima, dok su izmjena, prikazivanje i brisanje podataka omogućeni samo administratoru.
Izmjena, prikazivanje i brisanje podataka omogućeni su za ugrozeni.xml i volonteri.xml.
XSS ranjivost koda sam spriječio zabranom prihvatanja html entiteta unesenih u formu, ali i dodatnim php validacijama.
2.) Adminu sam omogućio download podataka o volonterima i ugroženim (volonteri.csv, ugrozeni.csv).
Link za download csv-a se nalazi u desnom sidebar-u stranica prikazvolontera i prikazugrozenih.
3.) Omogućio sam generisanje izvještaja u obliku pdf fajla za formu na stranici autizam.
U pdf-u se nalaze imena i prezimena osoba koje su podržale projekat svojim potpisom u formi.
Link za generisanje pdf-a se nalazi u desnom sidebar-u stranice autizam.
4.) Napravio sam opciju pretrage sa prijedlozima na stranicama prikazvolontera i prikazugrozenih.
Volonteri se pretražuju po imenu i prezimenu, a ugroženi po prezimenu i adresi.
Dok se kuca stalno se ažuriraju ponuđeni podaci koji zadovoljavaju pretragu i prikazuje ih se najviše 10.
Nakon klika na dugme search prikazuju se svi podaci koji zadovoljavaju datu pretragu i ako ih je više od 10.
Primjer: Funkcionalnost se najbolje može testirati na stranici prikazvolontera pretragom slova a.
Od mogućih 12 podataka 11 ih sadrži slovo a, ali dok se ne klikne dugme search prikazuje ih se 10.
Nakon klika prikazuje se i 11. rezultat, dok se onaj koji ne sadrži slovo a ne prikazuje.
>>>>>>> 5dfe547ec207a46a9f1813428c93454aa13a9326


II  - Šta nije urađeno?

d) Nisam napravio hosting na OpenShift.
e) Nisam uradio.
f) Nisam uradio.



III - Bug-ovi koje ste primijetili ali niste stigli ispraviti, a znate rješenje (opis rješenja)

Nisam stigao uraditi kompletno pod c), ve� sam samo jednu stranicu stigao uraditi. 
Jednostavno nisam imao dovoljno vremena zbog svih zada�a u kratkom periodu. 



IV  - Bug-ovi koje ste primijetili ali ne znate rješenje

Nisam primijetio nijedan bug.



V  - Lista fajlova u formatu NAZIVFAJLA - Opis u vidu jedne rečenice šta se u fajlu nalazi

<<<<<<< HEAD
MOJA_BAZA.SQL - Baza podataka
AUTIZAM.PHP - Stranica za podr�ku izgradnje centra za autizam, sadr�i formu (ime i prezime).
=======
AUTIZAM.PHP - Stranica za podršku izgradnje centra za autizam, sadrži formu (ime i prezime).
>>>>>>> 5dfe547ec207a46a9f1813428c93454aa13a9326

EDUCATIONANDINCLUSION.PHP - Stranica pojedinačnog projekta
INDEX.PHP - Početna stranica web stranice koja sadrži najnovije vijesti u vidu 3 velike slike sa naslovima.

KONTAKTI.PHP - Stranica na kojoj se nalaze informacije kako kontaktirati organizaciju.

ONAMA.PHP - Stranica sa kratkim tekstom koji opisuje organizaciju i njen rad od nastanka do danas.

PARTNERI.PHP - Stranica koja sadrži 8 linkovanih ikona partnera organizacije koje upućuju na njihove web stranice.

<<<<<<< HEAD
PREBACIVANJE.PHP - Skripta koja prebacuje sve podatke iz xml u bazu.
PRETRAGAUGROZENI.PHP - PHP skripta za pretragu ugro�enih.
=======
PRETRAGAUGROZENI.PHP - PHP skripta za pretragu ugroženih.
>>>>>>> 5dfe547ec207a46a9f1813428c93454aa13a9326
PRETRAGAVOLONTERI.PHP - PHP skripta za pretragu volontera.
PRIKAZUGROZENIH.PHP - Stranica koja sadrži prikaz podataka iz ugrozeni.xml. Može joj pristupiti samo administrator.
PRIKAZVOLONTERA.PHP - Stranica koja sadrži prikaz podataka iz volonteri.xml. Može joj pristupiti samo administrator.
PROJEKTI.PHP - Stranica koja sadrži spisak projekata organizacije u vidu manjih slika sa naslovom.

RETURNANDINTEGRATION.PHP - Stranica pojedinačnog projekta
SOCIALHOUSING.PHP - Stranica pojedinačnog projekta koja sadrži galeriju slika sa zoom-om
SUPPORTTOROMADECADE.PHP - Stranica pojedinačnog projekta
UGROZENI.PHP - Stranica koja sadrži formu za prijavljivanje ugroženih porodica.

VOLONTERI.PHP - Stranica koja sadrži formu za prijavu u bazu volontera organizacije.

STIL.CSS - Css fajl koji definiše kompletan stil stranice, te izgled za različite rezolucije (media query-i).

JAVA.JS - JS dokument koji sadrži funkcije za obradu zoom-a slika iz galerije.
VALIDATE.JS - JS dokument koji sadrži funkcije za validaciju.
README.MD - Početni readme fajl (ime, prezime, broj indeksa, kratak opis teme).

README.TXT - Ovaj fajl.

AUTIZAM.XML - XML fajl koji sadrži serijalizirane podatke iz forme na stranici autizam.php.
PODACI.XML - XML fajl koji sadrži login podatke o administratoru.
UGROZENI.CSV - CSV fajl izvještaj o testnim podacima.
UGROZENI.XML - XML fajl koji sadrži testne podatke o ugroženim porodicama.
VOLONTERI.CSV - CSV fajl izvještaj o testnim podacima.
VOLONTERI.XML - XML fajl koji sadrži testne podatke o volonterima.
AUTIZAM.JPG - Skica stranice autizam.html.

AUTIZAM_MOBILE.JPG - Skica mobilne verzije stranice autizam.html.

AUTIZAM.JPG - Skica stranice index.html.

AUTIZAM_MOBILE.JPG - Skica mobilne verzije stranice index.html.

AUTIZAM.JPG - Skica stranice kontakti.html.

AUTIZAM_MOBILE.JPG - Skica mobilne verzije stranice kontakti.html.

AUTIZAM.JPG - Skica stranice onama.html.

AUTIZAM_MOBILE.JPG - Skica mobilne verzije stranice onama.html.

AUTIZAM.JPG - Skica stranice partneri.html.

AUTIZAM_MOBILE.JPG - Skica mobilne verzije stranice partneri.html.

AUTIZAM.JPG - Skica stranice projekti.html.

AUTIZAM_MOBILE.JPG - Skica mobilne verzije stranice projekti.html.

AUTIZAM.JPG - Skica stranice ugrozeni.html.

AUTIZAM_MOBILE.JPG - Skica mobilne verzije stranice ugrozeni.html.

AUTIZAM.JPG - Skica stranice volonteri.html.

AUTIZAM_MOBILE.JPG - Skica mobilne verzije stranice volonteri.html.

1AUSTRIANGOVERNMENT.PNG - Ikona partnera.

1BARUTHANA_VELIKA.JPG - Naslovna slika vijesti.

2MUNICIPALITYBANOVICI.PNG - Ikona partnera.

3MUNICIPALITYBIHAC.PNG - Ikona partnera.

4MUNICIPALITYBIJELJINA.PNG - Ikona partnera.

5BPCANTON.PNG - Ikona partnera.

6BPRM.PNG - Ikona partnera.

7MUNICIPALITYKOZARSKADUBICA.PNG - Ikona partnera.

8ECHO - Ikona partnera.

AUTIZAM.JPG - Slika koja sadrži link na podstranicu autizam.html.

BROSURA1.PNG - Prva slika na podstranici autizam.html.

BROSURA2.PNG - Druga slika na podstranici autizam.html.

EDUCATIONANDINCLUSION.PNG - Naslovna slika projekta.

GRANT_NASLOV_VELIKA.JPG - Naslovna slika vijesti.

LOGO_MALI.PNG - Logo na podstranici kontakti.html.

LOGO20.PNG - Glavni logo na stranici.
MENI.PNG - Butoon menija.

MENIAKTIVAN.PNG - Button menija pri prelasku mišem.

NASLOVKTBANOVICI_VELIKA.JPG - Naslovna slika vijesti.

PHOTO_SAT.JPG - Slika pozadine.

RETURNANDINTEGRATION.JPG - Naslovna slika projekta.

SOCIALHOUSING.JPG - Naslovna slika projekta.

SUPPORTTOROMA.JPG - Naslovna slika projekta.
+ fotografije testnih podataka (volonteri i ugroženi)
