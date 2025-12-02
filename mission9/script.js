function testqcm() {
  var bonnerep1 = document.getElementById("q1-rep3");

  var bonnerep2 = document.getElementById("q2-rep2");

  var bonnerep3 = document.getElementById("q3-rep1");

  var bonnerep4 = document.getElementById("q4-rep2");
  var bonnerep4bis = document.getElementById("q4-rep3");

  var bonnerep5 = document.getElementById("q5-rep1");

  var bonnerep6 = document.getElementById("q6-rep5");

  var bonnerep7 = document.getElementById("q7-rep3");
  var bonnerep7bis = document.getElementById("q7-rep5");

  var bonnerep8 = document.getElementById("q8-rep2");

  var bonnerep9 = document.getElementById("q9-rep4");

  var bonnerep10 = document.getElementById("q10-rep3");
  var bonnerep10bis = document.getElementById("q10-rep4");
  var bonnerep10bis2 = document.getElementById("q10-rep8");

  var points = 0;

  if (bonnerep1.checked) {
    points++;
  }

  if (bonnerep2.checked) {
    points++;
  }

  if (bonnerep3.checked) {
    points++;
  }

  if (bonnerep4.checked && bonnerep4bis.checked) {
    points++;
  }

  if (bonnerep5.checked) {
    points++;
  }

  if (bonnerep6.checked) {
    points++;
  }

  if (bonnerep7.checked && bonnerep7bis.checked) {
    points++;
  }

  if (bonnerep8.checked) {
    points++;
  }

  if (bonnerep9.checked) {
    points++;
  }

  if (bonnerep10.checked || bonnerep10bis.checked || bonnerep10bis2.checked) {
    points++;
  }

  if (points >= 2) {
    document.write("Vous avez " + points + " bonnes réponses !" + "<br>" + "<a href='correction.html'>Voir correction</a>");
  } else if (points == 1) {
    document.write("Vous avez 1 bonne réponse." + "<br>" + "<a href='correction.html' target="_blank">Voir correction</a>");
  } else {
    document.write("BOOOOOO!!! Vous n'avez aucune bonne réponse." + "<br>" + "<a href='correction.html'>Voir correction</a>");
  }
}
