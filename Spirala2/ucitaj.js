 

 function ucitajNaslovnu() {
                var ajax = new XMLHttpRequest();


                ajax.onreadystatechange = function () {
                    if (ajax.readyState == 4 && ajax.status == 200)
                        document.getElementById("kontejnerAjax").innerHTML = ajax.responseText;
                    if (ajax.readyState == 4 && ajax.status == 404)
                        document.getElementById("kontejnerAjax").innerHTML = "index";
                }


                ajax.open("GET", "indexindex.html", true);
                ajax.send();
}

function ucitajONama() {
                var ajax = new XMLHttpRequest();
                ajax.onreadystatechange = function () {
                    if (ajax.readyState == 4 && ajax.status == 200)
                        document.getElementById("kontejnerAjax").innerHTML = ajax.responseText;
                    if (ajax.readyState == 4 && ajax.status == 404)
                        document.getElementById("kontejnerAjax").innerHTML = "onama";
                }
                
                ajax.open("GET", "onama.html", true);
                ajax.send();
}

function ucitajProjekte() {
                var ajax = new XMLHttpRequest();
                ajax.onreadystatechange = function () {
                    if (ajax.readyState == 4 && ajax.status == 200)
                        document.getElementById("kontejnerAjax").innerHTML = ajax.responseText;
                    if (ajax.readyState == 4 && ajax.status == 404)
                        document.getElementById("kontejnerAjax").innerHTML = "projekti";
                }
                
                ajax.open("GET", "projekti.html", true);
                ajax.send();
}

function ucitajSH() {
                
                var ajax = new XMLHttpRequest();

                ajax.onreadystatechange = function () {
                    if (ajax.readyState == 4 && ajax.status == 200)
                        document.getElementById("kontejnerAjax").innerHTML = ajax.responseText;
                    if (ajax.readyState == 4 && ajax.status == 404)
                        document.getElementById("kontejnerAjax").innerHTML = "SH";
                }
                
                ajax.open("GET", "socialhousing.html", true);
                ajax.send();
}

function ucitajPartnere() {
                var ajax = new XMLHttpRequest();
                ajax.onreadystatechange = function () {
                    if (ajax.readyState == 4 && ajax.status == 200)
                        document.getElementById("kontejnerAjax").innerHTML = ajax.responseText;
                    if (ajax.readyState == 4 && ajax.status == 404)
                        document.getElementById("kontejnerAjax").innerHTML = "partneri";
                }
                
                ajax.open("GET", "partneri.html", true);
                ajax.send();
}

function ucitajRAI() {
                
                var ajax = new XMLHttpRequest();

                ajax.onreadystatechange = function () {
                    if (ajax.readyState == 4 && ajax.status == 200)
                        document.getElementById("kontejnerAjax").innerHTML = ajax.responseText;
                    if (ajax.readyState == 4 && ajax.status == 404)
                        document.getElementById("kontejnerAjax").innerHTML = "RAI";
                }
                
                ajax.open("GET", "returnandintegration.html", true);
                ajax.send();
}

function ucitajSTRD() {
                
                var ajax = new XMLHttpRequest();

                ajax.onreadystatechange = function () {
                    if (ajax.readyState == 4 && ajax.status == 200)
                        document.getElementById("kontejnerAjax").innerHTML = ajax.responseText;
                    if (ajax.readyState == 4 && ajax.status == 404)
                        document.getElementById("kontejnerAjax").innerHTML = "STRD";
                }
                
                ajax.open("GET", "supporttoromadecade.html", true);
                ajax.send();
}

function ucitajEAI() {
                
                var ajax = new XMLHttpRequest();

                ajax.onreadystatechange = function () {
                    if (ajax.readyState == 4 && ajax.status == 200)
                        document.getElementById("kontejnerAjax").innerHTML = ajax.responseText;
                    if (ajax.readyState == 4 && ajax.status == 404)
                        document.getElementById("kontejnerAjax").innerHTML = "EAI";
                }
                
                ajax.open("GET", "educationandinclusion.html", true);
                ajax.send();
}

function ucitajKontakte() {
                
                var ajax = new XMLHttpRequest();

                ajax.onreadystatechange = function () {
                    if (ajax.readyState == 4 && ajax.status == 200)
                        document.getElementById("kontejnerAjax").innerHTML = ajax.responseText;
                    if (ajax.readyState == 4 && ajax.status == 404)
                        document.getElementById("kontejnerAjax").innerHTML = "kontakti";
                }
                
                ajax.open("GET", "kontakti.html", true);
                ajax.send();
}

function ucitajAutizam() {
                
                var ajax = new XMLHttpRequest();

                ajax.onreadystatechange = function () {
                    if (ajax.readyState == 4 && ajax.status == 200)
                        document.getElementById("kontejnerAjax").innerHTML = ajax.responseText;
                    if (ajax.readyState == 4 && ajax.status == 404)
                        document.getElementById("kontejnerAjax").innerHTML = "autizam";
                }
                
                ajax.open("GET", "autizam.html", true);
                ajax.send();
}

function ucitajUgrozene() {
                
                var ajax = new XMLHttpRequest();

                ajax.onreadystatechange = function () {
                    if (ajax.readyState == 4 && ajax.status == 200)
                        document.getElementById("kontejnerAjax").innerHTML = ajax.responseText;
                    if (ajax.readyState == 4 && ajax.status == 404)
                        document.getElementById("kontejnerAjax").innerHTML = "ugrozeni";
                }
                
                ajax.open("GET", "ugrozeni.html", true);
                ajax.send();
}

function ucitajVolontere() {
                
                var ajax = new XMLHttpRequest();

                ajax.onreadystatechange = function () {
                    if (ajax.readyState == 4 && ajax.status == 200)
                        document.getElementById("kontejnerAjax").innerHTML = ajax.responseText;
                    if (ajax.readyState == 4 && ajax.status == 404)
                        document.getElementById("kontejnerAjax").innerHTML = "volonteri";
                }
                
                ajax.open("GET", "volonteri.html", true);
                ajax.send();
}