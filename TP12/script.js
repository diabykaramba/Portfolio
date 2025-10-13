function calcul_moyenne() {
  var n1 = prompt("Donner la première note:");
  var n2 = prompt("Donner la deuxième note");
  var n3 = prompt("Donner la troisième note");
  const button = document.createElement("button");

  var somme = Number(n1) + Number(n2) + Number(n3);

  document.write("Voici la somme : " + somme + "<br>");
  var moyenne = somme / 3;

  document.write("Voici la moyenne : " + moyenne + "<br>");

  if (moyenne < 10) {
    document.write("Redoublant");
  } else if (moyenne >= 10 && moyenne <= 12) {
    document.write("Admis - Passable");
  } else if (moyenne >= 12 && moyenne <= 14) {
    document.write("Admis - Bien");
  } else if (moyenne >= 14 && moyenne <= 20) {
    document.write("Admis - Très Bien");
  } else {
    document.write("Ta moyenne est au dessus de 20? Impossible.");
    document.bgColor = "red";
  }
}

function test_temperature() {
  var t1 = prompt("Saisir une température");
  var temp = Number(t1);

  if (temp < 10) {
    document.write(
      '<div style="text-align: center; font-size: 88px; position: relative; top: 300px; color: blue;">'
    );
    document.write("FRR-FROID !");
    document.write("</div>");
    document.write('<a href="index.html">Retour</a>');
    document.bgColor = "lightblue";
  } else if (temp >= 10 && temp <= 25) {
    document.write(
      '<div style="text-align: center; font-size: 88px; position: relative; top: 300px; color: black;">'
    );
    document.write("normal.");
    document.write("</div>");
    document.bgColor = "grey";
  } else if (temp > 25) {
    document.write(
      '<div style="text-align: center; font-size: 88px; position: relative; top: 300px; color: orange;">'
    );
    document.write("CHAAAAAAAAUD !!!");
    document.write("</div>");
    document.bgColor = "red";
  }
}

function comparaison() {
  var n1 = prompt("Saisir un nombre");
  var n2 = prompt("Saisir un deuxième nombre");

  var num1 = Number(n1);
  var num2 = Number(n2);

  if (num1 > num2) {
    document.write(
      '<div style="text-align: center; font-size: 31px; color: green;">'
    );
    document.write(num1 + " est le plus grand nombre");
    document.write("</div>");
    document.write(
      '<div style="text-align: center; font-size: 31px; color: red;">'
    );
    document.write(num2 + " est le plus petit nombre");
    document.write("</div>");
  } else if (num2 > num1) {
    document.write(
      '<div style="text-align: center; font-size: 31px; color: green;">'
    );
    document.write(num2 + " est le plus grand nombre");
    document.write("</div>");
    document.write(
      '<div style="text-align: center; font-size: 31px; color: red;">'
    );
    document.write(num1 + " est le plus petit nombre");
    document.write("</div>");
  } else if (num1 == num2) {
    document.write(
      '<div style="text-align: center; font-size: 31px; color: grey;">'
    );
    document.write("Les deux nombres sont égaux.");
  }
}

function simple_affichage() {
  let name = prompt("Donner votre nom");
  let prenom = prompt("Donner votre prénom");

  document.write(
    '<div style="margin: auto; width: 300; border: 2px solid blue;">'
  );
  document.write("Bonjour " + prenom + " " + name);
  document.write("</div>");
}

function test_couleur() {
  let couleur = prompt("Donner une couleur");
  if (couleur == "rouge" || couleur == "red") {
    document.body.style.backgroundColor = "red";
  } else if (couleur == "bleu" || couleur == "blue") {
    document.body.style.backgroundColor = "blue";
  } else if (couleur == "vert" || couleur == "green") {
    document.body.style.backgroundColor = "green";
  } else if (couleur == "rose" || couleur == "pink") {
    document.body.style.backgroundColor = "pink";
  } else {
    document.write("Couleur non comprise");
  }
}
