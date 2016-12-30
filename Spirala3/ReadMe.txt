I  - �ta je ura�eno?

1.) Napravio sam formu za login u desnom sidebar-u. 
Podaci za admina (username i password) nalaze se u XML fajlu podaci.xml.
Napravio sam serijalizaciju podataka iz sve tri forme u posebne XML fajlove. 
Unos je omogu�en svima, dok su izmjena, prikazivanje i brisanje podataka omogu�eni samo administratoru.
Izmjena, prikazivanje i brisanje podataka omogu�eni su za ugrozeni.xml i volonteri.xml.
XSS ranjivost koda sam sprije�io zabranom prihvatanja html entiteta unesenih u formu, ali i dodatnim php validacijama.
2.) Adminu sam omogu�io download podataka o volonterima i ugro�enim (volonteri.csv, ugrozeni.csv).
Link za download csv-a se nalazi u desnom sidebar-u stranica prikazvolontera i prikazugrozenih.
3.) Omogu�io sam generisanje izvje�taja u obliku pdf fajla za formu na stranici autizam.
U pdf-u se nalaze imena i prezimena osoba koje su podr�ale projekat svojim potpisom u formi.
Link za generisanje pdf-a se nalazi u desnom sidebar-u stranice autizam.
4.) Napravio sam opciju pretrage sa prijedlozima na stranicama prikazvolontera i prikazugrozenih.
Volonteri se pretra�uju po imenu i prezimenu, a ugro�eni po prezimenu i adresi.
Dok se kuca stalno se a�uriraju ponu�eni podaci koji zadovoljavaju pretragu i prikazuje ih se najvi�e 10.
Nakon klika na dugme search prikazuju se svi podaci koji zadovoljavaju datu pretragu i ako ih je vi�e od 10.
Primjer: Funkcionalnost se najbolje mo�e testirati na stranici prikazvolontera pretragom slova a.
Od mogu�ih 12 podataka 11 ih sadr�i slovo a, ali dok se ne klikne dugme search prikazuje ih se 10.
Nakon klika prikazuje se i 11. rezultat, dok se onaj koji ne sadr�i slovo a ne prikazuje.


II  - �ta nije ura�eno?

Uradio sam sve zadane zadatke.



III - Bug-ovi koje ste primijetili ali niste stigli ispraviti, a znate rje�enje (opis rje�enja)

Nisam primijetio nijedan bug.



IV  - Bug-ovi koje ste primijetili ali ne znate rje�enje

Nisam primijetio nijedan bug.



V  - Lista fajlova u formatu NAZIVFAJLA - Opis u vidu jedne re�enice �ta se u fajlu nalazi

AUTIZAM.PHP - Stranica za podr�ku izgradnje centra za autizam, sadr�i formu (ime i prezime).

EDUCATIONANDINCLUSION.PHP - Stranica pojedina�nog projekta
INDEX.PHP - Po�etna stranica web stranice koja sadr�i najnovije vijesti u vidu 3 velike slike sa naslovima.

KONTAKTI.PHP - Stranica na kojoj se nalaze informacije kako kontaktirati organizaciju.

ONAMA.PHP - Stranica sa kratkim tekstom koji opisuje organizaciju i njen rad od nastanka do danas.

PARTNERI.PHP - Stranica koja sadr�i 8 linkovanih ikona partnera organizacije koje upu�uju na njihove web stranice.

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