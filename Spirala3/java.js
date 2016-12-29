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


