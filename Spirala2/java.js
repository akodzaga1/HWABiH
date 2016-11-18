function pokreniLB(slika)
{
    var LBpozadina = document.getElementById("LBpozadina");
    var LB = document.getElementById("LB");
    var velikaslika = document.getElementById("velikaslika");
    velikaslika.src = slika.src;

    LBpozadina.style.display = "block";
    LB.style.display = "block";

    LB.onClick = function(){
        LBpozadina.style.display = "none";
        LB.style.display = "none";
    }

    window.onkeydown = function( event ) {
        if(event.keyCode == 27){
            LBpozadina.style.display ="none";
            LB.style.display = "none";
        }
    }
}

function zatvoriLB()
{
    LBpozadina.style.display = "none";
    LB.style.display = "none";
}

function mojaFunkcija() {
    document.getElementById("myDropdown").classList.add("show");
}

window.onclick = function(event) {
  if (!event.target.matches('.dropmeni')) {

    var dropdowns = document.getElementsByClassName("dropdownsadrzaj");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}

function zatvori(){
    document.getElementById("myDropdown").classList.remove("show");
}



var regexTekst = /^[A-Z][a-z]{1,19}$/

function ValidateImeAutizam(){
    

    if(regexTekst.test(document.getElementById("imeAutizam").value)) 
    {

        document.getElementById("imeAutizam").style.backgroundColor="white";
        document.getElementById("labelaIme").innerHTML = "";
        return true;

    }   
    else {

        document.getElementById("imeAutizam").style.backgroundColor="#ff4d4d";
        document.getElementById("labelaIme").innerHTML = "Nepravilno ime!";

        return false;

    }
}

function ValidatePrezimeAutizam(){
    

    if(regexTekst.test(document.getElementById("prezimeAutizam").value)) 
    {

        document.getElementById("prezimeAutizam").style.backgroundColor="white";
        document.getElementById("labelaPrezime").innerHTML = "";
        return true;

    }   
    else {

        document.getElementById("prezimeAutizam").style.backgroundColor="#ff4d4d";
        document.getElementById("labelaPrezime").innerHTML = "Nepravilno prezime!";
        return false;

    }
}

function ValidateAutizam(){
    if(!ValidateIme())
        return false;
    if(!ValidatePrezime())
        return false;
}

function ValidatePrezimeUgrozeni(){
    

    if(regexTekst.test(document.getElementById("prezimeUgrozeni").value)) 
    {

        document.getElementById("prezimeUgrozeni").style.backgroundColor="white";
        document.getElementById("labelaPrezimeUgrozeni").innerHTML = "";
        return true;

    }   
    else {

        document.getElementById("prezimeUgrozeni").style.backgroundColor="#ff4d4d";
        document.getElementById("labelaPrezimeUgrozeni").innerHTML = "Nepravilno prezime!";
        return false;

    }
}

function ValidateBrojClanovaUgrozeni(){
    

    if(document.getElementById("brojClanovaUgrozeni").value > 0) 
    {

        document.getElementById("brojClanovaUgrozeni").style.backgroundColor="white";
        document.getElementById("labelaBrojClanovaUgrozeni").innerHTML = "";
        return true;

    }   
    else {

        document.getElementById("brojClanovaUgrozeni").style.backgroundColor="#ff4d4d";
        document.getElementById("labelaBrojClanovaUgrozeni").innerHTML = "Nepravilan broj članova!";
        return false;

    }
}

var regexOpis = /^[a-zA-Z\s]+$/

function ValidateOpisUgrozeni(){
    

    if(regexOpis.test(document.getElementById("opisUgrozeni").value)) 
    {

        document.getElementById("opisUgrozeni").style.backgroundColor="white";
        document.getElementById("labelaOpisUgrozeni").innerHTML = "";
        return true;

    }   
    else {

        document.getElementById("opisUgrozeni").style.backgroundColor="#ff4d4d";
        document.getElementById("labelaOpisUgrozeni").innerHTML = "Nepravilan opis!";
        return false;

    }
}

var regexAlphaNumeric = /^[a-zA-Z\s]{4,}[0-9]+[a-z]?$/

function ValidateAdresaUgrozeni(){
    

    if(regexAlphaNumeric.test(document.getElementById("adresaUgrozeni").value)) 
    {

        document.getElementById("adresaUgrozeni").style.backgroundColor="white";
        document.getElementById("labelaAdresaUgrozeni").innerHTML = "";
        return true;

    }   
    else {

        document.getElementById("adresaUgrozeni").style.backgroundColor="#ff4d4d";
        document.getElementById("labelaAdresaUgrozeni").innerHTML = "Nepravilna adresa!";
        return false;

    }
}

function ValidateFotografijaUgrozeni(){
    
    if(document.getElementById("fotografijaUgrozeni").value != "") {

        
        document.getElementById("labelaFotografijaUgrozeni").innerHTML = "";
        return true;

    }   
    else {

        document.getElementById("labelaFotografijaUgrozeni").innerHTML = "Niste izabrali fotografiju!";
        return false;

    }
}

function ValidateUgrozeni(){
    if(!ValidatePrezimeUgrozeni())
        return false;
    if(!ValidateBrojClanovaUgrozeni())
        return false;
    if(!ValidateOpisUgrozeni())
        return false;
    if(!ValidateAdresaUgrozeni())
        return false;
    if(!ValidateFotografijaUgrozeni())
        return false;
}

function ValidatePrezimeVolonteri(){
    

    if(regexTekst.test(document.getElementById("prezimeVolonteri").value)) 
    {

        document.getElementById("prezimeVolonteri").style.backgroundColor="white";
        document.getElementById("labelaPrezimeVolonteri").innerHTML = "";
        return true;

    }   
    else {

        document.getElementById("prezimeVolonteri").style.backgroundColor="#ff4d4d";
        document.getElementById("labelaPrezimeVolonteri").innerHTML = "Nepravilno prezime!";
        return false;

    }
}

function ValidateImeVolonteri(){
    

    if(regexTekst.test(document.getElementById("imeVolonteri").value)) 
    {

        document.getElementById("imeVolonteri").style.backgroundColor="white";
        document.getElementById("labelaImeVolonteri").innerHTML = "";
        return true;

    }   
    else {

        document.getElementById("imeVolonteri").style.backgroundColor="#ff4d4d";
        document.getElementById("labelaImeVolonteri").innerHTML = "Nepravilno ime!";

        return false;

    }
}

var regexDatum = /^([0][13578]|[1][02])\/([0][1-9]|[12][0-9]|[3][01])\/([1][9][0-9][0-9]$)|([0][469]|[1][1])\/([0][1-9]|[12][0-9]|[3][0])\/([1][9][0-9][0-9]$)|[0][2]\/([0][1-9]|[12][0-9])\/([1][9][0-9][0-9]$)$/

function ValidateDatumVolonteri(){
    

    if(regexDatum.test(document.getElementById("datumVolonteri").value)) 
    {

        document.getElementById("datumVolonteri").style.backgroundColor="white";
        document.getElementById("labelaDatumVolonteri").innerHTML = "";
        return true;

    }   
    else {

        document.getElementById("datumVolonteri").style.backgroundColor="#ff4d4d";
        document.getElementById("labelaDatumVolonteri").innerHTML = "Nepravilan datum! (mm/dd/yyyy)";

        return false;

    }
}

function ValidateAdresaVolonteri(){
    

    if(regexAlphaNumeric.test(document.getElementById("adresaVolonteri").value)) 
    {

        document.getElementById("adresaVolonteri").style.backgroundColor="white";
        document.getElementById("labelaAdresaVolonteri").innerHTML = "";
        return true;

    }   
    else {

        document.getElementById("adresaVolonteri").style.backgroundColor="#ff4d4d";
        document.getElementById("labelaAdresaVolonteri").innerHTML = "Nepravilna adresa!";
        return false;

    }
}

function ValidateFotografijaVolonteri(){
    
    if(document.getElementById("fotografijaVolonteri").value != "") {

        
        document.getElementById("labelaFotografijaVolonteri").innerHTML = "";
        return true;

    }   
    else {

        document.getElementById("labelaFotografijaVolonteri").innerHTML = "Niste izabrali fotografiju!";
        return false;

    }
}

function ValidateVolonteri(){
    if(!ValidatePrezimeVolonteri())
        return false;
    if(!ValidateImeVolonteri())
        return false;
    if(!ValidateDatumVolonteri())
        return false;
    if(!ValidateAdresaVolonteri())
        return false;
    if(!ValidateFotografijaVolonteri())
        return false;
}