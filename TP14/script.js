function affichagetab1() {
  document.write("<table border=2px width=30%>");
  for (let i = 0; i <= 2; i++) {
    document.write("<tr><td>" + i + "</td><td></td></tr>");
  }
  document.write("</table>");
}

function affichagetab2() {
  var n = prompt("Combien de lignes");
  document.write("<table border=2px width=30%>");
  for (let i = 1; i <= n; i++) {
    document.write("<tr><td>" + i + "</td><td></td></tr>");
  }
  document.write("</table>");
}

function seconnecter() {
  var login = prompt("Donnez votre nom d'utilisateur");
  var password = prompt("Entrez votre mot de passe");
  if (login == "admin" && password == "admin") {
    document.write("Bienvenue " + login);
  } else {
    alert("Accès refusé");
  }
}

function cdc() {
  var chaine = prompt("Donnez un mot");
  document.write(chaine.toUpperCase() + "<br>");
  document.write(chaine.toLowerCase() + "<br>");
  document.write(
    "La chaîne contient " + chaine.length + " caractères" + "<br>"
  );
  document.write("La première lettre est " + chaine.substr(0, 1) + "<br>");
}
function seconnecter2() {
  window.location.href = "Identification.html";
}

function login() {
  var login = document.getElementById("t1").value;
  var mdp = document.getElementById("t2").value;
  if (login == "admin" && mdp == "admin") {
    window.location.href = "yes.html";
  } else {
    window.location.href = "no.html";
  }
}
function reinit() {
  t1.value = "";
  t2.value = "";
}

function addLigne() {
  // Récupérer la référence du tableau
  var name = document.getElementById("nom").value;
  var age = document.getElementById("age").value;

  if (name == "" || age == "") {
    alert("Un des deux éléments n'est pas complet ou valide");
  } else if (age < 10 || age > 20) {
    alert("L'âge n'est pas valide");
  } else {
    var table = document.getElementById("myTable");
    var newRow = table.insertRow(-1);
    var cell1 = newRow.insertCell(0);
    var cell2 = newRow.insertCell(1);
    cell1.innerHTML = name;
    cell2.innerHTML = age;
  }
}

function seconnecter3() {
  var i = 0;
  do {
    var id = prompt("Entrez votre nom d'utilisateur");
    var mdp = prompt("Entrez votre mot de passe");
    if (id == "admin" && mdp == "admin") {
      document.write("Bienvenue " + id);
      break;
    } else alert("Accès refusé");
    i = i + 1;
  } while (i < 3);

  if (i == 3) alert("Délai dépassé");
}
