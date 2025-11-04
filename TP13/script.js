function multiplication() {
  var a = document.getElementById("q1").value;
  var b = document.getElementById("p1").value;
  var calcul1 = Number(a) * Number(b);
  document.getElementById("resultat1").value = calcul1;

  var c = document.getElementById("q2").value;
  var d = document.getElementById("p2").value;
  var calcul2 = Number(c) * Number(d);
  document.getElementById("resultat2").value = calcul2;

  var e = document.getElementById("q3").value;
  var f = document.getElementById("p3").value;
  var calcul3 = Number(e) * Number(f);
  document.getElementById("resultat3").value = calcul3;

  var g = document.getElementById("q4").value;
  var h = document.getElementById("p4").value;
  var calcul4 = Number(g) * Number(h);
  document.getElementById("resultat4").value = calcul4;

  var i = document.getElementById("q5").value;
  var j = document.getElementById("p5").value;
  var calcul5 = Number(i) * Number(j);
  document.getElementById("resultat5").value = calcul5;

  var somme =
    Number(calcul1) +
    Number(calcul2) +
    Number(calcul3) +
    Number(calcul4) +
    Number(calcul5);
  document.getElementById("total").value = somme;
}

function reset() {
  document.getElementById("q1").value = "";
  document.getElementById("p1").value = "";
  document.getElementById("resultat1").value = "";
  document.getElementById("q2").value = "";
  document.getElementById("p2").value = "";
  document.getElementById("resultat2").value = "";
  document.getElementById("q3").value = "";
  document.getElementById("p3").value = "";
  document.getElementById("resultat3").value = "";
  document.getElementById("q4").value = "";
  document.getElementById("p4").value = "";
  document.getElementById("resultat4").value = "";
  document.getElementById("q5").value = "";
  document.getElementById("p5").value = "";
  document.getElementById("resultat5").value = "";
  document.getElementById("total").value = "";
}
