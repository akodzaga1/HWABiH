I  - �ta je ura�eno?

a) Napravio sam MySQL bazu sa tri povezane tabele. 
Tabela roditelj gradovi, i dvije tabele (ugrozeni i volonteri) sa foreign key na nju.
Dodao sam u forme ugrozeni i volonteri drop-down sa ponu�enim gradovima.
b) Napravio sam skriptu prebacivanje.php koja se aktivira dugmetom na po�etnoj stranici (vidi ga samo admin).
Svi podaci se iz XML prebacuju u bazu (3 tabele), osim podataka o adminu, koje sam ostavio u xml-u.
Duplikati se porede po �itavom redu i ukoliko su svi atributi isti ne ubacuje se podatak u bazu.
c) Prepravio sam samo stranicu autizam.php, gdje se podaci u�itavaju u bazu, a pri kreiranju pdf-a se u�itavaju iz baze.


II  - �ta nije ura�eno?

d) Nisam napravio hosting na OpenShift.
e) Nisam uradio.
f) Nisam uradio.



III - Bug-ovi koje ste primijetili ali niste stigli ispraviti, a znate rje�enje (opis rje�enja)

Nisam stigao uraditi kompletno pod c), ve� sam samo jednu stranicu stigao uraditi. 
Jednostavno nisam imao dovoljno vremena zbog svih zada�a u kratkom periodu. 



IV  - Bug-ovi koje ste primijetili ali ne znate rje�enje

Nisam primijetio nijedan bug.



V  - Lista fajlova u formatu NAZIVFAJLA - Opis u vidu jedne re�enice �ta se u fajlu nalazi

MOJA_BAZA.SQL - Baza podataka
AUTIZAM.PHP - Stranica za podr�ku izgradnje centra za autizam, sadr�i formu (ime i prezime).

EDUCATIONANDINCLUSION.PHP - Stranica pojedina�nog projekta
INDEX.PHP - Po�etna stranica web stranice koja sadr�i najnovije vijesti u vidu 3 velike slike sa naslovima.

KONTAKTI.PHP - Stranica na kojoj se nalaze informacije kako kontaktirati organizaciju.

ONAMA.PHP - Stranica sa kratkim tekstom koji opisuje organizaciju i njen rad od nastanka do danas.

PARTNERI.PHP - Stranica koja sadr�i 8 linkovanih ikona partnera organizacije koje upu�uju na njihove web stranice.

PREBACIVANJE.PHP - Skripta koja prebacuje sve podatke iz xml u bazu.
PRETRAGAUGROZENI.PHP - PHP skripta za pretragu ugro�enih.
PRETRAGAVOLONTERI.PHP - PHP skripta za pretragu volontera.
PRIKAZUGROZENIH.PHP - Stranica koja sadr�i prikaz podataka iz ugrozeni.xml. Mo�e joj pristupiti samo administrator.
PRIKAZVOLONTERA.PHP - Stranica koja sadr�i prikaz podataka iz volonteri.xml. Mo�e joj pristupiti samo administrator.
PROJEKTI.PHP - Stranica koja sadr�i spisak projekata organizacije u vidu manjih slika sa naslovom.

RETURNANDINTEGRATION.PHP - Stranica pojedina�nog projekta
SOCIALHOUSING.PHP - Stranica pojedina�nog projekta koja sadr�i galeriju slika sa zoom-om
SUPPORTTOROMADECADE.PHP - Stranica pojedina�nog projekta
UGROZENI.PHP - Stranica koja sadr�i formu za prijavljivanje ugro�enih porodica.

VOLONTERI.PHP - Stranica koja sadr�i formu za prijavu u bazu volontera organizacije.

STIL.CSS - Css fajl koji defini�e kompletan stil stranice, te izgled za razli�ite rezolucije (media query-i).

JAVA.JS - JS dokument koji sadr�i funkcije za obradu zoom-a slika iz galerije.
VALIDATE.JS - JS dokument koji sadr�i funkcije za validaciju.
README.MD - Po�etni readme fajl (ime, prezime, broj indeksa, kratak opis teme).

README.TXT - Ovaj fajl.

AUTIZAM.XML - XML fajl koji sadr�i serijalizirane podatke iz forme na stranici autizam.php.
PODACI.XML - XML fajl koji sadr�i login podatke o administratoru.
UGROZENI.CSV - CSV fajl izvje�taj o testnim podacima.
UGROZENI.XML - XML fajl koji sadr�i testne podatke o ugro�enim porodicama.
VOLONTERI.CSV - CSV fajl izvje�taj o testnim podacima.
VOLONTERI.XML - XML fajl koji sadr�i testne podatke o volonterima.
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

AUTIZAM.JPG - Slika koja sadr�i link na podstranicu autizam.html.

BROSURA1.PNG - Prva slika na podstranici autizam.html.

BROSURA2.PNG - Druga slika na podstranici autizam.html.

EDUCATIONANDINCLUSION.PNG - Naslovna slika projekta.

GRANT_NASLOV_VELIKA.JPG - Naslovna slika vijesti.

LOGO_MALI.PNG - Logo na podstranici kontakti.html.

LOGO20.PNG - Glavni logo na stranici.
MENI.PNG - Butoon menija.

MENIAKTIVAN.PNG - Button menija pri prelasku mi�em.

NASLOVKTBANOVICI_VELIKA.JPG - Naslovna slika vijesti.

PHOTO_SAT.JPG - Slika pozadine.

RETURNANDINTEGRATION.JPG - Naslovna slika projekta.

SOCIALHOUSING.JPG - Naslovna slika projekta.

SUPPORTTOROMA.JPG - Naslovna slika projekta.
+ fotografije testnih podataka (volonteri i ugro�eni)