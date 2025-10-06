function somme() 
{
    var a = document.getElementById("n1").value;
    var b = document.getElementById("n2").value;
    var c = Number(a) + Number(b);
    document.getElementById("resultat").value = c;
}

function soustraction() 
{
    var a = document.getElementById("n1").value;
    var b = document.getElementById("n2").value;
    var c = Number(a) - Number(b);
    document.getElementById("resultat").value = c;
}

function division() 
{
    var a = document.getElementById("n1").value;
    var b = document.getElementById("n2").value;
    var c = Number(a) / Number(b);
    document.getElementById("resultat").value = c;
}

function multiplication() 
{
    var a = document.getElementById("n1").value;
    var b = document.getElementById("n2").value;
    var c = Number(a) * Number(b);
    document.getElementById("resultat").value = c;
}

function pair()
{
	var x = document.getElementById("resultat").value
	if (x % 2 ==0){
    	document.getElementById("pair").value = " Paire "
	}
	else{
    	document.getElementById("pair").value = " Impaire "
	}
}

function permute() {
    var a = document.getElementById("n1").value;
    var b = document.getElementById("n2").value;
    var x = document.getElementById("n1").value;
    
    var a = document.getElementById("n2").value;

    
    document.getElementById("n1").value = a;
    document.getElementById("n2").value = x;
}

function reset() {
    document.getElementById("n1").value = "";
    document.getElementById("n2").value = "";
    document.getElementById("resultat").value = "";
    document.getElementById("pair").value = "";
}



