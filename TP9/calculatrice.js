function somme() 
{
    var a = document.getElementById("n1").value;
    var b = document.getElementById("n2").value;
    var c = Number(a) + Number(b);
    document.getElementById("resultat").value = c;
}